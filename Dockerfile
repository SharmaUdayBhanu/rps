# Use the official PHP image with Apache server from Docker Hub
FROM php:7.4-apache

# Enable mod_rewrite for Apache (this is useful for many PHP applications)
RUN a2enmod rewrite

# Set the working directory inside the container (the root folder of your app)
WORKDIR /var/www/html

# Copy all your project files into the container's working directory
COPY . /var/www/html

# Expose port 80 to allow HTTP access
EXPOSE 80

# Start Apache when the container is run
CMD ["apache2-foreground"]
