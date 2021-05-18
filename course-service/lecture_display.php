<?php

include('dbconn.php');
$output = array();
$query = "SELECT * FROM course NATURAL JOIN lecture NATURAL JOIN skillsinfo";
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