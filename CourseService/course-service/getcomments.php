<?php
include('dbconn.php');
$course_id = $_GET['course_id'];
$ncomments=0;
$output=[];
if($sqlncomment = mysqli_query($connect,"SELECT * FROM comments WHERE course_id='$course_id' ORDER BY comment_id DESC")){
    $ncomments=mysqli_num_rows($sqlncomment);
    while($row = mysqli_fetch_all($sqlncomment,MYSQLI_ASSOC))
    {
        foreach($row as $x){
            $x['reactions']=getRating($x['comment_id']);
            $x['usersliked']= userliked($x['comment_id']);
            $x['usersdisliked'] = userdisliked($x['comment_id']);
            $x['replies'] = replies($x['comment_id']);
            $output['comments'][]=$x;
        }  
    }  
}
function replies($comment_id){
    global $connect;
    $replies = array();
    $result= mysqli_query($connect,"SELECT * FROM replies WHERE comment_id='$comment_id'");
    while($row=mysqli_fetch_all($result,MYSQLI_ASSOC)){
        $replies=$row;
    } 
    return $replies;
}

function getRating($comment_id){
    global $connect;
    $rating = array();
    $likes=0;
    $dislikes=0;
    $likes_rs = mysqli_query($connect,"SELECT * FROM rating_info WHERE comment_id='$comment_id' AND rating_action = 'like'");
    $likes = mysqli_num_rows($likes_rs);
    $dislike_rs = mysqli_query($connect,"SELECT * FROM rating_info WHERE comment_id='$comment_id' AND rating_action = 'dislike'");
    $dislikes = mysqli_num_rows($dislike_rs);
    $rating['likes']=$likes;
    $rating['dislikes']=$dislikes;
    return $rating;
}

function userliked($comment_id){
    global $connect;
    $user = array();
    $sql="SELECT user_id from rating_info WHERE comment_id='$comment_id' AND rating_action='like'";
    $result= mysqli_query($connect,$sql);
    while($row=mysqli_fetch_all($result,MYSQLI_ASSOC)){
        foreach($row as $z){
            $user=$z;
        }
    } 
    return $user;
}
function userdisliked($comment_id){
    global $connect;
    $user = array();
    $sql="SELECT user_id from rating_info WHERE comment_id='$comment_id' AND rating_action='dislike'";
    $result= mysqli_query($connect,$sql);
    while($row=mysqli_fetch_all($result,MYSQLI_ASSOC)){
        foreach($row as $z){
            $user=$z;
        }
    } 
    return $user;
}

header('Content-type:application/json');
$output['ncomments']=$ncomments;
echo json_encode($output);

