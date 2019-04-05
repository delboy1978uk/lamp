FROM delboy1978uk/php73

COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./xdebug.ini /usr/local/etc/php/conf.d/
COPY ./ssmtp.conf /etc/ssmtp/ssmtp.conf

RUN usermod -a -G staff www-data
