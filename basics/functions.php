<?php
//ex 5.1

function addCodelex($str): string {
    return $str . " codelex\n";
}
echo addCodelex("Hello");

////ex 5.2

function accept(int $int1, int $int2): int {
    return $int1 * $int2;
}
echo accept(4, 9);

//ex 5.3

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
//
////ex 5.4

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
    echo $arr[$i]->age;
}

//ex 5.5

$array = [
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

foreach ($array as $arr) {
   echo "The fruit is " . $arr['fruit'] . ". The weight is " . $arr['weight'] . "kg. The shipping cost is " . weight($arr, $costs) . " eur" . PHP_EOL;
}

//ex 5.6

$anotherArray = [
    23,
    "hello",
    13,
    54.24,
    73
];
function double($arr) {
    for ($i = 0; $i < count($arr); $i++) {
        if (is_int($arr[$i])) {
            print_r($arr[$i] * 2 . PHP_EOL);
        } else {
            echo "not an integer" . PHP_EOL;
        }
    }
}
double($anotherArray);

//ex 5.7

$person = new stdClass();
$person->name = 'Olafs';
$person->cash = 3000;
$person->licenses = ['A', 'C'];

function createWeapon(string $name, int $price, string $license = null): stdClass {
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapon('AK47', 1000, 'C'),
    createWeapon('Deagle', 750, 'A'),
    createWeapon('Knife', 500),
    createWeapon('Glock', 250, 'A')
];

$basket = [];

while (true) {

    echo '[1] Purchase' . PHP_EOL;
    echo '[2] Checkout' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;

    $option = (int) readline('Select an option' . PHP_EOL);
    switch ($option) {
        case 1:

            foreach($weapons as $index => $weapon) {
                echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$" . PHP_EOL;
            }
            $selectedWeaponIndex = (int) readline('Select weapon ');

            $weapon = $weapons[$selectedWeaponIndex] ?? null;
            if ($weapon === null) {
                echo 'Weapon not found' . PHP_EOL;
                exit;
            }
            if ($weapon->license != null && !in_array($weapon->license, $person->licenses)) {
                echo 'Invalid license';
                exit;
            }
            if ($person->cash < $weapon->price) {
                echo 'Not enough money';
                exit;
            }

            $basket[] = $weapon;

            echo "You put $weapon->name in the basket!" . PHP_EOL;
            break;
        case 2:
            $totalSum = 0;
            foreach($basket as $weapon) {
                $totalSum += $weapon->price;
                echo "{$weapon->name}" . PHP_EOL;
            }
            echo "_________________" . PHP_EOL;
            echo "Total : $totalSum $";
            echo PHP_EOL;
            exit;
        default:
            exit;
    }
}







