<?php

$n = 50;
$m = 15;
 
while($n != $m)
        if($n >$m)
            $n -=  $m;
        else
            $m -= $n;

echo $n;

// extra info --> https://www.pbinfo.ro/articole/73/cmmdc-si-cmmmc-algoritmul-lui-euclid