<?php

$person1 = new stdClass();
$person1->base = 7.5;
$person1->hours = 35;

$person2 = new stdClass();
$person2->base = 8.2;
$person2->hours = 47;

$person3 = new stdClass();
$person3->base = 10;
$person3->hours = 73;

$employees = [];
$employees[0] = $person1;
$employees[1] = $person2;
$employees[2] = $person3;

    function pay($base, $hours) {
        if ($base > 8) {
            if ($hours <= 40) {
                return $base * $hours . 'eur' . PHP_EOL;
            } else if ($hours > 40 && $hours < 60) {
                $first = $base * 40;
                $second = ($hours - 40) * ($base * 1.5);
                return $first + $second . 'eur' . PHP_EOL;
            } else if ($hours > 60) {
                return 'You can not work for more than 60 hours' . PHP_EOL;
            } else {
                return 'how did you get here?';
            }
        } else {
            return "the minimum wage is 8.00$ an hour" . PHP_EOL;
        }
    }

    function main ($employees) {
        for ($i = 0; $i < count($employees); $i++) {
            echo pay($employees[$i]->base, $employees[$i]->hours);
        }
    }
    main($employees);

//echo pay(7.5, 35);
//echo pay(8.2, 47);
//echo pay(10, 73);