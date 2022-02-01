<?php

echo "Let's calculate your BMI! \nFor imperial Input height in inches and weight in pounds . For metric input height in cm and weight in kg.\nIn the next line type 'imperial' or 'metric', then your height and weight respectively.\n";
$val = readline();
$val = strtolower($val);
$height = readline();
$weight = readline();

function calculate($height, $weight): string
{
    $BMI = round(($weight / ($height * $height)) * 703, 1);
    if ($BMI > 18.5 && $BMI < 25) {
        return "Your BMI is $BMI. You have optimal weight";
    } else if ($BMI > 25) {
        return "Your BMI is $BMI. You are overweight";
    } else {
        return "Your BMI is $BMI. You are underweight";
    }
}

if ($val === 'imperial') {
    echo calculate($height, $weight);
} else if ($val === 'metric') {
    $height *= 0.393700787;
    $weight *= 2.2;
    echo calculate($height, $weight);
} else {
    return 'Did you type exactly as shown?';
}