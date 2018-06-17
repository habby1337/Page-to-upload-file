[register_page]: https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png

![alt text][register_page]

[login_page]: *LINK*




# **Login and Upload**


#### è un semplice progetto per poter caricare i propri file in un server locale
___
### Feacurs:
+ Multi user (piu utenti avranno una cartella automaticamnete creata per poter salvare i propri file)
+ Password protected (per poter usare il servizzio si deve disporre di un account)
+ Low Stress  (Puo essere usato anche su un raspberry pi)
+ Offline working (nessuna dipendenza online)
+ Bootstrap friendly (css and js)
+ MySQL Friendly (user and passwod where storend in DBs)

<br/><br/>

##Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them


+ [MySql](https://dev.mysql.com/doc/refman/8.0/en/ "MySQL documentation")
+ [PHP 7+](http://php.net/manual/en/install.php "PHP documentation")
+ [Apache2]( "")
+ [Knowledge](https://www.youtube.com/watch?v=YwpVDmYj8f0 "knowledge documentation")


### Installing

A step by step series of examples that tell you how to get a development env running


```
Modificare in php.ini la stringa: "file_uploads = Off" in "file_uploads = On"
```

then.
```
Install and set up mysql. (You can find how to install mysql in the documentation)
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

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Made with :heart: by Federico Tensi in :it: Italy - Rome ![colosseum](https://image.prntscr.com/image/LRj2toBkQkOwIhyEMPOdow.png)
