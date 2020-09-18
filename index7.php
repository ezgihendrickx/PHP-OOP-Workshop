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
    protected static int $timesServed = 0;
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
        ++self::$timesServed;
    }


    public function getInfo(): string
    {
        return "This beverage is " . $this->temperature . " and " . $this->color . ".";
    }

    public function barInfo(): string
    {
        return "This bar is called " . self::BARNAME;
    }
    /**
     * Get the value of timesServed
     */
    public static function getTimesServed()
    {
        return self::$timesServed;
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
echo "<br>";
$duvel = new Beer('Duvel', 8.5, 'blond', 3.5);

echo $duvel->getTimesServed();
echo "<br>";
$Jupiler = new Beer('Jupiler', 4, "blond", 2);
echo $Jupiler->getTimesServed();
echo "<br>";
$GentseStrop = new Beer('Strop', 8.5, 'blond', 3.5);
echo $GentseStrop->getTimesServed();

// print_r($duvel);
// var_dump($duvel);
