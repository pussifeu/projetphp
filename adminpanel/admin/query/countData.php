<?php

//Totale anle course
$selCourse = $conn->query("SELECT COUNT(cou_id) as totCourse FROM course_tbl ")->fetch(PDO::FETCH_ASSOC);

// Totale anle examen
$selExam = $conn->query("SELECT COUNT(num_exam) as totExam FROM examen ")->fetch(PDO::FETCH_ASSOC);

// Totale anle etudiant
$selEtud = $conn->query("SELECT COUNT(num_etudiant) as totEtud FROM etudiant ")->fetch(PDO::FETCH_ASSOC);


?>