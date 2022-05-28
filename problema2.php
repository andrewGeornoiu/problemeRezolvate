<?php

$n = 7;
$count = 0;

    for($i = 1; $i < $n; $i++){
        if(($n % $i) == 0){
            $count++;
        }
    
    }

    if ($count < 3){
        echo "Numarul este prim";
    }else{
        echo "Numarul nu este prim";
    }




?>