<?php
$n = 22478837;
$array = array_map('intval', str_split($n));
$count = array_count_values($array);

foreach( $count as $number => $times_number_occurred) {
    echo 'Cifra '. $number . ' apare de ' . $times_number_occurred . ' ori.' . "\n";
}
?>