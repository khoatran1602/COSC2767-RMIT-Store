#Write Dockerfile for apache image to deploy a simple website

FROM php:7.2-apache

USER root

WORKDIR /var/www/html

RUN apt-get update && \
    rm /etc/apt/preferences.d/no-debian-php && \
    apt-get install -y git php-mysql php-mysqli systemd && \
    docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli && \
    service apache2 restart && systemctl enable apache2

COPY . .

EXPOSE 80

CMD ["apache2-foreground"]