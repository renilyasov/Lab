<?php
    require "../db.php";

    $id = $_GET['id'];

    $result = R::exec("DELETE FROM students WHERE id='$id'");

    header("Location: student.php");
    exit;
?>
