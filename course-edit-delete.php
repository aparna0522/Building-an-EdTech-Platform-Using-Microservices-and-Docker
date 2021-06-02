<?php
session_start();
include('header.html');
?>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FBFBFB">
            
            <a class="navbar-brand" href="dashboard.php">
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
                    <ul class="navbar-nav ml-auto">	
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="dashboard.php?id=<?php echo $_SESSION['userid'];?>">Dashboard</a>
                        </li>
                    </ul>
                </div>	
        </nav>
    </header>  
    <div class="container">
        <h1 class="text-center mt-4">Your Added Courses</h1>
        <hr class="slide2">
        <?php
            $connect=mysqli_connect("mysql","root","root");
            $db = mysqli_select_db($connect,"eduhub_course");

            $query="SELECT * FROM course";
            $query_run = mysqli_query($connect,$query);
        ?>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col"></th>
                    <th scope="col">Course Details</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row){
            
            ?>
               
                <tr>
                    <td width="25%">
                        <?php echo"<img src='".$row['course_image']."' width='100%' height='10%'>";?>
                    </td>
                    <td width="45%"><?php echo "<h3 class='py-4'>".$row["coursetitle"]."</h3>"; ?>
                    </td>
                    <td width="30%">
                        <button type="button" class="btn btn-warning mx-2 my-3"><small><i class="fas fa-edit"></i> Edit</small></button>
                        <a href="#" class="btn btn-light m-2 mx-2 my-3"><small><i class="far fa-play-circle"></i> View</small></a>
                        <button type="button" class="btn btn-danger m-2 mx-2 my-3"><small><i class="far fa-trash-alt"></i> Delete</small></button>
                    </td>
                </tr>
            
            <?php
                    }
                }
                else
                {
                    echo "No Record Found";
                }    
            
            ?>  
          </tbody>    
        </table>
    </div>
    <?php 
    include('footer.html');
    ?>
</body>