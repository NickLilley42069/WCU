FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN echo "opcache.enable=0" > /usr/local/etc/php/conf.d/opcache-disable.ini

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN a2enmod rewrite && \
    sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
