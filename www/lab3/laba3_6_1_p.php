
<?
	$text = $_POST["t"];
	$a = $_POST["a"];
	$b = $_POST["b"];
	$sumA = substr_count($text, $a);
	$sumB = substr_count($text, $b);
	echo('Количество символов ' . '"' . $a .'"' . ' равна: ' . $sumA );
	echo('<p> Количество символов ' . '"' . $b . '"' . ' равна: ' . $sumB );

?>
