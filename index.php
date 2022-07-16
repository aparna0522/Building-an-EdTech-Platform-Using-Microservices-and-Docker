<?php 
	session_start();
	include('header.html');
	function getRealHost(){
		list($realHost,)=explode(':',$_SERVER['HTTP_HOST']);
		return $realHost;
	 } 
	 $url= getRealHost();
?>
	<body ng-app="home" ng-controller="homeCtrl">
		  
		<header>
			<nav class="navbar navbar-expand-lg navbar-light">
				
				<a class="navbar-brand" href="index.php">
					<img 
						src="images/favicon.jpeg"
						width="75"
						height="75"
						alt="EduHub.png"
					/>EduHub
					</a>

					<button
						id="navbarToggle"
						class="navbar-toggler"
						type="button"
						data-toggle="collapse"
						data-target="#navbarNav"
						aria-controls="navbarNav"
						aria-expanded="false"
						aria-label="Toggle navigation"
						>
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarNav">
						<form class="form-inline" action="searchresults.php" method="POST">
							<input
								class="form-control mr-sm-2"
								type="text"
								name="str"
								placeholder="What do you want to learn?"
								
								
							/>
							
							<button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="submit-search">
								<i class="fas fa-search"></i>
							</button>
						</form>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item dropdown">
								<a
									class="nav-link dropdown-toggle"
									href="#"
									id="navbarDropdownMenuLink"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
								>
									Categories
								</a>
								<div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="categorycourse.php?category=Arts">Arts</a>
									<a class="dropdown-item" href="categorycourse.php?category=Business">Business</a>
									<a class="dropdown-item" href="categorycourse.php?category=Marketing">Marketing</a>
									<a class="dropdown-item" href="categorycourse.php?category=IT-Software">IT &amp; Software</a>
									
								</div>
							</li>
							<li class="nav-item">
								<?php 
								if(isset($_SESSION['userid']))
									echo '<a class="nav-link" href="course.php"><i class="fas fa-1x fa-user-tie"></i>For Teachers </a>';
								else 
									echo '<a class="nav-link" href="http://'.$url.':5001/login"><i class="fas fa-1x fa-user-tie"></i>For Teachers </a>';
								?>	
							
							</li>
							
							<li class="nav-item">
								<?php
									if(isset($_SESSION['userid']))
										echo '<a class="nav-link btn btn-outline-warning" href="logout.php">Logout</a>';
									else{

										echo '<a class="nav-link btn btn-outline-warning" href="http://'.$url.':5001/login">Login</a>';
									}
								?>
							</li>
							<li class="nav-item">
								<?php
									if(!isset($_SESSION['userid']))
										echo '<a class="nav-link btn btn-warning" href="http://'.$url.':5001/register">Signup</a>';
								?>
							</li>
						</ul>
					</div>
			</nav>
		</header>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<div class="banner-box d-none d-lg-block" style="box-shadow: 10px 10px 20px 10px grey;">
					<h1>Way to success</h1>
					<p>Develop your skills with the help of top educators from all over the world only at Eduhub.</p>
					<!-- <a href="#" class="btn btn-warning my-4">Learn More</a> -->
				</div>
			</div>
		</div>
		
		<!-- EduHub Video -->
		<div class="bg-light mb-3">
        	<div class="container mt-3 mb-3">
		    	<div class="row">  
                	<section class="col-lg-5 col-sm-12">
                    	<video class="w-100 h-100" controls>
                        	<source src="https://res.cloudinary.com/janu/video/upload/v1610688628/Course_image/final_lktwpz.mp4" type="video/mp4">
        	
                  		</video>
                	</section>
                	<section class="col-lg-7 col-sm-12 ">
                        <div id="scrolltext" class="mt-3 py-3">
                            <p class="font-regular text-dark" style= "font-family: palatino;"><q>Learning gives creativity,<br> creativity leads to thinking,<br> thinking provides knowledge,<br>knowledge makes you great</q><br><strong>-A.P.J Abdul Kalam </strong> </p>
                        </div>
                   </section>	      
		    	</div>				
        	</div>
    	</div> 
		<!-- Courses -->
		
			<div class="container mt-5" id="PopularCourse">
				<h2 class="text-center">Explore our Popular Courses</h2>
				<hr class="slide2">
				<div class="courses-card" ng-init="displayCourse()">
					<div class="row" ng-cloak>
						<div class=" col-lg-4 col-md-6 col-sm-12" ng-repeat="x in course_info">
							<a href="course_info.php?id={{x.course_id}}">
								<div class="card-box">
									<img class="card-img-top" src="{{x.course_image}}" alt="card-one">
								  		<div class="card-body p-2" ng-clock>
										<p class="card-title mt-3 h5">{{x.coursetitle}}</p>
										<p class="font-weight-normal mb-1 mt-2"><span class="badge badge-warning">{{x.course_level}}</span></p>
	
										<p><span>&#8377; {{x.amount}}</span></p>
								  	</div>
								</div>
							</a>		
						</div>
					</div>
				</div>	
			</div>
		<!-- Categories -->
		<div class="categories mt-3" id="ExploreCategories">
			<div class="container">
				<h2 class="text-center">Our Categories</h2>
				<hr class="slide2">
				<div class="categories-card">
					<div class="row">
						
						<div class="col-md-6 col-sm-12 mb-5">
							<a href="categorycourse.php?category=Arts">
								<div class="category-box">
									<img class="card-img-top" src="https://ecorner.stanford.edu/wp-content/uploads/sites/2/2016/08/eCorner_Arts_Tech5-960x541.jpg" alt="card-one">
								  	<div class="card-body p-2">
										<p class="card-title text-center mt-3 h5">Arts</p>
								  	</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-12 mb-5">
							<a href="categorycourse.php?category=Business">
								<div class="category-box">
									<img class="card-img-top" src="https://www.incimages.com/uploaded_files/image/1920x1080/shutterstock_1145284904_372957.jpg" alt="card-one">
								  	<div class="card-body p-2">
										<p class="card-title text-center mt-3 h5">Business</p>
									</div>
								</div>	
							</a>
						</div>
						<div class="col-md-6 col-sm-12 mb-5">
							<a href="categorycourse.php?category=Marketing">
								<div class="category-box mb-5">
									<img class="card-img-top" src="https://win-creativemarketing.com/wp-content/uploads/2019/02/Marketing-in-the-Education-Industry-1080x675.jpg" alt="card-one">
								  	<div class="card-body p-2">
										<p class="card-title text-center mt-3 h5">Marketing</p>
								  	</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-12 mb-5">
							<a href="categorycourse.php?category=IT-Software">
								<div class="category-box">
									<img class="card-img-top" src="https://darvideo.tv/wp-content/uploads/2019/10/IT-and-Software-Video-1.png" alt="card-one">
								  	<div class="card-body p-2">
										<p class="card-title text-center mt-3 h5">IT &amp;Software</p>
								  	</div>
								</div>
							</a>
						</div>
						
					</div>
				</div>	

			</div>

		</div>	
        
		<!-- Strip -->	
				<div class="parallex">
					<div class="parallex-inner">
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-sm-12">
									<div class="image-sec d-flex justify-content-center ml-md-3">
										<div class="card-strip">
											<div class="imgBx">
												<img src="images/teacher.jpg" alt="For teacher">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-8 col-sm-12">
									<div class="content px-5 py-5">
										<p class="text-center text-dark d-flex justify-content-center text-uppercase display-4">Become a Teacher</p>
										<p class="text-center text-dark font-regular d-flex justify-content-center lead py-2">EduHub provides you the platform to teach millions of students all around the world. Providing you the chance to make the world enlighten with the knowledge.
										<div class="text-center">
											<?php 
												if(isset($_SESSION['userid']))
													echo '<a href="course.php" class="btn btn-warning py-2 font-weight-bold" style="text-shadow:none;">Know More</a>';
												else 
												echo '<a href="http://'.$url.':5001/login" class="btn btn-warning py-2 font-weight-bold" style="text-shadow:none;">Know More</a>';
											?>	
										</div>	
									</div>
								</div>
								
							</div>
						</div>

					</div>
				</div>
			    
		
		<!-- Testimonial -->
		<div class="container mb-5">
				<h2 class="testimonial mt-5">
				Testimonials
				<hr class="slide2" />
				</h2>
				<div class="swiper-container">
					<div class="swiper-wrapper">
					<div class="swiper-slide h-100 d-inline-block">
						<div class="card">
							<div class="sliderText"></div>
							<div class="content">
								<p class="text-center h4">Sara Taylor</p>
								<p class="text-center h6 text-dark">Software Engineer</p>
									<hr class="slide2" />
								</h4>
								<p class="font-regular">
									<q>
									Eduhub is a great platform, which has helped me transform my learning curve. It's interestingness is not only limited to it's courses it has to offer, but it also has a very good community where one can interact and learn more. 
									</q>
								</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="card">
							<div class="sliderText h-100 d-inline-block"></div>
							<div class="content">
							<p class="text-center h4">Joel Root</p>
								<p class="text-center h6 text-dark">Marketing Head</p>
									<hr class="slide2" />
								</h4>
								<p class="font-regular">
									<q>
									I had previously tried using some other platforms for learning courses, but since I enrolled myself into Eduhub, there was no turning back. I have completed minimum of 15 courses in a span of 3 months and that too with intermediate level proficiency!!
									</q>
								</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="card">
							<div class="sliderText h-100 d-inline-block"></div>
							
							<div class="content">
								<p class="text-center h4">Stephen Fleming</p>
								<p class="text-center h6 text-dark">Web developer</p>
									<hr class="slide2" />
								</h4>
								<p class="font-regular">
									<q>
									I found Eduhub to be the best platform to learn, share and connect with other students. It has provided an excellent UI which apparently ingratiates the user and makes it fun to learn and develop. The ease at which the courses are elucidated is quite exceptional. 
									</q>
								</p>
							
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="card">
							<div class="sliderText h-100 d-inline-block"></div>
							<div class="content">
							<p class="text-center h4">Tini Mathew</p>
								<p class="text-center h6 text-dark">Student</p>
									<hr class="slide2" />
								</h4>
								<p class="font-regular">
									<q>
									In the times of pandemic, I had lost interest in attending online lectures. However, the courses on Eduhub caught my interest and I must admit, from then on, I have learnt alot. Eduhub has proved to be a great platform for learning.
									</q>
								</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="card">
							<div class="sliderText h-100 d-inline-block"></div>
							<div class="content">
							<p class="text-center h4">Harry Clinton</p>
								<p class="text-center h6 text-dark">Expert Musician</p>
									<hr class="slide2" />
								</h4>
								<p class="font-regular">
									<q>
										Despite being a profound singer, my urge to learn guitar pulled me towards Eduhub. I learnt to play guitar flawlessly from the amazing teachers on Eduhub. It has helped me grow leaps and bounds. 
									</q>
								</p>
							</div>
						</div>
					</div>
					</div>
				 <!-- Add Pagination -->
					    <!-- Add Pagination -->
				    <div class="swiper-pagination"></div>

				    <!-- Add Arrows -->
				    <div class="swiper-button-prev"></div>
				    <div class="swiper-button-next"></div>
				</div>
		</div>
		<!-- footer -->
		<?php include('footer.html')?>
		<script>
			var homeApp = angular.module("home",[]);
			homeApp.controller("homeCtrl",function($scope,$http){
				$scope.displayCourse = function(){
				$http({
					method:'GET',
					url:'course-service/course_display.php'
				}).then(function(response){
				$scope.course_info=response.data;
				// $scope.course_id = $scope.course_info.id;
				},
				function(response){
					console.error(response);
				});
				}
			});
		</script>
		
		</body>
</html>		
