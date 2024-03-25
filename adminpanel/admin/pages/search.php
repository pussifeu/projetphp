<?php
// Inclure votre fichier de connexion à la base de données
include("../../conn.php");
$output = '';

if (isset($_POST['query'])) {
    $search = '%' . $_POST['query'] . '%';
    $stmt = $conn->prepare("SELECT * FROM etudiant WHERE num_etudiant LIKE :search OR exmne_fullname LIKE :search");
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
} else {
    $stmt = $conn->prepare("SELECT * FROM etudiant");
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = "<thead>
            <tr>
                <th>Number</th>   
                <th>Fullname</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Course</th>
                <th>Level</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th></th>
            </tr>
         </thead>
         <tbody>";

foreach ($result as $selExmneRow) {
    $output .= "
        <tr>
            <td>{$selExmneRow['num_etudiant']}</td>
            <td>{$selExmneRow['exmne_fullname']}</td>
            <td>{$selExmneRow['exmne_gender']}</td>
            <td>{$selExmneRow['exmne_birthdate']}</td>
            <td>";

    // Récupérer le nom du course
    $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='{$selExmneRow['exmne_course']}'")->fetch(PDO::FETCH_ASSOC);
    if ($selCourse) {
        $output .= $selCourse['cou_name'];
    } else {
        $output .= "N/A";
    }

    $output .= "</td>
            <td>{$selExmneRow['niveau']}</td>
            <td>{$selExmneRow['adr_email']}</td>
            <td>{$selExmneRow['exmne_password']}</td>
            <td>{$selExmneRow['exmne_status']}</td>
            <td>
                <a rel='facebox' href='facebox_modal/updateExaminee.php?id={$selExmneRow['num_etudiant']}' class='btn btn-sm btn-primary'>Update</a>
                <button type='button' class='btn btn-danger btn-sm deleteStud' data-id='{$selExmneRow['num_etudiant']}'>Delete</button>
            </td>
        </tr>";
}
$output .= "</tbody>";
echo $output;

$stmt->closeCursor(); // Fermer le curseur pour libérer les ressources
$conn = null; // Fermer la connexion
?>
