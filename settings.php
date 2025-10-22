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
 * Settings for the Photo theme.
 *
 * @package    theme_photo
 * @copyright  2024 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Create a new settings page
    $settings = new theme_boost_admin_settingspage_tabs('themesettingphoto', get_string('configtitle', 'theme_photo'));
    $page = new admin_settingpage('theme_photo_general', get_string('generalsettings', 'theme_photo'));

    // Dashboard settings
    $name = 'theme_photo/enabledashboard';
    $title = get_string('enabledashboard', 'theme_photo');
    $description = get_string('enabledashboarddesc', 'theme_photo');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Brand color setting
    $name = 'theme_photo/brandcolor';
    $title = get_string('brandcolor', 'theme_photo');
    $description = get_string('brandcolordesc', 'theme_photo');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#3b82f6');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting
    $name = 'theme_photo/backgroundimage';
    $title = get_string('backgroundimage', 'theme_photo');
    $description = get_string('backgroundimagedesc', 'theme_photo');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // Dashboard settings page
    $page = new admin_settingpage('theme_photo_dashboard', get_string('dashboardsettings', 'theme_photo'));

    // Show quiz scores
    $name = 'theme_photo/showquizscores';
    $title = get_string('showquizscores', 'theme_photo');
    $description = get_string('showquizscoresdesc', 'theme_photo');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show time tracking
    $name = 'theme_photo/showtimetracking';
    $title = get_string('showtimetracking', 'theme_photo');
    $description = get_string('showtimetrackingdesc', 'theme_photo');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show streak tracking
    $name = 'theme_photo/showstreak';
    $title = get_string('showstreak', 'theme_photo');
    $description = get_string('showstreakdesc', 'theme_photo');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show rankings
    $name = 'theme_photo/showrankings';
    $title = get_string('showrankings', 'theme_photo');
    $description = get_string('showrankingsdesc', 'theme_photo');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    $settings->add($page);
}
