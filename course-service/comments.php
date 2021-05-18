<?php
include('dbconn.php');

$comment_data = json_decode(file_get_contents("php://input"));
$message='';
$error='';
$comment_data_arr= (array)$comment_data;
if(count($comment_data_arr)>0)
{
    if(isset($comment_data->course_id)){
        $course_id = intval($comment_data->course_id);
        $user_id= mysqli_real_escape_string($connect, $comment_data->user_id);
        $username = mysqli_real_escape_string($connect,$comment_data->username);
        $comment = mysqli_real_escape_string($connect,$comment_data->comment); 
        $query="INSERT INTO comments(course_id,username,comment,createdOn,user_id) VALUES('". $course_id ."','". $username ."','". $comment ."',NOW(),'".$user_id."')";

        if(mysqli_query($connect,$query))
        {        
            $message="Success";
        }
        else
        {
            $error= mysqli_error($connect);
        }
    }
    else{
        $comment_id = intval($comment_data->comment_id);
        $user_id= mysqli_real_escape_string($connect, $comment_data->user_id);
        $username = mysqli_real_escape_string($connect,$comment_data->username);
        $reply = mysqli_real_escape_string($connect,$comment_data->reply); 
        $query="INSERT INTO replies(comment_id,user_id,username,reply,createdOn) VALUES('". $comment_id ."','".$user_id."','". $username ."','". $reply ."',NOW())";

        if(mysqli_query($connect,$query))
        {        
            $message="Success";
        }
        else
        {
            $error= mysqli_error($connect);
        }
    }
    $output= array(
        'message'=>$message,
        'error'=>$error
    );
    header('Content-Type:application/json');
    echo json_encode($output);    
}    