FROM node:20

ARG USERID

RUN usermod -u $USERID node \
    && npm i -g vite

COPY docker/client/entrypoint.sh /entrypoint.sh

USER node

WORKDIR /var/www

EXPOSE 8080

ENTRYPOINT ["/bin/bash", "/entrypoint.sh"]