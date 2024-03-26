<?php
    include("../../../conn.php");
    extract($_POST);
    $exCourse = $string = implode(",", $exCourse);
    $updCourse = $conn->query("UPDATE etudiant SET num_etudiant='$exNumber', exmne_fullname='$exFullname', exmne_course='$exCourse', exmne_gender='$exGender', exmne_birthdate='$exBdate', niveau='$exYrlvl', adr_email='$exEmail', exmne_password='$exPass' WHERE num_etudiant='$exmne_id' ");
    if ($updCourse) {
        $res = array("res" => "success", "exFullname" => $exFullname);
    } else {
        $res = array("res" => "failed");
    }

    echo json_encode($res);

?>