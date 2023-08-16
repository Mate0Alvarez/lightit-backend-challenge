# Use a base image with PHP and Apache
FROM php:8.2.7-apache

# Install necessary extensions
RUN apt-get update && \
    apt-get install -y zip unzip libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Copy the custom configuration file
COPY default.conf /etc/apache2/sites-available/000-default.conf

# Enable the mod_rewrite module
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy project files into the container
COPY . .

# Create necessary directories
RUN mkdir -p /var/www/html/storage/app
RUN mkdir -p /var/www/html/storage/framework/cache
RUN mkdir -p /var/www/html/storage/framework/sessions
RUN mkdir -p /var/www/html/storage/framework/views
RUN mkdir -p /var/www/html/storage/logs
RUN mkdir -p /var/www/html/bootstrap/cache

# Change file ownership permissions
RUN chown -R www-data:www-data /var/www/html

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies using Composer
RUN composer install

# Expose port 80
EXPOSE 80

# Command to start Apache
CMD ["apache2-foreground"]
