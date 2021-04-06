<?
    require "../db.php";
?>

<html>
    <head> <title> Редактирование данных ведомости </title> </head>
    <body>
        <form action='save_edit.php' method='get'>

            <?php

                $key_id = $_GET['id'];
                $q_credit_report = R::getAll("SELECT credit_report.id, credit_report.date_delivery,
                                                students.fio as fio, students.id as id_student,
                                                subjects.name as subject, subjects.id as id_subject,
                                                credit_report.mark
                                                FROM credit_report
                                                LEFT JOIN students ON credit_report.name_student=students.id
                                                LEFT JOIN subjects ON credit_report.name_subject=subjects.id
                                                WHERE credit_report.id=$key_id");


              foreach ($q_credit_report as $r_credit_report) {

                  $date_delivery = $r_credit_report['date_delivery'];
                  $fio = $r_credit_report['fio'];
                  $subject = $r_credit_report['subject'];
                  $id_student=$r_credit_report['id_student'];
                  $id_subject=$r_credit_report['id_subject'];
                  $mark = $r_credit_report['mark'];
              }

                // Создание формы
                print "Дата приобретения: <input name='date_delivery' size='50' type='date' placeholder='dd-mm-yyyy' value='$date_delivery'>";

                // Получение данных об играх
                $q_students=R::getAll("SELECT id, fio FROM students WHERE id=$id_student");

                echo "<br>Студент: <select name='id_student'>";

                foreach ($q_students as $r_students) {

                        $id = $r_students['id'];
                        $fio = $r_students['fio'];

                        echo "<option value='$id'>$fio</option>";
                    }

                echo "</select>";

                $q_subjects = R::getAll("SELECT id, name FROM subjects WHERE id=$id_subject");
                echo "<br>Предмет: <select name='id_subject'>";

                foreach ($q_subjects as $r_subjects) {

                        $id = $r_subjects['id'];
                        $name = $r_subjects['name'];

                        echo "<option value='$id'>$name</option>";
                    }

                echo "</select>";

                print "<br>Оценка: <input name='mark' size='30' type='text' value='$mark'>";
                print "<input type='hidden' name='id' size='30' value='$key_id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: black' onclick="window.location.href='credit_report.php'">Вернуться к списку</button></td></p>
    </body>
</html>
