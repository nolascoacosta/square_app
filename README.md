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


 ##Development Stack
 - Laravel(7.2.5)
 - Quasar Framework (1.0.0)
 - Mysql 5.7
 - Nginx
 
 ## Prerequisites
 - Docker-compose
 
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
      This service allow us to defer the processing of a time consuming task, 
      such as auto importing the posts created from another blogging platform 
  
The las two services really help the aplication Minimise the strain put on our system during traffic peaks and 
put on the feed server.  

  
       
