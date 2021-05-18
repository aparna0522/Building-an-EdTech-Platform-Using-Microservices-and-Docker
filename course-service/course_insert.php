<?php
include('dbconn.php');
$course_data = json_decode(file_get_contents("php://input"));
$message='';
$error='';
$find_course_id = array();
$course_data_arr= (array)$course_data;
if(count($course_data_arr)>0)
{
    $coursetitle =mysqli_real_escape_string($connect,$course_data->coursetitle);
    $coursesubtitle=  mysqli_real_escape_string($connect,$course_data->coursesubtitle);
    $coursedescription = mysqli_real_escape_string($connect,$course_data->coursedescription); 
    $language = mysqli_real_escape_string($connect,$course_data->language);
    $level = mysqli_real_escape_string($connect,$course_data->level);
    $category = mysqli_real_escape_string($connect,$course_data->category);
    $img_url = $course_data->course_image;
    $amount= floatval( $course_data->amount);
    $query="INSERT INTO course(coursetitle,coursesubtitle,coursedescription,course_language,course_level,category,course_image,amount)VALUES('".$coursetitle."','".$coursesubtitle."','".$coursedescription."','$language','$level','$category','".$img_url."','$amount')";
  
    if(mysqli_query($connect,$query))
    {
        
        $courseid_query= "SELECT course_id FROM course WHERE course_image LIKE '%".$img_url."%'";
        if($result_course_id=mysqli_query($connect,$courseid_query))
        {
           $course_info = mysqli_fetch_assoc($result_course_id);
           $find_course_id= $course_info['course_id'];     
        }
        $message = 'Course information has been created successfully you may proceed.';
    }
    else
    {
        $error= mysqli_error($connect);
    }
    $output= array(
        'courseid' =>$find_course_id,
        'message'=>$message,
        'error'=>$error
    );
    header('Content-Type:application/json');
    echo json_encode($output);     
}

?>
