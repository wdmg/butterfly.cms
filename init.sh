#!/bin/bash

export $(grep -v '^#' ./.env | xargs)

BLUE='\033[0;34m'
GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m'

clear

welcome () {

cat <<'MSG'

        ``
     `/+++/-`
     :+++++++:`
     /++++++oo+:
     /++oooooooo/`
    :/ooooooooooo+`                .:/.
    ::+oooooooooss+               :+++/:.
    .::+ooooossssss/            `/ooo+/:-
     -//+osssssssyyy:          `+oooo+::.
      .://+sssyyyyyyy.        `ossooo/:-
       `-://+syyyyhhhy`      `oyssss/:-
         `-://+syhhhhho      oyyyys/:-
            `-:/+oyhddd/    ohhhyo/-`
               `.-:/oydd.  +dhy+:.`
                    `.-// -o/-.
                  -/+++/. `:+++/.
                 `sssso.    :osso
                  -/+/`      .++.

            Butterfly.CMS with Docker
       (c) 2019-2020 W.D.M.Group, Ukraine

MSG
}

welcome

check_in () {
    if ! command -v docker &> /dev/null; then
        echo -e "${RED}Error!${NC} It looks like ${BLUE}Docker Machine${NC} is not installed. Please install it to continue and try again."
        echo "For help getting started, check out the docs at https://docs.docker.com"
        echo ""
        exit 1
    fi

    if ! command -v docker-machine &> /dev/null; then
        echo -e "${RED}Error!${NC} It looks like ${BLUE}Docker Machine${NC} is not installed. Please install it to continue and try again."
        echo "For help getting started, check out the docs at https://docs.docker.com/machine/"
        echo ""
        exit 1
    fi

    if ! command -v docker-compose &> /dev/null; then
        echo -e "${RED}Error!${NC} It looks like ${BLUE}Docker Composer${NC} is not installed. Please install it to continue and try again."
        echo "For help getting started, check out the docs at https://docs.docker.com/compose/"
        echo ""
        exit 1
    fi

    if ! docker info >/dev/null 2>&1; then
        echo -e "${RED}Error!${NC} It looks like none of the Docker machines are running or environment is not configured."
        echo ""
        read  -n 1 -p "Would you like try to run Docker machine? [Y/n]: " try_to_run
        case $try_to_run in
            [Nn]* ) echo "";
                    echo "Canceled... For help getting started, check out the docs at https://docs.docker.com/machine/get-started/";
                    echo "";
                    exit 1;;
            * ) echo "";
                docker-machine start &> /dev/null;
                docker-machine env &> /dev/null;
                eval $(docker-machine env) &> /dev/null;;
        esac
    fi
}

check_in

run_env () {

    echo ""
    echo "Select the environment you want to run:";
    echo "  1) Nginx + PHP FPM/FastCGI + MySQL";
    echo "  2) Nginx + PHP FPM/FastCGI + PostgreSQL";
    echo "  3) Apache + PHP mod + MySQL";
    echo "  4) Apache + PHP mod + PostgreSQL";
    echo ""

    read  -n 1 -p "Your choice: " environment
    echo ""

    read  -n 1 -p "Use set up as daemon [y/N]: " as_daemon
    echo ""

    args=''
    case $as_daemon in
        [Yy]* )
            args='-d'
    esac

    command='up'
    #if [[ "$(docker images -a | grep -c "^${PROJECT_NAME}_")" -ge 3 ]]; then
    #    command='start'
    #fi

    if [[ "$environment" = "1" ]]; then
        exec docker-compose -f ./nginx-mysql.yml -p ${PROJECT_NAME} ${command} ${args};
    elif [[ "$environment" = "2" ]]; then
        exec docker-compose -f ./nginx-postgres.yml -p ${PROJECT_NAME} ${command} ${args};
    elif [[ "$environment" = "3" ]]; then
        exec docker-compose -f ./apache-mysql.yml -p ${PROJECT_NAME} ${command} ${args};
    elif [[ "$environment" = "4" ]]; then
        exec docker-compose -f ./apache-postgres.yml -p ${PROJECT_NAME} ${command} ${args};
    elif [[ "$environment" = "5" ]]; then
        run_env
    else
        echo -e "${RED}You have entered an invalid selection!${NC} Please try again!"
        echo ""
        echo "Press any key to continue..."
        read -n 1
        clear
        run_env
    fi
}

stop_env () {

    echo ""
    echo "Select the environment you want to stop:";
    echo "  1) Nginx + PHP FPM/FastCGI + MySQL";
    echo "  2) Nginx + PHP FPM/FastCGI + PostgreSQL";
    echo "  3) Apache + PHP mod + MySQL";
    echo "  4) Apache + PHP mod + PostgreSQL";
    echo ""

    read  -n 1 -p "Your choice: " environment
    echo ""
    if [[ "$environment" = "1" ]]; then
        exec docker-compose -f ./nginx-mysql.yml -p ${PROJECT_NAME} down
    elif [[ "$environment" = "2" ]]; then
        exec docker-compose -f ./nginx-postgres.yml -p ${PROJECT_NAME} down
    elif [[ "$environment" = "3" ]]; then
        exec docker-compose -f ./apache-mysql.yml -p ${PROJECT_NAME} down
    elif [[ "$environment" = "4" ]]; then
        exec docker-compose -f ./apache-postgres.yml -p ${PROJECT_NAME} down
    elif [[ "$environment" = "5" ]]; then
        run_env
    else
        echo -e "${RED}You have entered an invalid selection!${NC} Please try again!"
        echo ""
        echo "Press any key to continue..."
        read -n 1
        clear
        stop_env
    fi
}

build_env () {

    echo ""
    echo "Select the environment you want to build:";
    echo "  1) Nginx + PHP FPM/FastCGI + MySQL";
    echo "  2) Nginx + PHP FPM/FastCGI + PostgreSQL";
    echo "  3) Apache + PHP mod + MySQL";
    echo "  4) Apache + PHP mod + PostgreSQL";
    echo ""

    read  -n 1 -p "Your choice: " environment
    echo ""

    read  -n 1 -p "Use cache for this build [y/N]: " use_cache
    echo ""

    CACHE_ARG=''
    case $use_cache in
        [Yy]* ) CACHE_ARG='--no-cache';;
        * ) echo "Please answer yes [Y] or no [N].";;
    esac

    read  -n 1 -p "Do you want run environment after build [Y/n]: " setup_after
    echo ""

    if [[ "$environment" = "1" ]]; then
        exec docker-compose -f ./nginx-mysql.yml -p ${PROJECT_NAME} build ${CACHE_ARG} --force-rm
    elif [[ "$environment" = "2" ]]; then
        exec docker-compose -f ./nginx-postgres.yml -p ${PROJECT_NAME} build ${CACHE_ARG} --force-rm
    elif [[ "$environment" = "3" ]]; then
        exec docker-compose -f ./apache-mysql.yml -p ${PROJECT_NAME} build ${CACHE_ARG} --force-rm
    elif [[ "$environment" = "4" ]]; then
        exec docker-compose -f ./apache-postgres.yml -p ${PROJECT_NAME} build ${CACHE_ARG} --force-rm
    elif [[ "$environment" = "5" ]]; then
        run_env
    else
        echo -e "${RED}You have entered an invalid selection!${NC} Please try again!"
        echo ""
        echo "Press any key to continue..."
        read -n 1
        clear
        build_env
    fi

    case $setup_after in
        [Yy]* ) run_env;;
    esac
}

select_task () {
    echo ""
    echo "Select the task you want to perform:";
    echo "  1) Build environment";
    echo "  2) Run environment";
    echo "  3) Stop environment";
    echo "  4) View .env variables";
    echo "  5) Edit .env variables";
    echo ""

    read  -n 1 -p "Your choice: " task
    echo ""

    if [[ "$task" = "1" ]]; then
        build_env
    elif [[ "$task" = "2" ]]; then
        run_env
    elif [[ "$task" = "3" ]]; then
        stop_env
    elif [[ "$task" = "4" ]]; then
        less ./.env
    elif [[ "$task" = "5" ]]; then
        nano ./.env
    else
        echo -e "${RED}You have entered an invalid selection!${NC} Please try again!"
        echo ""
        echo "Press any key to continue..."
        read -n 1
        clear
        select_task
    fi
}

select_task