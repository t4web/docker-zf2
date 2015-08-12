FROM phusion/baseimage

CMD ["/sbin/my_init"]

RUN apt-get update && apt-get install -y php5-common php5-cli php5-fpm php5-mcrypt php5-mysql php5-apcu php5-gd php5-imagick php5-curl php5-intl

ADD application.ini /etc/php5/fpm/conf.d/
ADD application.ini /etc/php5/cli/conf.d/

ADD application.pool.conf /etc/php5/fpm/pool.d/

RUN usermod -u 1000 www-data

RUN mkdir -p /etc/service/php5-fpm
ADD start.sh /etc/service/php5-fpm/run
RUN chmod +x /etc/service/php5-fpm/run

RUN mkdir -p /var/www

EXPOSE 9000

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
