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
 * Dashboard layout for the Next theme.
 *
 * @package    theme_next
 * @copyright  2024 Next LMS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$user = $USER;
$course = $this->page->course;
$context = $this->page->context;

// Get user learning progress
$progress = theme_next_get_learning_progress($user->id);
$recent_activity = theme_next_get_recent_activity($user->id, 5);

$completedpercent = 0;
if (!empty($progress['enrolled_courses']) && (int)$progress['enrolled_courses'] > 0) {
    $completedpercent = round(($progress['completed_courses'] / $progress['enrolled_courses']) * 100, 2);
}

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID)]),
    'output' => $this,
    'sidepreblocks' => $this->blocks('side-pre', 'dashboard'),
    'sidepostblocks' => $this->blocks('side-post', 'dashboard'),
    'hasblocks' => $this->blocks('side-pre', 'dashboard') || $this->blocks('side-post', 'dashboard'),
    'bodyattributes' => $this->body_attributes(),
    'regionmainsettingsmenu' => $this->region_main_settings_menu(),
    'hasregionmainsettingsmenu' => !empty($this->region_main_settings_menu()),
    'user' => $user,
    'progress' => $progress,
    'progress_completed_percent' => $completedpercent,
    'recent_activity' => $recent_activity,
    'course' => $course,
    'context' => $context,
];

echo $OUTPUT->render_from_template('theme_next/dashboard', $templatecontext);