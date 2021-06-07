<?php 
	session_start();
	include('header.html');
	$con = mysqli_connect('mysql','root','root');
	mysqli_select_db($con,'eduhub_course');
	
?>
<body >
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
									echo '<a class="nav-link" href="http://localhost:5001/login"><i class="fas fa-1x fa-user-tie"></i>For Teachers </a>';
								?>	
							
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
	<div class="course__category mt-5 mb-5" >   
		<div class="container">   
		<?php 
        	if (isset($_POST['submit-search'])) {
        		$str=mysqli_real_escape_string($con,$_POST['str']);
        		echo '<h2>Search results for "'.$str.'" </h2>';} 
		?> 
            <div class="category__card p-3" >
                <div class="row my-3" >
	<?php
	    if (isset($_POST['submit-search'])) {
		    $str=mysqli_real_escape_string($con,$_POST['str']);

			$sql="select * from course where coursetitle like'%$str%'";
			$res=mysqli_query($con,$sql);
			$numsearch = mysqli_num_rows($res);

			if(mysqli_num_rows($res)>0){
				

				while($rows=mysqli_fetch_assoc($res)){
					echo '<div class="col-lg-3 col-md-6 col-sm-12 mb-4">';
					echo "<img src=".$rows['course_image']." alt='course-image' width='230px' height='150px' style='box-shadow:0px 2px 3px grey; background-position:center;'/>";
					echo '</div>';
           	        echo '<div class="col-lg-9 col-md-6 col-sm-12 p-0 mb-4">';
                    echo '<a href="course_info.php?id='.$rows['course_id'].'" style="color:black;"><h2 class="text-dark"> '.$rows['coursetitle'].' </h2></a>';
                    echo '<p class="text-muted font-italic">'.$rows['teachername'].'</p>';
                    echo '<p class="badge badge-warning text-dark" style="font-size: medium;">'.$rows['course_level'].'</p> ';
                    echo '<p class="text-dark">'.$rows['course_language'].'</p>  ';
                    echo '<p><span>&#8377;<span>'.$rows['amount'].'</span></p> ';
                    echo '<hr>';    
                    echo '</div>'; 	
                }
			}else{
				echo '<h2 class= "text-centre"> No course found </h2>';
			}
								
		}
?>
                </div>
            </div>
        </div>
    </div>

	<?php include('footer.html')?>
	</body>
	</html>
	