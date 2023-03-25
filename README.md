lamp 
====

A Dockerised LAMP stack

 - Docker based Linux server
 - Apache with self signed SSL certificate
 - MariaDB
 - PHP 8.1 and modules (see https://github.com/delboy1978uk/dockerhub/blob/master/php81/Dockerfile)
 - MailHog (port 1025 send, port 8025 in browser)
 - Node JS with React (change branch to `feature/react`)
 
 If you've never used Docker before, see the instructions below.code
 
### setup
There is a placeholder `public/index.php` in the `code` directory, from which Apache serves your site. You can delete that, and drop in (or symlink) your existing projects into the `code` directory.

If you are using the `feature/react` branch of this repository, note that the PHP code will go in `code/backend` and not just code, and the react app will go in `code/frontend`.
 
### starting the server
Simply `cd` into the folder you cloned into and type
```
bin/start
``` 
Apache logs etc will scroll by, leave this terminal open while you do your work. 

You can browse to `https://localhost`, or `https://awesome.scot` (if you added to your `/etc/hosts`, see below, you can customise this domain)

### running CLI commands
To run commands such as composer from the terminal that are in your Docker box, you can use the run command:
```
bin/run composer install
```
If you would like to enter the container and run commands from inside, you can type:
```
bin/terminal
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
 Apache is set up to serve `awesome.scot` with a self signed SSL certificate in your browser (or you can change the name in `docker-compose.yml` and rebuild)
 Edit your `/etc/hosts` file on your computer (`C:\Windows\system32\drivers\etc\hosts` on Windows), adding this line:
 ```
 127.0.0.1 awesome.scot
 ```
### customising the setup
You customise the setup if you need to. PHP and Apache Dockerfiles can be found in the `build` folder. 

You will notice a file named ssmtp.conf. This LAMP stack uses Mailhog, so you can check all would-have-been-sent emails 
by going to `awesome.scot:8025`.

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
