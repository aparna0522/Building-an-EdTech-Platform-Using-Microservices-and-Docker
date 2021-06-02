<?php 
  session_start();
  $_SESSION['userid'] = $_GET['id'];
  include('header.html');
	$con = mysqli_connect('mysql','root','root');
	mysqli_select_db($con,'eduhub_course');
?>

<style type="text/css">
	.jumbotron3 {
    padding: 8rem 1rem;
    /* margin-bottom: 2rem; */
    background-color: rgb(230, 227, 227) ;
    border-radius: .3rem;
}
</style>
<?php echo"<script>localStorage.setItem('userid','".$_SESSION['userid']."' );</script>";?>
<body>
  <!--Nav Bar -->
<header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="dashboard.php?id=<?php echo $_SESSION['userid'];?>">
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
              <a class="nav-link" href="course.php"><i class="fas fa-1x fa-user-tie"></i>For Teachers </a>
            </li>
              
            <li class="nav-item">
              <a class="nav-link" href="course-edit-delete.php"> Edit course</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn btn-outline-warning" href="logout.php">Logout</a>
            </li>      
          </ul>
        </div>
      </nav>
    </header>
    <div class="jumbotron3" style="background-color: rgb(230, 227, 227);;">
      <div class="container">
        <h4 style="font-size: 250%; font-family: palatino;" ><b>Welcome </b></h4> <br><h4 class="mb-3">Complete the courses you are enrolled in</h4>
        <?php
          $sql = "select * from enrollment natural join course where user_id = '".$_SESSION['userid']."'" ;
          $result = mysqli_query($con, $sql);
          if(mysqli_num_rows($result)>0) {
            while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo '
              <div class="card w-100 h-25">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <img src= '.$rows['course_image'].'>
                    </div>
                    <div class="col-sm-6">
                      <h4 class="card-title">'.$rows['coursetitle'].'</h4>
                      <p class="card-text">'.$rows['course_level'].'</p>
                      <p class="card-text badge badge-pill badge-warning">'.$rows['category'].'</p>
                      <div class="progress"><div class="progress-bar bg-dark" style="width:70%"></div></div> <br>
                      <a href="viewcourse.php?id='.$rows['course_id'].'" class="btn btn-warning stretched-link">Continue</a>
                    </div>
                  </div>
                </div>  
              </div>
              <br>';
            }
          }
        ?>
      </div>
    </div> 
      <?php include('footer.html');?>
  </body>
</html>