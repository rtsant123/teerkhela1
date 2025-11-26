# 🚀 Hostinger Deployment Guide - Simple PHP Version

## ✅ This is Now a Simple PHP Application

**Good News!** This version does **NOT** require:
- ❌ Laravel
- ❌ Composer
- ❌ Database setup
- ❌ Complex configuration
- ❌ SSH access

## 📦 What You Need
- PHP 7.4 or higher (Hostinger provides this by default)
- A domain or subdomain
- File upload access (FTP, File Manager, or Git)

## 🎯 Quick Deployment Steps

### Step 1: Upload Files to Hostinger

**Option A: Using File Manager (Easiest)**
1. Log in to Hostinger hPanel
2. Go to **File Manager**
3. Navigate to `public_html`
4. Upload ALL files from your project

**Option B: Using Git (Recommended)**
```bash
# SSH into your Hostinger server
ssh your_username@your_server_ip

# Navigate to public_html
cd public_html

# Clone repository
git clone https://github.com/rtsant123/teerkhela1.git .
```

**Option C: Using FTP**
1. Use FileZilla or any FTP client
2. Connect to your Hostinger server
3. Upload all files to `public_html`

### Step 2: Set Permissions

After uploading, make sure the cache directory is writable:

```bash
chmod 755 cache
```

Or using File Manager:
- Right-click on `cache` folder
- Select **Permissions**
- Set to **755**

### Step 3: Configure Your Domain

**Important:** Point your domain to the root directory (not `/public`)

1. In Hostinger hPanel, go to **Domains**
2. Select your domain
3. Make sure document root is set to `public_html` (default)

### Step 4: Test Your Website

Visit your domain: `https://yourdomain.com`

You should see:
- ✅ Homepage with Teer results
- ✅ All navigation links working
- ✅ Game pages showing results
- ✅ Support, Premium, Download pages

## 🔧 Configuration

### Edit Site Settings

Open `config.php` and update:

```php
// Site Configuration
define('SITE_NAME', 'Your Site Name');
define('SITE_URL', 'https://yourdomain.com');
define('SUPPORT_EMAIL', 'your-email@domain.com');
define('WHATSAPP_NUMBER', '919876543210'); // Your WhatsApp number
```

## 📄 Page Structure

The site now works with simple PHP files:

```
index.php          → Homepage
game.php           → Individual game results
premium.php        → Premium plans
support.php        → Support & FAQ
download.php       → App download page
terms.php          → Terms & Conditions
privacy.php        → Privacy Policy
404.php            → 404 Error page
```

## 🌐 URL Structure

URLs work without `.php` extension:
- `https://yourdomain.com/` → Homepage
- `https://yourdomain.com/game?game=shillong-teer` → Game results
- `https://yourdomain.com/premium` → Premium page
- `https://yourdomain.com/support` → Support page
- `https://yourdomain.com/download` → Download page
- `https://yourdomain.com/terms` → Terms page
- `https://yourdomain.com/privacy` → Privacy page

## 🎨 Customization

### Change Colors

Edit `public/css/style.css` and modify the CSS variables at the top:

```css
:root {
    --primary-color: #667eea;
    --secondary-color: #764ba2;
    --accent-color: #ff6b6b;
}
```

### Add Your Logo

Replace `public/favicon.png` with your logo

### Update Contact Info

Edit `config.php` to update:
- Email address
- WhatsApp number
- Social media links (edit in `includes/footer.php`)

## 🔍 Troubleshooting

### Problem: 403 Forbidden Error
**Solution:**
1. Check file permissions (should be 644 for files, 755 for directories)
2. Make sure `.htaccess` is uploaded
3. Verify PHP version is 7.4 or higher

### Problem: Blank Page
**Solution:**
1. Enable error display temporarily
2. Add to top of `index.php`:
   ```php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   ```
3. Check PHP error logs in Hostinger

### Problem: CSS Not Loading
**Solution:**
1. Check if `public/css/style.css` exists
2. Verify file permissions (644)
3. Clear browser cache

### Problem: API Not Fetching Results
**Solution:**
1. Check if `curl` is enabled (Hostinger has it by default)
2. Verify internet connectivity from server
3. Check cache folder permissions (755)

## 📊 How It Works

### Data Fetching

The site fetches results from an external API:
- API URL: `https://teerkhela-production.up.railway.app/api`
- Results are cached to improve performance
- Cache duration: 2 minutes for incomplete results, until midnight for complete results

### Caching

- Results are cached in the `cache/` folder
- Reduces API calls and improves speed
- No database required!

## 🔒 Security

The `.htaccess` file includes:
- Protection for sensitive files
- Security headers
- Prevention of directory listing
- XSS protection

## 🚀 Performance

The site includes:
- Gzip compression
- Browser caching for static files
- Optimized API caching
- Lightweight code (no framework overhead)

## ✅ Advantages of This Version

1. **Easy to Deploy** - Just upload and run
2. **No Database** - Everything works from API
3. **No Dependencies** - No composer, no vendor folder
4. **Fast** - No Laravel overhead
5. **Hostinger-Friendly** - Works on shared hosting
6. **Easy to Maintain** - Simple PHP code

## 📞 Support

If you encounter any issues:
1. Check this guide thoroughly
2. Review error logs in Hostinger hPanel
3. Contact Hostinger support for server issues

---

**That's it! Your site should now be live and working perfectly on Hostinger!** 🎉
