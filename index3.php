<?php

declare(strict_types=1);

class Beer
{
    public string $name;
    public float $alcoholpercentage;

    public function __construct(string $name, float $alcoholpercentage, string $Color, float $Price, string $temperature = "cold")
    {
        $this->Color = $Color;
        $this->name = $name;
        $this->Price = $Price;
        $this->temperature = $temperature;
        $this->alcoholpercentage = $alcoholpercentage;
    }
    public function getAlcoholpercentage(): float
    {
        return $this->alcoholpercentage;
    }
    //create a public method
    public function beerInfo(): string
    {
        return "Hi I'm $this->name and I have an alcohol percentage $this->alcoholpercentage and I have a $this->Color. " . " ";
    }
}

$duvel = new Beer("Duvel", 8.5, "light", 3.5);
echo "<br>";
echo $duvel->alcoholpercentage . "<br>";
echo $duvel->Color;
echo "<br>";
echo $duvel->beerInfo();
echo "<br>";
