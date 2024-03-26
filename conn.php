<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "exame_db";
    $conn = null;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>

