<?php
	session_start();
    include('header.html');
	if($_GET['category']=='IT-Software'){		
		$category=$_GET['category'];
		$category=str_replace("-","&",$category);
	}
	else{
		$category=$_GET['category'];
	}
	
?>
<body ng-app="course_category" ng-controller="course_category_ctrl">
    <header>
		<nav class="navbar navbar-expand-lg navbar-light">
					
			<a class="navbar-brand" href="
			<?php 
				if(isset($_SESSION['userid'])) 
					echo'dashboard.php?id='.$_SESSION['userid'].''; 
				else
					echo'index.php';
			?>
			">
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
								id="courses"
								aria-label="Search"
							/>
							<div id="courseList"> 
              					</div>
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
									echo '<a class="nav-link btn btn-outline-warning" href="logout.php">Logout</a>';
								else
									echo '<a class="nav-link btn btn-outline-warning" href="http://localhost:5001/login">Login</a>'
								?>
							</li>
							<li class="nav-item">
								<?php
									if(!isset($_SESSION['userid']))
										echo '<a class="nav-link btn btn-warning" href="http://localhost:5001/register">Signup</a>';
								?>
							</li>	
						</ul>
					</div>	
		</nav>
		</header>
    	<div class="course__category mt-5 mb-5" ng-init="display_category()">
        	<div class="container">    
            	<div class="heading">
                	<h2><?php echo $category." Courses";?></h2>
                	<hr class="mt-4"/>
            	</div>
				<div ng-cloak>
					<div ng-hide="category_details">
						<img src="https://image.freepik.com/free-vector/cute-boy-standing-position-showing-thumb_96037-450.jpg" alt="cuteboy" class="rounded mx-auto d-block" width="300px">
						<p class="text-center lead">Coming Soon.....</p>
					</div>
				</div>

            	<div class="category__card p-3" ng-cloak>
                	<div class="row" ng-repeat="course in category_details">
						<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
							<img src="{{course.course_image}}" alt="course-image" width="230px" height="150px" style="box-shadow:0px 2px 3px grey; background-position:center;"/>
						</div>
                    	<div class="col-lg-9 col-md-6 col-sm-12 p-0 mb-4">
                        	<a href="course_info.php?id={{course.course_id}}" style="color:black;"><h2 class="text-dark">{{course.coursetitle}}</h2></a>
                        	<p class="text-muted font-italic">Charles Well</p>
                        	<p class="badge badge-warning text-dark" style="font-size: medium;">{{course.course_level}}</p> 
                        	<p class="text-dark">{{course.course_language}}</p>  
                        	<p><span>&#8377; {{course.amount}}</span></p> 
							<hr>    
                    	</div> 	
                	</div>
            	</div>
        	</div>
    	</div>
		<?php
			include('footer.html');
			echo"<script>
				var category_app = angular.module('course_category',[]);
				category_app.controller('course_category_ctrl',function(\$scope,\$http){
					\$scope.display_category = function(){
						\$http({
							method:'GET',
							url:'course-service/categorydisplay.php',
							params:{
								'category':'".$category."'    
							}
						}).then(function(response){
							console.log(response.data);
							\$scope.category_details=response.data;
						},
						function(response){
							console.error(response);
						});
					}   
				});
			</script>";
		?>
	</body>
</html>