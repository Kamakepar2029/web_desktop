<?php
if (isset($_GET['url'])){
	$mass = explode('/',$_GET['url']);
	echo $mass[count($mass)-1];
}else{
	echo "None";
}