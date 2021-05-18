<?php
    include('dbconn.php');
    $response = array(); // response to client
    define ('FILE_ROOT', realpath(dirname(__FILE__) . '/..'));
    for($a = 0; $a < count((array)$_FILES["document"]["name"]); $a++) {
        if(is_uploaded_file($_FILES["document"]["tmp_name"][$a]) && @$_POST["course_id"] && @$_POST["lec_id"]) {
            $tmp_file = $_FILES["document"]["tmp_name"][$a];
            $doc_name = $_FILES["document"]["name"][$a];
            // $path = "/var/www/html/uploads/". basename($doc_name);
            $path=FILE_ROOT."/uploads/".basename($doc_name);
            $sql = "INSERT INTO documents(course_id,lec_id,document) VALUES('{$_POST['course_id']}','{$_POST['lec_id']}','{$doc_name}')";
            if(move_uploaded_file($tmp_file,$path) && mysqli_query($connect,$sql)) {
                $response["message"] = "Document uploaded successfully. Proceed with next lecture.";
                $response["status"] = 200;
            }
            else {
                $response["error"] ="UPLOAD FAILED";
                $response["status"] = 404;
            }
        }
        else {
            $response["error"] = "INVALID REQUEST";
            $response["status"] = 400;
        }
    }
    echo json_encode($response);
?>