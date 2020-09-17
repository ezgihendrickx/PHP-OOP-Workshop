<?php

declare(strict_types=1);


/* EXERCISE 5
Copy the class of exercise 1.
change the properties to private.
fix the errors without using getter and setter functions.
change the price to 3.5 euro and print it also on the screen on a new line.


*/

class Beverage
{
    private string $temperature;
    private string $color;
    private  float $price;

    public function __construct(string $color, float $price, string $temperature = "cold")
    {
        $this->temperature = $temperature;
        $this->color = $color;
        $this->price = $price;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }


    public function getInfo(): string
    {
        return "This beverage is " . $this->temperature . " and " . $this->color . ".";
    }
}

$cola = new Beverage('black', 2);
echo $cola->temperature . "<br>";
$cola->price = 3.5;
echo $cola->price . "<br>";
