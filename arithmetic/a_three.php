<?php

$lowerBound = 1;
$upperBound = 100;
$sum = 0;
$count = 0;
for ($i = $lowerBound; $i <= $upperBound; $i++) {
    $sum += $i;
    $count += 1;
}
echo $sum . PHP_EOL . $sum / $count;