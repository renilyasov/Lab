<?php
require "../db.php";

$data=$_POST;
?>

<html>
    <head> <title> База данных студентов </title> </head>

    <h2>Список студентов:</h2>

<?
    if($students=R::find('students')){
?>

    <table border="1">
        <tr>
            <th> ФИО </th> <th> Факультет </th> <th> Группа </th>
            <th> Номер зачётки </th> <th> Телефон </th> <th> Редактирование </th> <th> Удаление </th>
        </tr>
        <?php

            // Запрос на выборку сведений о пользователях
            $q_student = R::getAll("SELECT * FROM students");

            foreach($q_student as $r_student) {
                $FIO = $r_student['fio'];
                $faculty = $r_student['faculty'];
                $group = $r_student['group'];
                $num = $r_student['num'];
                $mobile = $r_student['mobile'];
                $id=$r_student['id'];

                echo "<tr>";
                echo "<td>$FIO</td><td>$faculty</td><td>$group</td><td>$num</td><td>$mobile</td>";
                echo "<td><a href='edit.php?id=$id'>Редактировать</a></td>";
                echo "<td><a href='delete.php?id=$id'>Удалить</a></td>";
                echo "</tr>";
            }
        print "</table>";
        }else{

            echo "Данные отсутствуют";
        }
        ?>
    <form class="" action="reg_students.php" method="post">

          <p><strong>ФИО</strong></p>
          <input type="text" name="FIO">
        <br>

          <p><strong>Факультет</strong></p>
          <input type="text" name="faculty">
        <br>

          <p><strong>Группа</strong></p>
          <input type="text" name="group">
        <br>

          <p><strong>Номер зачётки</strong></p>
          <input type="text" name="num">
        <br>

          <p><strong>Телефон</strong></p>
          <input type="text" name="mobile">

        <p><button type="submit" name="do_add">Добавить</button></p>
    </form>

<a href='../index.php'> Вернуться в меню </a>

</html>
