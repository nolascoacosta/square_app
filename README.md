<p align="center"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcShcRnd3-7PZnP2D6DNA8piCJ-6aHgLra1Jxg&usqp=CAU" width="100"></p>



## Blogging Platform Assignment 

 ## App Requirements
- The homepage will show all the blog posts to everyone visiting the web.
- Any user will be able to register in the platform.
- Any user will be able to login in the platform.
- Logged In user will be able to see the posts he created.
- Logged In user will be able to create new posts.
- Logged In user won't be able to edit posts.
- Logged In user won't be able to delete posts.
- Auto import the posts created from another blogging platform using this api endpoint 
  that returns the new posts (https://sq1-api-test.herokuapp.com/posts)
- Save posts from this feed should be saved under a designated, system-created user, 'admin'
- Minimise the strain put on our system during traffic peaks.
- Minimising the strain we put on the feed server.


 ## Development Stack
 - Laravel(7.2.5)
 - Quasar Framework (1.0.0)
 - Mysql 5.7
 - Nginx
 - Jwt

 ## Prerequisites
  - [Docker] (https://docs.docker.com/get-docker/)
 - [Docker-compose] (https://docs.docker.com/compose/install/)
 - [Composer] (https://getcomposer.org/doc/00-intro.md)
 - [Npm] (https://www.npmjs.com/get-npm)
 - [Vue-Cli] (https://cli.vuejs.org/guide/installation.html)
 - [Quasar-Cli] (https://quasar.dev/quasar-cli/installation)
 
 ## About the structure
 Laravel API and Quasar framework are totally separate from each other and it's
  mixed up when the source code is compiled and the frontend dist folder copied to the laravel public folder.
  
 In order to create Blogging Platform Assignment i have decided to create 4 services, each one in their respective image.
 
 - Service app (SPA)
    -
    This service will handle the frontend and backend api.
    
 - Service square_db(Database)
     -
     This is the database service.   
  
 - Service nginx(Server)
      -
      Nginx is built to offer low memory usage and high concurrency. Rather than creating new processes for each web request, Nginx uses an 
      asynchronous, event-driven approach where requests are handled in a single thread.  
      
 - Service php-queue (JobQueue)
      -
      This service allows us to defer the processing of a time consuming task, 
      such as auto importing the posts created from another blogging platform 
  
The las two services really help the aplication Minimise the strain put on our system during traffic peaks and 
put on the feed server.  


#### Manual installation

***
Note: 
The purpose of using docker compose is because it gives us 
a greater ease when scaling our services vertically and thus managing
 the high levels of traffic in our web applications.
 
I understand this is probably not the best way to use docker since we could 
just install all the dependencies needed in the container it self.




*** 
## Installation
**1. Clone or download the repository and enter its folder**
```
 https://github.com/nolascoacosta/square_app.git 
    
    1 - cd frontend
    2 - run npm install --silent
    3 - run quasar build
    4 - cd root directory
    5 - cp .env.example .env
    6 - run composer install
    7 - run php artisan key:generate
    8 - run php artisan jwt:secret
    8 - run npm install --silent
    9 - run npm run prod
    10 - run php artisan migrate (migrate database)
    11 - run php artisan migrate:refresh --seed
    12 - run php artisan key:generate
    13 - run php artisan cache:clear
    14 - run php artisan config:clear
    15 - run php artisan optimize:clear
    16 - run docker-compose build app
    17 - run docker-compose up -d (starts up all the services)
    18 - copy this ulr http://127.0.0.1:8000 in your browser
    19 - cd root directory and run docker-compose down (kill all the services)

```


## Print Screens

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/CreateNewPostForm.PNG?raw=true" width="500">

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/LandingPage.PNG?raw=true" width="500">

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/LandingPageLoggedIn.PNG?raw=true" width="500">

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/LogingForm.PNG?raw=true" width="500">

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/MyPosts.PNG?raw=true" width="500">

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/ProfilePage.PNG?raw=true" width="500">

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/ReadingPost.PNG?raw=true" width="500">

<img src="https://github.com/nolascoacosta/square_app/blob/development/printscreen/RegisterForm.PNG?raw=true" width="500">



##### TODO LIST:
- [ ] Avoid manual instalation of dependencies.


