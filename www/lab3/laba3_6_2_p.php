<?

	$string = $_POST["t"];
	$str = preg_replace('/[\«\»\'\"]/u', '', $string);
	$lenght = mb_strlen($str);

	for ($i=0; $i < $lenght; $i++) {
			$mass[$i] = mb_substr($str,$i,1, 'utf-8');
		}
	$count_up = $count_lo = 0;

	for($i=0; $i<$lenght; $i++)
	{
		if(preg_match('%^\p{Lu}%u', $mass[$i])){
				$count_up++;
		}else{
				$count_lo++;
		}
	}

	if ($count_up>$count_lo) {

		 echo "Прописных букв больше";
	}else {

		 echo "Строчных букв больше";
	}

	if($count_up > $count_lo )
	{
		$string = mb_strtoupper($string);
	}
	else if($count_up < $count_lo)
	{
		$string = mb_strtolower($string);
	}
	echo ('<br>' . 'Преобразуем <br>' . $string);

?>
