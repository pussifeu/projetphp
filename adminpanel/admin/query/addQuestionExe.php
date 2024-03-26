<?php
include("../../../conn.php");

extract($_POST);

$selQuest = $conn->query("SELECT * FROM qcm WHERE exam_id='$examId' AND question='$question' ");
if ($selQuest->rowCount() > 0) {
    $res = array("res" => "exist", "msg" => $question);
} else {
    $insQuest = $conn->query("INSERT INTO qcm(exam_id,question,reponse1,reponse2,reponse3,reponse4,exam_answer) VALUES('$examId','$question','$choice_A','$choice_B','$choice_C','$choice_D','$correctAnswer') ");

    if ($insQuest) {
        $res = array("res" => "success", "msg" => $question);
    } else {
        $res = array("res" => "failed");
    }
}
echo json_encode($res);
?>