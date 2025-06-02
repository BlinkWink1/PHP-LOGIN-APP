FROM php:8.1-apache

RUN apt-get update && \
    docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY src/ /var/www/html/

RUN groupadd -r appgroup && useradd -r -g appgroup appuser

RUN chown -R appuser:appgroup /var/www/html

USER appuser

EXPOSE 80