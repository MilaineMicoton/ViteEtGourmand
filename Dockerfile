#Etape 1. Récupérer l'image php-apache (AS php-apache()
FROM php:8.2-apache 

# Installer les extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

