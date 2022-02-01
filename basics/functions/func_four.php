<?php

function legal(int $age): string {
    if ($age >= 18) {
        return "You are old enough" . PHP_EOL;
    } else {
        return "You are not old enough" . PHP_EOL;
    }
}

$arr = [];

$obj0 = new stdClass;
$obj0->name = 'Jake';
$obj0->age = 34;

$obj1 = new stdClass;
$obj1->name = "Luca";
$obj1->age = 14;

$obj2 = new stdClass;
$obj2->name = 'Kate';
$obj2->age = 42;

$arr[0] = $obj0;
$arr[1] = $obj1;
$arr[2] = $obj2;

for ($i = 0; $i < count($arr); $i++) {
    echo legal($arr[$i]->age);
}