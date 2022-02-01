<?php

$persons = [
    [
        "name" => "John",
        "surname" => "Doe",
        "age" => 50,
        "birthday" => "18th of may, 1974."
    ],
    [
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 49,
        "birthday" => "12th of april, 1989."
    ]
];
foreach($persons as $arr) {
    foreach($arr as $key => $person) {
        echo "\n" . $person;
    }
}