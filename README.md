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

In the Json Endpoint you can search by:<br>

'id',<br>
'title',<br>
'priceFrom': minimum price,<br>
'price': exact price,<br>
'priceTo': maximum price,<br>
'totalAreaFrom': minimum total area,<br>
'totalArea': exact total area,<br>
'totalAreaTo': maximum total area,<br>
'coveredAreaFrom': minimum covered area,<br>
'coveredArea': exact covered area,<br>
'coveredAreaTo': maximum covered area,<br>
'numberRoomsFrom': minimum number of rooms,<br>
'numberRooms': exact number of rooms,<br>
'numberRoomsTo': maximum number of rooms,<br>
'cityId': id of the city,<br>
'type': could be "House" or "Department",<br>

the following filters are boolean, that means the value you can pass is only "true" or "false":

'light': if it has light or not,<br>
'naturalGas': if it has natural gas or not,<br>
'phone': if it has phone or not,<br>
'water': if it has water or not,<br>
'sewers': if it has sewers or not,<br>
'internet': if it has internet or not,<br>
'asphalt': if it has asphalt or not,<br>

put one of this filters on the url like this "http://localhost:8000/json?title=abc123"
