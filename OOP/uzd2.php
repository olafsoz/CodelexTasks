<?php

class Point {
    private int $x;
    private int $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    public function swapPoints(Point &$point1, Point &$point2) {
        $tmp = $point1;
        $point1 = $point2;
        $point2 = $tmp;
    }
    public function returnX(): int {
        return $this->x;
    }
    public function returnY(): int {
        return $this->y;
    }
}
$a = new Point(5, 2);
$b = new Point(-3, 6);
$a->swapPoints($a, $b);
echo "(" . $a->returnX() . ", " . $a->returnY() . ")" . PHP_EOL;
echo "(" . $b->returnX() . ", " . $b->returnY() . ")";
