<?php

include('dbconn.php');
$output = array();
$query1 =mysqli_query($connect,"SET @current_category:=NULL");
$query2 =mysqli_query($connect,"SET @category_rank:=0");
$query ="SELECT course_id,coursetitle,coursesubtitle,coursedescription,course_level,amount,course_language,course_image FROM (SELECT course_id,coursetitle,coursesubtitle,coursedescription,course_level,amount,course_language,course_image, @category_rank := IF(@current_category = category, @category_rank + 1, 1) AS category_rank, @current_category := category FROM course WHERE course_id IN (SELECT course_id FROM lecture) ORDER BY category ASC ) ranked WHERE category_rank <= 2";
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
