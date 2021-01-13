<?php
class ProductCheckout {
    private $AmountRules = [];
    private $ItemsSize  = [];
    private $ItemsPrices  = [];

    public function __construct($itemsStr, $AmountRules)
    {
         $this->AmountRules = $AmountRules;

        foreach ($this->AmountRules as $type => $productPrice) {
            $this->ItemsSize[$type]  = substr_count($itemsStr, $type);
           
        }
    }

    public function TotalAmount()
    {
        array_sum($this->ItemsPrices);
    }
}