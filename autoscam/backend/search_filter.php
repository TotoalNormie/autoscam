<?php

$mainCars = json_decode(file_get_contents("http://braintest.sites.hex.lv/autoscam/cars.json"), true);
$cars = $mainCars;
// $input = strtolower("sarkana audi 3 l tilpums");

$filterIsSet = true;

$filter = [
	'Audi' => 'on',
	'Mazda' => 'on',
	'BMW' => 'on', 
	'nobraukums' => 10000,
	'cena' => 10000
];
$markas = ['Audi', 'BMW', 'Mazda', 'Mercedes', 'Toyota'];
$filterMarkas = [];

if($filterIsSet) {
	// dabū visas markas kuras ir jaizfiltrē
	foreach($filter as $type => $value) {
			if(in_array($type, $markas)) {
				$filterMarkas[] = $type;
			}
		}
	foreach($cars as $carID => $car) {
		$delete = false;
		if(!is_null($markas) && !in_array($car['marka'], $markas)) {
			$delete = true;
		}elseif(!is_null($filter['nobraukums']) && $car['nobraukums'] <= $filter['nobraukums']) {
			$delete = true;
		}elseif(!is_null($filter['cena']) && $car['cena'] <= $filter['cena']){
			$delete = true;
		}

		if($delete){
			unset($cars[$carID]);
			continue;
		}
	}
}

if(isset($input) && !is_null($input)){
	$search = explode(" ", $input);
	foreach($cars as $carID => $car) {
		$cars[$carID]["score"] = 0;
		$carKeywords = explode(" ", strtolower(implode(" ", $car)));
		foreach($search as $keyword) {
			if(in_array($keyword, $carKeywords)) {
				if($keyword == strtolower($cars[$carID]['marka'])) {
					$cars[$carID]["score"] += 3;
				}elseif($keyword == strtolower($cars[$carID]['modelis'])){
					$cars[$carID]["score"] += 2;
				}else {
					$cars[$carID]["score"] += 1;
				}
			}
		}
	}
	sort_by_key($cars, "score", true);
}

print_r($cars);

function sort_by_key(&$array, $key, $descending = false) {
	usort($array, function($a, $b) use ($key, $descending) {
		if($a[$key] == $b[$key]) {
			return 0;
		}
		if($descending) {
			return ($a[$key] < $b[$key] ? 1 : -1);
		} else {
			return ($a[$key] > $b[$key] ? 1 : -1);
		}
	});	
}
?>