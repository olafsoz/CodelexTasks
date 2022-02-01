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
////$p1 = new Person("Olafs", "Ozoliņš", "18272347462");
//
//$p2 = new Register();
////$p2->add($p1);
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
    protected string $color = "red";

    public function __construct($color) {
        $this->color = $color;
    }
    public function getColor($color): string {
        return $color;
    }
}
class Circle extends Forms{
    protected int $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function area() {
        return pi() * pow($this->radius, 2);
    }
}
class Triangle extends Forms {
    protected int $height;
    protected int $base;

    public function __construct($height, $base) {
        $this->height = $height;
        $this->base = $base;
    }
    public function area() {
        return .5 * $this->height * $this->base;
    }
}
class Rectangle extends Forms {
    protected int $side;

    public function __construct($side) {
        $this->side = $side;
    }
    public function area() {
        return pow($this->side, 2);
    }
}
class Together extends Forms {
    protected array $array = [];
    public function add(Circle $circle, Triangle $triangle, Rectangle $rectangle) {
        $this->array[] = $circle->area();
        $this->array[] = $triangle->area();
        $this->array[] = $rectangle->area();
    }
    public function sum() {
        $s = 0;
        foreach($this->array as $item) {
            $s += $item;
        }
        return $s;
    }
}

$circle = new Circle(3);
$triangle = new Triangle(4, 7);
$rectangle = new Rectangle(5);
echo "Color : " . $circle->getColor("green") . "; Circle area : " . $circle->area() . PHP_EOL;
echo "Color : " . $triangle->getColor("blue") . "; Triangle area : " . $triangle->area() . PHP_EOL;
echo "Color : " . $rectangle->getColor("yellow") . "; Rectangle area : " . $rectangle->area() . PHP_EOL;
$together = new Together("red");
$together->add($circle, $triangle, $rectangle);
echo $together->sum();




