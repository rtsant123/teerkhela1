# Teer Khela Results - Deployment Guide for Hostinger

## Prerequisites
- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer installed
- SSH access to Hostinger

## Step-by-Step Deployment

### 1. Database Setup on Hostinger

1. Log in to Hostinger hPanel
2. Go to **Databases** → **MySQL Databases**
3. Create a new database:
   - Database name: `teerkhela_db`
   - Username: `teerkhela_user`
   - Password: (choose a strong password)
4. Note down the database credentials

### 2. Upload Files to Hostinger

**Option A: Using File Manager**
1. Compress all project files into a ZIP
2. Go to **File Manager** in hPanel
3. Navigate to `public_html`
4. Upload and extract the ZIP file

**Option B: Using Git (Recommended)**
```bash
# SSH into your Hostinger server
ssh your_username@your_server_ip

# Navigate to public_html
cd public_html

# Clone your repository
git clone https://github.com/your-repo/teerkhela.git .
```

**Option C: Using SFTP**
1. Use FileZilla or similar SFTP client
2. Connect to your Hostinger server
3. Upload all files to `public_html`

### 3. Configure Environment

1. Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```

2. Edit `.env` file with your settings:
```env
APP_NAME="Teer Khela Results"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://teerkhelaresults.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=teerkhela_db
DB_USERNAME=teerkhela_user
DB_PASSWORD=your_db_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=support@teerkhelaresults.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="support@teerkhelaresults.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Install Dependencies

SSH into your server and run:
```bash
cd public_html
composer install --optimize-autoloader --no-dev
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Migrations and Seeders

```bash
# Run migrations
php artisan migrate --force

# Seed the database
php artisan db:seed --force
```

### 7. Set Correct Permissions

```bash
# Set directory permissions
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage/logs storage/framework

# Make uploads directory writable
mkdir -p public/uploads
chmod -R 755 public/uploads
```

### 8. Configure Document Root

**Important:** For Laravel to work correctly on Hostinger:

1. Go to **Hosting** → **Advanced** → **Folder Index**
2. Set the document root to `public_html/public`

OR use `.htaccess` in `public_html`:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### 9. Set Up SSL

1. Go to **SSL** in hPanel
2. Install free SSL certificate
3. Force HTTPS redirect

### 10. Test the Application

1. Visit your domain: `https://teerkhelaresults.com`
2. Test the admin panel: `https://teerkhelaresults.com/admin`
   - Email: `admin@teerkhelaresults.com`
   - Password: `password123`

**IMPORTANT:** Change the admin password immediately after first login!

### 11. Set Up Cron Jobs (Optional)

For cache clearing and other scheduled tasks:

1. Go to **Cron Jobs** in hPanel
2. Add this cron job:
```
* * * * * cd /home/username/public_html && php artisan schedule:run >> /dev/null 2>&1
```

## Troubleshooting

### 500 Internal Server Error
- Check `storage/logs/laravel.log` for error details
- Ensure all directories have correct permissions
- Verify `.env` configuration

### Database Connection Error
- Verify database credentials in `.env`
- Check if database exists
- Ensure database user has proper privileges

### Blank Page
- Enable `APP_DEBUG=true` temporarily to see errors
- Check PHP version compatibility
- Verify all files were uploaded correctly

### CSS/JS Not Loading
- Clear browser cache
- Run `php artisan cache:clear`
- Check if `public` folder is set as document root

## Quick Commands Reference

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Rollback migrations
php artisan migrate:rollback

# Fresh migration with seeding
php artisan migrate:fresh --seed
```

## Security Checklist

- [ ] Changed default admin password
- [ ] Set `APP_DEBUG=false` in production
- [ ] Enabled HTTPS/SSL
- [ ] Set secure file permissions
- [ ] Configured proper CSRF protection
- [ ] Removed any test/debug code

## Support

If you encounter any issues:
1. Check the Laravel logs in `storage/logs/`
2. Review Hostinger error logs in hPanel
3. Contact Hostinger support for server-related issues

---

**Default Admin Credentials:**
- URL: `https://teerkhelaresults.com/admin`
- Email: `admin@teerkhelaresults.com`
- Password: `password123`

**Remember to change these credentials immediately after deployment!**
