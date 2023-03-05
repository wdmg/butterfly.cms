#PHP 5.6-apache + MySQL 8.0.28 + phpMyAdmin 5.1.3 + SphinxSearch 3.4.1

Build containers:

    $ docker build -t example .

Run containers:

    $ docker-compose -f docker-compose.yml up -d

Stop services:

    $ docker-compose -f docker-compose.yml -p example stop

##PhpMyAdmin
http://localhost:8085/

    Login: root
    Password: root

##Users
http://localhost/admin/

    Login: admin
    Password: admin

##Sphinx
    $ docker run -d sphinx indexer --all -c /opt/sphinx/conf/sphinx.conf --rotate
