<?php



$echipa1 = [80, 70, 75, 49, 100];
$echipa2 = [60, 65, 70, 90, 100];

$forta_aparare = $echipa1[2]+$echipa1[3];
$forta_aparare = $forta_aparare / 2;

if ($forta_aparare < $echipa2[2]){
    $membru_furat = max($echipa1[2], $echipa1[3]);
    $echipa2_new = array_push($echipa2, $membru_furat);
    
}


print_r($echipa2);







?>