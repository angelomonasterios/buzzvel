FROM angelomonasterios/php8.1:latest

USER root

WORKDIR /var/www/html

COPY . /var/www/html

RUN a2enmod ssl
RUN a2enmod proxy
RUN a2enmod headers
RUN a2enmod proxy
RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
EXPOSE 4000

