<?php
	
	$SHAPE0 = [
		0, 0,
		20, 20,
		30, 10,
		40, 20,
		20, 30,
		40, 30,
		40, 40,
		20, 40,
		10, 50,
		0, 40,
		10, 30,
		-10, 10
	];

	function resize($shape, $factor){
		$s = [];
		$even = true;
		foreach($shape as $point){
			array_push($s, $point*sqrt($factor));
			$even = !$even;
		}
		return $s;
	}
	
	function shift($shape, $shiftX, $shiftY){
		$s = [];
		$even = true;
		foreach($shape as $point){
			if($even){
				array_push($s, $point + $shiftX);
			}else{
				array_push($s, $point + $shiftY);
			}
			$even = !$even;
		}
		return $s;
	}
	
	

?>
