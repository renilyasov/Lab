  <?php
    $A=[];
    $count=rand(1,20);
    $S=0;

    echo "Исходный массив: ";
    for ($i=0; $i < $count; $i++) {
      $A[$i]=rand(-80,80);
      echo $A[$i].' ';
    }
    echo "<br>";
    echo "Сумма нечётных и отрицательных чисел: ";
    for ($i=0; $i < $count; $i++) {
      if ($A[$i]<0 AND $A[$i]%2!=0) {
        $S=$S+$A[$i];
      }
    }

    echo $S;

 ?>
