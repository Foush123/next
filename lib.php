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
 * Library functions for the Photo theme.
 *
 * @package    theme_photo
 * @copyright  2024 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_photo_get_pre_scss($theme) {
    $scss = '';
    $configurable = [
        // Config key => [variableName, ...]
        'brandcolor' => ['primary'],
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
function theme_photo_get_extra_scss($theme) {
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
function theme_photo_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    $scssfiles = array(
        'moodle' => 'moodle.scss'
    );

    foreach ($scssfiles as $scssfile => $scssfilename) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/photo/style/' . $scssfilename);
    }

    return $scss;
}


/**
 * Get the regions for the theme.
 *
 * @return array
 */
function theme_photo_get_pre_regions() {
    return [
        'side-pre' => 'side-pre',
        'side-post' => 'side-post',
    ];
}
