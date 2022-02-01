<?php
//ex 2.1
 $int = 10;
 $str = "10";
 if ($int === $str) {
     echo "They are the same";
 } else {
     echo "They are NOT the same";
 };

//ex 2.2
 $inte = 50;
 if ($inte > 0 && $inte <= 100) {
     echo "\n$inte is in range of 1 to 100";
 } else {
     echo "\n$inte is NOT in range of 1 to 100";
 }

//ex 2.3
 $hello = "hello";
 if ($hello === "hello") {
     echo "\nworld";
 } else {
     echo "";
 }

//ex 2.4
 $x = 7;
 $y = 4;
 $z = 19.3;
 if ($x >$y && $z > $x) {
     echo "\nwooo";
 } else {
     echo "\nnot wooo";
 }

//ex 2.5
 $integer = 50;
 $y = 205;
 $z = 50;
 if ($integer >= $z && $integer < $y) {
     echo "\ncorrect";
 }

//ex 2.6
 $plateNumber = "DJ88";
 switch ($plateNumber) {
     case "ZX8986":
         echo "Your car number is ZX8986";
         break;
     case "XX98":
         echo "Your car number is XX98";
         break;
     default:
         echo "\nWell then your car's numberplate is $plateNumber";
 }

//ex 2.7
 $number = 36;
 switch($number) {
     case $number < 50:
         echo "\nlow";
         break;
     case $number > 50 && $number <= 100:
         echo "\nmedium";
         break;
     case $number > 100:
         echo "\nhigh";
         break;
     default:
         echo "\nsomething went wrong...";
 }