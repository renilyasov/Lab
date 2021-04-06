<?php
    require "../db.php";

    $id = $_GET['id'];

    $date_delivery = $_GET['date_delivery'];
    $id_student = $_GET['id_student'];
    $id_subject = $_GET['id_subject'];
    $mark = $_GET['mark'];

    $result = R::exec("UPDATE credit_report
        SET date_delivery='$date_delivery',
        name_student='$id_student',
        name_subject='$id_subject',
        mark='$mark'
        WHERE id='$id'"
    );

    header("Location: credit_report.php");
    exit;
?>
