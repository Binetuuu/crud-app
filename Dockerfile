
FROM php:8.2-apache

# Installer les extensions nécessaires
RUN apt-get update && \
    apt-get install -y git unzip && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get clean

# Copier les fichiers PHP dans le conteneur
COPY . /var/www/html

# Donner les bons droits
RUN chown -R www-data:www-data /var/www/html
