FROM delboy1978uk/php81:1.0.1
COPY ./php/php-ini-overrides.ini /usr/local/etc/php/conf.d/99-overrides.ini
COPY ./php/ssmtp.conf /etc/ssmtp/ssmtp.conf
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --filename=composer
RUN rm composer-setup.php
RUN chown -R 1000:staff ./composer
RUN mv ./composer /usr/bin/composer
RUN useradd --uid 1000 --create-home php
RUN echo "export PATH=$PATH:bin:vendor/bin" > /home/php/.bashrc
RUN apt-get -y --no-install-recommends install git
RUN apt-get -y --no-install-recommends install ca-certificates
COPY ./certificates/proxyman_ca.crt /usr/local/share/ca-certificates/proxyman_ca.crt
RUN chmod 644 /usr/local/share/ca-certificates/proxyman_ca.crt && update-ca-certificates
