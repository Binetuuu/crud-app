FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean

# Copie les fichiers du projet
COPY src/ /var/www/html/

# Donner les bonnes permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Activer .htaccess si besoin
RUN a2enmod rewrite

