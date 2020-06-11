FROM delboy1978uk/php74:1.1.4
#COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./xdebug.ini /usr/local/etc/php/conf.d/
COPY ./ssmtp.conf /etc/ssmtp/ssmtp.conf
RUN useradd --uid 1000 --create-home php
RUN echo "export PATH=$PATH:bin:vendor/bin" > /home/php/.bashrc
