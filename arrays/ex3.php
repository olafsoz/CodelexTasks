<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$val = (int) readline("Enter a value to look for ") . PHP_EOL;
$counter = 0;
for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] == $val) {
        $counter += 1;
        echo "yup ";
        break;
    }
}
if ($counter === 0) {
    echo "No such value";
}
//$value = in_array($val, $numbers);
//if ($value) {
//    echo "It exists in the array";
//} else {
//    echo "It does not exist in the array";
//}

//todo check if an array contains a value user entered