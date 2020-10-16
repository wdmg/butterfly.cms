ARG NGINX_IMAGE_VERSION=1.19
FROM nginx:${NGINX_IMAGE_VERSION}

COPY ./default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/public