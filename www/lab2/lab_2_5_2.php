<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<img src="2.jpg">

<?php
echo '<br/>';
$a = rand(-20,20);
$b = rand(-20,20);

echo 'Первое число: ' . $a . '<br/>';
echo 'Второе число: ' . $b;


$b1 = $b*$b-$a;

$b2 = $b*$b;

$F = array(2);

for ($i=0; $i < 2; $i++) {
	//1
if ($a >=1 ) {
	$F[$i] = $a+2*$b1;
} elseif ($a > -1 AND $a < 0) {
	$F[$i] = $a+$b1;
} elseif ($a <= -1) {
	$F[$i] = $a*$a-2*$b1+1;
}
	//2
	if ($a >= 0) {
		$F[$i] = $a+2*$b2;
	} elseif ($a > -1 AND $a < 0) {
		$F[$i] = $a+$b2;
	} elseif ($a <= -1) {
		$F[$i] = $a*$a-2*$b2+1;
	}

}
$z = $F[0] + $F[1]; // Сумма функций
echo '<br/>' . 'Сумма функций равна: ' . $z;
?>
</body>
</html>
