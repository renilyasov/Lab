<?php
  require '../db.php';
  $data=$_POST
 ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Изменение данных предмета</title>
  </head>
  <body>

<?php

    $q_subjects = R::getAll("SELECT * FROM subjects");

    foreach ($q_subjects as $r_subjects) {
            $name = $r_subjects['name'];
            $fio = $r_subjects['fio'];
            $id=$r_subjects['id'];
        }

//Изменение названия
    if (isset($data['change_name'])) {

        if ($data['name']=='') {

            $errors[]='Введите новое название';
        }

        if ($data['name']==$name) {

            $errors[]='Такое название уже стоит';
        }

        if(empty($errors)){

            echo 'Вы успешно изменили название предмета';
            $query=R::exec("UPDATE subjects SET name='$data[name]' WHERE id=$id");
            $name=$data['name'];
        }else {

            echo array_shift($errors);
    }
}

//Изменение ФИО
if (isset($data['change_fio'])) {

    if ($data['fio']=='') {

        $errors[]='Введите ФИО преподавателя';
    }

    if ($data['fio']==$fio) {

        $errors[]='Такое ФИО преподавателя уже стоит';
    }

    if(empty($errors)){

        echo 'Вы успешно изменили ФИО преподавателя';
        $query=R::exec("UPDATE subjects SET fio='$data[fio]' WHERE id=$id");
        $fio=$data['fio'];
    }else {

        echo array_shift($errors);
    }
}

?>
<form class="" action="" method="post">
  <p>
  <input type="text" name="name"  value='<?=$name?>'>
  <button type="submit" name="change_name">Изменить название предмета</button>
  </p>
  <p>
  <input type="text" name="fio" value='<?=$fio?>'>
  <button type="submit" name="change_fio">Изменить ФИО</button>
  </p>
</form>

<p><a href="../subjects/subjects.php">Назад к сведениям</a></p>
</body>
</html>
