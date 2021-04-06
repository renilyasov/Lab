<?php
require "../db.php";
$data=$_POST;
?>

<html>
    <head> <title> База данных предмета </title> </head>

    <h2>Список предметов:</h2>

<?
    if ($subject=R::find('subjects')) {

?>

    <table border="1">
        <tr>
            <th> Название предмета </th> <th> ФИО преподавателя </th><th> Редактирование </th><th> Удаление </th>
        </tr>
        <?php

            // Запрос на выборку сведений о пользователях
            $q_subjects = R::getAll("SELECT * FROM subjects");

            foreach ($q_subjects as $r_subjects) {

                    $name = $r_subjects['name'];
                    $fio = $r_subjects['fio'];
                    $id=$r_subjects['id'];

                    echo "<tr>";
                    echo "<td>$name</td><td>$fio</td>";
                    echo "<td><a href='edit.php?id=$id'>Редактировать</a></td>";
                    echo "<td><a href='delete.php?id=$id'>Удалить</a></td>";
                    echo "</tr>";
                }
                print "</table>";


    }else{

        echo "Данные отсутствуют";
    }
        ?>
        <form class="" action="reg_subjects.php" method="post">

              <p><strong>Название предмета</strong></p>
              <input type="text" name="name">
            <br>

              <p><strong>ФИО преподавателя</strong></p>
              <input type="text" name="FIO">
            <br>

            <p><button type="submit" name="do_add">Добавить</button></p>
        </form>
        <a href='../index.php'> Вернуться в меню </a>
</html>
