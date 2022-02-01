<?php

class Date
{
    private int $year;
    private int $month;
    private int $day;

    public function __construct($year, $month, $day) {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    public function setYear($year) {
        if ($year > 1940 && $year <= 2022) {
            $this->year = $year;
        }
    }

    public function setMonth($month) {
        if ($month > 0 && $month <= 12) {
            $this->month = $month;
        }
    }

    public function setDay($day) {
        if ($day > 0 && $day <= 31) {
            $this->day = $day;
        }
    }

    public function getYear(): int {
        return $this->year;
    }

    public function getMonth(): int {
        return $this->month;
    }

    public function getDay(): int {
        return $this->day;
    }

    public function displayDate(): string {
        return $this->day . "/" . $this->month . "/" . $this->year;
    }
}
$a = new Date(2022, 01, 26);
echo $a->displayDate() . PHP_EOL;
$a->setYear(1879);
echo $a->getYear() . PHP_EOL;
$a->setDay(-45);
echo $a->getDay();