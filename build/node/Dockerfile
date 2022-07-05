FROM node:14
VOLUME ["/app"]
WORKDIR /app
RUN apt-get update
RUN apt-get -y --no-install-recommends install git
RUN npm install -g expo-cli
COPY docker-entrypoint.sh /
RUN chmod 755 /docker-entrypoint.sh
EXPOSE 19000 19001 19002
ENV EXPO_DEVTOOLS_LISTEN_ADDRESS="0.0.0.0"
ENTRYPOINT ["/docker-entrypoint.sh"]
