FROM php:7.0.33-fpm

# https://stackoverflow.com/a/16765214
RUN sed -i -e "s#;date.timezone =#date.timezone = America/Argentina/Buenos_Aires#g" /usr/local/etc/php/php.ini-development
RUN sed -i -e "s#;date.timezone =#date.timezone = America/Argentina/Buenos_Aires#g" /usr/local/etc/php/php.ini-production

WORKDIR /var/www
