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
 * Configuration for the Next theme.
 *
 * @package    theme_next
 * @copyright  2024 Next LMS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// The first setting we need is the name of the theme.
$THEME->name = 'next';

// This setting lists the style sheets we want to include in our theme.
$THEME->sheets = [];

// This is a setting that can be used to provide some styling to the content in the TinyMCE text editor.
$THEME->editor_sheets = [];

// This is a critical setting. We want to inherit from theme_boost.
$THEME->parents = ['boost'];

// A dock is a way to take blocks out of the page and put them in a persistent floating area on the side of the page.
$THEME->enable_dock = false;

// This is an old setting used to load specific CSS for some YUI JS.
$THEME->yuicssmodules = array();

// Most themes will use this rendererfactory as this is the one that allows the theme to override any other renderer.
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// This is a list of blocks that are required to exist on all pages for this theme to function correctly.
$THEME->requiredblocks = '';

// This is a feature that tells the blocks library not to use the "Add a block" block.
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

$THEME->haseditswitch = true;

// SCSS compilation function
$THEME->scss = function($theme) {
    return theme_next_get_main_scss_content($theme);
};

// JavaScript files
$THEME->js = function($theme) {
    return [
        'dashboard' => 'theme_next/dashboard',
        'animations' => 'theme_next/animations',
        'interactions' => 'theme_next/interactions'
    ];
};

// Layout options
$THEME->layouts = [
    'dashboard' => [
        'file' => 'dashboard.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    'columns2' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    'course' => [
        'file' => 'course.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    'frontpage' => [
        'file' => 'frontpage.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
];

// SCSS variables
$THEME->scss_variables = function($theme) {
    return [
        'primary' => $theme->settings->primarycolor ?? '#6366f1',
        'secondary' => $theme->settings->secondarycolor ?? '#8b5cf6',
        'accent' => $theme->settings->accentcolor ?? '#06b6d4',
        'success' => $theme->settings->successcolor ?? '#10b981',
        'warning' => $theme->settings->warningcolor ?? '#f59e0b',
        'danger' => $theme->settings->dangercolor ?? '#ef4444',
        'dark' => $theme->settings->darkcolor ?? '#1e293b',
        'light' => $theme->settings->lightcolor ?? '#f8fafc',
    ];
};

// Additional theme settings
$THEME->scss_variables = function($theme) {
    return [
        'primary' => $theme->settings->primarycolor ?? '#6366f1',
        'secondary' => $theme->settings->secondarycolor ?? '#8b5cf6',
        'accent' => $theme->settings->accentcolor ?? '#06b6d4',
        'success' => $theme->settings->successcolor ?? '#10b981',
        'warning' => $theme->settings->warningcolor ?? '#f59e0b',
        'danger' => $theme->settings->dangercolor ?? '#ef4444',
        'dark' => $theme->settings->darkcolor ?? '#1e293b',
        'light' => $theme->settings->lightcolor ?? '#f8fafc',
        'gradient-primary' => $theme->settings->gradientprimary ?? 'linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%)',
        'gradient-secondary' => $theme->settings->gradientsecondary ?? 'linear-gradient(135deg, #06b6d4 0%, #10b981 100%)',
        'border-radius' => $theme->settings->borderradius ?? '12px',
        'shadow-sm' => $theme->settings->shadowsm ?? '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
        'shadow-md' => $theme->settings->shadowmd ?? '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
        'shadow-lg' => $theme->settings->shadowlg ?? '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
    ];
};