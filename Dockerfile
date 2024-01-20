#   RMIT University Vietnam
#   Course: COSC2767 Systems Deployment and Operations
#   Semester: 2023B
#   Assessment: Assignment 3
#   Author: Random Team 1
#   ID: 3847766
#   Created date: 22/1/2024
#   Last modified: 22/1/2024
#   Acknowledgement: Tutorial, ChatGPT, Stackoverflow, AWS Documentation

FROM php:7.2-apache

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && \
    apt-get install -y git php-mysql php-mysqli && \
    docker-php-ext-install mysqli pdo_mysql

# Configure Apache
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy project files
COPY . .

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80

CMD ["apache2-foreground"]
