<?php



$array = [2, 5, 6, 7, 8];

for ($i=0; $i<count($array); $i++){
    
    if($array[$i] % 2 == 0){
        echo $array[$i] . "\n";
    }
}


?>