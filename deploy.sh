#!/bin/bash

# Hostinger Auto-Deploy Script
# This runs automatically after git pull

echo "Starting deployment..."

# Navigate to project directory
cd /home/u*/public_html

# Install/update composer dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Clear and rebuild caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run any new migrations
php artisan migrate --force

# Clear application cache
php artisan cache:clear

# Set permissions
chmod -R 755 storage bootstrap/cache

echo "Deployment complete!"
