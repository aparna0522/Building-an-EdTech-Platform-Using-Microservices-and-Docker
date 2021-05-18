<?php
include('dbconn.php');

$course_id=$_GET['course_id'];
$course = array();
$lecture= array();
$skills=array();
$output = array();

$course_query= "SELECT * FROM course WHERE course_id='$course_id'";
$course_result = mysqli_query($connect,$course_query);
if(mysqli_num_rows($course_result)>0)
{
    while($course_row = mysqli_fetch_array($course_result,MYSQLI_ASSOC))
    {
        $course[] = $course_row;
    }
}
$lec_query= "SELECT lec_id,lec_name,lec_description FROM lecture WHERE course_id='$course_id'";
$lec_result = mysqli_query($connect,$lec_query);
if(mysqli_num_rows($lec_result)>0)
{
    while($lec_row = mysqli_fetch_array($lec_result,MYSQLI_ASSOC))
    {
        $lecture[] = $lec_row;
    }
}
$skill_query= "SELECT * FROM skillsinfo WHERE course_id='$course_id'";
$skill_result = mysqli_query($connect,$skill_query);
if(mysqli_num_rows($skill_result)>0)
{
    while($skill_row = mysqli_fetch_array($skill_result,MYSQLI_ASSOC))
    {
        $skills[] = $skill_row;
    }
}


foreach($course as $x=>$val){
    $output['course'][$x]=$val;
}
foreach($lecture as $x=>$val){
    $output['lecture'][$x]=$val;
}
foreach($skills as $x=>$val){
    $output['skills'][$x]=$val;
}

header('Content-type:application/json');
echo json_encode($output);
?>