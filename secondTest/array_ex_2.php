<?php



$array = [2, 5, 6, 7, 8, 9, 8];

for ($i=0; $i<count($array); $i++){
    
    if($i % 3 == 0 && $i != 0){
        echo $array[$i] . "\n";
    }
}


?>