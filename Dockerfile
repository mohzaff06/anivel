FROM heroku/heroku:22

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get update && \
    apt-get install -y nodejs

# Install PostgreSQL client and PHP extensions
RUN apt-get install -y libpq-dev && \
    docker-php-ext-install pdo_pgsql

# Set working directory
WORKDIR /app

# Copy Composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy package.json and install Node dependencies
COPY package*.json ./
RUN npm install

# Copy application code
COPY . .

# Build Vite assets
RUN npm run build

# Expose port
EXPOSE 8000

# Run the app
CMD ["vendor/bin/heroku-php-apache2", "public/"]
