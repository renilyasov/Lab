<?php
    require_once('php_excel/Classes/PHPExcel.php');
    require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');

    $mysqli = new mysqli("localhost", "f0529608_renat", "renat", "f0529608_renat");
    if ($mysqli->connect_errno){
        echo "Не удалось подключиться к БД";
    }

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

    $xls = new PHPExcel();
    // Устанавливаем индекс активного листа
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Ведомости');
    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", 'Ведомости');
    $sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
    // Объединяем ячейки
    $sheet->mergeCells('A1:I1');
    // Выравнивание текста
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $c = 0;
    $header = array("п/п","Студент","Факультет","Группа","Номер зачётки","Предмет","Преподаватель","Дата сдачи зачёта","Оценка");
    foreach ($header as $h){
        $sheet->setCellValueByColumnAndRow($c,2,$h);
        // Применяем выравнивание
        $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
        $c++;
    }

    if ($result){
        $r = 3;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $c = 0;

            $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
            $c++;

            foreach ($row as $cell){
                if ($c==7){
                    $cell = date('d.m.Y', strtotime($cell));
                }
                $sheet->setCellValueByColumnAndRow($c,$r,$cell);
                $c++;
            }
            $r++;
        }
    }
    header('Content-Type: application/xls');
    header('Content-Disposition: inline; filename=Students.xls');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
?>
