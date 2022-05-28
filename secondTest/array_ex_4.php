<?php


$array = [2, 5, 6, 7, 8, 7, 8, 9, 10];

asort($array);

$rev = array_reverse($array);

$result = array_splice($rev, 0, 3);

print_r($result);



?>