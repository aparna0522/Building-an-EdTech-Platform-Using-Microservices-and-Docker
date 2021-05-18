<?php

include('dbconn.php');
$lec_data = json_decode(file_get_contents("php://input"));
$message='';
$error='';
$lec_data_arr= (array)$lec_data;
if(count($lec_data_arr)>0)
{
    $courseid= intval($lec_data->course_id);
    $lecturename = mysqli_real_escape_string($connect,$lec_data->lecturename);
    $lecturedescription = mysqli_real_escape_string($connect,$lec_data->lecturedescription);
    $videourl = $lec_data->video; 
    // $query="INSERT INTO lecture(course_id,lec_name,lec_description,video)VALUES('$courseid','".$lecturename."','".$lecturedescription."','".$videourl."')";
    $lecquery="INSERT INTO lecture(course_id,lec_name,lec_description,video)VALUES('$courseid','$lecturename','$lecturedescription','".$videourl."')";
    if(mysqli_query($connect,$lecquery))
    {
        $lecid_query= "SELECT lec_id , lec_name FROM lecture WHERE video LIKE '%".$videourl."%'";
        if($result_lec_id=mysqli_query($connect,$lecid_query))
        {
           $lec_info = mysqli_fetch_assoc($result_lec_id);
           $find_lec_id= $lec_info['lec_id'];
           $find_lec_name = $lec_info['lec_name'];     
        }
        $message = 'Your lecture has been created successfully you may proceed or add one more lecture.';

    }
    else
    {
        $error= mysqli_error($connect);
    }
    $output= array(
        'lec_id'=>$find_lec_id,
        'lec_name'=>$find_lec_name,
        'message'=>$message,
        'error'=>$error
    );
    header('Content-Type:application/json');
    echo json_encode($output);     
}

?>