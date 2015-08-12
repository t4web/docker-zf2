FROM phusion/baseimage

CMD ["/sbin/my_init"]

RUN apt-get update && apt-get install -y nginx

ADD nginx.conf /etc/nginx/
ADD application.conf /etc/nginx/sites-available/

RUN ln -s /etc/nginx/sites-available/application.conf /etc/nginx/sites-enabled/application
RUN rm /etc/nginx/sites-enabled/default

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 www-data

#CMD ["nginx"]

RUN mkdir -p /etc/service/nginx
ADD start.sh /etc/service/nginx/run
RUN chmod +x /etc/service/nginx/run

RUN mkdir -p /var/www

EXPOSE 80
# EXPOSE 443

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
