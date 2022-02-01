<?php

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