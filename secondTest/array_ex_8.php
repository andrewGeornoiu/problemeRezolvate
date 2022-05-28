<?php


$array = [1, 7, 4 ,5 ,2 ,9 ,10, 2];

if(count($array) % 2 === 0){
    $i = (count($array)-1)/2;
    echo 'Output: '.$array[$i]. ' si '.$array[$i+1];
}else{
    $i = count($array)/2;
    echo 'Output: '.$array[$i];
}

?>