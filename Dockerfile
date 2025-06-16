# Use official PHP image with Apache
FROM php:8.4.8-apache

# Update system packages to reduce vulnerabilities
RUN apt-get update && apt-get upgrade -y && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy website files to the container
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional)
RUN a2enmod rewrite

# Set permissions (optional but recommended)
RUN chown -R www-data:www-data /var/www/html

# Replace default config with custom one (optional)
RUN sed -i 's/AllowOverride None/AllowOverride All/i' /etc/apache2/apache2.conf


# Expose port 80 (default for Apache)
EXPOSE 80
