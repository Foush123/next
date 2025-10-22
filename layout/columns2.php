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
 * Two column layout for the Photo theme.
 *
 * @package    theme_photo
 * @copyright  2024 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$regions = theme_photo_get_pre_regions();
$sidepre = $OUTPUT->blocks('side-pre', $regions['side-pre']);
$sidepost = $OUTPUT->blocks('side-post', $regions['side-post']);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID)]),
    'output' => $OUTPUT,
    'sidepre' => $sidepre,
    'sidepost' => $sidepost,
    'hassidepre' => $hassidepre,
    'hassidepost' => $hassidepost,
    'regionmainsettingsmenu' => $OUTPUT->region_main_settings_menu(),
    'hasregionmainsettingsmenu' => !empty($PAGE->layout_options['regionmainsettingsmenu']),
    'hasblocks' => $hassidepre || $hassidepost,
    'bodyattributes' => $OUTPUT->body_attributes(),
    'maincontent' => $OUTPUT->main_content(),
    'footer' => $OUTPUT->footer()
];

echo $OUTPUT->render_from_template('theme_photo/columns2', $templatecontext);
