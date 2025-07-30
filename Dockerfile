# Utilise une image officielle PHP avec Apache
FROM php:8.2-apache

# Copie le code de l'application dans le dossier web d'Apache
COPY ./src /var/www/html/

# Active les extensions PHP nécessaires pour MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Donne les droits à Apache
RUN chown -R www-data:www-data /var/www/html
