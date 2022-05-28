<?php

$n = 12345;
$sum = 0;
$digit = 0;
$prod = 1;


for ($i=0; $i<strlen($n); $i++){
    $digit = $n % 10;
    $n = $n / 10;
    
    if ($digit % 2 == 0){
        $sum = $sum + $digit;
    }else{
        $prod = $prod * $digit;
    }
    
}

echo "Suma este: $sum" . "\n" . "Produsul este: $prod";


?>