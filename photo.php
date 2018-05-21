<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include_once('functions.php');
	include_once('draw.php');
	include_once('colors.php');
	include_once('shapes.php');
	
	$tailleL = 1240;
	$tailleH = 1754;
	
	$temp = ( isset($_GET['temp'])&&is_numeric($_GET['temp']) == true ? $_GET['temp'] : -1);
	$am = ( isset($_GET['am'])&&is_numeric($_GET['am']) == true ? $_GET['am'] : -1);
	
	// Controle de saisie
	$temp = ( $temp<=25 ? $temp : 25);
	$temp = ( $temp>1 ? $temp : 1);
	$am = ( $am<=0.5 ? $am : 0.5);
	$am = ( $am>=0 ? $am : 0);
	
	/**/
	
	header("Content-type: image/png");
	
	// Initialisation
	$im = imagecreate($tailleL, $tailleH);
	$nbAm = $am/0.1;
	
	// Couleurs
	$background = imagecolorallocate($im, $BACKGROUND[$temp][0], $BACKGROUND[$temp][1], $BACKGROUND[$temp][2]);
	$colorAm = imagecolorallocate($im, 100, 100, 100);
	
	_imageFill($im, $background);
	
	$i = 1;
	while($i<=$nbAm){
		imagefilledpolygon($im, shift(resize($SHAPE0, 1), $i*40, $i*40), count($SHAPE0)/2, $colorAm);
		$i++;
	}
	imagefilledpolygon($im, shift(resize($SHAPE0, fmod($am,0.1)*10 ), $i*40, $i*40), count($SHAPE0)/2, $colorAm);
	
	imagepng($im);
	imagedestroy($im);
	
	/**/

?>
