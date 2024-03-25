<?php 
$exmneId = $_SESSION['examineeSession']['num_etudiant'];


$selExmneeData = $conn->query("SELECT * FROM etudiant WHERE num_etudiant='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['exmne_course'];
 
$selExam = $conn->query("SELECT * FROM examen WHERE cou_id='$exmneCourse' ORDER BY num_exam DESC ");




 ?>