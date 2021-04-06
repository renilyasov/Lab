<?php
    require "../db.php";

    $id = $_GET['id'];

    $result = R::exec("DELETE FROM credit_report WHERE id='$id'");

    header("Location: credit_report.php");
    exit;
?>
