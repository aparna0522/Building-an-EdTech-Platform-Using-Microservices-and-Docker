<?php
session_start();
if(isset($_SESSION['userid'])){
include('header.html');
?>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FBFBFB">
            
            <a class="navbar-brand" href="dashboard.php?id=<?php echo $_SESSION['userid']?>">
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
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-warning" href="logout.php">Logout</a>
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
            $userid=$_SESSION['userid'];
            $query="SELECT * FROM course WHERE teacher_id='$userid'";
            $query_run = mysqli_query($connect,$query);
        ?>
        <table class="table table-hover">
            <!-- <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col"></th>
                    <th scope="col">Course Details</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead> -->
            <tbody>
                <?php
                    if($query_run && mysqli_num_rows($query_run)>0)
                    {
                        foreach($query_run as $row){
                
                ?>
               
                <tr>
                    <td width="25%">
                        <?php echo"<img src='".$row['course_image']."' width='100%' height='10%'>";?>
                    </td>
                    <td width="45%">
                        <input type="hidden" value="<?php echo$row['course_id'] ?>">
                        <input type="hidden" value="<?php echo$row['coursetitle'] ?>">
                        <input type="hidden" value="<?php echo$row['coursesubtitle'] ?>">
                        <input type="hidden" value="<?php echo$row['coursedescription'] ?>">
                        <input type="hidden" value="<?php echo$row['course_language'] ?>">
                        <input type="hidden" value="<?php echo$row['course_level'] ?>">
                        <input type="hidden" value="<?php echo$row['category'] ?>">
                        <input type="hidden" value="<?php echo$row['amount'] ?>">
                        <?php echo "<h3 class='py-4'>".$row["coursetitle"]."</h3>"; ?>
                    </td>
                    <td width="30%" class="text-center">
                        <button type="button" class="btn btn-warning mx-2 my-3 editbtn"  data-toggle="modal" data-target="#editModal"><small><i class="fas fa-edit"></i> Edit</small></button>
                        <a href="lecture-edit-delete.php?id=<?php echo$row['course_id']?>" class="btn btn-light m-2 mx-2 my-3"><small><i class="far fa-play-circle"></i> Lectures</small></a>
                        <button type="button" class="btn btn-danger m-2 mx-2 my-3 deletebtn" data-toggle="modal" data-target="#deleteModal"><small><i class="far fa-trash-alt"></i> Delete</small></button>
                    </td>
                </tr>
            
                <?php
                        }
                    }
                    else
                    {
                        echo "<h1 class='text-center m-5'>No Record Found</h1>";
                    }    
            
                ?>  
            </tbody>    
        </table>
        <!-- ####### EDIT MODAL ############ -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalTitle">Edit the course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit-delete-code.php" method="POST" autocomplete="on">
                        <div class="modal-body">
                            <input type="hidden" name="course_id" id="course_id">
                            <div class="form-group">
                                <label for="courseTitle">Course title</label>
                                <input type="text" class="form-control" id="courseTitle" name="coursetitle" placeholder="Insert your course title">			
                            </div>
                            <div class="form-group">
                                <label for="courseSubtitle">Course subtitle</label>
                                <input type="text" class="form-control" name="coursesubtitle" id="courseSubtitle" placeholder="Insert your course title">	    
                            </div>
                            <div class="form-group">  
                                <label for="courseDescription">Course Description</label>
                                <textarea rows="4" cols="50" id="courseDescription" name="coursedescription" class="form-control" placeholder="Insert your course description" spellcheck="false"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-row align-items-center">
                                    <div class="col-4 my-1">
                                        <label class="mr-sm-2" for="language"> Language</label>
                                        <select class="custom-select mr-sm-2" id="language" name="language">
                                                <option value="">Choose language of teaching</option>
                                                <option value="English(UK)">English(UK)</option>
                                                <option value="English(US)">English(US)</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Marathi">Marathi</option>
                                        </select>
                                    </div>
                                    <div class="col-4 my-1">
                                        <label class="mr-sm-2" for="level">Level</label>
                                        <select class="custom-select mr-sm-2" id="level" name="level">
                                            <option value = "">-- Select level --</option>
                                            <option value="Beginner level">Beginner level</option>
                                            <option value="Intermediate level">Intermediate level</option>
                                            <option value="Expert level">Expert level</option>
                                        </select>
                                    </div>
                                    <div class="col-4 my-1">
                                        <label class="mr-sm-2" for="category">Category</label>
                                        <select class="custom-select mr-sm-2" id="courseCategory" name="category">
                                            <option value="">Choose course category</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Business">Business</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="IT&Software">IT &amp;Software</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                            <div class="form-group">
                                <label for="Payment">Amount(in INR)</label>
                                <input type="text" class="form-control" id="payment" name="amount" placeholder="Enter amount in INR" maxlength="50">
                                <small class="form-text text-muted">
                                    Please enter the amount in Rupees. If it is free enter 0.00.
                                </small>
                            </div>         
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                <button type="submit" name="updatedata" class="btn btn-outline-dark">Edit changes</button>
                        </div>
                    </form>    
                    
                </div>    
            </div>    
        </div>
        <!-- ########### DELETE MODAL ################ -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="edit-delete-code.php" method="POST" autocomplete="on">
                        <div class="modal-body">
                            <p class="text-danger text-center"><i class="fas fa-exclamation-circle fa-7x"></i></p>
                            <input type="hidden" name="delete_id" id="delete_id">
                            <p class="lead text-center">Are sure want to delete the course?</p>
                        </div>
                        <div class="modal-footer">                       
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" name="deletedata" class="btn btn-danger">Yes</button>
                        </div>    
                    </form>    
                </div>    
            </div>    
        </div>
    </div>
            
    <?php 
    include('footer.html');
    ?>
    <script>
        $(document).ready(function(){
            
            $(".editbtn").on('click',function(){
                $("#editModal").modal('show');
                $tr=$(this).closest('tr');
                
                var data = $tr.find("td input:hidden").map(function(){
                    return $(this).val();
                }).get(); 
              
              $('#course_id').val(data[0]);
              $('#courseTitle').val(data[1]);
              $('#courseSubtitle').val(data[2]);
              $('#courseDescription').val(data[3]);
              $('#language').val(data[4]);
              $('#level').val(data[5]);
              $('#courseCategory').val(data[6]);
              $('#payment').val(data[7]);
             
            });
            $(".deletebtn").on('click',function(){
                $("#deleteModal").modal('show');
                $tr=$(this).closest('tr');
                
                var data = $tr.find("td input:hidden").map(function(){
                    return $(this).val();
                }).get(); 
              
              $('#delete_id').val(data[0]);
            });
                          
        });
        
    </script>
</body>
</html>
<?php
}
else{
    header("Location:http://localhost:5001/login");
}

?>