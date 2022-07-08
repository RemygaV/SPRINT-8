# Sprint No. 7 - Project management tool with PHP OOP and ORM

## Description:

Project was made by PHP OOP and ORM -Doctrine. This project was created for learning purposes.

## Sprint No. 8. tasks:

* Create project management tool using PHP OOP and ORM;
* Display projects/employees from MySQL server using ORM;
* Create Add forms projects/employees;
* Create Delete functionality for projects/employees;
* Create Update forms for projects/employees;
* Upload to github;
* Keep the code clean - structure ,validity, website, github;
* Create readme.md.

## Installation guide:
  
* Download XAMPP and install it;
* Downlaod MySQL Workbench and install it;
* Download or make a clone git repository Sprint-8 and place it inside htdocs directory (XAMPP);
* Run XAMPP and start Apache and MySQL server;
* Import data.sql file in MySQL Workbench;
* Open command line inside the project directory;
* Install : php composer.phar;
* Install ORM( Doctrine) : php ../composer.phar require doctrine/orm;
* Install others Doctrine dependencies: 
    a) php ../composer.phar require symfony/cache
    b) php ../composer.phar require doctrine/annotations
* Run this command: vendor/bin/doctrine orm:schema-tool:update --force --dump-sql;
* Open index.php in the browser.

## How to use this project:

* You will be able: 
    * to create employees and projects names;
    * to delete employees and projects names;
    * to edit employees names and assigned projects names, and edit projects name;

## Author:

Project made by Remigijus Vičiulis
Link to linkedin : www.linkedin.com/in/remigijusviciulis