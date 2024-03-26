<?php
session_start();
include("../conn.php");
include("../sendmail.php");
extract($_POST);

$exmne_id = $_SESSION['examineeSession']['num_etudiant'];


$selExAttempt = $conn->query("SELECT * FROM exam_attempt WHERE num_etudiant='$exmne_id' AND exam_id='$exam_id'  ");

$selAns = $conn->query("SELECT * FROM exam_answers WHERE axmne_id='$exmne_id' AND exam_id='$exam_id' ");


if ($selExAttempt->rowCount() > 0) {
    $res = array("res" => "alreadyTaken");
} else if ($selAns->rowCount() > 0) {
    $updLastAns = $conn->query("UPDATE exam_answers SET exans_status='old' WHERE axmne_id='$exmne_id' AND exam_id='$exam_id'  ");
    if ($updLastAns) {
        foreach ($_REQUEST['answer'] as $key => $value) {
            $value = $value['correct'];
            $insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
        }
        if ($insAns) {
            $insAttempt = $conn->query("INSERT INTO exam_attempt(num_etudiant,exam_id)  VALUES('$exmne_id','$exam_id') ");
            if ($insAttempt) {
                $info = getInformationUsers($conn, $exam_id, $exmne_id);
                $result = sendEmail($info['email'],  $info['score'], $info['limitquest'] , $info['fullname'] , number_format($info['percent'] ,2), $info['examenTitle']);
                $res = array("res" => "success");
            } else {
                $res = array("res" => "failed");
            }
        } else {
            $res = array("res" => "failed");
        }
    }
} else {

    foreach ($_REQUEST['answer'] as $key => $value) {
        $value = $value['correct'];
        $insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
    }
    if ($insAns) {
        $insAttempt = $conn->query("INSERT INTO exam_attempt(num_etudiant,exam_id)  VALUES('$exmne_id','$exam_id') ");
        if ($insAttempt) {
            $info = getInformationUsers($conn, $exam_id, $exmne_id);
            $result = sendEmail($info['email'],  $info['score'], $info['limitquest'] , $info['fullname'] , number_format($info['percent'] ,2), $info['examenTitle']);
            $res = array("res" => "success");
        } else {
            $res = array("res" => "failed");
        }
    } else {
        $res = array("res" => "failed");
    }


}


echo json_encode($res);
function getInformationUsers($conn, $exam_id, $num_etudiant) {
    $selExmne = $conn->query("SELECT et.*, e.*  FROM etudiant et  INNER JOIN exam_attempt ea ON et.num_etudiant = ea.num_etudiant INNER JOIN examen e ON e.num_exam=ea.exam_id WHERE e.num_exam = '$exam_id' AND et.num_etudiant = '$num_etudiant' ");
    $selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC);
    $selScore = $conn->query("SELECT * FROM qcm eqt INNER JOIN exam_answers ea ON eqt.num_quest = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$num_etudiant' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
    $info['score'] = $selScore->rowCount();
    $info['limitquest'] = $selExmneRow['ex_questlimit_display'];
    $info['fullname'] = $selExmneRow['exmne_fullname'];
    $info['email'] = $selExmneRow['adr_email'];
    $info['percent'] = $selScore->rowCount() / $selExmneRow['ex_questlimit_display'] * 100;
    $info['examenTitle'] = $selExmneRow['ex_title'];
    return $info;
}
?>


 