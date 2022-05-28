<?php
$n = 15;
$m = 50;

$divizor_comun = gmp_gcd("$n", "$m");

echo gmp_strval($divizor_comun);

?>