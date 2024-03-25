<?php 
include("../../../conn.php");

extract($_POST);

$delStudent = $conn->query("DELETE FROM etudiant WHERE num_etudiant ='$id' ");  
if($delStudent)
{
    $res = array("res" => "success");
}
else
{
    $res = array("res" => "failed");
}

echo json_encode($res);
?>
