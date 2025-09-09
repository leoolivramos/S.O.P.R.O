FROM php:8.2-apache
RUN docker-php-ext-install mysqli
ENV APACHE_DOCUMENT_ROOT /var/www/html
COPY . /var/www/html/
COPY uploads/ /var/www/html/uploads/
RUN mkdir -p /var/www/html/uploads \
    && chmod -R 775 /var/www/html/uploads \
    && chown -R www-data:www-data /var/www/html/uploads
EXPOSE 80
