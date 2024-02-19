<?php
//Riprodurre una concessionaria di automobili in OOP seguendo questa gerarchia di classi, con caratteristiche a scelta (Marchio, Modello, Numero porte, Prezzo….e altri a vostra scelta)
// Automobile
// SUV
// Utilitaria
// Sportiva
// Tenere il conto degli oggetti creati per ogni classe


abstract class Automobile
{
    public $brand;
    public $model;
    public $nDoor;
    public $price;

    public static $counter = 0;

    public function __construct($_brand, $_model, $_nDoor, $_price)
    {
        $this->brand = $_brand;
        $this->model = $_model;
        $this->nDoor = $_nDoor;
        $this->price = $_price;

        Self::$counter++;
    }
}

class Suv extends Automobile
{
    public $high;
    use Motore;
    public function __construct($_brand, $_model, $_nDoor, $_price, $_high)
    {
        $this->high = $_high;
        parent::__construct($_brand, $_model, $_nDoor, $_price);
    }
}

class Utilitaria extends Automobile
{
    public $lenght;
    use Motore;
    public function __construct($_brand, $_model, $_nDoor, $_price, $_lenght)
    {
        $this->lenght = $_lenght;
        parent::__construct($_brand, $_model, $_nDoor, $_price);
    }
}

class Sportiva extends Automobile
{
    public $hp;
    use Motore;
    public function __construct($_brand, $_model, $_nDoor, $_price, $_hp)
    {
        $this->hp = $_hp;
        parent::__construct($_brand, $_model, $_nDoor, $_price);
    }
}

$suv1 = new Suv("Ford", "Kuga", 5, 30000, "2.2 Metri");
$suv2 = new Suv("Bmw", "X5", 5, 60000, "2.5 Metri");

$utilitaria1 = new Utilitaria("Audi", 'A4', 5, 38000, "5.5 Metri");
$utilitaria2 = new Utilitaria("Fiat", "Tipo", 5, 16000, "6 Metri");

$sportiva1 = new Sportiva("Zonda", 'Pagani', 3, 450000, "750 Cavalli");
$sportiva2 = new Sportiva("Bugatti", "Veyron", 3, 1000000, "1200 Cavalli");

var_dump($suv1, $suv2, $utilitaria1, $utilitaria2, $sportiva1, $sportiva2);
echo Automobile::$counter . "\n";
$suv1->motore();

//Extra 1: Creare una classe "Moto" (o qualcosa del genere) ed implementare un tratto che funzioni sia per le automobili che per le moto.

trait Motore
{
    public function motore()
    {
        echo "Il motore gira \n";
    }
}

class Moto
{
    public $brand;
    public $model;
    public $age;

    use Motore;
    public function __construct($_brand, $_model, $_age)
    {
        $this->brand = $_brand;
        $this->model = $_model;
        $this->age = $_age;
    }
}

$moto1 = new Moto("Kawasaki", "Ninja", 10);
var_dump($moto1);
$moto1->motore();
