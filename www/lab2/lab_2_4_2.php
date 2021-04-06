<?php
  $A=[];
  $count=rand(1,20);
  $sum=0;

  echo "Исходный массив: ";
  for ($i=0; $i < $count; $i++) {
    $A[$i]=rand(10,50);
    echo $A[$i].' | ';
  }
  echo '<br>';
  echo "Cкорректированный массив: ";
  for ($i=0; $i < $count-1; $i++) {
      $k=$i+1;
      $sum=$sum+$A[$i];
      $A[$k]=$sum;
      echo "$A[$i] |";
  }

 ?>
