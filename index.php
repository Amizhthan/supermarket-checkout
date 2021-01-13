<?php
//Systemtest 13/01/2020 6:00PM @Amizhthan 
include 'constant.php';
include 'connection.php';


$ProductCheckout = new ProductCheckout('AAAB', $AmountRules);

var_dump($ProductCheckout->TotalAmount());



$database = new Connection();
$db = $database->openConnection();
$statement = $db->prepare("SELECT * FROM product");
$statement->execute();


foreach ($statement->fetchAll() as $product) {
    $stmt = $db->prepare("SELECT * FROM discount WHERE product_id=?");
    $stmt->execute([$product['id']]); 
    $productDiscounts = $stmt->fetchAll();
    $discounts = [];
    foreach ($productDiscounts as $discount) {
        $discounts[] = new ProductDiscount($discount['count'], $discount['discount']);
    }

    $pricingRules[$product['name']] = new ProductPrice($product['price'], $discounts);
}
