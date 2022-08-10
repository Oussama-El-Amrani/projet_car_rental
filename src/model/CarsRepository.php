<?php
namespace App\Model\CarsRepository;
require '../vendor/autoload.php';
require 'Cars.php';

use App\Lib\Database\DatabaseConnection;
use App\Model\Cars\Car;
use \PDO;

class CarsRepository
{
    public DatabaseConnection $connection;

    public function getCars(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM car where available<>0"
        );
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);

        $carsArray = [];

        foreach($cars as $row) {
            $car = new Car();
            $car->setId($row['id']);
            $car->setMarque($row['marque']);
            $car->setDaily_price($row['daily_price']);
            $car->setAvailable($row['available']);
            $car->setCar_picture($row['car_picture']);
            $car->setModele($row['modele']);
            $car->setId($row['id']);
            $car->setId($row['id']);
            $carsArray[] = $car;
        }

        return $carsArray;
    }

    public function getCarsForAdmin(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM car"
        );
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($cars as $row) {
            $car = new Car();
            $car->setId($row['id']);
            $car->setMarque($row['marque']);
            $car->setDaily_price($row['daily_price']);
            $car->setAvailable($row['available']);
            $car->setCar_picture($row['car_picture']);
            $car->setModele($row['modele']);
            $car->setId($row['id']);
            $car->setId($row['id']);
            $carsArray[] = $car;
        }

        return $carsArray;
    }
}