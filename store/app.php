<?php

[$name, $cash] = $personData = explode(", ", file_get_contents("buyers.txt"));

$person = new stdClass();
$person->name = $name;
$person->cash = $cash;

function createProducts(string $item, int $price): stdClass {
    $product = new stdClass();
    $product->item = $item;
    $product->price = $price;
    return $product;
}

$products = [];

if (($handle = fopen('products.csv', 'r')) !== false) {
    while ($data = fgetcsv($handle, 1000)) {
        [$item, $price] = $data;
        $products[] = createProducts($data[0], (int) $data[1]);
    }
    fclose($handle);
}

echo "$name has $cash" . PHP_EOL . PHP_EOL;
//$products = [
//    createProducts('Alus', 2.5),
//    createProducts('Maize', 0.8),
//    createProducts('Gaļa', 4),
//    createProducts('Šokolāde', 3)
//];
$basket = [];
if (file_exists('basket.txt')) {
    $basket = explode(',', file_get_contents('basket.txt'));
}


while (true) {

    echo '[1] Purchase' . PHP_EOL;
    echo '[2] Checkout' . PHP_EOL;
//    echo '[3] Clear basket' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;

    $option = (int) readline('Select an option' . PHP_EOL);
    switch ($option) {
        case 1:

            foreach($products as $index => $product) {
                echo "{$index} {$product->item} {$product->price}$" . PHP_EOL;
            }
            $selectedProductIndex = (int) readline('Select product ');

            $product = $products[$selectedProductIndex] ?? null;
            if ($product === null) {
                echo 'Product not found' . PHP_EOL;
                exit;
            }
            if ($person->cash < $product->price) {
                echo 'Not enough money';
                exit;
            }

            $basket[] = $selectedProductIndex;

            echo "You put $product->item in the basket!" . PHP_EOL;

            break;
        case 2:
            $totalSum = 0;
                foreach ($basket as $productIndex) {
                    $product = $products[$productIndex];
                    $totalSum += $product->price;
                    echo "{$product->item}" . PHP_EOL;
                }
                echo "_________________" . PHP_EOL;
                echo "Total : $totalSum $";
                echo PHP_EOL;
                echo $person->cash >= $totalSum ? "Successful payment." : "Payment failed. Not enough money.";
                echo PHP_EOL;
            //clear file
            if (file_exists('basket.txt')) {
                unlink('basket.txt');
            }
            exit;

//        case 3:
//            file_put_contents("basket.txt", "");
//            break;
        default:
            $productIndexes = implode(',', $basket);
            file_put_contents('$basket.txt', $productIndexes);
            exit;
    }
}


