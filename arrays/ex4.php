<?php

$random = [];
for ($i = 0; $i <= 10; $i++) {
    $random[] = rand(1, 100);
}
$randomCopy = [];
$randomCopy[] = $random;
$random[10] = -7;

echo "Array 1 : ";
foreach($random as $int) {
    echo $int . " ";
}
echo PHP_EOL . "Array 2 : ";
foreach($randomCopy as $key) {
    foreach($key as $val) {
        echo $val . " ";
    }
}
