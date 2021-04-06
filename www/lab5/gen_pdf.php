<?php
    require('tfpdf/tfpdf.php');

    $mysqli = new mysqli("localhost", "f0529608_renat", "renat", "f0529608_renat");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $pdf = new tFPDF();
    $pdf->AddFont('PDFFont','','pixel.ttf');
    $pdf->SetFont('PDFFont','',12);
    $pdf->AddPage();

    $pdf->Cell(80);
    $pdf->Cell(30,10,'Студенты',1,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(200,200,200);
    $pdf->SetFontSize(6);

    $header = array("п/п","Студент","Факультет","Группа","Номер зачётки","Предмет","Преподаватель","Дата сдачи зачёта","Оценка");
    $w = array(6,37,20,20,20,20,37,20,20);
    $h = 10;
    for ($c = 0; $c < 9; $c++){
        $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
    }
    $pdf->Ln();

    // Запрос на выборку сведений о пользователях
    $result = $mysqli->query("SELECT
        students.fio as students_fio,
        students.faculty as students_faculty,
        students.group as students_group,
        students.num as students_num,
        subjects.name as subjects_name,
        subjects.fio as subjects_fio,
        DATE_FORMAT(credit_report.date_delivery, '%d.%m.%Y'),
        credit_report.mark
        FROM credit_report
        LEFT JOIN students ON credit_report.name_student=students.id
        LEFT JOIN subjects ON credit_report.name_subject=subjects.id"
    );

    if ($result){
        $counter = 1;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
            $pdf->Cell($w[1],$h,$row[0],'LRB');

            for ($c = 2; $c < 9; $c++){
                $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
            }
            $pdf->Ln();
            $counter++;
        }
    }

    $pdf->Output("I",'Students.pdf',true);
?>
