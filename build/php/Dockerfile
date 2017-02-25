FROM php:5.6.30-fpm

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get -y --no-install-recommends install apt-utils
RUN apt-get -y --no-install-recommends install g++
RUN apt-get -y --no-install-recommends install imagemagick
RUN apt-get -y --no-install-recommends install libc-client-dev
RUN apt-get -y --no-install-recommends install libcurl4-openssl-dev
RUN apt-get -y --no-install-recommends install libfreetype6-dev
RUN apt-get -y --no-install-recommends install libgd-dev
RUN apt-get -y --no-install-recommends install libicu-dev
RUN apt-get -y --no-install-recommends install libkrb5-dev
RUN apt-get -y --no-install-recommends install libmcrypt-dev
RUN apt-get -y --no-install-recommends install libpng-dev
RUN apt-get -y --no-install-recommends install libxml2-dev
RUN apt-get -y --no-install-recommends install libsnmp-dev
RUN apt-get -y --no-install-recommends install openssl
RUN apt-get -y --no-install-recommends install php5-imagick
RUN apt-get -y --no-install-recommends install php5-xdebug
RUN apt-get -y --no-install-recommends install snmp
RUN apt-get -y --no-install-recommends install ssmtp
RUN apt-get -y --no-install-recommends install wkhtmltopdf
RUN apt-get -y --no-install-recommends install libxslt-dev
RUN apt-get -y --no-install-recommends install zlib1g-dev

RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install imap
RUN docker-php-ext-configure gd --with-freetype-dir=/usr
RUN docker-php-ext-install gd exif pdo curl dom pdo_mysql iconv intl mcrypt hash phar session snmp sockets xml xmlreader xmlrpc xmlwriter xsl zip

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./ssmtp.conf /etc/ssmtp/ssmtp.conf
