lamp 
====

A Dockerised LAMP stack

 - Docker based Linux server
 - Apache with self signed SSL certificate
 - MariaDB
 - PHP 8.0 and modules (see https://github.com/delboy1978uk/dockerhub/blob/master/php80/Dockerfile)
 - Node 14 with React app on port 3000
 - MailHog (port 1025 send, port 8025 in browser)

### your code
You can drop your PHP code into `code/backend`, apache serves files from `code/backend/public`. 

The node container runs your javascript code from `code/frontend` via `npm start`. If the frontend directory is empty then by default it
will create a new React project on the first launch.
 
### starting the server
Simply `cd` into the folder you cloned into and type
```
docker-compose up
``` 
Apache logs etc will scroll by, leave this terminal open while you do your work. 

### running CLI commands
To run commands such as Composer from the terminal that are in your Docker box, we tell it to execute bash in the php container.
```
docker-compose exec php bash
docker-compose exec node bash
```
Your PHP project files are found in `/var/www/html` of the `php` container, and your Javascript files are
found in `/app` of the `node` container.
### stopping the server
When you are finished your work, you can close any bash terminals down until you are left with the one running the server 
and displaying the logs. Press `CTRL-C` to quit, then run the following to tidy up.
```
docker-compose down
```
 ### virtual host
 Apache is set up to serve `awesome.scot` with a self signed SSL certificate in your browser (or you can change the name in `docker-compose.yml` and rebuild)
 Edit your `/etc/hosts` file on your computer (`C:\Windows\system32\drivers\etc\hosts` on Windows):
 ```
 127.0.0.1 awesome.scot
 ```


