docker-zf2
==============

Just a litle Docker multi-container application to have a complete stack for running Zend Framework v2 into Docker containers using docker-compose tool.

# Installation

First, clone this repository:

```bash
$ git clone git@github.com:t4web/docker-zf2.git
$ composer create-project -n -sdev zendframework/skeleton-application application/
$ sudo sed -i "2i127.0.1.1  application.loc" /etc/hosts
$ cd docker-zf2/application && composer install
```

Then, run:

```bash
$ sudo docker-compose up -d
```

You are done, you can visite your ZF2 application on the following URL: `http://application.loc`

Optionally, you can build your Docker images separately by running:

```bash
$ docker build -t zf2/application application
$ docker build -t zf2/php-fpm php-fpm
$ docker build -t zf2/nginx nginx
$ docker pull centurylink/mysql
```

# How it works?

Here are the `docker-compose` built images:

* `application`: This is the ZF2 application code container,
* `db`: This is the MySQL database container (can be changed to postgresql or whatever in `docker-compose.yml` file),
* `php`: This is the PHP-FPM container in which the application volume is mounted,
* `nginx`: This is the Nginx webserver container in which application volume is mounted too

This results in the following running containers:

```bash
$ docker-compose ps
         Name                  Command         State           Ports          
-----------------------------------------------------------------------------
dockerzf2_application_1   /sbin/my_init        Up                             
dockerzf2_db_1            /usr/local/bin/run   Up      0.0.0.0:3306->3306/tcp 
dockerzf2_nginx_1         /sbin/my_init        Up      0.0.0.0:80->80/tcp     
dockerzf2_php_1           /sbin/my_init        Up      9000/tcp 
```

# Read logs

You can access Nginx logs in the following directories into your host machine: `logs/nginx`
