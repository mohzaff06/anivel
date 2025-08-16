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
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /workspace

# Copy composer files first for better caching
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy package.json for Node dependencies
COPY package.json package-lock.json* ./

# Install Node.js dependencies
RUN npm ci --only=production

# Copy rest of application
COPY . .

# Build Vite assets
RUN npm run build

# Create necessary directories and set permissions
RUN mkdir -p database storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache public/storage
RUN touch database/database.sqlite
RUN chmod -R 775 storage bootstrap/cache database public/storage
RUN chown -R www-data:www-data storage bootstrap/cache database public/storage

# Configure Apache - enable required modules
RUN a2enmod rewrite
RUN a2enmod headers

# Configure Apache to listen on port 8000
RUN sed -i 's/80/8000/g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/80/8000/g' /etc/apache2/ports.conf

# Set the document root to the public directory
ENV APACHE_DOCUMENT_ROOT /workspace/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

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
RUN php artisan storage:link || true
RUN php artisan migrate --force || true

# Final permission fix
RUN chown -R www-data:www-data /workspace
RUN chmod -R 755 /workspace/public

# Expose port 8000 (Koyeb uses this port)
EXPOSE 8000

# Start Apache on port 8000
CMD ["apache2-foreground"]
