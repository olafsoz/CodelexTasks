<?php

$arrayOne = [
    [
        'fruit' => 'apples',
        'weight' => 8,
    ],
    [
        'fruit' => 'bananas',
        'weight' => 12,
    ],
    [
        'fruit' => 'strawberries',
        'weight' => 4,
    ]
];
$costs = [
    [
        'rule' => 'over 10',
        'shipping cost' => 2
    ],
    [
        'rule' => 'below 10',
        'shipping cost' => 1
    ]
];

function weight($array, $costs) {
    if ($array['weight'] > 10) {
        return $costs[0]['shipping cost'];
    } else {
        return $costs[1]['shipping cost'];
    }
}

foreach ($arrayOne as $arr) {
    echo "The fruit is " . $arr['fruit'] . ". The weight is " . $arr['weight'] . "kg. The shipping cost is " . weight($arr, $costs) . " eur" . PHP_EOL;
}