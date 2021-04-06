<?php
  require '../db.php';
  $data=$_POST
 ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Изменение данных студента</title>
  </head>
  <body>

<?php

    $q_student = R::getAll("SELECT * FROM students");

        foreach ($q_student as $r_student) {

            $fio = $r_student['fio'];
            $faculty = $r_student['faculty'];
            $group = $r_student['group'];
            $num = $r_student['num'];
            $mobile = $r_student['mobile'];
            $id=$r_student['id'];
        }
//Изменение названия
    if (isset($data['change_fio'])) {
        if ($data['fio']=='') {

          $errors[]='Введите новое ФИО';
      }

        if ($data['fio']==$fio) {

          $errors[]='Такие данные уже стоят';
      }

        if(empty($errors)){

          echo 'Вы успешно изменили ФИО';
          $query=R::exec("UPDATE students SET fio='$data[fio]' WHERE id=$id");
          $fio=$data['fio'];

      }else {

          echo array_shift($errors);
    }
}

//Изменение факультета
if (isset($data['change_faculty'])) {

    if ($data['faculty']=='') {

        $errors[]='Введите факультет';
  }

    if ($data['faculty']==$faculty) {

        $errors[]='Такой факультет уже стоит';
  }

    if(empty($errors)){

        echo 'Вы успешно факультет';
        $query=R::exec("UPDATE students SET faculty='$data[faculty]' WHERE id=$id");
        $faculty=$data['faculty'];

    }else {

      echo array_shift($errors);
    }
}

//Изменение разработчика
if (isset($data['change_group'])) {

    if ($data['group']=='') {

        $errors[]='Введите новый номер группы';
    }

    if ($data['group']==$group) {

        $errors[]='Такое номер группы уже стоит';
    }

    if(empty($errors)){

        echo 'Вы успешно изменили номер группы';
        $query=R::exec("UPDATE students SET group='$data[group]' WHERE id=$id");
        $group=$data['group'];
    }else {

        echo array_shift($errors);
    }
}

//Изменение издателя
if (isset($data['change_num'])) {

    if ($data['num']=='') {

        $errors[]='Введите новый номер зачётки';
    }

    if ($data['num']==$num) {

        $errors[]='Такое номер уже стоит';
    }

    if(empty($errors)){

        echo 'Вы успешно изменили номер зачётки';
        $query=R::exec("UPDATE students SET num='$data[num]' WHERE id=$id");
        $num=$data['num'];
    }else {

        echo array_shift($errors);
    }
}

//Изменение объёма
if (isset($data['change_mobile'])) {

    if ($data['mobile']=='') {

        $errors[]='Введите новый номер телефона';
    }

    if ($data['mobile']==$mobile) {

        $errors[]='Такой номер телефона уже стоит';
    }

    if(empty($errors)){

        echo 'Вы успешно изменили номер телефона';
        $query=R::exec("UPDATE students SET mobile='$data[mobile]' WHERE id=$id");
        $mobile=$data['mobile'];
    }else {

        echo array_shift($errors);
    }
}
?>

<form class="" action="" method="post">
  <p>
  <input type="text" name="fio"  value='<?=$fio?>'>
  <button type="submit" name="change_fio">Изменить ФИО</button>
  </p>
  <p>
  <input type="text" name="faculty" value='<?=$faculty?>'>
  <button type="submit" name="change_faculty">Изменить факультет</button>
  </p>
  <p>
  <input type="text" name="group" value='<?=$group?>'>
  <button type="submit" name="change_group" >Изменить номер группы</button>
  </p>
  <p>
  <input type="text" name="num"  value='<?=$num?>'>
  <button type="submit" name="change_num">Изменить номер зачётки</button>
  </p>
  <p>
  <input type="text" name="mobile"  value='<?=$mobile?>'>
  <button type="submit" name="change_mobile">Изменить номер телефона</button>
  </p>
</form>

<p><a href="student.php">Назад к сведениям</a></p>
</body>
</html>
