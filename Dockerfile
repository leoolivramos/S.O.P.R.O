FROM php:8.2-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/
RUN mkdir -p /var/www/html/uploads && chmod -R 777 /var/www/html/uploads
ENV APACHE_DOCUMENT_ROOT /var/www/html
EXPOSE 80