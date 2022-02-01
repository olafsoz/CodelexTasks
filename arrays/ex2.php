<?php

$numbers = [20, 30, 25, 35, -16, 60, -100];

//todo calculate an average value of the numbers
$sum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $sum += $numbers[$i];
}
$average = $sum / count($numbers);
echo $average;