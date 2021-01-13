<?php
//due to time constraints check only few test cases
final class ProductCheckotTest extends TestCase {
    public function testTotalPriceOfGivenItems()
    {
        $pricingRules = [
            'A' => new ProductPrice(50, new ProductDiscount(3, 20)),
            'B' => new ProductPrice(30, new ProductDiscount(2, 15)),
            'C' => new ProductPrice(20, new ProductDiscount(2, 12),new ProductDiscount(3, 30)),
            'D' => new ProductPrice(15, new ProductDiscount(5, 100)),
            'E' => new ProductPrice(5),
        ];

        $this->assertEquals((new Checkout('A', $pricingRules))->total(), 50);
        $this->assertEquals((new Checkout('AB', $pricingRules))->total(), 80);
        $this->assertEquals((new Checkout('CDBA', $pricingRules))->total(), 115);
        $this->assertEquals((new Checkout('AA', $pricingRules))->total(), 100);
        $this->assertEquals((new Checkout('AAA', $pricingRules))->total(), 130);

    }

    public function testTotalPriceOfGivenItemsWithMultipleDiscounts()
    {
        $pricingRules = [
            'A' => new ProductPrice(50, [new ProductDiscount(3, 20), new ProductDiscount(10, 100)]),
            'B' => new ProductPrice(30, [new ProductDiscount(2, 15), new ProductDiscount(5, 50)]),
            'C' => new ProductPrice(20, new ProductDiscount(2, 12),new ProductDiscount(3, 30)),
            'D' => new ProductPrice(15, new ProductDiscount(5, 100)),
        ];

        $this->assertEquals((new Checkout('AAA', $pricingRules))->total(), 130);
        $this->assertEquals((new Checkout('BB', $pricingRules))->total(), 45);
       
    }
}