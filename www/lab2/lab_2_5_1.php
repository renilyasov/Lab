<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<img src="1.jpg">
<?php
echo '<br/>';

$a = rand(-20,20);
$b = rand(-20,20);

echo 'Первое число: ' . $a . '<br/>';
echo 'Второе число: ' . $b;

// вторая часть первого условия
$a2 = $a + $b;
$b2 = $a - $b;
$F = array(2);

for ($i=0; $i < 2; $i++) {
	//1
if ($a*$b < 1/2) {
	$F[$i] = (1+cos($b-$a))/($a/$b+$b*$b);
} elseif ($a *$b >=0) {
	$F[$i] = sin(log10($a/$b));
}
	//2
	if ($a2*$b2 < 1/2) {
		$F[$i] = (1+cos($b2-$a2))/($a2/$b2+$b2*$b2);
	} elseif ($a2 *$b2 >=0) {
		$F[$i] = sin(log10($a2/$b2));
	}
}
$z = pow(cos($F[0]),3) + $F[1]; // Сумма функций

echo '<br/>' . 'Сумма функций равна: ' . $z;

?>
</body>
</html>
