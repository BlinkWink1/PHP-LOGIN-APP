FROM php:8.1-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY src/style.css /var/www/html/style.css
EXPOSE 80