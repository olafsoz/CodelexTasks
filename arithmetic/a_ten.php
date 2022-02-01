<?php

class geometry {
    public static function areaCircle($radius) {
        if ($radius > 0) {
            return M_PI * ($radius * $radius);
        } else {
            return "error";
        }
    }
    public static function areaRectangle($length, $width) {
        if ($length > 0 && $width > 0) {
            return $length * $width;
        } else {
            return "error";
        }
    }
    public static function areaTriangle($lengthBase, $triHeight) {
        if ($lengthBase > 0 && $triHeight > 0) {
            return $lengthBase * $triHeight * 0.5;
        } else {
            return "error";
        }
    }
}
while(true) {
    echo "Geometry Calculator\n";
    echo "1. Calculate the Area of a Circle\n";
    echo "2. Calculate the Area of a Rectangle\n";
    echo "3. Calculate the Area of a Triangle\n";
    echo "4. Quit\n";
    echo "Enter your choice (1-4) : ";
    $val = readline();
    if ($val < 1 || $val > 4) {
        echo "error" . PHP_EOL;
    } else if ($val == 1) {
        echo geometry::areaCircle(3) . PHP_EOL;
    } else if ($val == 2) {
        echo geometry::areaRectangle(5, 4) . PHP_EOL;
    } else if ($val == 3) {
        echo geometry::areaTriangle(3, 6) . PHP_EOL;
    } else {
        exit;
    }
}