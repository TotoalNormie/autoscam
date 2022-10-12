<?php

$cars = json_decode(file_get_contents(__DIR__ ."../cars.json"));
$input = "sarkana audi 3 l tilpums";
$search = explode(" ", $input);



foreach($cars as $carID => $car) {
    $cars[$carID]["score"] = 0;
    $carKeywords = explode(" ", implode(" ", $car));
    foreach($search as $keywords) {
        if(in_array($keyword, $carKeywords)) {
            $cars[$carID]["score"] += 1;
        }
    }
}

sort_by_key($score, "points", true);

print_r($cars);

// $search = explode(" ", $ingWrite);
// $userSearch = [];
// foreach($search as $userIng){
//     $write = explode(",", $userIng);
//     foreach($write as $write2){
//         if($write2 == null){
//             continue;
//         }
//         $userIngredients[] = $write2;
//     }
// }

// $duplicate = [];
// echo "\n";
// foreach($recipe as $idx => $rec){
//     if($rec["name"] == null || $rec["ingredients"] == null || $rec["directions"] == null || in_array($rec["name"], $duplicate)){
//         echo $rec["name"]."\n";
//         unset($recipe[$ing]);
//         continue;
//     }
//     $skip = false;
//     $duplicateIng = [];
//     foreach($userIngredients as $userIng){
//         if(strlen($userIng) >= 6){
//             $compare = 85;
//         }elseif(strlen($userIng) < 4){
//             $compare = 50;
//         }else{
//             $compare = 75;
//         }
//         foreach($rec["ingredients"] as $idxIng => $ingredients){
//             $dupTrue = false;
//             $ingredientsExplode = explode(" ", strtolower($ingredients));
//             foreach($ingredientsExplode as $ingredient){
//                 similar_text(simplify($ingredient), simplify($userIng), $precentage);
//                 foreach($duplicateIng as $dup){
//                     similar_text(simplify($dup), simplify($userIng), $precentage2);
//                     if($precentage2 >= $compare){
//                         $dupTrue = true;
//                         break;
//                     }
//                 }
//                 if($precentage >= $compare && !$dupTrue){
//                     $duplicate[] = $rec["name"];
//                     $duplicateIng[] = $ingredient;
//                     if($skip == false){
//                         $score[] = [
//                             "name" => $rec["name"],
//                             "points" => 1
//                         ];
//                         $skip = true;
//                     }else{
//                         $score[count($score)-1]["points"]++;
//                     }
//                 }
//             }
//         }
//     }
// }

// sort_by_key($score, "points", true);

// $i = 0;
// while($i < 10){
//     if($score[$i] == null){
//         break;
//     }
//     echo "\n" .$i + 1 .". " .$score[$i]["name"] ." (pieiejamie ingridienti: " .$score[$i]["points"] .")\n";
//     $i++;
//     usleep(30000);
// }

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

// function simplify($vards){
//     $maping = [
//         "ā" => 'a',
//         'č' => 'c',
//         'ē' => 'e',
//         'ģ' => 'g',
//         'ī' => 'i',
//         'ķ' => 'k',
//         'ļ' => 'l',
//         'ņ' => 'n',
//         'š' => 's',
//         'ū' => 'u',
//         'ž' => 'z'
//     ];
//     foreach($maping as $key => $leter){
//         $vards = str_replace($key,$leter,$vards);
//     }
//     return $vards;
// }

?>