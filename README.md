Butterfly.CMS on Yii 2
================================


Installation
------

Create a project:

~~~
composer create-project --prefer-dist --stability=dev WDMG/butterfly.cms project
~~~

or clone the repository for `pull` command availability:

~~~
git clone https://github.com/WDMG/butterfly.cms.git project
cd project
composer install
~~~

Init an environment:

~~~
php init
~~~

Fill your DB connection information in `config/db.php` and execute migrations:

~~~
php yii migrate
~~~

Sign up on site [http://example.com/admin/](http://example.com/admin/) or create your first user manually:

~~~
php yii admin/users/create
~~~

Init RBAC roles:

~~~
php yii rbac/init
~~~

Assign `admin` role to your user:

~~~
php yii roles/assign
~~~
