# Building an EdTech platform 

<h2>How to run this project?</h2>

1. Clone this repository.
2. Ensure that you have the ".env" file in your codebase. Update the contents in the env file to include your razorpay KeyID and SECRET_KEY 
3. Install Docker and start.
4. Use the terminal and write the following command. 
```
docker-compose up --build --remove-orphans
```
5. Navigate to http://localhost:5000 to find the website up and running. 

<h2>Project Description</h2>
<b>Creators:</b> Trio of enthusiastic and motivated students who want to innovate and create something essential and useful for the student community!! :)

An educational website which can potentially bring changes to the current learning lifestyle of the students, with simpler and cost-effective teaching. This project is unlike traditional applications which use monolithic architecture. The distinctiveness of this application lies in the usage of microservices architecture. We have implemented three microservices namely:

1. User Microservice
2. Course Microservice
3. Enrollment Microservice

<b>User Microservice</b> helps in registering a user into the application. It then helps the user to login into his account and have a separate session for themselves. This microservice has an independent database(in this case MongoDB Database) which is responsible for keeping the user credentials only. The password that is stored in the database is encrptyed and hence ensures the security of the users registering on the web-app.  

<b>Courses Microservice</b> helps a logged in user to enroll into a particular course. The logged in user can then learn at their own pace from the enrolled courses. A unique feature that this web-app has is that, any user is allowed to upload their own courses unlike traditional educational web applications. Any user can upload their content for other users to learn from. 

<b>Enrollment Microservice</b> will basically transfer the api request to a third party payment service and that will take care of all the payments made by the user and accordingly help in enabling the access for the particular course for the user.

<h3>Uniqueness of the Application</h3>

1. This application allows any user to upload his course so that others can learn from the same course. (User perspective)
2. This application uses Microservices architecture which makes it scalable, reliant and robust as compared to Monolithic architectured applications. (Technology perspective)

<h3>Future Work</h3>

1. Helping peers to interact with each other and resolve their doubts. They can connect with other peers who are learning the same course. 
2. Adding some extra features like creation of quizes for easy evaluation. 

<h2>Important Features of the application:</h2>

1. Independent of other microservices.  
2. If one service goes down, it does not affect other services. 
3. Scaling of the services.
4. Efficient.
5. Portablity. 
