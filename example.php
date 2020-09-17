<?php

declare(strict_types=1);
session_start();

ini_set('display_errors', (string)1);
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

interface Discount
{
    public function apply(Product $product): float;
}

class FixedDiscount implements Discount
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function apply(Product $product): float
    {
        return $product->getPrice() - $this->value;
    }
}

class VariableDiscount implements Discount
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function apply(Product $product): float
    {
        return round($product->getPrice() - ($product->getPrice() * $this->value / 100));
    }
}

class NotADiscountDiscount implements Discount
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function apply(Product $product): float
    {
        return $product->getPrice() * 3;
    }
}

class Product
{
    const VAT = 1.21;
    private string $name;
    private int $size;
    private float $price;
    private $discount;

    public function __construct(
        string $name,
        int $size,
        float $price,
        Discount $discount
    ) {
        $this->name = $name;
        $this->size = $size;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function calculatePrice(): float
    {
        return $this->discount->apply($this) * self::VAT;
    }
}

$discount = new FixedDiscount(5);
$chair = new Product('Chair', 5, 50, $discount);

$discount = new NotADiscountDiscount(50);
$bed = new Product('Bed', 5, 50, $discount);

echo 'The new price is ' . $chair->calculatePrice();
echo '<br>The new price is ' . $bed->calculatePrice();
// SOLID