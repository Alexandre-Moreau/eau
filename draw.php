<?php

	function _imageFill($im, $color){
		global $tailleL, $tailleH;
		imagefilledrectangle($im, 0, 0, $tailleL, $tailleH, $color);
	}

?>
