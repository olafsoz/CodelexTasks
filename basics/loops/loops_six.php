<?php

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