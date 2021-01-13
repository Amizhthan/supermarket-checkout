<?php
include 'ProductCheckout.php';
include 'ProductDiscount.php';
include 'ProductPrice.php';
$AmountRules = [
    'A' => new ProductPrice(50, [new ProductDiscount(3, 20), new ProductDiscount(10, 100)]),
    'B' => new ProductPrice(30, [new ProductDiscount(2, 15)]),
    'C' => new ProductPrice(20, [new ProductDiscount(2, 12),new ProductDiscount(3, 30)]),
    'D' => new ProductPrice(15, new ProductDiscount(5,100)),
    'E' => new ProductPrice(5),
];

?>