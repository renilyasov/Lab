<?php
    require "../db.php";
?>

<html>
    <head> <title> Добавление ведомости </title> </head>
    <body>
        <h4>Добавление новой ведомости</h4>

        <form action="save_new.php" method="post">

            Дата сдачи зачёта: <input name="date_delivery" size="50" placeholder="dd.mm.yyyy" type="date">

            <?php

                // Получение данных об играх
                $q_students = R::getAll("SELECT id, fio FROM students");
                echo "<br>Студент: <select name='name_student'>";

                    foreach ($q_students as $r_students) {

                        $id = $r_students['id'];
                        $fio = $r_students['fio'];

                        echo "<option value='$id'>$fio</option>";
                    }

                echo "</select>";

                // Получение данных о магазинах
                $q_subjects = R::getAll("SELECT id, name FROM subjects");
                echo "<br>Предмет: <select name='name_subject'>";

                    foreach ($q_subjects as $r_subjects) {

                        $id = $r_subjects['id'];
                        $name = $r_subjects['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                echo "</select>";
            ?>
            <br>Оценка: <input name="mark" size="30" type="text">
            <p>
                <input name="add" type="submit" value="Добавить">
            </p>
        </form>
        <p><button style='color: black' onclick="window.location.href='credit_report.php'">Вернуться к списку</button></td></p>
    </body>
</html>
