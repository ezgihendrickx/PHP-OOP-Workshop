<?php

declare(strict_types=1);
class Beverage
{
    public string $Color;
    public float $Price;
    public string $Temperature;

    public function __construct(string $Color, float $Price, string $Temperature = "cold")
    {
        //  if (!in_array($Color, ["Red", "Green", "Blue"])) {
        $this->Temperature = $Temperature;
        $this->Color = $Color;
        $this->Price = $Price;
    }
    public function getInfo(): string
    {
        return "This drink is " . $this->Color . " and the price is " . $this->Price . ".";
    }
}
$cola = new Beverage("black", 2);

echo $cola->Temperature . PHP_EOL;
echo "<br>";
echo $cola->getInfo() . PHP_EOL;

class Beer extends Beverage
{
    public string $name;
    public float $alcoholpercentage;

    public function __construct(string $Color, string $name, float $Price, float $alcoholpercentage, string $temperature = "cold")
    {
        $this->Color = $Color;
        $this->name = $name;
        $this->Price = $Price;
        $this->temperature = $temperature;
        $this->alcoholpercentage = $alcoholpercentage;
    }
    public function getAlcoholpercentage()
    {
        return $this->alcoholpercentage;
    }
}
$duvel = new Beer("Blond", "Duvel", 3.5, 0.085);
echo "<br>";
echo $duvel->alcoholpercentage;
echo "<br>";
echo $duvel->getAlcoholpercentage();
echo "<br>";
echo $duvel->Color;
echo "<br>";
echo $duvel->name;
echo "<br>";
echo $duvel->getInfo();
echo "<br>";
// echo $cola->alcoholpercentage;