<?php
    include('dbconn.php');
    $category=$_GET['category'];
    $output=array();

    $query="SELECT * FROM `course` WHERE course_id IN (SELECT course_id FROM lecture) AND category='$category'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $output[] = $row;
        }
        header('Content-type:application/json');
        echo json_encode($output);
    }
?>