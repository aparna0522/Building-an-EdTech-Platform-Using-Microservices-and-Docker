<html>
<?php 

	include('header.html')
?>

<style>
    * {
    margin: 0px;
    padding:0px;
}
.border {
    color: #f0ad4e
    width: 50%
}
.subname {
    display: block;
    margin-bottom: 30px;
    text-align: center;
    font-size: 25px;
    color:white;
    font-family: Georgia, 'Times New Roman', Times, serif;
}
.bgcolorclass {
    background-image: linear-gradient(to right top, #fbb656, #fac55b, #f6c436, #f6d126, #f2de0d);
}
</style>

<body>
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
	<nav>
</header>

    <div class="bgcolorclass" style="text-align: center; padding-top:50px; padding-bottom:50px">
        <div class = "container">
            <h1 style="font-family: Georgia, 'Times New Roman', Times, serif; padding-bottom:30px; color:black">About Us</h1>
			
            <div class="row" style="font-family: Georgia, 'Times New Roman', Times, serif;">
                <div class="card" style="width:350px; height: 540px" >
                    <img class="card-img-top" src="images/p1.png" alt="Card image" style="width:100%" width="500px" height="320px">
                    <div class="card-body">
                        <h4 class="card-title">Janhavi Choudhari</h4> 
                        <hr class="slide2" style="width:100%;">
                        <p class="card-text">UI/UX designer passionate to deliver software product through designing skills</p>
                        <div class="social-media ">
                            <ul>
                                <li><a href="https://www.linkedin.com/in/janhavi-choudhari"><i class="fab fa-1x fa-linkedin-in"></i></a></li>
                                <li><a href="https://github.com/Janhavikc"><i class="fab fa-1x fa-github"></i></a></li>
                            </ul>
	          		    </div>
                    </div>
                </div>
                <div class="card" style="width:350px; height: 540px">
                    <img class="card-img-top" src="images/p2.png" alt="Card image" style="width:100%" width="500px" height="320px">
                    <div class="card-body">
                        <h4 class="card-title">Aparna Naik</h4> 
                        <hr class="slide2" style="width:100%;">
                        <p class="card-text">Backend Developer with hands-on knowledge on Orchestration technologies</p>
                        
                        <div class="social-media ">
                            <ul>
                                <li><a href="https://www.linkedin.com/in/aparnanaik/"><i class="fab fa-1x fa-linkedin-in"></i></a></li>
                                <li><a href="https://github.com/aparna0522"><i class="fab fa-1x fa-github"></i></a></li>
                            </ul>
	          		    </div>
                    </div>
                </div>
                <div class="card" style="width:350px; height: 540px" > 
                    <img class="card-img-top" src="images/p3.jpeg" alt="Card image" style="width:100%" width="500px" height="320px">
                    <div class="card-body">
                        <h4 class="card-title">Vedanti Pawar</h4> 
                        <hr class="slide2" style="width:100%;">
                        <p class="card-text">AI enthusiast with strong foundation in Information Technology</p>
                        <div class="social-media ">
                            <ul>
                                <li><a href="https://www.linkedin.com/in/vedanti-pawar-8718b5188"><i class="fab fa-1x fa-linkedin-in"></i></a></li>
                                <li><a href="https://github.com/vedantipawar"><i class="fab fa-1x fa-github"></i></a></li>
                            </ul>
	          		    </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
	<?php include("footer.html") ?>
</body>

</html>
