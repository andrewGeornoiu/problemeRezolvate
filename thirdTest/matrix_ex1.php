<?php


$matrix = array(
    array (1, 2, 3),
    array (4, 5, 6),
    array (7, 8, 9)
);

for ($i=0; $i<count($matrix); $i++){
for($j=0; $j<count($matrix); $j++){
    echo $matrix[$i][$j] . " ";
}
}