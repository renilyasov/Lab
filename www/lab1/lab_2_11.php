<p> Вариант 5 </p>

<?php

    $x=rand(1,500);
    $k=0;

    echo "Число: $x <br>";

    for ($i=0; $i <= sqrt($x); $i++) {

        for ($j=0; $j <= sqrt($x); $j++) {
            if($i*$i+$j*$j==$x){
                $k++;
                echo "Можно: $i ; $j <br>";

            }

        }

    }

    if ($k==0) {
       echo "Нельзя";
    }
?>
