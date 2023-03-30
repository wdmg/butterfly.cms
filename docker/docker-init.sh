#!/bin/bash
printf "\n"
printf "Docker Helper"
printf "\n"
docker-compose -f docker-compose.yml -p example build
docker-compose -f docker-compose.yml -p example up -d www db phpmyadmin
#docker-compose -f docker-compose.yml -p example up -d www db phpmyadmin sphinx
#docker run -d sphinx indexer --all -c /opt/sphinx/conf/sphinx.conf --rotate
printf "\n"
printf "Run Butterfly.CMS Installer"
printf "\n"
cd ..
php init