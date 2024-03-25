<?php
 include("../../../conn.php");
 extract($_POST);


$updCourse = $conn->query("UPDATE qcm SET question='$question', reponse1='$exam_ch1', reponse2='$exam_ch2', reponse3='$exam_ch3', reponse4='$exam_ch4' WHERE num_quest='$question_id' ");
if($updCourse)
{
	   $res = array("res" => "success");
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>