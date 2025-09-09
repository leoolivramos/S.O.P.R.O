FROM php:8.2-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/
RUN mkdir -p /var/www/html/uploads \
    && chown -R www-data:www-data /var/www/html/uploads \
    && chmod -R 755 /var/www/html/uploadsENV APACHE_DOCUMENT_ROOT /var/www/html
EXPOSE 80