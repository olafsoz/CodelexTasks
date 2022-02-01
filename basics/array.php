<?php
//ex 3.1

$arr = [
    4,
    7,
    11
];
echo array_sum($arr).PHP_EOL;

//ex 3.2
$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];
var_dump($person);

//ex 3.3
$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;
echo $person->name . " " . $person->surname . " " . $person->age . PHP_EOL . PHP_EOL;

//ex 3.4
$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
echo $items[0][1]["name"] . " " . $items[0][1]["surname"] . " " . $items[0][1]["age"] . PHP_EOL . PHP_EOL;

//ex 3.5
$items2 = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
//echo $items2[0][0]["name"] . " " . $items2[0][0]["surname"] . " " . $items2[0][0]["age"] . " " .
//    $items2[0][1]["name"] . " " . $items2[0][1]["surname"] . " " . $items2[0][1]["age"];
foreach($items2 as $arrays) {
    foreach($arrays as $arr) {
        foreach($arr as $key => $val) {
            echo $key . " " . $val . PHP_EOL;
        }
    }
}