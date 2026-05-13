FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN echo "opcache.enable=0" > /usr/local/etc/php/conf.d/opcache-disable.ini

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf

RUN a2enmod rewrite && \
    sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
