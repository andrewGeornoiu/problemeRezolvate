<?php

$matrix = array(
        array (1, 2, 3),
        array (4, 5, 6),
        array (7, 8, 9)
    );
    
$sum = 0;
    for ($i=0; $i<count($matrix); $i++){
        for($j=0; $j<count($matrix); $j++){
            if ($j % 2 == 0){
                $sum += $matrix[$i][$j];
            }
        }
    }

echo $sum;