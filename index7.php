<?php

declare(strict_types=1);

/* EXERCISE 7
Copy your solution from exercise 6
Make a static property in the Beverage class that can only be accessed from inside the class called address
which has the value "Melkmarkt 9, 2000 Antwerpen".

print the address without creating a new instant of the beverage class 2 times in two different ways.



Use typehinting everywhere!


*/

class Beverage
{
    private $temperature;
    private string $color;
    private float $price;

    const BARNAME = "Django";
    private static $address = "Antwerpsesteenweg 322, 9040 Gent";


    public static function getAddress(): string
    {
        return self::$address;
    }


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

    public function barInfo(): string
    {
        return "This bar is called " . self::BARNAME;
    }
}


class Beer extends Beverage
{
    private string $name;
    private float $alcoholpercentage;

    public function __construct(string $name, float $alcoholpercentage, string $color, float $price, string $temperature = "cold")
    {
        $this->name = $name;
        $this->alcoholpercentage = $alcoholpercentage;
        parent::__construct($color, $price, $temperature = "cold");
    }

    public function getAlcoholpercentage(): float
    {
        return $this->alcoholpercentage;
    }

    public function invite(): string
    {
        return "Hey I'm at " . parent::BARNAME . " come over and let's have a beer";
    }
}

echo Beverage::getAddress() . "<br>";
echo "<br>";
echo Beer::getAddress();
