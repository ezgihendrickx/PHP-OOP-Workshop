<?php

declare(strict_types=1);


/* EXERCISE 4
Copy the code of exercise 2 to here and delete everything related to cola.
Make all properties protected.
Make all the other prints work without error without changing the beverage class.

USE TYPEHINTING EVERYWHERE!
*/

class Beverage
{
    protected string $temperature;
    protected string $color;
    protected float $price;


    public function __construct(string $color, float $price, string $temperature = "cold")
    {
        $this->temperature = $temperature;
        $this->color = $color;
        $this->price = $price;
    }


    public function getInfo(): string
    {
        return "This beverage is " . $this->temperature . " and " . $this->color . ".";
    }

    /**
     * @param string $temperature
     */
    public function setTemperature(string $temperature): void
    {
        $this->temperature = $temperature;
    }
}


class Beer extends Beverage
{
    protected $name;
    protected float $alcoholPercentage;

    public function __construct(string $name, float $alcoholPercentage, string $color, float $price, string $temperature = "cold")
    {
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
        parent::__construct($color, $price, $temperature = "cold");
    }

    public function getAlcoholPercentage(): float
    {
        return $this->alcoholPercentage;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getTemperature(): string
    {
        return $this->temperature;
    }
}

$duvel = new Beer('Duvel', 8.5, 'blond', 3.5);
echo $duvel->getAlcoholPercentage() . "<br>";
echo $duvel->getColor() . "<br>";
echo $duvel->getInfo() . "<br>";
