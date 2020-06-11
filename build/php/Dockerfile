FROM delboy1978uk/php74:1.1.4
#COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./xdebug.ini /usr/local/etc/php/conf.d/
COPY ./ssmtp.conf /etc/ssmtp/ssmtp.conf
RUN mkdir /home/php
RUN useradd --uid 1000 --home /home/php php
RUN echo "export PATH=$PATH:bin:vendor/bin" > /home/php/.bashrc
