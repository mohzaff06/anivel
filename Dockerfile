# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Set proper ownership
RUN chown -R www-data:www-data /var/www/html

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node.js dependencies and build assets
RUN npm ci --only=production
RUN npm run build

# Create necessary directories and set permissions
RUN mkdir -p database storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache public/storage
RUN touch database/database.sqlite
RUN chmod -R 775 storage bootstrap/cache database public/storage
RUN chown -R www-data:www-data storage bootstrap/cache database public/storage

# Configure Apache - enable required modules
RUN a2enmod rewrite
RUN a2enmod headers
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Set environment variables
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite
ENV APP_KEY=base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=

# Run Laravel commands
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan storage:link
RUN php artisan migrate --force

# Final permission fix
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/public

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
