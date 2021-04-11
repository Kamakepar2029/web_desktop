<?php
function isin($str, $string){
	$string = strtolower($string);
	$str = strtolower($str);
	$text = str_replace($str,'',$string);
	//echo $str.'___'.$string;
	if ($string == $text){
		return false;
	}else{
		return true;
	}
}
if (isset($_GET['request'])){
	$array = [];
	$contents = json_decode(file_get_contents('http://api.kamakepar.ru'));
	if ($contents){
		foreach ($contents as $element) {
		  if (isin($_GET['request'],$element->request)){
				$array[count($array)] = $element->response;
			}
	}
	if (count($array) == 0){
		echo 'Давайте поищем ответ в интернете.';
	}else{
		echo $array[rand(0, count($array)-1)];
	}
}
}else{
?>
<center><h1>Read Our Api More distinctively</h1></center>
<?php }?>