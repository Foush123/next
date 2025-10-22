# Photo Theme Troubleshooting Guide

## Issue: Theme shows normal design instead of custom styling

### Possible Causes and Solutions:

## 1. Theme Not Activated
**Problem**: The theme is not set as the active theme in Moodle.

**Solution**:
1. Go to **Site Administration** → **Appearance** → **Themes** → **Theme selector**
2. Select "Photo" as the theme for all users
3. Click "Save changes"

## 2. Cache Issues
**Problem**: Moodle is serving cached CSS files.

**Solution**:
1. Go to **Site Administration** → **Development** → **Purge all caches**
2. Or run: `php admin/cli/purge_caches.php` from command line
3. Clear browser cache (Ctrl+F5 or Cmd+Shift+R)

## 3. SCSS Compilation Issues
**Problem**: SCSS files are not being compiled to CSS.

**Solution**:
1. Ensure SCSS compilation is enabled in Moodle
2. Go to **Site Administration** → **Development** → **Theme designer mode**
3. Enable "Allow theme designer mode"
4. This will force SCSS recompilation

## 4. File Permissions
**Problem**: Moodle cannot read or write theme files.

**Solution**:
1. Check file permissions on the theme directory
2. Ensure web server has read access to all theme files
3. Check that the theme directory is in the correct location: `/path/to/moodle/theme/photo/`

## 5. Theme Installation
**Problem**: Theme is not properly installed.

**Solution**:
1. Ensure all theme files are in the correct directory structure
2. Check that `version.php` has the correct component name: `theme_photo`
3. Go to **Site Administration** → **Notifications** to check for any installation errors

## 6. Browser Developer Tools
**Problem**: CSS files are not loading.

**Solution**:
1. Open browser Developer Tools (F12)
2. Check the **Network** tab to see if CSS files are loading
3. Look for any 404 errors or failed requests
4. Check the **Console** tab for JavaScript errors

## 7. Theme Settings
**Problem**: Theme settings are not configured.

**Solution**:
1. Go to **Site Administration** → **Appearance** → **Themes** → **Photo**
2. Configure theme settings:
   - Set brand color
   - Enable dashboard features
   - Upload background image if desired

## 8. Force Theme Refresh
**Solution**:
1. Add `?theme=photo` to your Moodle URL
2. Or add `?cache=0` to bypass cache
3. Example: `https://yourmoodle.com/?theme=photo&cache=0`

## 9. Check Theme Files
**Problem**: Missing or corrupted theme files.

**Solution**:
1. Verify all files are present:
   - `config.php`
   - `version.php`
   - `lib.php`
   - `style/moodle.scss`
   - `style/moodle.css`
   - `templates/` directory
   - `lang/en/theme_photo.php`

## 10. Debug Mode
**Problem**: Need to see detailed error messages.

**Solution**:
1. Enable debug mode in Moodle
2. Go to **Site Administration** → **Development** → **Debugging**
3. Set "Debug messages" to "DEVELOPER"
4. Check for any error messages

## Quick Fix Commands

If you have command line access:

```bash
# Navigate to Moodle directory
cd /path/to/moodle

# Purge all caches
php admin/cli/purge_caches.php

# Upgrade theme
php admin/cli/upgrade.php --non-interactive

# Check theme installation
php admin/cli/plugin_install.php --plugin=theme_photo
```

## Expected Result

After following these steps, you should see:
- Modern card-based dashboard layout
- Clean, professional styling
- Interactive dashboard elements
- Custom color scheme
- Responsive design

## Still Having Issues?

If the theme still doesn't work:
1. Check Moodle error logs
2. Verify Moodle version compatibility
3. Ensure all dependencies are met
4. Contact your system administrator
