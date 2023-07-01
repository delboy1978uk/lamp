Trongate LAMP Stack 
====

A Dockerised LAMP stack

 - Docker based Linux server
 - Apache with self signed SSL certificate
 - MariaDB
 - PHP 8.1 and modules
 - MailHog (port 1025 send, port 8025 in browser)
 - Node JS with React (change branch to `feature/react`)
 
 If you've never used Docker before, see the instructions below.code

### requirements
In order to use this LAMP stack, you must have the following tools installed on your machine.
- Git
- Docker
### installation
Clone this repository.
```
git clone git@github.com:delboy1978uk/lamp.git yourProjectName
```
### setup
There is a placeholder `public/index.php` in the `code` directory, from which Apache serves your site. You can delete that, and drop in (or symlink) your existing projects into the `code` directory.
 
### starting the server
Simply `cd` into the folder you cloned into and type
```
cd yourProjectName
bin/start
``` 
Apache logs etc will scroll by, leave this terminal open while you do your work. 

You can browse to `https://localhost`, or `https://trongate` (if you added to your `/etc/hosts`, see below, you can customise this domain)

### running CLI commands
The docker PHP container is an actual Linux installation. Regardless of your platform, if you would like to run CLI 
commands like any PHP console commands etc, you can type:
```
bin/terminal php
```
This will place you in the Linux shell of the PHP service configured in `docker-compose.yml` file.

To run commands without going into the Linux terminal, you can use the run command:
```
bin/run composer install
```
To restart any service, call the following:
```
bin/restart [service]
```
If you change the docker config (see belw), you can quickly rebuild using this:
```
bin/rebuild
```
Finally, there is an empty script which you can use to perform any of your initial setup tasks, typical examples 
could include running composer install, performing database migrations, populating fixtures,  and warming up caches.
```
bin/init
```
### stopping the server
When you are finished your work, you can close any bash terminals down until you are left with the one running the server 
and displaying the logs. Press `CTRL-C` to quit, then run the following to tidy up.
```
bin/stop
```
 ### virtual host
 Apache is set up to serve `trongate` with a self signed SSL certificate in your browser (or you can change the name in `docker-compose.yml` and rebuild)
 Edit your `/etc/hosts` file on your computer (`C:\Windows\system32\drivers\etc\hosts` on Windows), adding this line:
 ```
 127.0.0.1 trongate
 ```
### customising the setup
You customise the setup if you need to. PHP and Apache Dockerfiles can be found in the `build` folder. 

You will notice a file named ssmtp.conf. This LAMP stack uses Mailhog, so you can check all would-have-been-sent emails 
by going to `trongate:8025`.

There is a `.env` file which you add to

When connecting to the dev DB from php, the MySQL host should be set to `mariadb` and not 127.0.0.1 or localhost.

Now you've configured your stuff, we use Docker's compose command to build it first. This is a one off again.
```
bin/rebuild
```

After which, we can just tell it `bin/start`. 

### handy tip
A handy tip, if you edit your `~/.bashrc`, you should add the following line: 
```
export PATH=$PATH:bin:vendor/bin
```
This is also in the PHP container. It allows you to run a command without putting `bin/` or `vendor/bin` before it.
```
vendor/bin/phpunit     // without $PATH export 
phpunit                // with $PATH export 
                       
bin/start              // without $PATH export
start                  // with $PATH export   
```
