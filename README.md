# Inmobiliaria Project
Simple real state system in which you can Create, Read, Update and Delete diferent type of properties. 
## Dependencies 
- PHP 8.1
- Laravel 10x
- Artisan
- Composer 2.2 or ^
- mySQL 8.0
- NPM Dependencies

## install dependences on Ubuntu

- PHP 8.1
~~~
sudo apt-get install php8.1
~~~

- composer 2.2 or ^
(https://getcomposer.org)

- Laravel 10x
- Artisan
~~~
composer global require laravel/installer
~~~

- Mysql 8.0
(https://dev.mysql.com/downloads/mysql/)



## install dependences on Windows
- PHP 8.1 
(https://windows.php.net/download#php-8.1-ts-vs16-x64)

- composer 2.2 or ^
(https://getcomposer.org)

- Laravel 10x
- artisan 
~~~
composer global require laravel/installer
~~~

- Mysql 8.0
(https://dev.mysql.com/downloads/mysql/)


## Download and migrate the repository
open your terminal and run this command.

~~~
git clone https://github.com/Felixis4/Inmobiliaria-project.git
~~~

configure your .env with your database

run this command for migrate
~~~
php artisan migrate
~~~

run this command for link storage folder
~~~
php artisan storage:link
~~~

## Open localhost
run this command on your terminal 
~~~
php artisan serve
~~~

## Json Instructions 

In the Json Endpoint you can search by:
'id',
'title',

'priceFrom': minimum price,
'price': exact price,
'priceTo': maximum price,
'totalAreaFrom': minimum total area,
'totalArea': exact total area,
'totalAreaTo': maximum total area,
'coveredAreaFrom': minimum covered area,
'coveredArea': exact covered area,
'coveredAreaTo': maximum covered area,
'numberRoomsFrom': minimum number of rooms,
'numberRooms': exact number of rooms,
'numberRoomsTo': maximum number of rooms,
'cityId': id of the city,
'type': could be "House" or "Department",

the following filters are boolean, that means the value you can pass is only "true" or "false":

'light': if it has light or not,
'naturalGas': if it has natural gas or not,
'phone': if it has phone or not,
'water': if it has water or not,
'sewers': if it has sewers or not,
'internet': if it has internet or not,
'asphalt': if it has asphalt or not,

put one of this filters on the url like this "http://localhost:8000/json?title=abc123"
