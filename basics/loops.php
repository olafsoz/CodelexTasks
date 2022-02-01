<?php
//ex 4.1
$arrLoop = [
    3,
    4,
    5,
    8
];
foreach ($arrLoop as $val) {
    echo "$val\n";
}

//ex 4.2
$arrLoop2 = [
    4,
    5,
    6,
    9
];
for ($x = 0; $x < count($arrLoop2); $x++) {
    echo "\n$arrLoop2[$x]";
}

//ex 4.3
for ($x = 1; $x < 10; $x++) {
    echo "\ncodelex";
}

//ex 4.4
$array = [
    2,
    3,
    5,
    6,
    9,
    11
];
for ($y = 0; $y < count($array); $y++) {
    if ($array[$y] % 3 == 0) {
        echo "\n$array[$y]";
    }
}
echo PHP_EOL;

//ex 4.5
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

class People
{
    public string $name;
    public string $surname;
    public int $age;
    public string $birthday;

    public function __construct($name, $surname, $age, $birthday)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->birthday = $birthday;
    }
}

$people = [
    new People("Olafs", "Ozoliņš", 19, "18th of June"),
    new People("Gustavs", "Bērzs", 23, "4th of September"),
    ];

foreach($people as $obj) {
    foreach($obj as $key => $val) {
        echo $key . " = " . $val . PHP_EOL;
    }
}