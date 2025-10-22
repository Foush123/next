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
 * Dashboard layout file for the Photo theme.
 *
 * @package    theme_photo
 * @copyright  2024 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Include the main layout
require_once($CFG->dirroot . '/theme/photo/layout/columns2.php');

// Override the main content area for dashboard
$templatecontext['dashboard_data'] = [
    'avg_quiz_score' => 82,
    'quiz_score_change' => -10,
    'highest_score' => 92.5,
    'lowest_score' => 64.25,
    'total_time_spent' => '12 Hours',
    'time_change' => -12.00,
    'time_chart_data' => [
        ['height' => 20, 'highlighted' => false, 'active' => false],
        ['height' => 35, 'highlighted' => false, 'active' => false],
        ['height' => 25, 'highlighted' => false, 'active' => false],
        ['height' => 40, 'highlighted' => false, 'active' => false],
        ['height' => 30, 'highlighted' => false, 'active' => false],
        ['height' => 45, 'highlighted' => false, 'active' => false],
        ['height' => 90, 'highlighted' => true, 'active' => true]
    ],
    'highlighted_day' => '9.5H',
    'current_streak' => 5,
    'longest_streak' => 15,
    'streak_days' => [
        ['day_number' => '01', 'completed' => true],
        ['day_number' => '02', 'completed' => true],
        ['day_number' => '03', 'completed' => true],
        ['day_number' => '04', 'completed' => true],
        ['day_number' => '05', 'completed' => true],
        ['day_number' => '06', 'completed' => false],
        ['day_number' => '07', 'completed' => false],
        ['day_number' => '08', 'completed' => false],
        ['day_number' => '09', 'completed' => false],
        ['day_number' => '10', 'completed' => false]
    ],
    'current_rank' => 15,
    'total_learners' => '23K',
    'top_users' => [
        ['name' => 'Brooklyn Simmons', 'initials' => 'BS'],
        ['name' => 'Annette Black', 'initials' => 'AB'],
        ['name' => 'Guy Hawkins', 'initials' => 'GH']
    ],
    'avg_enrollments' => '1,250,00',
    'enrollment_change' => 13.4,
    'active_year' => true,
    'active_6months' => false,
    'active_3months' => false,
    'active_month' => false
];

// Set the main content to use dashboard template
$templatecontext['maincontent'] = $OUTPUT->render_from_template('theme_photo/dashboard', $templatecontext['dashboard_data']);
