<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include_once('values.php');
	include_once('functions.php');
	include_once('draw.php');
	include_once('colors.php');
	include_once('shapes.php');
	
	$tailleL = 1240;
	$tailleH = 1754;

	$text1 = "Journée\nmondiale de\nl'eau\n22 mars";
	$text2 = "La réponse est dans la\nnature";
	$text3 = "Lyon, France";
	
	$temp = ( isset($_GET['temp'])&&is_numeric($_GET['temp']) == true ? $_GET['temp'] : -1);
	$am = ( isset($_GET['am'])&&is_numeric($_GET['am']) == true ? $_GET['am'] : -1);
	$col = ( isset($_GET['col'])&&is_numeric($_GET['col']) == true ? $_GET['col'] : -1);
	$ph = ( isset($_GET['ph'])&&is_numeric($_GET['ph']) == true ? $_GET['ph'] : -1);
	$en = ( isset($_GET['en'])&&is_numeric($_GET['en']) == true ? $_GET['en'] : -1);
	$es = ( isset($_GET['es'])&&is_numeric($_GET['es']) == true ? $_GET['es'] : -1);
	
	// Controle de saisie
	$temp = ( $temp <= $_VALUES_TEMP['max'] ? $temp : $_VALUES_TEMP['max']);
	$temp = ( $temp > $_VALUES_TEMP['min'] ? $temp : $_VALUES_TEMP['min']);
	$am = ( $am <= $_VALUES_AM['max'] ? $am : $_VALUES_AM['max']);
	$am = ( $am >= $_VALUES_AM['min'] ? $am : $_VALUES_AM['min']);
	$col = ( $col <= $_VALUES_COL['max'] ? $col : $_VALUES_COL['max']);
	$col = ( $col >= $_VALUES_COL['min'] ? $col : $_VALUES_COL['min']);
	$ph = ( $ph <= $_VALUES_PH['max'] ? $ph : $_VALUES_PH['max']);
	$ph = ( $ph >= $_VALUES_PH['min'] ? $ph : $_VALUES_PH['min']);
	$en = ( $en <= $_VALUES_EN['max'] ? $en : $_VALUES_EN['max']);
	$en = ( $en >= $_VALUES_EN['min'] ? $en : $_VALUES_EN['min']);
	$es = ( $es <= $_VALUES_ES['max'] ? $es : $_VALUES_ES['max']);
	$es = ( $es >= $_VALUES_ES['min'] ? $es : $_VALUES_ES['min']);
	
	/**/
	
	header("Content-type: image/png");
	
	// Initialisation
	$im = imagecreate($tailleL, $tailleH);
	$nbAm = $am/$_VALUES_AM['unite'];
	$nbCol = $col/$_VALUES_COL['unite'];
	$nbPh = $ph/$_VALUES_PH['unite'];
	$nbEn = $es/$_VALUES_EN['unite'];
	$nbEs = $es/$_VALUES_ES['unite'];
	
	// Couleurs
	$background = imagecolorallocate($im, $_BACKGROUND[$temp][0], $_BACKGROUND[$temp][1], $_BACKGROUND[$temp][2]);
	$colorText = imagecolorallocate($im, $_COLORTEXT[0], $_COLORTEXT[1], $_COLORTEXT[2]);
	$colorAm = imagecolorallocate($im, $_COLORAM[0], $_COLORAM[1], $_COLORAM[2]);
	$colorCo = imagecolorallocate($im, $_COLORCO[0], $_COLORCO[1], $_COLORCO[2]);
	$colorPh = imagecolorallocate($im, $_COLORPH[0], $_COLORPH[1], $_COLORPH[2]);
	$colorEn = imagecolorallocate($im, $_COLOREN[0], $_COLOREN[1], $_COLOREN[2]);
	$colorEs = imagecolorallocate($im, $_COLORES[0], $_COLORES[1], $_COLORES[2]);
	
	_imageFill($im, $background);
	
	// Ammonium
	$i = 1;
	while($i<=$nbAm){
		$margin = 100;
		$xOffset = rand(0 + $margin, $tailleL - $margin);
		$yOffset = rand(0 + $margin, $tailleH - $margin);
		imagefilledpolygon($im, shift(resize($_SHAPEAM, 1), $xOffset , $yOffset ), count($_SHAPEAM)/2, $colorAm);
		$i++;
	}
	if($nbAm != 5){
		$margin = 50;
		$xOffset = rand(0 + $margin, $tailleL - $margin);
		$yOffset = rand(0 + $margin, $tailleH - $margin);
		imagefilledpolygon($im, shift(resize($_SHAPEAM, fmod($am,0.1)*(1/$_VALUES_AM['unite'])), $xOffset , $yOffset ), count($_SHAPEAM)/2, $colorAm);
	}


	// Coloration
	$i = 1;
	while($i<=$nbCol){
		$margin = 50;
		$xOffset = rand(0 + $margin, $tailleL - $margin);
		$yOffset = rand(0 + $margin, $tailleH - $margin);
		imagefilledpolygon($im, shift(resize($_SHAPECOL, 1), $xOffset , $yOffset ), count($_SHAPECOL)/2, $colorCo);
		$i++;
	}
	$margin = 50;
	$xOffset = rand(0 + $margin, $tailleL - $margin);
	$yOffset = rand(0 + $margin, $tailleH - $margin);
	imagefilledpolygon($im, shift(resize($_SHAPECOL, fmod($col,1)*(1/$_VALUES_COL['unite'])), $xOffset , $yOffset ), count($_SHAPECOL)/2, $colorCo);

	// pH
	$i = 1;
	while($i<=$nbPh){
		$margin = 50;
		$xOffset = rand(0 + $margin, $tailleL - $margin);
		$yOffset = rand(0 + $margin, $tailleH - $margin);
		imagefilledpolygon($im, shift(resize($_SHAPEPH, 1), $xOffset , $yOffset ), count($_SHAPEPH)/2, $colorPh);
		$i++;
	}
	$margin = 50;
	$xOffset = rand(0 + $margin, $tailleL - $margin);
	$yOffset = rand(0 + $margin, $tailleH - $margin);
	// TODO Régler échelle
	imagefilledpolygon($im, shift(resize($_SHAPEPH, fmod($ph,0.5)*(1/$_VALUES_PH['unite'])), $xOffset , $yOffset ), count($_SHAPEPH)/2, $colorPh);

	// En
	$i = 1;
	while($i<=$nbEn){
		$margin = 50;
		$xOffset = rand(0 + $margin, $tailleL - $margin);
		$yOffset = rand(0 + $margin, $tailleH - $margin);
		imagefilledpolygon($im, shift(resize($_SHAPEEN, 1), $xOffset , $yOffset ), count($_SHAPEEN)/2, $colorEn);
		$i++;
	}
	$margin = 50;
	$xOffset = rand(0 + $margin, $tailleL - $margin);
	$yOffset = rand(0 + $margin, $tailleH - $margin);
	imagefilledpolygon($im, shift(resize($_SHAPEEN, fmod($en,0.5)*(1/$_VALUES_EN['unite'])), $xOffset , $yOffset ), count($_SHAPEEN)/2, $colorEn);

	// Es
	$i = 1;
	while($i<=$nbEs){
		$margin = 50;
		$xOffset = rand(0 + $margin, $tailleL - $margin);
		$yOffset = rand(0 + $margin, $tailleH - $margin);
		//imagefilledpolygon($im, shift(resize($_SHAPEES, 1), $xOffset , $yOffset ), count($_SHAPEES)/2, $colorEs);
		$i++;
	}
	$margin = 50;
	$xOffset = rand(0 + $margin, $tailleL - $margin);
	$yOffset = rand(0 + $margin, $tailleH - $margin);
	//imagefilledpolygon($im, shift(resize($_SHAPEES, fmod($es,0.5)*(1/$_VALUES_ES['unite'])), $xOffset , $yOffset ), count($_SHAPEES)/2, $colorEs);

	// Texte
	imagettftext ($im, 130, 0, 100, 650, $colorText, 'fonts/fjala.ttf', $text1);
	imagettftext ($im, 60, 0, 100, 1450, $colorText, 'fonts/prata.ttf', $text2);
	imagettftext ($im, 35, 0, 100, 1650, $colorText, 'fonts/prata.ttf', $text3);


	imagepng($im);
	imagedestroy($im);
	
	/**/

?>
