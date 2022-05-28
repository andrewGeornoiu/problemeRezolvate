<?php

$n = 243;
$reverse = 0;

while($n>1){
    $r = $n %10;
    $reverse = ($reverse*10) + $r;
    $n = $n / 10;
}

echo $reverse



?>