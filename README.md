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
docker-machine env
eval $(docker-machine env)
```
You now have a working Docker Machine.

How do I use this lib?
----------------------

You can use this for a single site or for multiple apps, up to you, mess with the config! Once running you'll have a fully running LAMP stack.

Apache
------

The default host is awesome.dev (remember to add to your hosts file!), which will be on your Docker machine's IP (probably 192.168.99.100). In ./build/httpd, you will find an httpd.conf, and an httpd-vhosts.conf. Edit the files to suit, the default vhost looks like this: 
 ```apacheconfig
<VirtualHost *:80>
    ServerName awesome.dev
    ServerAdmin delboy1978uk@gmail.com
    DocumentRoot /var/www/html/public
=======
###How do I use this lib?
You can use this for a single site or for multiple apps, up to you, mess with the config!

####Apache
The default host is awesome.dev, which will be on your Docker machine's IP (probably 192.168.99.100). In ./build/httpd, you will find an httpd.conf, and an httpd-vhosts.conf. Edit the files to suit, the default vhost looks like this:
 ```apacheconfig
<VirtualHost *:80>
    ServerName dev.therampantlion.co.uk
    ServerAdmin delboy1978uk@gmail.com
    DocumentRoot /var/www/html/therampantlion/public

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
    ProxyPassMatch ^/(.*\.php)$ fcgi://php:9000/var/www/html/public/$1
</VirtualHost>
```

PHP
---

You can customise php.ini in build/php/php.ini. You will notice a file named ssmtp.conf. This LAMP stack uses Mailhog, so you can check all would-have-been-sent emails by going to awesome.dev:8025.<br />When connecting to the DB, MySQL host should be set to 'mariadb' and not 127.0.0.1 or localhost.

MySQL
-----

If using only one database, fine. If using more than one, remove the database name entry from the Docker compose YAML. Put any build SQL files in build/data. Please see the sample. Note if you didn't specify a DB in the YAML you'll need to perform a grant query in your SQL.

Blah blah, just tell me how to start it!
----------------------------------------

Now you've configured your stuff, we use Docker's compose command to build it first. 

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
docker-machine ssh
```

You are in your Docker machine. List the running containers:

```
docker ps
```

Look for lamp_php or similar, it will have a container ID. Using the ID to replace the hex below, type:

```
docker exec -it a64783df502e /bin/bash
```

Now you can run composer or whatever you need to do. You are sort of SSH'ed in twice, one to the main Docker VM, the other the container.

Shut it down!
-------------

```
docker-machine stop
```
=======
    ProxyPassMatch ^/(.*\.php)$ fcgi://php:9000/var/www/html/therampantlion/public/$1
</VirtualHost>
```
####PHP
You can customise php.ini in build/php/php.ini. You will notice a file named ssmtp.conf. This LAMP stack uses Mailhog, so you can check all would-have-been-sent emails by going to awesome.dev:8025.<br />When connecting to the DB, MySQL host should be set to 'mariadb' and not 127.0.0.1 or localhost.
####MySQL
Put any build SQL files in build/data. Please see the sample. Note if you dont connect to DB as root you'll need to perform a grant query.
###Blah blah, just tell me how to start it!
Now you've configured your stuff, we use Docker's compose command to build it first. 
```
docker-compose build
```
After which, we can just tell it to start up. This will stay open in your terminal with a log:
```
docker-compose up
```
Pressing CTRL-C will close it down. 
###I need to SSH in for something, but wtf?!
Yes, its all little microcontainers and a bit odd. Here's what you do:
```
docker-machine ssh
```
You are in your Docker machine. List the running containers:
```
docker ps
```
Look for lamp_php or similar, it will have a container ID. Using the ID to replace the hex below, type:
```
docker exec -it a64783df502e /bin/bash
```
Now you can run composer or whatever you need to do. You are sort of SSH'ed in twice, one to the main Docker VM, the other the container.
