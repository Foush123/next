<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Library functions for the Next theme.
 *
 * @package    theme_next
 * @copyright  2024 Next LMS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_next_get_pre_scss($theme) {
    $scss = '';
    $configurable = [
        'primarycolor' => ['primary'],
        'secondarycolor' => ['secondary'],
        'accentcolor' => ['accent'],
        'successcolor' => ['success'],
        'warningcolor' => ['warning'],
        'dangercolor' => ['danger'],
        'darkcolor' => ['dark'],
        'lightcolor' => ['light'],
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        array_map(function($target) use (&$scss, $value) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }, (array) $targets);
    }

    return $scss;
}

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_next_get_extra_scss($theme) {
    $content = '';
    $imageurl = $theme->image_url('background', 'theme');

    // Sets the background image.
    if (!empty($theme->settings->backgroundimage)) {
        $content .= 'body { background-image: url("' . $imageurl . '"); }';
    }

    return $content;
}

/**
 * Get the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_next_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    $scssfiles = array(
        'moodle' => 'moodle.scss'
    );

    foreach ($scssfiles as $scssfile => $scssfilename) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/next/style/' . $scssfilename);
    }

    return $scss;
}

/**
 * Get the regions for the theme.
 *
 * @return array
 */
function theme_next_get_pre_regions() {
    return [
        'side-pre' => 'side-pre',
        'side-post' => 'side-post',
    ];
}

/**
 * Add dashboard enhancements to the page.
 *
 * @param moodle_page $page
 */
function theme_next_add_dashboard_enhancements($page) {
    global $OUTPUT;
    
    // Add JavaScript for interactive elements
    if ($page->pagelayout === 'dashboard' || $page->pagelayout === 'course') {
        $page->requires->js_call_amd('theme_next/dashboard', 'init');
        $page->requires->js_call_amd('theme_next/animations', 'init');
        $page->requires->js_call_amd('theme_next/interactions', 'init');
    }
}

/**
 * Get the user's learning progress data.
 *
 * @param int $userid The user ID.
 * @return array
 */
function theme_next_get_learning_progress($userid) {
    global $DB;
    
    $progress = [];
    
    // Get course completions
    $sql = "SELECT COUNT(*) as completed_courses
            FROM {course_completions} 
            WHERE userid = ? AND timecompleted IS NOT NULL";
    $progress['completed_courses'] = $DB->get_field_sql($sql, [$userid]);
    
    // Get total enrolled courses
    $sql = "SELECT COUNT(*) as enrolled_courses
            FROM {user_enrolments} ue
            JOIN {enrol} e ON e.id = ue.enrolid
            WHERE ue.userid = ? AND e.status = 0";
    $progress['enrolled_courses'] = $DB->get_field_sql($sql, [$userid]);
    
    // Get quiz attempts
    $sql = "SELECT COUNT(*) as quiz_attempts
            FROM {quiz_attempts} 
            WHERE userid = ? AND state = 'finished'";
    $progress['quiz_attempts'] = $DB->get_field_sql($sql, [$userid]);
    
    // Get average quiz score
    $sql = "SELECT AVG(sumgrades) as avg_score
            FROM {quiz_attempts} 
            WHERE userid = ? AND state = 'finished' AND sumgrades IS NOT NULL";
    $progress['avg_quiz_score'] = $DB->get_field_sql($sql, [$userid]);
    
    return $progress;
}

/**
 * Get the user's recent activity.
 *
 * @param int $userid The user ID.
 * @param int $limit The number of activities to return.
 * @return array
 */
function theme_next_get_recent_activity($userid, $limit = 5) {
    global $DB;
    
    $sql = "SELECT c.id, c.fullname, c.shortname, c.summary, c.startdate
            FROM {course} c
            JOIN {user_enrolments} ue ON ue.userid = ?
            JOIN {enrol} e ON e.id = ue.enrolid AND e.courseid = c.id
            WHERE c.visible = 1
            ORDER BY ue.timecreated DESC
            LIMIT ?";
    
    return $DB->get_records_sql($sql, [$userid, $limit]);
}

/**
 * Get course statistics for dashboard.
 *
 * @param int $courseid The course ID.
 * @return array
 */
function theme_next_get_course_stats($courseid) {
    global $DB;
    
    $stats = [];
    
    // Get total enrolled users
    $sql = "SELECT COUNT(*) as total_users
            FROM {user_enrolments} ue
            JOIN {enrol} e ON e.id = ue.enrolid
            WHERE e.courseid = ? AND e.status = 0";
    $stats['total_users'] = $DB->get_field_sql($sql, [$courseid]);
    
    // Get completion rate
    $sql = "SELECT COUNT(*) as completed_users
            FROM {course_completions} 
            WHERE course = ? AND timecompleted IS NOT NULL";
    $stats['completed_users'] = $DB->get_field_sql($sql, [$courseid]);
    
    if ($stats['total_users'] > 0) {
        $stats['completion_rate'] = round(($stats['completed_users'] / $stats['total_users']) * 100, 1);
    } else {
        $stats['completion_rate'] = 0;
    }
    
    return $stats;
}