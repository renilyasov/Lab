<?php

    require "../db.php";

    $id = $_GET['id'];

    $result = R::exec("DELETE FROM subjects WHERE id='$id'");

    header("Location: subjects.php");
    exit;
?>
