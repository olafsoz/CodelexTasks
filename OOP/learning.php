<?php
//ex1

//class Weapon {
//    public string $weaponName;
//    public int $power;
//
//    public function __construct($weaponName, $power) {
//        $this->weaponName = $weaponName;
//        $this->power = $power;
//    }
//}
//
//class Inventory {
//    public array $invent = [];
//    public function add(Weapon $weapon) {
//        return $this->invent[] = $weapon;
//    }
//    public function print() {
//        foreach($this->invent as $item) {
//            foreach($item as $value) {
//                echo $value . " ";
//            }
//            echo PHP_EOL;
//        }
//    }
//}
//
//$glock = new Weapon("Glock", 20);
//$ak = new Weapon("AK-47", 50);
//$bazooka = new Weapon("Bazooka", 100);
//
//$a = new Inventory();
//$a->add($glock);
//$a->add($ak);
//$a->add($bazooka);
//$a->print();

//ex 2

//class Store {
//    public string $name;
//    public float $price;
//    public int $quantity;
//
//    public function __construct($name, $price, $quantity) {
//        $this->name = $name;
//        $this->price = $price;
//        $this->quantity = $quantity;
//    }
//}
//
//class Together {
//    public array $inv = [];
//    public function add(Store $store) {
//        $this->inv[] = $store;
//    }
//    public function totalSum() {
//        $sum = 0;
//        foreach($this->inv as $product) {
//            $sum += $product->price * $product->quantity;
//        }
//        return $sum;
//    }
//}
//
//$item1 = new Store("āboli", 0.4, 50);
//$item2 = new Store("šokolāde", 1.99, 25);
//$item3 = new Store("maize", 0.7, 15);
//$b = new Together();
//$b->add($item1);
//$b->add($item2);
//$b->add($item3);
//
//echo $item1->name . " " . $item1->price . "$" . " " . $item1->quantity . PHP_EOL;
//echo $item2->name . " " . $item2->price . "$" . " " . $item2->quantity . PHP_EOL;
//echo $item3->name . " " . $item3->price . "$" . " " . $item3->quantity . PHP_EOL;
//echo "---------------------" . PHP_EOL;
//echo "Total : " . $b->totalSum() . "$";


//ex 3

class CarPlace {
    public string $make;
    public string $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }
}

class CarList
{
    public array $available = [];
    public array $reserved = [];

    public function add(CarPlace $carPlace): object
    {
        return $this->available[] = $carPlace;
    }

    public function print()
    {
        echo "Available cars : " . PHP_EOL;
        foreach ($this->available as $index => $item) {
            echo $index . " ";
            foreach ($item as $value) {
                echo $value . " ";
            }
            echo PHP_EOL;
        }
    }

    public function reservedList()
    {
        $which = readline("pick a car index to reserve it : ");
        if (!array_key_exists($which, $this->available)) {
            exit;
        } else {
            $this->reserved[] = $this->available[$which];
            unset($this->available[$which]);
            echo "Reserved cars : " . PHP_EOL;
            foreach ($this->reserved as $index => $val) {
                echo $index . " ";
                foreach ($val as $car) {
                    echo $car . " ";
                }
                echo PHP_EOL;
            }
        }
    }
}
$car1 = new CarPlace("Audi", "A7");
$car2 = new CarPlace("BMW", "M4");
$car3 = new CarPlace("Nissan", "GT-R");
$car4 = new CarPlace("Mercedes", "AMG C63S");

$a = new CarList();
$a->add($car1);
$a->add($car2);
$a->add($car3);
$a->add($car4);
while ($a->available) {
    $a->print();
    $a->reservedList();
}



