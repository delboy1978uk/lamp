FROM httpd:2.4.38

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get -y --no-install-recommends install openssl

RUN mkdir -p /etc/ssl/certs
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/certs/selfsigned.key -out /etc/ssl/certs/selfsigned.crt -subj "/C=GB/ST=Scotland/L=Glasgow/O=McLeanDigital/OU=Development/CN=awesome.scot"

COPY ./httpd.conf /usr/local/apache2/conf/httpd.conf
COPY ./httpd-vhosts.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf
