<?php
require "../db.php";

$data=$_POST;

if (isset($data['do_add'])) {
  //Проверка
  $errors=array();
  if(trim($data['FIO'])==''){
    $errors[]='Введите ФИО';
  }
  if(trim($data['faculty'])==''){
    $errors[]='Введите факультет';
  }
  if($data['group']==''){
    $errors[]='Введите номер группы';
  }
  if($data['num']==''){
    $errors[]='Введите номер зачётки!';
  }
  if($data['mobile']==''){
    $errors[]='Введите номер телефона!';
  }

  if(R::count('students', 'FIO=?', array($data['FIO']))>0){
    $errors[]='Студент уже зарегистрирован!';
  }

  if(empty($errors)){
    $student= R::dispense('students');
    $student->FIO=$data['FIO'];
    $student->faculty=$data['faculty'];
    $student->group=$data['group'];
    $student->num=$data['num'];
    $student->mobile=$data['mobile'];
    R::store($student);
    echo '<div>Вы успешно зарегистрировали студента</div><hr>';
}else {
    echo '<div>'.array_shift($errors).'</div><hr>';
  }
}
 ?>
<a href="student.php">Вернуться</a>
<br>
<a href="../index.php">Перейти в меню</a>
