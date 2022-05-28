<?php


$d1 = 220; 
$d2 = 200; 
$d3 = 313;

if (($d1 === $d2) && ($d1 === $d3)){
    echo "Toate sunt egale";
}
elseif (($d1 < $d2) && ($d1 < $d3)) {
    echo "Cel mai mic este $d1";
}
elseif (($d2 < $d3) && ($d2 < $d1)){
     echo "Cel mai mic este $d2";
}
elseif ($d1 === $d2){
    echo "$d1 si $d2";
}
elseif ($d1 === $d3){
    echo "$d1 si $d3";
}
elseif ($d2 === $d3){
    echo "$d2 si $d3";
}else{
    echo "Cel mai mic este $d3";
}












?>