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

USER root

WORKDIR /var/www/html

RUN apt-get update && \
    rm /etc/apt/preferences.d/no-debian-php && \
    apt-get install -y git php-mysql php-mysqli systemd && \
    docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli

RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

COPY . .

RUN a2enmod rewrite

RUN chmod -R 755 /var/www/html && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 644 .htaccess

EXPOSE 80

CMD ["apache2-foreground"]