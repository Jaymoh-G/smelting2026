# Production Deployment Guide

## Required Production .env Settings

On your live server (e.g. via cPanel, FTP, or SSH), ensure your `.env` file has:

```
APP_ENV=production
APP_DEBUG=false
```

**Never** set `APP_DEBUG=true` in production—it exposes sensitive information and creates security risks.

## PHP Version Requirement

The application requires **PHP 8.0 or higher** for production. The `psr/log` package uses PHP 8.0+ features (`\Stringable` interface).

If you see this error:
```
Could not check compatibility between Psr\Log\AbstractLogger::emergency(Stringable|string $message...)
```

**Solution:** Upgrade PHP on your hosting to 8.0 or higher.

### How to upgrade PHP (cPanel / shared hosting)

1. Log in to your hosting control panel (cPanel, Plesk, etc.)
2. Find **Select PHP Version** or **MultiPHP Manager**
3. Select **PHP 8.0**, **8.1**, or **8.2** for your domain
4. Save changes

### Verify PHP version

Create a temporary file `phpinfo.php` in your public folder with:
```php
<?php phpinfo();
```
Visit `https://yoursite.com/phpinfo.php` and check the PHP version. **Delete this file after checking** for security.
