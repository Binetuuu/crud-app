FROM php:8.2-apache

# Installer les extensions PHP et utilitaires nécessaires
RUN apt-get update && \
    apt-get install -y git unzip && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get clean

# Activer le module rewrite
RUN a2enmod rewrite

# Copier les fichiers PHP dans /var/www/html
COPY ./src/ /var/www/html/

# Fixer les permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Autoriser l’accès via Apache
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-enabled/allow-html.conf

