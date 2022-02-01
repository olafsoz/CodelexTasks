<?php

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
            echo $val . " ";
        }
        echo PHP_EOL;
    }
}