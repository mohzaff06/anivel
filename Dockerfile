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
WORKDIR /workspace

# Copy existing application directory contents
COPY . /workspace

# Set proper ownership
RUN chown -R www-data:www-data /workspace

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

# Update Apache configuration for Koyeb
RUN echo '<VirtualHost *:8000>' > /etc/apache2/sites-available/000-default.conf
RUN echo '    ServerAdmin webmaster@localhost' >> /etc/apache2/sites-available/000-default.conf
RUN echo '    DocumentRoot /workspace/public' >> /etc/apache2/sites-available/000-default.conf
RUN echo '    <Directory /workspace/public>' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        AllowOverride All' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        Require all granted' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        Options Indexes FollowSymLinks' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        DirectoryIndex index.php' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        RewriteEngine On' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        RewriteCond %{REQUEST_FILENAME} !-d' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        RewriteCond %{REQUEST_FILENAME} !-f' >> /etc/apache2/sites-available/000-default.conf
RUN echo '        RewriteRule ^ index.php [L]' >> /etc/apache2/sites-available/000-default.conf
RUN echo '    </Directory>' >> /etc/apache2/sites-available/000-default.conf
RUN echo '    ErrorLog ${APACHE_LOG_DIR}/error.log' >> /etc/apache2/sites-available/000-default.conf
RUN echo '    CustomLog ${APACHE_LOG_DIR}/access.log combined' >> /etc/apache2/sites-available/000-default.conf
RUN echo '</VirtualHost>' >> /etc/apache2/sites-available/000-default.conf

# Set environment variables
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/workspace/database/database.sqlite
ENV APP_KEY=base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=

# Run Laravel commands
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan storage:link
RUN php artisan migrate --force

# Final permission fix
RUN chown -R www-data:www-data /workspace
RUN chmod -R 755 /workspace/public

# Expose port 8000 (Koyeb uses this port)
EXPOSE 8000

# Start Apache on port 8000
CMD ["apache2-foreground"]
