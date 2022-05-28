<?php


$a = [1, 7, 4 ,5 ,2 ,9 ,10];

$n = 2;
$length = count($a);
echo "Array original: \n";
for ($i = 0; $i < $length; $i++) {
    echo "$a[$i] ";
}
for ($i = 0; $i < $n; $i++) {
    $aux = $a[$length - 1];
    for ($j = $length - 1; $j > 0; $j--) {
        $a[$j] = $a[$j - 1];
    }
    $a[0] = $aux;
}
echo "\nArray mutat cu $n pozitii:\n";
for ($i = 0; $i < $length; $i++) {
    echo "$a[$i] ";
}



?>