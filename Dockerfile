FROM nginx:alpine

COPY config/nginx/conf.d/ /etc/nginx/conf.d/
COPY public/ /usr/share/nginx/html
