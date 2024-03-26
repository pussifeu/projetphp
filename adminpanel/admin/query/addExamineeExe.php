<?php
include("../../../conn.php");


extract($_POST);

$selExamineeFullname = $conn->query("SELECT * FROM etudiant WHERE exmne_fullname='$fullname' ");
$selExamineeEmail = $conn->query("SELECT * FROM etudiant WHERE adr_email='$email' ");


$exCourse = $string = implode(",", $course);
if ($gender == "0") {
    $res = array("res" => "noGender");
} else if ($course == "0") {
    $res = array("res" => "noCourse");
} else if ($year_level == "0") {
    $res = array("res" => "noLevel");
} else if ($selExamineeFullname->rowCount() > 0) {
    $res = array("res" => "fullnameExist", "msg" => $fullname);
} else if ($selExamineeEmail->rowCount() > 0) {
    $res = array("res" => "emailExist", "msg" => $email);
} else {
    $insData = $conn->query("INSERT INTO etudiant(num_etudiant,exmne_fullname,exmne_course,exmne_gender,exmne_birthdate,niveau,adr_email,exmne_password) VALUES('$number','$fullname','$exCourse','$gender','$bdate','$year_level','$email','$password')  ");
    if ($insData) {
        $res = array("res" => "success", "msg" => $email);
    } else {
        $res = array("res" => "failed");
    }
}

echo json_encode($res);
?>
