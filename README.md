# Photo Theme for Moodle

A modern, clean dashboard theme for Moodle that provides a card-based interface with interactive elements, inspired by contemporary learning management systems.

## Features

### Modern Dashboard Design
- **Card-based Layout**: Clean, organized cards for different metrics and information
- **Interactive Elements**: Hover effects, animated progress bars, and interactive charts
- **Responsive Design**: Works seamlessly across desktop, tablet, and mobile devices
- **Clean Typography**: Modern font stack with proper hierarchy

### Dashboard Components
- **Quiz Score Metrics**: Average quiz scores with progress indicators
- **Time Tracking**: Visual representation of time spent learning
- **Streak Tracking**: Learning streak visualization with day indicators
- **Global Rankings**: User rankings and leaderboard
- **Course Analytics**: Monthly enrollment and completion rate charts

### Technical Features
- **SCSS Styling**: Modern CSS with SCSS preprocessing
- **Mustache Templates**: Flexible template system for customization
- **JavaScript Interactivity**: Chart.js integration for data visualization
- **Bootstrap 4 Integration**: Responsive grid system and components
- **Moodle Integration**: Full compatibility with Moodle's theme system

## Installation

1. Upload the theme files to `moodle/theme/photo/`
2. Log in as an administrator
3. Go to Site administration > Appearance > Themes > Theme selector
4. Select "Photo" as your theme
5. Configure theme settings in Site administration > Appearance > Themes > Photo

## Configuration

The theme includes several configuration options:

### General Settings
- **Enable Dashboard**: Toggle the modern dashboard layout
- **Brand Color**: Customize the primary color scheme
- **Background Image**: Upload a custom background image

### Dashboard Settings
- **Show Quiz Scores**: Enable/disable quiz score metrics
- **Show Time Tracking**: Enable/disable time tracking features
- **Show Streak Tracking**: Enable/disable learning streak visualization
- **Show Rankings**: Enable/disable user ranking features

## File Structure

```
theme/photo/
├── config.php              # Theme configuration
├── lib.php                 # Theme functions
├── version.php             # Version information
├── settings.php            # Admin settings
├── README.md              # This file
├── style/
│   └── moodle.scss        # Main SCSS file
├── templates/
│   ├── columns2.mustache  # Two-column layout template
│   └── dashboard.mustache # Dashboard template
├── layout/
│   ├── columns2.php       # Two-column layout
│   └── dashboard.php      # Dashboard layout
├── js/
│   └── dashboard.js       # Dashboard JavaScript
└── lang/
    └── en/
        └── theme_photo.php # Language strings
```

## Customization

### Colors
The theme uses CSS custom properties for easy color customization. Main colors can be modified in the SCSS file:

```scss
$primary-color: #3b82f6;    // Blue
$secondary-color: #f59e0b;  // Orange
$success-color: #10b981;    // Green
$danger-color: #ef4444;     // Red
```

### Layout
The dashboard layout can be customized by modifying the Mustache templates in the `templates/` directory.

### JavaScript
Interactive features can be extended by modifying `js/dashboard.js` or adding new JavaScript modules.

## Browser Support

- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+

## Requirements

- Moodle 3.7+
- PHP 7.2+
- Modern web browser with JavaScript enabled

## License

This theme is licensed under the GNU GPL v3 or later.

## Support

For support and bug reports, please contact the theme developer or create an issue in the project repository.

## Changelog

### Version 1.0.0
- Initial release
- Modern dashboard design
- Card-based layout
- Interactive charts and metrics
- Responsive design
- SCSS styling system
