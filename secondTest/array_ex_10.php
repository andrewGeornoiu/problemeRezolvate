<?php
$pret = 14.3;
$introdus = 20;
$rest = $introdus-$pret;
$arr = [1, 0.5, 0.1];

$count_1_leu = 0;
$count_50_bani = 0;
$count_10_bani = 0;

for($i=0; $i<count($arr); $i++){
    if($arr[$i] === 1){
        $count_1_leu = (int) ($rest / $arr[$i]);
        $rest_ramas_1 = fmod($rest, $arr[$i]);
        $count_1_leu = $count_1_leu . " bancnote de 1 leu";
    }
    elseif ($arr[$i] === 0.5) {
        $count_50_bani = (int) ($rest_ramas_1 / $arr[$i]);
        $rest_ramas_50 = fmod($rest_ramas_1, $arr[$i]);
        $count_50_bani = $count_50_bani . " moneda de 50 de bani";
    }
    else{
        $count_10_bani = $rest_ramas_50 / $arr[$i];
        $count_10_bani = $count_10_bani . " monede de 10 bani";
    }
}

echo "Restul este compus din: " . $count_1_leu . ", " . $count_50_bani . " si " . $count_10_bani;

?>