FROM phusion/baseimage

CMD ["/sbin/my_init"]

VOLUME /var/www/application

RUN cd /var/www/application && curl -#L https://github.com/zendframework/ZendSkeletonApplication/tarball/master | tar xz --strip-components=1


RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
