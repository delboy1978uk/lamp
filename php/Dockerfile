FROM php:5.6.30-fpm

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get -y install imagemagick wkhtmltopdf php5-mysql php5-gd php5-geoip php5-imap php5-intl php5-imagick php5-xdebug
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY ./php.ini /usr/local/etc/php/php.ini
