<?php
session_start();
$id=$_GET['id'];
if($_SESSION['userid']){
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
                            <a class="nav-link" href="dashboard.php?id=<?php echo $_SESSION['userid'];?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="course-edit-delete.php">Back to edit course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-warning" href="logout.php">Logout</a>
                        </li>   
                    </ul>
                </div>	
        </nav>
    </header> 
    <div class="container" style="margin-top:50px;">
        <h1 class="text-center mt-4">Your Added Lectures and Skills</h1>
        <hr class="slide2">
        <?php
            $connect=mysqli_connect("mysql","root","root");
            $db = mysqli_select_db($connect,"eduhub_course");

            $query="SELECT * FROM lecture WHERE course_id='$id'";
            $query_run = mysqli_query($connect,$query);
        ?>
        <!-- ################ Lecture Table ########### -->
         
         <table class="table table-hover my-3">
            <?php
                    if($query_run && mysqli_num_rows($query_run)>0)
                    {
            ?>
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col"></th>
                    <th scope="col">Lecture Title</th>
                    <th scope="col">Lecture Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        foreach($query_run as $row){
                
                ?>
                <tr>
                    <td width="25%">  
                        <?php echo"<video width='100%' height='10%'><source src='".$row['video']."'></source></video>";?>
                    </td>
                    <td width="25%">
                        <input type="hidden" value="<?php echo$row['lec_id']?>">
                        <input type="hidden" value="<?php echo$row['lec_name']?>"> 
                        <input type="hidden" value="<?php echo$row['lec_description']?>">
                        <input type="hidden" value="<?php echo$row['course_id']?>">     
                     <?php echo "<p class='lead text-justify py-4 px-2'>".$row["lec_name"]."</p>"; ?>
                    </td>
                    <td width="30%">
                        <?php echo "<p class='py-4 text-justify px-2'>".$row["lec_description"]."</p>"; ?>
                    </td>
                    <td width="20%" class="text-center">
                        <button type="button" class="btn btn-warning mx-2 my-3 editlecbtn" data-toggle="modal" data-target="#editlecModal"><small><i class="fas fa-edit"></i> Edit</small></button>
                        <button type="button" class="btn btn-danger mx-2 my-3 deletelecbtn" data-toggle="modal" data-target="#deletelecModal"><small><i class="far fa-trash-alt"></i> Delete</small></button>
                    </td>
                </tr>
                <?php
                        }
                    }
                    else
                    {
                        echo '<div class="text-center" style="margin-bottom:250px; margin-top:100px">
                        <img src="https://thefitzip.com/public/frontend/imgs/norecordfound.png">
                        </div>';
                    }  
            
                ?>  
            </tbody>    
        </table>
        <!--############ Skills Table ######################  -->
        <?php
            $query_skill="SELECT * FROM skillsinfo WHERE course_id='$id'";
            $query_skill_run = mysqli_query($connect,$query_skill);
        ?>
        <table class="table table-hover my-3">
        <?php
            if($query_skill_run && mysqli_num_rows($query_skill_run)>0)
            {
        
        ?>
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">What will students learn in your course?</th>
                    <th scope="col">What skills they will learn?</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                        foreach($query_skill_run as $row){
                
                ?>
                <tr>                    
                    <td width="60%">
                     <input type="hidden" value="<?php echo$row['skill_id']?>">
                     <input type="hidden" value="<?php echo$row['learn_detail']?>">
                     <input type="hidden" value="<?php echo$row['skills']?>"> 
                     <input type="hidden" value="<?php echo$row['course_id']?>">          
                     <?php echo "<p class='lead text-center py-4 px-2'>".$row["learn_detail"]."</p>"; ?>
                    </td>
                    <td width="20%">
                        <?php echo "<p class='text-center py-4 px-2'>".$row["skills"]."</p>"; ?>
                    </td>
                    <td width="20%" class="text-center">
                        <button type="button" class="btn btn-warning mx-2 my-3 editskillbtn" data-toggle="modal" data-target="#editskillModal"><small><i class="fas fa-edit"></i> Edit</small></button>
                        <button type="button" class="btn btn-danger m-2 mx-2 my-3 deleteskillbtn" data-toggle="modal" data-target="#deleteskillModal"><small><i class="far fa-trash-alt"></i> Delete</small></button>
                    </td>
                </tr>
                <?php
                        }
                    }
                    else
                    {
                        echo '<div class="text-center" style="margin-bottom:250px; margin-top:100px">
                        <img src="https://thefitzip.com/public/frontend/imgs/norecordfound.png">
                        </div>';
                       
                    } 
            
                ?>  
            </tbody>    
        </table>
        <!-- ############ Lecture Edit Modal  ################ -->
        <div class="modal fade" id="editlecModal" tabindex="-1" role="dialog" aria-labelledby="editlecModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editlecModalTitle">Edit the lecture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit-delete-code.php" method="POST" autocomplete="on">
                        <div class="modal-body">
                            <input type="hidden" name="lec_id" id="lec_id">
                            <input type="hidden" name="course_id" id="course_lec_edit_id">
                            <div class="form-group">	
								<label for="lectureName">Lecture Name</label>
								<input type="text" class="form-control" id="lectureName" name="lecturename" placeholder="Enter lecture name" maxlength="100" required>
							</div>
                            <div class="form-group">
								<label for="lectureDescription">Lecture description</label>
								<textarea rows="4" cols="50"class="form-control" id="lectureDescription" name="lecturedescription" placeholder="Enter lecture description" spellcheck="false"></textarea>
						    </div>
              
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" name="updatelecdata" class="btn btn-outline-dark">Edit changes</button>
                        </div>
                    </form>        
                </div>    
            </div>    
        </div>
        <!-- ################# Lecture Delete #################### -->
        <div class="modal fade" id="deletelecModal" tabindex="-1" role="dialog" aria-labelledby="deletelecModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="edit-delete-code.php" method="POST" autocomplete="on">
                        <div class="modal-body">
                            <p class="text-danger text-center"><i class="fas fa-exclamation-circle fa-7x"></i></p>
                            <input type="hidden" name="lec_id" id="delete_lec_id">
                            <input type="hidden" name="course_id" id="course_lec_delete_id">
                            <p class="lead text-center">Are sure want to delete the lecture?</p>
                        </div>
                        <div class="modal-footer">                       
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" name="deletelecdata" class="btn btn-danger">Yes</button>
                        </div>    
                    </form>    
                </div>    
            </div>    
        </div>
        <!-- ################## Skill Edit #################### -->
        <div class="modal fade" id="editskillModal" tabindex="-1" role="dialog" aria-labelledby="editskillModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editskillModalTitle">Edit the Skill sets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit-delete-code.php" method="POST" autocomplete="on">
                        <div class="modal-body">
                            <input type="hidden" name="skill_id" id="skill_id">
                            <input type="hidden" name="course_id" id="course_skill_edit_id">
                            <div class="form-group">	
								<label for="skills">What will students learn in your course?</label>
							    <input type="text" class="form-control" id="courselearn" name="learn_detail" placeholder="Eg: Install Python and write your first code." maxlength="100">
							</div>		
							<div class="form-group">	
								<label for="skills">What skills they will learn?</label>
								<input type="text" class="form-control" id="skill" name="skill" placeholder="Eg: Python Basic, Web Scraping, etc." maxlength="100">
							</div>		
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" name="updateskilldata" class="btn btn-outline-dark">Edit changes</button>
                        </div>
                    </form>        
                </div>    
            </div>    
        </div>
        <!-- ############## Skill Delete ######################-->
        <div class="modal fade" id="deleteskillModal" tabindex="-1" role="dialog" aria-labelledby="deletelecModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="edit-delete-code.php" method="POST" autocomplete="on">
                        <div class="modal-body">
                            <p class="text-danger text-center"><i class="fas fa-exclamation-circle fa-7x"></i></p>
                            <input type="hidden" name="skill_id" id="delete_skill_id">
                            <input type="hidden" name="course_id" id="course_skill_delete_id">
                            <p class="lead text-center">Are sure want to delete the skills data?</p>
                        </div>
                        <div class="modal-footer">                       
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" name="deleteskilldata" class="btn btn-danger">Yes</button>
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
            
            $(".editlecbtn").on('click',function(){
                $tr=$(this).closest('tr');           
                var data = $tr.find("td input:hidden").map(function(){
                    return $(this).val();
                }).get();
                
                
              $('#lec_id').val(data[0]);
              $('#lectureName').val(data[1]);
              $('#lectureDescription').val(data[2]); 
              $('#course_lec_edit_id').val(data[3]);      
            });
            $(".deletelecbtn").on('click',function(){
                $tr=$(this).closest('tr');
                
                var data = $tr.find("td input:hidden").map(function(){
                    return $(this).val();
                }).get(); 
              
                $('#delete_lec_id').val(data[0]);
                $('#course_lec_delete_id').val(data[3]);
            });
            $(".editskillbtn").on('click',function(){
                $tr=$(this).closest('tr');           
                var data = $tr.find("td input:hidden").map(function(){
                    return $(this).val();
                }).get();
              $('#skill_id').val(data[0]);
              $('#courselearn').val(data[1]);
              $('#skill').val(data[2]); 
              $('#course_skill_edit_id').val(data[3]);      
            });
            
            $(".deleteskillbtn").on('click',function(){
               
                $tr=$(this).closest('tr');
                
                var data = $tr.find("td input:hidden").map(function(){
                    return $(this).val();
                }).get(); 
              
              $('#delete_skill_id').val(data[0]);
              $('#course_skill_delete_id').val(data[3]);
            });
                          
        });
        
    </script>



</body>
</html>
<?php
}
else{
    header("Location:"+`${window.location.hostname}`+":5001/login");
}

?>
