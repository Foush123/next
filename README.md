# Next Theme for Moodle

A modern, tech-savvy Learning Management System theme designed to enhance user engagement and learning experience. The Next theme features a clean, minimalist design with vibrant accent colors, interactive elements, and smooth animations.

## 🚀 Features

### Modern Design
- **Clean Interface**: Minimalist design with focus on content
- **Tech-Inspired Colors**: Modern color palette with gradients
- **Smooth Animations**: Engaging micro-interactions and transitions
- **Glass Morphism**: Modern glass effects with backdrop blur

### Responsive Design
- **Mobile First**: Optimized for all device sizes
- **Touch Friendly**: 44px minimum touch targets
- **Flexible Grid**: Auto-fit columns with responsive breakpoints
- **Adaptive Typography**: Font sizes that scale with screen size

### Accessibility
- **WCAG 2.1 AA Compliant**: Meets accessibility standards
- **Keyboard Navigation**: Full keyboard support
- **Screen Reader Support**: Semantic HTML and ARIA labels
- **High Contrast**: Support for system preferences

### Performance
- **Optimized CSS**: Minified and compressed stylesheets
- **Efficient JavaScript**: AMD modules with lazy loading
- **Fast Loading**: Optimized for speed and performance
- **Caching Ready**: CDN and browser caching support

## 🎨 Design System

### Color Palette
- **Primary**: #6366f1 (Indigo) - Main brand color
- **Secondary**: #8b5cf6 (Purple) - Secondary brand color
- **Accent**: #06b6d4 (Cyan) - Accent color for highlights
- **Success**: #10b981 (Emerald) - Success states
- **Warning**: #f59e0b (Amber) - Warning states
- **Danger**: #ef4444 (Red) - Error states

### Typography
- **Primary Font**: Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto
- **Monospace**: JetBrains Mono, Fira Code, Monaco, Cascadia Code
- **Scale**: 0.75rem to 3rem with consistent spacing

### Components
- **Cards**: Glass morphism with subtle shadows
- **Buttons**: Gradient backgrounds with hover effects
- **Progress Bars**: Animated with shimmer effects
- **Navigation**: Backdrop blur with smooth transitions

## 📱 Responsive Breakpoints

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px
- **Large Desktop**: > 1200px

## 🛠️ Installation

1. **Download the theme**:
   ```bash
   git clone https://github.com/your-repo/theme-next.git
   ```

2. **Copy to Moodle**:
   ```bash
   cp -r theme-next /path/to/moodle/theme/next
   ```

3. **Set permissions**:
   ```bash
   chmod -R 755 /path/to/moodle/theme/next
   ```

4. **Install in Moodle**:
   - Go to Site Administration → Notifications
   - Click "Upgrade Moodle database now"
   - Go to Site Administration → Appearance → Themes → Theme selector
   - Select "Next" as the theme

## ⚙️ Configuration

### Theme Settings
Access theme settings at: **Site Administration → Appearance → Themes → Next**

#### General Settings
- **Primary Color**: Main brand color
- **Secondary Color**: Secondary brand color
- **Accent Color**: Accent color for highlights
- **Success Color**: Success states color
- **Warning Color**: Warning states color
- **Danger Color**: Error states color
- **Background Image**: Custom background image

#### Dashboard Settings
- **Enable Dashboard**: Modern dashboard layout
- **Show Learning Progress**: Display progress metrics
- **Show Recent Activity**: Display recent learning activity
- **Show Course Statistics**: Display course analytics
- **Show Learning Analytics**: Display learning insights

#### Typography Settings
- **Font Family**: Choose primary font
- **Font Size**: Choose base font size

#### Animation Settings
- **Enable Animations**: Smooth animations and transitions
- **Animation Speed**: Choose animation speed (slow/normal/fast)

## 🎯 Target Audience

### Primary Users
- **Students**: Modern, engaging learning interface
- **Educators**: Intuitive course management tools
- **Administrators**: Comprehensive theme customization

### Use Cases
- **Higher Education**: University and college LMS
- **Corporate Training**: Employee learning platforms
- **Online Courses**: MOOC and course platforms
- **Professional Development**: Skills development programs

## 📊 Dashboard Features

### Learning Progress
- **Course Completion**: Visual progress tracking
- **Quiz Performance**: Performance analytics
- **Learning Streak**: Engagement tracking
- **Time Spent**: Learning time analytics

### Recent Activity
- **Course Updates**: Latest course content
- **Assignment Due**: Upcoming deadlines
- **Discussion Posts**: Forum activity
- **Achievements**: Recent accomplishments

### Analytics
- **Learning Charts**: Visual progress data
- **Performance Metrics**: Detailed analytics
- **Engagement Stats**: User interaction data
- **Completion Rates**: Course completion tracking

## 🎨 Customization

### Color Customization
```scss
// Override default colors
$primary: #your-color;
$secondary: #your-color;
$accent: #your-color;
```

### Typography Customization
```scss
// Override default fonts
$font-family-primary: 'Your Font', sans-serif;
$font-size-base: 18px;
```

### Component Customization
```scss
// Override component styles
.dashboard-card {
    border-radius: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
```

## 🔧 Development

### Prerequisites
- Moodle 3.9+ (recommended 4.0+)
- PHP 7.4+
- SCSS compilation support
- Modern browser support

### Building the Theme
```bash
# Install dependencies
npm install

# Compile SCSS
npm run build

# Watch for changes
npm run watch
```

### File Structure
```
theme/next/
├── config.php              # Theme configuration
├── version.php              # Version information
├── lib.php                  # Theme functions
├── settings.php             # Theme settings
├── style/
│   └── moodle.scss         # Main stylesheet
├── js/
│   ├── dashboard.js        # Dashboard functionality
│   ├── animations.js       # Animation system
│   └── interactions.js     # Interactive elements
├── layout/
│   ├── dashboard.php       # Dashboard layout
│   ├── course.php          # Course layout
│   └── frontpage.php       # Frontpage layout
├── templates/
│   ├── dashboard.mustache  # Dashboard template
│   └── course.mustache     # Course template
└── lang/
    └── en/
        └── theme_next.php  # Language strings
```

## 🧪 Testing

### Browser Support
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+

### Testing Checklist
- [ ] Responsive design on all devices
- [ ] Accessibility compliance (WCAG 2.1 AA)
- [ ] Performance optimization
- [ ] Cross-browser compatibility
- [ ] Theme customization options
- [ ] Dashboard functionality
- [ ] Course page layouts

## 📈 Performance

### Optimization Features
- **CSS Minification**: Compressed stylesheets
- **JavaScript Bundling**: Combined and minified scripts
- **Image Optimization**: WebP format with fallbacks
- **Lazy Loading**: Content loaded on demand
- **Caching Strategy**: Optimized cache headers

### Performance Metrics
- **First Contentful Paint**: < 1.5s
- **Largest Contentful Paint**: < 2.5s
- **Cumulative Layout Shift**: < 0.1
- **First Input Delay**: < 100ms

## 🤝 Contributing

### Development Setup
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

### Code Standards
- **SCSS**: Follow BEM methodology
- **JavaScript**: Use AMD modules
- **PHP**: Follow Moodle coding standards
- **Accessibility**: WCAG 2.1 AA compliance

## 📄 License

This project is licensed under the GNU GPL v3 or later - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

### Documentation
- [Design Specification](DESIGN_SPECIFICATION.md)
- [Theme Demo](theme_demo.html)
- [Moodle Documentation](https://docs.moodle.org/)

### Community
- [Moodle Forums](https://moodle.org/mod/forum/view.php?id=46)
- [GitHub Issues](https://github.com/your-repo/theme-next/issues)
- [Discord Community](https://discord.gg/moodle)

### Professional Support
- **Custom Development**: Tailored solutions for your needs
- **Theme Customization**: Brand-specific modifications
- **Performance Optimization**: Speed and efficiency improvements
- **Training & Support**: Implementation and maintenance guidance

## 🚀 Roadmap

### Upcoming Features
- **Dark Mode**: Automatic and manual dark theme
- **Advanced Analytics**: Enhanced learning insights
- **AI Integration**: Personalized learning recommendations
- **Accessibility Improvements**: Enhanced screen reader support
- **Performance Enhancements**: Further optimization
- **Mobile App**: Companion mobile application

### Version History
- **v1.0.0**: Initial release with core features
- **v1.1.0**: Enhanced animations and interactions
- **v1.2.0**: Improved accessibility and performance
- **v2.0.0**: Dark mode and advanced customization

---

**Next Theme** - Empowering modern learning experiences with beautiful, accessible, and performant design.

For more information, visit our [website](https://next-theme.com) or contact us at [support@next-theme.com](mailto:support@next-theme.com).