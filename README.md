lamp 
====

A Dockerised LAMP stack

#### What?
Docker. Magical voodoo VM tech. Install it. https://www.docker.com/community-edition<br />
There are different drivers it can use, we like Virtualbox. Install that too. https://www.virtualbox.org/
#### OK, it's installed. Now what?
This line is a one off. Create your master VM. 
```
docker-machine create --driver virtualbox default
```
Start it up. Display the environment variables. Use those variables in your terminal session.
```
docker-machine start
```
You now have a working Docker Machine.
Now it's started, run this for every tab you open in the terminal to set up environment vars in your terminal
```
eval $(docker-machine env)
```

### How do I use this lib?
You can use this for a single site or for multiple apps, up to you, mess with the config!

#### Apache
The default host is awesome.scot, which will be on your Docker machine's IP (probably 192.168.99.100). Add that to your own systems /etc/hosts:
```
192.168.99.100 awesome.scot
```
In ./build/httpd, you will find an httpd.conf, and an httpd-vhosts.conf. Edit the files to suit, the default vhost looks like this:
 ```apacheconfig
<VirtualHost *:80>
    ServerName awesome.scot
    ServerAdmin delboy1978uk@gmail.com
    DocumentRoot /var/www/html/public

    #SSLEngine on
    #SSLCertificateKeyFile /home/you/ssl.key
    #SSLCertificateFile /home/you/ssl.crt

    #ErrorLog /home/you/log/error.log
    #CustomLog /home/you/log/access.log combined

    <Directory "/var/www/html">
            DirectoryIndex index.php
            FallbackResource /index.php
            Options -Indexes +FollowSymLinks
            AllowOverride FileInfo All
            Require all granted
    </Directory>
    ProxyPassMatch ^/(.*\.php)$ fcgi://php:9000/var/www/html/awesome/public/$1
</VirtualHost>
```

PHP
---

You can customise php.ini in build/php/php.ini. You will notice a file named ssmtp.conf. This LAMP stack uses Mailhog, so you can check all would-have-been-sent emails by going to awesome.dev:8025.<br />When connecting to the DB, MySQL host should be set to 'mariadb' and not 127.0.0.1 or localhost.

MySQL
-----

If using only one database, fine. If using more than one, remove the database name entry from the Docker compose YAML. Put any build SQL files in build/data. Please see the sample. Note if you didn't specify a DB in the YAML you'll need to perform a grant query in your SQL.

Blah blah, just tell me how to start the container!
----------------------------------------

Now you've configured your stuff, we use Docker's compose command to build it first. This is a one off again.

```
docker-compose build
```

After which, we can just tell it to start up. This will stay open in your terminal with a log:

```
docker-compose up
```

Pressing CTRL-C will close it down. 

I need to SSH in for something, but wtf?!
-----------------------------------------

Yes, its all little microcontainers and a bit odd. Here's what you do:

```
docker-compose exec php /bin/bash
```

Clean up to save space when finished
------------------------------------
```
docker-compose down
```

Shut it down!
-------------

```
docker-machine stop
```
