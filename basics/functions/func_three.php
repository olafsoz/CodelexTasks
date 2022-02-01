<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

function legal(int $age): string {
    if ($age >= 18) {
        return "\nYou are old enough";
    } else {
        return "\nYou are not old enough";
    }
}
echo legal($person->age) . PHP_EOL;