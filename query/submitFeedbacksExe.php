<?php 
	session_start();
 include("../conn.php");
 extract($_POST);


$exmneSess = $_SESSION['examineeSession']['num_etudiant'];

 $selMyFeedbacks = $conn->query("SELECT * FROM feedbacks_tbl WHERE num_etudiant='$exmneSess' ");

 if($selMyFeedbacks->rowCount() >= 3)
 {
 	$res = array("res" => "limit");
 }
 else
 {
 	$date = date("F d, Y");
 	$insFedd = $conn->query("INSERT INTO feedbacks_tbl(num_etudiant,fb_exmne_as,fb_feedbacks,fb_date) VALUES('$exmneSess','$asMe','$myFeedbacks','$date') ");

 	if($insFedd)
 	{
 		$res = array("res" => "success");
 	}
 	else
 	{
 		$res = array("res" => "failed");
 	}
 }


 echo json_encode($res);
 ?>