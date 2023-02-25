<?php
$numbers = [12, 10, 6, 88, 10002, 33, 65, 92, 23];
$a = 228;


function fun ($numbers, $a) {  
    $size = count($numbers);
    
    for ($i = 0; $i < $size; $i++) {
        if(str_contains($numbers[$i], 2 )){
            $numbers = array_merge(array_slice($numbers, 0, $i + 1), [$a], array_slice($numbers, $i + 1, count($numbers)));
            $i++;
            $size++;
        }
    }
    foreach($numbers as $val) {
        print($val . "\n");
    }
    return $numbers;
}

$numbers = fun($numbers, $a);

