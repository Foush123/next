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
 * Installation script for the Photo theme.
 *
 * @package    theme_photo
 * @copyright  2024 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Post installation hook for the theme.
 */
function xmldb_theme_photo_install() {
    global $CFG;
    
    // Set default theme settings
    set_config('brandcolor', '#3b82f6', 'theme_photo');
    set_config('enabledashboard', 1, 'theme_photo');
    set_config('showquizscores', 1, 'theme_photo');
    set_config('showtimetracking', 1, 'theme_photo');
    set_config('showstreak', 1, 'theme_photo');
    set_config('showrankings', 1, 'theme_photo');
    
    return true;
}
