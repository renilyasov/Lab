<?
	$text = $_POST["t"];
	echo preg_replace(['~<i>~i', '~</i>~i'], ['<курсив>', '<конец курсива>'], $text);

?>
