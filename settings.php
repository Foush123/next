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
 * Settings for the Next theme.
 *
 * @package    theme_next
 * @copyright  2024 Next LMS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Create a new settings page
    $settings = new theme_boost_admin_settingspage_tabs('themesettingnext', get_string('configtitle', 'theme_next'));
    
    // General settings page
    $page = new admin_settingpage('theme_next_general', get_string('generalsettings', 'theme_next'));

    // Brand color setting
    $name = 'theme_next/primarycolor';
    $title = get_string('primarycolor', 'theme_next');
    $description = get_string('primarycolordesc', 'theme_next');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#6366f1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary color setting
    $name = 'theme_next/secondarycolor';
    $title = get_string('secondarycolor', 'theme_next');
    $description = get_string('secondarycolordesc', 'theme_next');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#8b5cf6');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Accent color setting
    $name = 'theme_next/accentcolor';
    $title = get_string('accentcolor', 'theme_next');
    $description = get_string('accentcolordesc', 'theme_next');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#06b6d4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Success color setting
    $name = 'theme_next/successcolor';
    $title = get_string('successcolor', 'theme_next');
    $description = get_string('successcolordesc', 'theme_next');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#10b981');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Warning color setting
    $name = 'theme_next/warningcolor';
    $title = get_string('warningcolor', 'theme_next');
    $description = get_string('warningcolordesc', 'theme_next');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#f59e0b');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Danger color setting
    $name = 'theme_next/dangercolor';
    $title = get_string('dangercolor', 'theme_next');
    $description = get_string('dangercolordesc', 'theme_next');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#ef4444');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting
    $name = 'theme_next/backgroundimage';
    $title = get_string('backgroundimage', 'theme_next');
    $description = get_string('backgroundimagedesc', 'theme_next');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // Dashboard settings page
    $page = new admin_settingpage('theme_next_dashboard', get_string('dashboardsettings', 'theme_next'));

    // Enable dashboard enhancements
    $name = 'theme_next/enabledashboard';
    $title = get_string('enabledashboard', 'theme_next');
    $description = get_string('enabledashboarddesc', 'theme_next');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show learning progress
    $name = 'theme_next/showlearningprogress';
    $title = get_string('showlearningprogress', 'theme_next');
    $description = get_string('showlearningprogressdesc', 'theme_next');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show recent activity
    $name = 'theme_next/showrecentactivity';
    $title = get_string('showrecentactivity', 'theme_next');
    $description = get_string('showrecentactivitydesc', 'theme_next');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show course statistics
    $name = 'theme_next/showcoursestats';
    $title = get_string('showcoursestats', 'theme_next');
    $description = get_string('showcoursestatsdesc', 'theme_next');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show learning analytics
    $name = 'theme_next/showlearninganalytics';
    $title = get_string('showlearninganalytics', 'theme_next');
    $description = get_string('showlearninganalyticsdesc', 'theme_next');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    $settings->add($page);

    // Typography settings page
    $page = new admin_settingpage('theme_next_typography', get_string('typographysettings', 'theme_next'));

    // Font family setting
    $name = 'theme_next/fontfamily';
    $title = get_string('fontfamily', 'theme_next');
    $description = get_string('fontfamilydesc', 'theme_next');
    $setting = new admin_setting_configselect($name, $title, $description, 'Inter', [
        'Inter' => 'Inter',
        'Roboto' => 'Roboto',
        'Open Sans' => 'Open Sans',
        'Lato' => 'Lato',
        'Montserrat' => 'Montserrat',
        'Poppins' => 'Poppins'
    ]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Font size setting
    $name = 'theme_next/fontsize';
    $title = get_string('fontsize', 'theme_next');
    $description = get_string('fontsizedesc', 'theme_next');
    $setting = new admin_setting_configselect($name, $title, $description, '16px', [
        '14px' => '14px',
        '16px' => '16px',
        '18px' => '18px',
        '20px' => '20px'
    ]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // Animation settings page
    $page = new admin_settingpage('theme_next_animations', get_string('animationsettings', 'theme_next'));

    // Enable animations
    $name = 'theme_next/enableanimations';
    $title = get_string('enableanimations', 'theme_next');
    $description = get_string('enableanimationsdesc', 'theme_next');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Animation speed
    $name = 'theme_next/animationspeed';
    $title = get_string('animationspeed', 'theme_next');
    $description = get_string('animationspeeddesc', 'theme_next');
    $setting = new admin_setting_configselect($name, $title, $description, 'normal', [
        'slow' => get_string('slow', 'theme_next'),
        'normal' => get_string('normal', 'theme_next'),
        'fast' => get_string('fast', 'theme_next')
    ]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}