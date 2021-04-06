<?
require "../db.php";
?>
<html>
    <head> <title> Зачётная ведомость </title> </head>

    <h2> Список ведомостей: </h2>

<?
    if ($credit_report=R::find('credit_report')) {

?>

    <table border="1">
        <tr>
            <th> Дата сдачи зачёта </th>
            <th> Студент </th>
            <th> Предмет </th> <th> Оценка </th>
        </tr>
        <?php

            // Запрос на выборку сведений о пользователях
            $q_credit_report = R::getAll("SELECT credit_report.id, credit_report.date_delivery,
                students.fio as fio, subjects.name as subject, credit_report.mark FROM credit_report
                LEFT JOIN students ON credit_report.name_student=students.id
                LEFT JOIN subjects ON credit_report.name_subject=subjects.id"
            );

            $counter=0;

            foreach ($q_credit_report as $r_credit_report) {

                    $id = $r_credit_report['id'];
                    $date_delivery = $$r_credit_report['date_delivery'];
                    $fio = $r_credit_report['fio'];
                    $subject = $r_credit_report['subject'];
                    $mark = $r_credit_report['mark'];

                    $date_delivery = date('d.m.Y', strtotime($date_delivery));

                    echo "<tr>";
                    echo "<td>$date_delivery</td><td>$fio</td><td>$subject</td><td>$mark</td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";

                    $counter++;

            }
            print "</table>";
            print("<p>Всего ведомостей: $counter </p>");
        }else{

            echo "Данные отсутствуют <br><br>";
        }

        ?>
    <button style='color: black' onclick="window.location.href='new.php'">Добавить ведомость</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>
