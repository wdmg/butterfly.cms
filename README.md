<p align="center">
    <a href="https://butterflycms.com/" target="_blank">
        <img src="./docs/images/logotype.png" width="320" alt="Butterfly.CMS" />
    </a>
</p>

Innovative Content Management System based on Yii2 framework. And it's all.

P/s^ A little patience...😉

[![Yii2](https://img.shields.io/badge/required-Yii2_v2.0.40-blue.svg)](https://packagist.org/packages/yiisoft/yii2)
[![Downloads](https://img.shields.io/packagist/dt/wdmg/butterfly.cms.svg)](https://packagist.org/packages/wdmg/butterfly.cms)
[![Packagist Version](https://img.shields.io/packagist/v/wdmg/butterfly.cms.svg)](https://packagist.org/packages/wdmg/butterfly.cms)
![Progress](https://img.shields.io/badge/progress-in_development-red.svg)
[![GitHub license](https://img.shields.io/github/license/wdmg/butterfly.cms.svg)](https://github.com/wdmg/butterfly.cms/blob/master/LICENSE)

# Requirements 
* PHP 5.6 or higher
* Yii2 v.2.0.47 and newest
* [Yii2 Base](https://github.com/wdmg/yii2-base)
* [Yii2 Admin](https://github.com/wdmg/yii2-admin)
* [Yii2 Activity](https://github.com/wdmg/yii2-activity)
* [Yii2 Api](https://github.com/wdmg/yii2-api)
* [Yii2 Menu](https://github.com/wdmg/yii2-menu)
* [Yii2 Options](https://github.com/wdmg/yii2-options)
* [Yii2 Guard](https://github.com/wdmg/yii2-guard)
* [Yii2 Mailer](https://github.com/wdmg/yii2-mailer)
* [Yii2 Terminal](https://github.com/wdmg/yii2-terminal)
* [Yii2 Redirects](https://github.com/wdmg/yii2-redirects)
* [Yii2 Robots.txt](https://github.com/wdmg/yii2-robots)
* [Yii2 Stats](https://github.com/wdmg/yii2-stats)
* [Yii2 Forms](https://github.com/wdmg/yii2-forms)
* [Yii2 Services](https://github.com/wdmg/yii2-services)
* [Yii2 News](https://github.com/wdmg/yii2-news)
* [Yii2 Blog](https://github.com/wdmg/yii2-blog)
* [Yii2 Subscribers](https://github.com/wdmg/yii2-subscribers)
* [Yii2 Newsletters](https://github.com/wdmg/yii2-newsletters)
* [Yii2 Reviews](https://github.com/wdmg/yii2-reviews)*
* [Yii2 Comments](https://github.com/wdmg/yii2-comments)
* [Yii2 Media](https://github.com/wdmg/yii2-media)
* [Yii2 Content](https://github.com/wdmg/yii2-content)
* [Yii2 Pages](https://github.com/wdmg/yii2-pages)
* [Yii2 Tasks](https://github.com/wdmg/yii2-tasks)
* [Yii2 Tickets](https://github.com/wdmg/yii2-tickets)
* [Yii2 Users](https://github.com/wdmg/yii2-users)
* [Yii2 Rbac](https://github.com/wdmg/yii2-rbac)
* [Yii2 Geo](https://github.com/wdmg/yii2-geo)
* [Yii2 Translations](https://github.com/wdmg/yii2-translations)
* [Yii2 Rss](https://github.com/wdmg/yii2-rss)
* [Yii2 Amp](https://github.com/wdmg/yii2-amp)
* [Yii2 Turbo](https://github.com/wdmg/yii2-turbo)
* [Yii2 Sitemap](https://github.com/wdmg/yii2-sitemap)
* [Yii2 Search](https://github.com/wdmg/yii2-search)
* [Yii2 Messages](https://github.com/wdmg/yii2-messages)*
* [Yii2 Likes](https://github.com/wdmg/yii2-likes)*
* [Yii2 Bookmarks](https://github.com/wdmg/yii2-bookmarks)*
* [Yii2 Reposts](https://github.com/wdmg/yii2-reposts)*
* [Yii2 Views](https://github.com/wdmg/yii2-views)
* [Yii2 Votes](https://github.com/wdmg/yii2-votes)*

<small>* - actually in progress development</small>

# Installation
To install the app, run the following command`s in the console:

    $ composer create-project --prefer-dist wdmg/butterfly.cms example.com
    $ cd example.com
    $ php init
    
...or use automatic mode:
    
    $ php init --env=development --overwrite=y --dbhost=localhost --dbtype=mysql --dbcharset=utf8 --dbname=example --tbprefix=btf_ --dbuser=root --dbpassword=root --create_db=y --migrations=y

# Migrations
After set of environment and configure db connection, run the following commands in the console for apply migrations:

    $ php yii admin/init
    $ php yii admin/options/init --choice=3
    $ php yii admin/users/init --choice=3
    $ php yii admin/rbac/init --choice=2

# Demo
You can also initialize the test site with demo data using the command:

    $ php yii hello/demo

After apply all migrations you may login to dashboard:
http://example.com/admin/ with username `admin` and password `admin`.

# Docker

Run the script `docker/docker-init.sh` or use manual instruction:

####Build containers:

        $ docker-compose -f docker/docker-compose.yml -p example build

####Run containers:

        $ docker-compose -f docker/docker-compose.yml -p example up -d www db phpmyadmin

####Stop services:

        $ docker-compose -f docker/docker-compose.yml -p example stop



# Discussion
For questions, complaints and suggestions follow to [Butterfly.CMS community](https://spectrum.chat/butterfly-cms?tab=posts)

# Status and version [ready to use]
* v.1.3.1 - Update dependencies
* v.1.3.0 - Update dependencies, copyrights.
* v.1.2.1 - Update dependencies.
* v.1.2.0 - Add Docker and update dependencies.