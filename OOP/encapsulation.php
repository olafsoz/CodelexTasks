<?php

//class Person {
//    private string $name;
//    private string $surname;
//    private string $id;
//
//    public function __construct($name, $surname, $id) {
//        $this->name = $name;
//        $this->surname = $surname;
//        $this->id = $id;
//    }
//}
//
//class Register {
//    private array $list = [];
//    public function add(Person $person) {
//        $this->list[] = $person;
//    }
//    public function getList(): array {
//        return $this->list;
//    }
//}
//$p1 = new Person("Olafs", "Ozoliņš", "18272347462");
//
//$p2 = new Register();
//$p2->add($p1);
//
//while (true) {
//    echo "1. Add new person." . PHP_EOL;
//    echo "2. Check the list." . PHP_EOL;
//    echo "3. exit." . PHP_EOL;
//
//    $option = (int) readline("Your input : ");
//    if ($option == 1) {
//        $name = readline("Enter name ");
//        $surname = readline("Enter surname ");
//        $id = readline ("Enter ID ");
//        $p1 = new Person($name, $surname, $id);
//
//        $p2->add($p1);
//    } elseif ($option == 2) {
//        print_r($p2->getList());
//    } elseif($option == 3) {
//        exit;
//    }
//}

//ex1 over

abstract class Forms {
    protected string $name;

    public function __construct($name) {
        $this->name = $name;
    }
    public function getName(): string {
        return $this->name;
    }
}
class Circle extends Forms{
    protected float $radius;
    public function __construct($name, $radius) {
        parent::__construct($name);
        $this->radius = $radius;
    }
    public function area() {
        return pi() * pow($this->radius, 2);
    }
}
class Triangle extends Forms {
    protected int $height;
    protected int $base;

    public function __construct($name, $height, $base) {
        parent::__construct($name);
        $this->height = $height;
        $this->base = $base;
    }
    public function area() {
        return .5 * $this->height * $this->base;
    }
}
class Rectangle extends Forms {
    protected int $side;

    public function __construct($name, $side) {
        parent::__construct($name);
        $this->side = $side;
    }
    public function area() {
        return pow($this->side, 2);
    }
}
class Together {
    protected array $array = [];
    public function add($object) {
        $this->array[] = $object->area();
    }
    public function sum() {
        $s = 0;
        foreach($this->array as $item) {
            $s += $item;
        }
        return $s;
    }
}

$together = new Together();

while(true) {
    echo "[1] = Circle\n";
    echo "[2] = Triangle\n";
    echo "[3] = Rectangle\n";
    echo "[4] = Print Sum of Added values\n";
    echo "[5] = Exit\n";

    $option = readline("Enter your choice : ");

    switch($option) {
        case 1:
            $radius = readline("Enter the radius : ");
            $circle = new Circle("Circle", $radius);
            echo $circle->getName() . "'s area : " . number_format($circle->area(), 2);
            echo PHP_EOL;
            $together->add($circle);
            break;
        case 2:
            $height = readline("Enter height : ");
            $base = readline("Enter base : ");
            $triangle = new Triangle("Triangle", $height, $base);
            echo $triangle->getName() . "'s area : " . number_format($triangle->area(), 2);
            echo PHP_EOL;
            $together->add($triangle);
            break;
        case 3:
            $side = readline("Enter one side of a rectangle : ");
            $rectangle = new Rectangle("Rectangle", $side);
            echo $rectangle->getName() . "'s area : " . number_format($rectangle->area(), 2);
            echo PHP_EOL;
            $together->add($rectangle);
            break;
        case 4:
            echo "Sum of the all of the areas : " . round($together->sum(), 2);
            echo PHP_EOL;
            break;
        case 5:
            exit;
    }
}




