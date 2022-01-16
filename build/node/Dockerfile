FROM node:14
VOLUME ["/app"]
WORKDIR /app
RUN apt-get update
RUN apt-get -y --no-install-recommends install git
COPY docker-entrypoint.sh /
RUN chmod 755 /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]