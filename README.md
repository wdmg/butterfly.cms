<p align="center">
    <a href="https://butterflycms.com/" target="_blank">
        <img src="./docs/images/logotype.png" width="320" alt="Butterfly.CMS" />
    </a>
</p>

Innovative Content Management System based on Yii2 framework. And it's all. A little patience...😉

[![Progress](https://img.shields.io/badge/required-Yii2_v2.0.13-blue.svg)](https://packagist.org/packages/yiisoft/yii2) [![Github all releases](https://img.shields.io/github/downloads/wdmg/butterfly.cms/total.svg)](https://GitHub.com/wdmg/butterfly.cms/releases/) [![GitHub version](https://badge.fury.io/gh/wdmg%2Fbutterfly.cms.svg)](https://github.com/wdmg/butterfly.cms) ![Progress](https://img.shields.io/badge/progress-in_development-red.svg) [![GitHub license](https://img.shields.io/github/license/wdmg/butterfly.cms.svg)](https://github.com/wdmg/butterfly.cms/blob/master/LICENSE)

# Requirements 
* PHP 5.6 or higher
* [Yii2](hhttps://github.com/yiisoft/yii2) v.2.0.20 and newest
* [Yii2 Base](https://github.com/wdmg/yii2-base)
* [Yii2 Admin](https://github.com/wdmg/yii2-admin)
* [Yii2 Activity](https://github.com/wdmg/yii2-activity)
* [Yii2 API](https://github.com/wdmg/yii2-api)
* [Yii2 Bookmarks](https://github.com/wdmg/yii2-bookmarks)
* [Yii2 Comments](https://github.com/wdmg/yii2-comments)
* [Yii2 Forms](https://github.com/wdmg/yii2-forms)
* [Yii2 Geo](https://github.com/wdmg/yii2-geo)
* [Yii2 Likes](https://github.com/wdmg/yii2-likes)
* [Yii2 Messages](https://github.com/wdmg/yii2-messages)
* [Yii2 Options](https://github.com/wdmg/yii2-options)
* [Yii2 Rbac](https://github.com/wdmg/yii2-rbac)
* [Yii2 Reposts](https://github.com/wdmg/yii2-reposts)
* [Yii2 Reviews](https://github.com/wdmg/yii2-reviews)
* [Yii2 Services](https://github.com/wdmg/yii2-services)
* [Yii2 Stats](https://github.com/wdmg/yii2-stats)
* [Yii2 Tasks](https://github.com/wdmg/yii2-tasks)
* [Yii2 Tickets](https://github.com/wdmg/yii2-tickets)
* [Yii2 Users](https://github.com/wdmg/yii2-users)
* [Yii2 Views](https://github.com/wdmg/yii2-views)
* [Yii2 Votes](https://github.com/wdmg/yii2-votes)

# Installation
To install the app, run the following command`s in the console:

    $ composer create-project --prefer-dist wdmg/butterfly.cms example.com
    $ cd example.com
    $ php init
    
...or use automatic mode:
    
    $ php init --env=development --overwrite=y --dbhost=localhost --dbtype=mysql --dbcharset=utf8 --dbname=example --tbprefix=btf_ --dbuser=root --dbpassword=root --migrations=y

# Migrations
After set of environment and configure db connection, run the following commands in the console for apply migrations:

    $ php yii admin/init

After apply all migrations you may login to dashboard:
http://example.com/admin/ with username `admin` and password `admin`.

# Status and version [in progress development]
* v.1.0.5 - Update README.md and fix base routing, `tablePrefix` in init script
* v.1.0.4 - Added run migration's and table's prefix for init
* v.1.0.3 - Update README.md and dependencies