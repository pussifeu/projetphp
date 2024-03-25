<?php 
 include("../../../conn.php");


extract($_POST);

$delExam = $conn->query("DELETE  FROM examen WHERE num_exam='$id'  ");
if($delExam)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>