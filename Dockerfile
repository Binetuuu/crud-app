FROM php:8.2-apache

# Installer git et d'autres dépendances utiles
RUN apt-get update && \
    apt-get install -y git unzip && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get clean

# Copier les fichiers de l'application
COPY . /var/www/html

EXPOSE 80

