<?php
include('dbconn.php');
$message='';
$error='';
$enrollment_data = json_decode(file_get_contents("php://input"));
if(count((array)$enrollment_data)>0){

    $userid = mysqli_real_escape_string($connect,$enrollment_data->userid);
    $username =  mysqli_real_escape_string($connect,$enrollment_data->username);
    $courseid=intval($enrollment_data->courseid);
    $query="INSERT INTO enrollment(user_id,course_id,username)VALUES('".$userid."','".$courseid."','".$username."')";
    if(mysqli_query($connect,$query))
    {
        $message = 'Enrolled Successfully';
    }
    else
    {
        $error= mysqli_error($connect);
    }
    $output= array(
        'message'=>$message,
        'error'=>$error
    );
    header('Content-Type:application/json');
    echo json_encode($output);   

}



?>