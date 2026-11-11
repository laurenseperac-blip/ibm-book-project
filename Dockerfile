FROM php:8.2-apache

# Code Engine expects the application to listen on port 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:8080>/' \
    /etc/apache2/sites-available/000-default.conf

# Copy all four web services into Apache's document root
COPY se1/ /var/www/html/se1/
COPY se2/ /var/www/html/se2/
COPY se3/ /var/www/html/se3/
COPY se4/ /var/www/html/se4/

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 8080
