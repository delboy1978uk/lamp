FROM delboy1978uk/php81:1.0.1
COPY ./php-ini-overrides.ini /usr/local/etc/php/conf.d/99-overrides.ini
COPY ./ssmtp.conf /etc/ssmtp/ssmtp.conf
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --filename=composer
RUN rm composer-setup.php
RUN chown -R 1000:staff ./composer
RUN mv ./composer /usr/bin/composer
RUN useradd --uid 1000 --create-home php
RUN echo "export PATH=$PATH:bin:vendor/bin" > /home/php/.bashrc
RUN apt-get -y --no-install-recommends install git
