<?php
$connect=mysqli_connect("mysql","root","root");
$db = mysqli_select_db($connect,"eduhub_course");

if(isset($_POST['updatedata'])){
 
    $course_id = $_POST['course_id'];
    $coursetitle = $_POST['coursetitle'];
    $coursesubtitle = $_POST['coursesubtitle'];
    $coursedescription = $_POST['coursedescription'];
    $language=$_POST['language'];
    $level=$_POST['level'];
    $category=$_POST['category'];
    $amount=floatval($_POST['amount']);

    $query="UPDATE course SET coursetitle='$coursetitle', coursesubtitle='$coursesubtitle',coursedescription='$coursedescription',course_language='$language',course_level='$level',category='$category',amount='$amount' WHERE course_id='$course_id'";
    $query_run = mysqli_query($connect,$query);
    if($query_run){   
        header("Location:course-edit-delete.php");
    }
    else{
        echo'<script>alert("DATA NOT UPDATED")</script>';
    }
}

if(isset($_POST['deletedata'])){
 
    $course_id = $_POST['delete_id'];
    
    $query="DELETE FROM course WHERE course_id='$course_id'";
    $query_run = mysqli_query($connect,$query);
    if($query_run){   
        header("Location:course-edit-delete.php");
    }
    else{
        echo'<script>alert("DATA NOT UPDATED")</script>';
    }
}

if(isset($_POST['updatelecdata'])){
 
    $lec_id = $_POST['lec_id'];
    $lec_name = $_POST['lecturename'];
    $lec_description = $_POST['lecturedescription'];
    $course_id=$_POST['course_id'];

    $query="UPDATE lecture SET lec_name='$lec_name', lec_description='$lec_description' WHERE lec_id='$lec_id'";
    $query_run = mysqli_query($connect,$query);
    if($query_run){   
        header("Location:lecture-edit-delete.php?id=".$course_id."");
    }
    else{
        echo'<script>alert("DATA NOT UPDATED")</script>';
    }
}

if(isset($_POST['deletelecdata'])){
 
    $lec_id = $_POST['lec_id'];
    $course_id=$_POST['course_id'];
    $query="DELETE FROM lecture WHERE lec_id='$lec_id'";
    $query_run = mysqli_query($connect,$query);
    if($query_run){   
        header("Location:lecture-edit-delete.php?id=".$course_id."");
    }
    else{
        echo'<script>alert("DATA NOT UPDATED")</script>';
    }
}

if(isset($_POST['updateskilldata'])){
 
    $skill_id = $_POST['skill_id'];
    $learn_detail = $_POST['learn_detail'];
    $skill = $_POST['skill'];
    $course_id=$_POST['course_id'];
    $query="UPDATE skillsinfo SET learn_detail='$learn_detail', skills='$skill' WHERE skill_id='$skill_id'";
    $query_run = mysqli_query($connect,$query);
    if($query_run){   
        header("Location:lecture-edit-delete.php?id=".$course_id."");
    }
    else{
        echo'<script>alert("DATA NOT UPDATED")</script>';
    }
}

if(isset($_POST['deleteskilldata'])){
 
    $skill_id = $_POST['skill_id'];
    $course_id=$_POST['course_id'];
    $query="DELETE FROM skillsinfo WHERE skill_id='$skill_id'";
    $query_run = mysqli_query($connect,$query);
    if($query_run){   
        header("Location:lecture-edit-delete.php?id=".$course_id."");
    }
    else{
        echo'<script>alert("DATA NOT UPDATED")</script>';
    }
}

?>