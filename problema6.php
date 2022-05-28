<?php

$n = 25;
$sum = 0;
$aux = 0;
$count = 0;


for ($i=0; $i<strlen($n); $i++){
    $aux = $n%10;
    $sum = $sum + $aux;
    $n = $n / 10;
}

for($i = 1; $i < $sum; $i++){
        if(($sum % $i) == 0){
            $count++;
        }
    
}
    
if ($count < 3){
        echo "Numarul este prim";
    }else{
        echo "Numarul nu este prim";
    }




?>