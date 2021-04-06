<?php
require "../db.php";

$data=$_POST;

if (isset($data['do_add'])) {
  //Проверка
  $errors=array();
  if(trim($data['name'])==''){
    $errors[]='Введите название магазина';
  }
  if(trim($data['FIO'])==''){
    $errors[]='Введите ФИО преподавателя';
  }

  if(R::count('subjects', 'name=?', array($data['name']))>0){
    $errors[]='Такой предмет уже добавлен!';
  }

  if(empty($errors)){
    $subject= R::dispense('subjects');
    $subject->name=$data['name'];
    $subject->FIO=$data['FIO'];
    R::store($subject);
    echo '<div>Вы успешно добавили предмет</div><hr>';
}else {
    echo '<div>'.array_shift($errors).'</div><hr>';
  }
}
 ?>
<a href="subjects.php">Вернуться назад</a>
<br>
<a href="../index.php">Перейти в меню</a>
