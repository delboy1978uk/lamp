lamp 
====

A Dockerised LAMP stack

 - Docker based Linux server
 - Apache with self signed SSL certificate
 - MariaDB
 - PHP 8.0 and modules (see https://github.com/delboy1978uk/dockerhub/blob/master/php80/Dockerfile)
 - MailHog (port 1025 send, port 8025 in browser)
 
 If you've never used Docker before, see the instructions below.
 
### starting the server
Simply `cd` into the folder you cloned into and type
```
docker-compose up
``` 
Apache logs etc will scroll by, leave this terminal open while you do your work. 

### running CLI commands
To run commands such as composer from the terminal that are in your Docker box, we tell it to execute bash in the php container.
```
docker-compose exec php /bin/bash
```
### stopping the server
When you are finished your work, you can close any bash terminals down until you are left with the one running the server 
and displaying the logs. Press `CTRL-C` to quit, then run the following to tidy up.
```
docker-compose down
```
 ### virtual host
 Apache is set up to serve `awesome.scot` in your browser (or you can change the name in `docker-compose.yml` and rebuild)
 First find out the IP of the Docker machine:
 ```
 docker-machine env
 ```
 Edit your `/etc/hosts` file on your computer (`C:\Windows\system32\drivers\etc\hosts` on Windows):
 ```
 192.168.99.100 awesome.scot
 ```
#### I've never used Docker - how do I start?
Docker. Magical voodoo VM tech. Install it. https://github.com/docker/toolbox/releases/tag/v19.03.1<br />
There are different drivers it can use, we like Virtualbox. Install that too. https://www.virtualbox.org/

This line is a one off. Create your master VM. 
```
docker-machine create --driver virtualbox default
```
To start it up, type the following
```
docker-machine start
```
You now have a working Docker Machine. Now that it's started, you need to run this for every tab you open in the terminal 
in order to set up its environment variables in your terminal.
```
eval $(docker-machine env)
```
You can now start working with your various docker projects. When you are finished, of course you can stop the Docker 
machine like so:
```
docker-machine stop
```
#### customising the setup
You customise the setup if you need to. PHP and Apache Dockerfiles can be found in the `build` folder. 

You will notice a file named ssmtp.conf. This LAMP stack uses Mailhog, so you can check all would-have-been-sent emails 
by going to `awesome.scot:8025`.

When connecting to the DB, MySQL host should be set to `mariadb` and not 127.0.0.1 or localhost.

Now you've configured your stuff, we use Docker's compose command to build it first. This is a one off again.
```
docker-compose build
```

After which, we can just tell it `docker-compose up`. 

