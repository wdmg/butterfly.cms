#!/bin/bash
printf "\n"
printf "Docker Helper"
printf "\n"
docker-compose -f docker-compose.yml -p example up -d www db phpmyadmin
#docker-compose -f docker-compose.yml -p example up -d www db phpmyadmin sphinx
#docker run -d sphinx indexer --all -c /opt/sphinx/conf/sphinx.conf --rotate
printf "\n"
printf "Run Butterfly.CMS"
printf "\n"

if [[ "$OSTYPE" == "linux-gnu"* ]]; then
  xdg-open http://localhost/admin/login
elif [[ "$OSTYPE" == "darwin"* ]]; then
  open http://localhost/admin/login
elif [[ "$OSTYPE" == "cygwin" ]]; then
  xdg-open http://localhost/admin/login
elif [[ "$OSTYPE" == "msys" ]]; then
  start http://localhost/admin/login
elif [[ "$OSTYPE" == "win32" ]]; then
  start http://localhost/admin/login
elif [[ "$OSTYPE" == "freebsd"* ]]; then
  xdg-open http://localhost/admin/login
else
  printf "Open URL manualy: http://localhost/admin/login"
fi