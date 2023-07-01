FROM httpd:2.4

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get -y --no-install-recommends install openssl ca-certificates

RUN mkdir -p /etc/ssl/certs
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/certs/selfsigned.key -out /etc/ssl/certs/selfsigned.crt -subj "/C=GB/ST=Scotland/L=Glasgow/O=Trongate/OU=Development/CN=trongate"

COPY ./httpd/httpd.conf /usr/local/apache2/conf/httpd.conf
COPY ./httpd/httpd-vhosts.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf

COPY ./certificates/proxyman_ca.crt /usr/local/share/ca-certificates/proxyman_ca.crt
RUN chmod 644 /usr/local/share/ca-certificates/proxyman_ca.crt && update-ca-certificates
