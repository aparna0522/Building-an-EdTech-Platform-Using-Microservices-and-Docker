<?php

include('dbconn.php');
$skill_data = json_decode(file_get_contents("php://input"));
$message='';
$error='';
$skill_data_arr= (array)$skill_data;
if(count($skill_data_arr)>0)
{
    $courseid= intval($skill_data->course_id);
    $learn_detail = mysqli_real_escape_string($connect,$skill_data->learn_detail);
    $skill = mysqli_real_escape_string($connect,$skill_data->skill);
    $query="INSERT INTO skillsinfo(course_id,learn_detail,skills)VALUES('$courseid','".$learn_detail."','".$skill."')";
    if(mysqli_query($connect,$query))
    {
        $message = 'Congratulations!! You have successfully created the course.';
    }
    else
    {
        $error= 'Something went wrong';
    }
    $output= array(
        'message'=>$message,
        'error'=>$error
    );
    header('Content-Type:application/json');
    echo json_encode($output);     
}

?>