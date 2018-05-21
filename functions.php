<?php

function tempToRgb($temp){
	
}

function hueToRgb($hue, $saturation, $lightness){
	// rapidtables.com

	if($hue<0 || $hue >= 360 || $saturation <0 || $saturation >1 || $lightness <0 || $lightness >1){
		return [0, 0, 0];
	}

	$c = ( 1-abs(2*$lightness-1) ) * $saturation;
	$x = $c * ( 1-abs(($hue/60) %2 -1) );
	$m = $lightness - $c/2;
	$rgbP;
	
	if( 0<=$hue && $hue < 60 ){
		$rgbP = [$c, $x, 0];
	}else if( 60<=$hue && $hue<120 ){
		$rgbP = [$x, $c, 0];
	}else if( 120<=$hue && $hue<180 ){
		$rgbP = [0, $c, $x];
	}else if( 180<=$hue && $hue<240 ){
		$rgbP = [0, $x, $c];
	}else if( 240<=$hue && $hue<300 ){
		$rgbP = [$x, 0, $c];
	}else if( 300<=$hue && $hue<360 ){
		$rgbP = [$c, 0, $x];
	}
	
	return [
		($rgbP[0]+$m)*255,
		($rgbP[1]+$m)*255,
		($rgbP[2]+$m)*255
	];
}

?>
