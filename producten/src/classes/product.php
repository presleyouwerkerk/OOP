<?php
namespace Producten\Classes;

abstract class Product 
{
    private string $name;
    private float $purchasePrice;
    private int $tax;
    protected string $description;
    private float $profit;
    protected string $category;
    private float $sellingPrice;

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) 
    {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->profit = $profit;
        $this->description = $description;
        $this->sellingPrice = $this->purchasePrice + $this->profit + $this->tax;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function getCategory(): string 
    {
        return $this->category;
    }

    public function getSalesPrice(): float 
    {
        return $this->sellingPrice;
    }

    abstract public function getInfo();
    abstract public function setCategory(string $category);
}