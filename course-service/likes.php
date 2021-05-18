<?php
include('dbconn.php');
$likes_data = json_decode(file_get_contents("php://input"));
$output=array();
if(count((array)$likes_data)>0){
    if(isset($likes_data->action)){
        $user_id=$likes_data->user_id;
        $comment_id=$likes_data->comment_id;
        $action= $likes_data->action;
        if($action=="like" &&  mysqli_query($connect,"SELECT user_id from rating_info where user_id='$user_id' AND rating_action='dislike'")){
            $sql="DELETE FROM rating_info where user_id='$user_id' AND comment_id='$comment_id'";
            mysqli_query($connect,$sql);
        }
        if($action=="dislike" &&  mysqli_query($connect,"SELECT user_id from rating_info where user_id='$user_id' AND rating_action='like'")){
            $sql="DELETE FROM rating_info where user_id='$user_id' AND comment_id='$comment_id'";
            mysqli_query($connect,$sql);
        }
        switch($action){
            case "like":
                $sql="INSERT into rating_info(user_id,comment_id,rating_action) Values ('$user_id','$comment_id','like') ON DUPLICATE KEY update rating_action='like'";
                break;
            case "dislike":
                $sql="INSERT into rating_info(user_id,comment_id,rating_action) Values ('$user_id','$comment_id','dislike') ON DUPLICATE KEY update rating_action='dislike'";
                break;
            case "unlike":
                $sql="DELETE FROM rating_info where user_id='$user_id' AND comment_id='$comment_id'";
                break;
            case "undislike":
                $sql="DELETE FROM rating_info where user_id='$user_id' AND comment_id='$comment_id'";
                break; 
            default:
                break;               
        }
            mysqli_query($connect,$sql);
            $output['message'] ="Success";
            echo json_encode($output);
            exit(0);
    }
}


?>