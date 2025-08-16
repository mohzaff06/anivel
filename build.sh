#!/bin/bash
set -e

echo "Starting Laravel build process..."

# Install composer dependencies
composer install --no-dev --optimize-autoloader

# Run database migrations
php artisan migrate --force

# Cache Laravel configurations for better performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build process completed successfully!"
