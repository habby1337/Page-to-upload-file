<!-- IMAGE REFER LINK START-->
[register_page]: *LINK* ?TODO
[login_page]: *LINK*  ?TODO
[db_image]: *LINK*  ?TODO
<!-- IMAGE REFER LINK END-->


![alt text][register_page]
![alt text][]






# **Login and Upload** - _**LaU**_


#### it's a simple project with login page to upload your files to a local server
___
### Features:
+ Multi user (more users will have a folder automatically created to save their files)
+ Password protected (in order to use the service you must have an account)
+ Low Stress  (It can also be used on a raspberry pi)
+ Offline working (no online dependencies)
+ Bootstrap friendly (css and js)
+ MySQL Friendly (user and password are stored in DBs)

---
<a name="mysql"></a>
### Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install before the software and how to install them


+ [MySql](https://dev.mysql.com/doc/refman/8.0/en/ "MySQL documentation") - MySQL documentation
+ [PHP 7+](http://php.net/manual/en/install.php "PHP documentation") - PHP documentation
+ [Apache2](https://httpd.apache.org/docs/2.4/ "Apache2 documentation") - Apache2 documentation
+ [Knowledge](https://www.youtube.com/watch?v=YwpVDmYj8f0 "Knowledge documentation") - Knowledge documentation


### Installing

A step by step series of examples that tell you how to get a development env running


```
Change the string in php.ini: "file_uploads = Off" in "file_uploads = On"
```

then. [(You can find how to install mysql in the documentation)](#mysql)
```
Install and set up mysql.
```
Creating db
```
create a database named upload
```
Creating table
```
create a table named users
```
Creating conlum in users
```
id int,
username text,
password text,
```

We browse to the "www" directory
```
cd /var/www/
```
We clone the repository.
```
git colone https://github.com/habby1337/Page-to-upload-file.git
```
then we start apache2.
```
service apache2 start
```
```
start mysql
```
We open the browser.
```
Open the browser and go to 127.0.0.1:80
```
and everything should be working.

- [ add gif browsing 127.0.0.1:80 ]

## Running the tests

Just open the browser and go to 127.0.0.1:80


## Built With

* [PHP](http://php.net/manual/en/install.php "PHP documentation") - The linguage used.
* [MySQL](https://dev.mysql.com/doc/refman/8.0/en/ "MySQL documentation") - The DataBase system used.
* [Bootstrap](https://getbootstrap.com/ "Bootstrap documentation") - The CSS and JS used.



## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.


## Authors

* **Federico Tensi** - *Initial work* - [Habby](https://github.com/habby1337)

See also the list of [contributors](https://github.com/habby1337/Page-to-upload-file/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](../master/LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Made with :heart: by Federico Tensi in :it: Italy - Rome ![colosseum](https://image.prntscr.com/image/LRj2toBkQkOwIhyEMPOdow.png)
