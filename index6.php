<?php

declare(strict_types=1);

/* EXERCISE 6
Copy the classes of exercise 2.
change the properties to private.
Make a const barname with the value 'Het Vervolg'.
print the constant on the screen
create a function in beverage and use the constant.
Do the same in the beer class
print the output of these functions on the screen.
Make sure that every print is on a new line.

Use typehinting everywhere!



*/


class Beverage
{
    private string $temperature;
    private string $color;
    private float $price;
    protected const BARNAME = "Django";


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
    private const BEERNAME = "Westmalle";
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
        return "Hey I'm at " . parent::barInfo() . " come over and let's have a beer";
    }
    public  function getFavBeerName(): string
    {
        return self::BEERNAME;
    }
}

//echo Beverage::BARNAME . "<br>";
echo "<br>";
$cola = new Beverage('black', 2);
$duvel = new Beer('Duvel', 8.5, 'blond', 3.5);
echo $cola->barInfo() . "<br>";
echo "<br>";
echo $duvel->invite() . "<br>";
echo $duvel->getFavBeerName();
$water = new Beer('Jupiler', 4, "blond", 2);
echo $water->getFavBeerName(); //never changes omdat const is.
