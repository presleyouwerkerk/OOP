<?php

namespace Producten\Classes;

class ProductList 
{
    private array $products = [];

    public function addProduct(Product $product) 
    {
        $this->products[] = $product;
    }

    public function getProducts(): array 
    {
        return $this->products;    
    }
}