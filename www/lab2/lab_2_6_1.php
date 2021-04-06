<!DOCTYPE html>
<html>
<head>
	<title>Задание 13. Ильясов</title>
</head>
<body>

<?php
$k=rand(1,10);
$Summa=0;
$Massive = array(array(1,1,1,1,1,1,1,1,1), //наш красавец массивчик
								 array(1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1)
				 		 		);
echo 'Число К = ' . $k . '<br/>';
echo '<br/>';
echo 'Исходный массив' . '<br/>';
for ($i=0; $i < 9; $i++) {
	for ($j=0; $j < 9; $j++) {
	$Massive[$i][$j] = rand(1,50);
	echo $Massive[$i][$j] . ' ';
	}
	echo '<br/>';
}
	echo '<br/>';
echo 'Сумма:' . '<br/>';
for ($i=0; $i < 9; $i++) {
	for ($j=0; $j < 9; $j++) {
			if ($i-$j==$k) {
					$Summa=$Summa+$Massive[$i][$j];
			}
	}
}
echo "$Summa";

?>
</body>
</html>
