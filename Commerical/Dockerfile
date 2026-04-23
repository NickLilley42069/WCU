
FROM php:8.2-apache

# Enable Apache rewrite just in case (does nothing unless used)
RUN a2enmod rewrite

# Explicitly set document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html

# Update Apache config to use that doc root
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf
