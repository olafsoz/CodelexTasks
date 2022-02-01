<?php

class Dog {
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct($name, $sex, $mother = "Unknown", $father = "Unknown") {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getFathersName(): string {
        if ($this->father == null) {
            return "Unknown";
        } else {
            return $this->father;
        }
    }

    public function hasSameMotherAs($dog): bool {
        if ($this->mother == $dog->mother) {
            return true;
        } else {
            return false;
        }
    }
}

class DogTest {
    public function main(): array {
        return [
        new Dog("Max", "male", "Lady", "Rocky"),
        new Dog("Rocky", "male", "Molly", "Sam"),
        new Dog("Sparky", "male"),
        new Dog("Buster", "male", "Lady", "Sparky"),
        new Dog("Sam", "male"),
        new Dog("Lady", "female"),
        new Dog("Molly", "female"),
        new Dog("Coco", "female", "Molly", "Buster")
            ];
    }
}
$test = new DogTest();
$dog = $test->main();
echo $dog[7]->getfathersName() . PHP_EOL;
echo $dog[2]->getFathersName() . PHP_EOL;
echo $dog[7]->hasSameMotherAs($dog[1]);
