<?php

namespace App\Model\Cars;

require_once '../src/lib/database.php';

use App\Lib\Database\DatabaseConnection;
use \PDO;
use Exception;

class Car{
    public DatabaseConnection $connection;

    private string $id;
    private string $marque;
    private string $daily_price;
    private string $available;
    private $car_picture;
    private string $modele;

    public function getCar($id) :self
    {
        $query="SELECT * FROM car where id='$id'";
        $statement = $this->connection->getConnection()->query($query);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->id=$row['id'];
        $this->marque=$row['marque'];
        $this->daily_price=$row['daily_price'];
        $this->available=$row['available'];
        $this->car_picture=$row['car_picture'];
        $this->modele=$row['modele'];
        // dd($carBD);
        return $this;
    }

    public function deleteCar(string $id)
    {
        $query = "DELETE FROM car WHERE id = '$id'";
        $ok = $this->connection->getConnection()->exec($query);

        if(!$ok) {
            throw new Exception("Impossible de supprimer l'enregistrement $id dans la table car");
        }
    }

    public function update(
        // $id,string $modele, string $marque, string $daily_price, int $available, string $car_picture
        )
    {
        $query = "UPDATE car SET modele = :modele, marque = :marque, daily_price = :daily_price, available = :available, car_picture = :car_picture WHERE id = :id";

        $statement = $this->connection->getConnection()->prepare($query);
        if($this->car_picture){
            $file_car_picture = self::upload_file($this->car_picture);
        }
        
        $ok = $statement->execute([
            ':id'=>$this->id,
            ':modele'=>$this->modele,
            ':daily_price'=>$this->daily_price,
            ':marque'=>$this->marque,
            ':available'=>$this->available,
            ':car_picture'=>$file_car_picture
        ]);

        if(!$ok) {
            throw new Exception("Impossible de changer l'enregistrement $this->id dans la table car");
        }
    }

    public function newCar(//$id, $marque, $modele,$daily_price, $car_picture,$available
        )
    {
        $query = "INSERT INTO car(id, modele,marque, daily_price, available, car_picture) VALUES(:id, :modele, :marque, :daily_price, :available, :car_picture)";

        $statement = $this->connection->getConnection()->prepare($query);
        // dd($statement);
        $file_car_picture = self::upload_file($this->car_picture);
        // dd($file_car_picture);
        $ok = $statement->execute([
            ':id'=>$this->id,
            ':modele'=>$this->modele,
            ':daily_price'=>$this->daily_price,
            ':marque'=>$this->marque,
            ':available'=>$this->available,
            ':car_picture'=>$file_car_picture
        ]);
        // dd($ok);
        if(!$ok) {
            throw new Exception("Impossible de changer l'enregistrement $this->id dans la table car");
        }
    }

    public function upload_file($file)
    {
        // dd($_FILES);
        $uploadDir = "./imgs/cars_picture/";
        // $uploadDir = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'imgs' . DIRECTORY_SEPARATOR . 'cars_picture' . DIRECTORY_SEPARATOR;
        $uploadFilename = $uploadDir . basename($file['car_picture']['name']);
        // dd($uploadFilename);
        // dd($_FILES['car_picture']['tmp_name']);
       
        move_uploaded_file($_FILES['car_picture']['tmp_name'], $uploadFilename);
        // dd($uploadDir);

        return basename($file['car_picture']['name']);
    }

    public function getCar_pictures()
    {
        $pictures = [];
        $query = "SELECT car_picture FROM car";
        $statement = $this->connection->getConnection()->query($query);
       
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $pictures [] = $row['car_picture'];
        }
        // dd($pictures);
        return $pictures;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque($marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getDaily_price(): ?string
    {
        return $this->daily_price;
    }

    public function setDaily_price($daily_price): self
    {
        $this->daily_price = $daily_price;

        return $this;
    }

    public function getAvailable(): ?int
    {
        return $this->available;
    }

    public function setAvailable($available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getCar_picture()
    {
        return $this->car_picture;
    }

    public function setCar_picture($car_picture): self
    {
        $this->car_picture = $car_picture;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele($modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get the value of car_picture_Dir
     */ 
    public function getCar_picture_Dir()
    {
        return $this->car_picture_Dir;
    }

    /**
     * Set the value of car_picture_Dir
     *
     * @return  self
     */ 
    public function setCar_picture_Dir($car_picture_Dir)
    {
        $this->car_picture_Dir = $car_picture_Dir;

        return $this;
    }
}

// class CarRepository
// {
//     public DatabaseConnection $connection;

//     public function getCars(): array
//     {
//         $statement = $this->connection->getConnection()->query(
//             "SELECT * FROM car"
//         );
//         $cars = [];
//         while(($row = $statement->fetch())) {
//             $car = new Car;
//             $car->id=$row['id'];
//             $car->marque=$row['marque'];
//             $car->daily_price=$row['daily_price'];
//             $car->available=$row['available'];
//             $car->car_picture=$row['car_picture'];
//             $car->modele=$row['modele'];

//             $cars[] = $car;
//         }
//         return $cars;
//     }

//     public function getCar($id):Car
//     {
//         $query="SELECT * FROM car where id='$id'";
//         $statement = $this->connection->getConnection()->query($query);
//         $row = $statement->fetch(PDO::FETCH_ASSOC);
//         $car = new Car;
//         $car->id=$row['id'];
//         $car->marque=$row['marque'];
//         $car->daily_price=$row['daily_price'];
//         $car->available=$row['available'];
//         $car->car_picture=$row['car_picture'];
//         $car->modele=$row['modele'];
//         // dd($carBD);
//         return $car;
//     }

//     public function deleteCar(string $id)
//     {
//         $query = "DELETE FROM car WHERE id = '$id'";
//         $ok = $this->connection->getConnection()->exec($query);

//         if(!$ok) {
//             throw new Exception("Impossible de supprimer l'enregistrement $id dans la table car");
//         }
//     }

//     public function updtate($id,string $modele, string $marque, string $daily_price, int $available, string $car_picture)
//     {
//         $query = "UPDATE car SET modele = :modele, marque = :marque, daily_price = :daily_price, available = :available, car_picture = :car_picture WHERE id = :id";

//         $statement = $this->connection->getConnection()->prepare($query);

//         $ok = $statement->execute([
//             ':id'=>$id,
//             ':modele'=>$modele,
//             ':daily_price'=>$daily_price,
//             ':marque'=>$marque,
//             ':available'=>$available,
//             ':car_picture'=>$car_picture
//         ]);

//         if(!$ok) {
//             throw new Exception("Impossible de changer l'enregistrement $id dans la table car");
//         }
//     }

//     public function newCar($id, $marque, $modele,$daily_price, $car_picture,$available)
//     {
//         $query = "INSERT INTO car(id, modele,marque, daily_price, available, car_picture) VALUES(:id, :modele, :marque, :daily_price, :available, :car_picture)";

//         $statement = $this->connection->getConnection()->prepare($query);

//         $ok = $statement->execute([
//             ':id'=>$id,
//             ':modele'=>$modele,
//             ':daily_price'=>$daily_price,
//             ':marque'=>$marque,
//             ':available'=>$available,
//             ':car_picture'=>$car_picture
//         ]);

//         if(!$ok) {
//             throw new Exception("Impossible de changer l'enregistrement $id dans la table car");
//         }
//     }
// }