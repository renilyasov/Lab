<!DOCTYPE html>
<html>
<head>
	<title>Задание </title>
</head>
<body>
<?php
$p = 1;
$Massive = array(array(1,1,1,1,1,1,1,1,1,1), //наш красавец массивчик
								 array(1,1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1,1),
								 array(1,1,1,1,1,1,1,1,1,1)
								);
				 echo 'Исходный массив' . '<br/>';
				 for ($i=0; $i < 9; $i++) {
				 	for ($j=0; $j < 9; $j++) {
				 	$Massive[$i][$j] = rand(1,5);
				 	echo $Massive[$i][$j] . ' ';
				 	}
				 	echo '<br/>';
				}
				 echo '<br/>';
				 echo 'Скорректированный массив' . '<br/>';
				 for ($j=0; $j < 9; $j++) {
				 	for ($i=0; $i < 9; $i++) {
				 		$Massive[$j][$i]=$Massive[$j][$i]/$Massive[$i][$i];
						echo round($Massive[$j][$i],2) . '  |  ';
				 	}
				 	echo '<br/>';
				 }

?>
</body>
</html>
