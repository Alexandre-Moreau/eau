<?php
	
	$_SHAPEAM = [
		0, 0,
		90, 90,
		135, 45,
		180, 90,
		90, 135,
		180, 135,
		180, 180,
		90, 180,
		45, 225,
		0, 180,
		45, 135,
		-45, 45
	];

	$_SHAPECOL = [
		40, 0,
		100, 0,
		140, 15,
		120, 30,
		20, 45,
		0, 15
	];

	$_SHAPEPH = [
		40, 0,
		120, 0,
		160, 80,
		160, 100,
		140, 120,
		40, 120,
		0, 60,
		0, 40
	];

	$_SHAPEEN = [
		20, 0,
		60, 0,
		80, 20,
		80, 40,
		40, 60,
		0, 60,
		0, 20
	];

	$_SHAPEES = [

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

	/*function rotate($shape, $angle){
		$angle = 3.14;
		$s = [];
		$even = true;
		foreach($shape as $key => $point){
			if($even){
				array_push($s, ($shape[$key])*cos($angle) - ($shape[$key+1])*sin($angle));
			}else{
				array_push($s, ($shape[$key])*cos($angle) + ($shape[$key-1])*sin($angle));
			}
			$even = !$even;
		}
		return $s;
	}*/
?>
