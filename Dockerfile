# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Install system dependencies including Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /workspace

# Copy application
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install
RUN npm run build

# Configure Apache for port 8000
RUN sed -i 's/80/8000/g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/80/8000/g' /etc/apache2/ports.conf
RUN a2enmod rewrite

# Set document root
ENV APACHE_DOCUMENT_ROOT /workspace/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Set permissions
RUN chown -R www-data:www-data /workspace
RUN chmod -R 755 /workspace

# Expose port 8000
EXPOSE 8000

# Start Apache
CMD ["apache2-foreground"]
