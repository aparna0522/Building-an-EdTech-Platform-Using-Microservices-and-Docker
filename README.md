# Building an EdTech platform Using Microservices and Docker

<h2>Project Description</h2>

We have implemented three microservices namely:

1. User Microservice
2. Course Microservice
3. Enrollment Microservice

<b>User Microservice</b> helps in registering a user into the application. It then helps the user to login into his account and have a separate session for themselves. This microservice has an independent database(in this case MongoDB Database) which is responsible for keeping the user credentials only. The password that is stored in the database is encrptyed and hence ensures the security of the users registering on the web-app.  

<b>Courses Microservice</b> helps a logged in user to enroll into a particular course. The logged in user can then learn at their own pace from the enrolled courses. A unique feature that this web-app has is that, any user is allowed to upload their own courses unlike traditional educational web applications. Any user can upload their content for other users to learn from. 

<b>Enrollment Microservice</b> will basically transfer the api request to a third party payment service and that will take care of all the payments made by the user and accordingly help in enabling the access for the particular course for the user.

<h2>How to run this project locally?</h2>

1. Clone this repository.
2. Ensure that you have the ".env" file in your codebase. Update the contents in the env file to include your razorpay KeyID and SECRET_KEY 
3. Enter Cloudinary URL for your project by editing js --> script.js --> <CLOUDINARY_URL>
4. Install Docker and start.
5. Use the terminal and write the following command. 
```
docker-compose up --build --remove-orphans
```
5. Navigate to http://localhost:5000 to find the website up and running. 

<h2>Website URL</h2>

Live website URL: http://129.213.124.99:5000/ \
Cloud Platform: Oracle Cloud Infrastructure 

<h2>Videos</h2>
Detailed Video and explanation: https://drive.google.com/file/d/1fMqWXOrLnv5U1kSAGilcfcrNLJFw6gn8/view?usp=sharing 

Short Video: https://drive.google.com/file/d/1EyQW0__Sejbi9oNpoaK35RzRsOZPD8WG/view?usp=sharing

<h2>How to deploy website on cloud?</h2>

1. Create Oracle Cloud account, using the free tier subscription(if required). 
2. Create Virtual Cloud Network (VCN). 
3. Configure the default security list for the VCN by adding Ingress rules for ports 22, 80. Add the ports which you will use for the project. For instance, in this project we have ports 5000, 5001, 7000, 30002. 
4. Create and connect to the Cloud Instance. 
```
   ssh opc@<PUBLIC_IP> 
```
5. Install git, docker and docker-compose on the cloud instance terminal. 
6. Clone this repository and run 
```
  docker-compose up --build -d
```
7. Set up the firewall using the following commands: 
```
  sudo firewall-cmd --permanent --zone=public --add-service=http 
  sudo firewall-cmd --permanent --zone=public --add-port=5000/tcp <ALL REQUIRED PORTS>
  sudo firewall-cmd --reload
```
8. Go to your public IP:port! Voila! Your website is deployed on cloud! :) 

<h2>Technical Paper</h2>
Paper presented at IEEE Pune Conference by @aparna0522 (Aparna Naik) in December 2021.

Paper published in IEEE Xplore on 31st January, 2022. 

Paper link: https://ieeexplore.ieee.org/document/9686535

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
