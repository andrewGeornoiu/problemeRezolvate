<?php



$array = [2, 5, 6, 7, 8, 9, 8];
$sum = 0;

for ($i=1; $i<count($array)-1; $i++){
    
   $sum = $sum + $array[$i];
}

echo $sum;


?>