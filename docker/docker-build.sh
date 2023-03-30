#!/bin/bash
printf "\n"
printf "Docker Helper"
printf "\n"
docker-compose -f docker-compose.yml -p example build
printf "\n"