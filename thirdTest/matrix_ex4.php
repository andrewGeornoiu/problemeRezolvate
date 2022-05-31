<?php

$matrix = array (
            array ( 1, 2, 3, 4 ), 
            array ( 5, 6, 7, 8 ), 
            array ( 9, 10, 11, 12 ), 
            array ( 13, 14, 15, 16 ));
    
$sum = 0;
$lenght = count($matrix);


    for ($i=0; $i<$lenght; $i++){
        for($j=0; $j<$lenght; $j++){
                if($i == $j && $matrix[$i][$j] % 2 == 1){
                        $sum += $matrix[$i][$j];
                }
            }
        }

echo $sum;