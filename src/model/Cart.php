<?php
namespace App\Model\Cart;

use App\Lib\Database\DatabaseConnection;
use DateTime;
use Exception;
use \PDO;

require_once '../src/lib/database.php';

class Cart{
    public DatabaseConnection $connection;
    private string $id;
    private string $cin;
    private string $check_in;
    private string $check_out;
    private int $price;
    private bool $payer;
    
    public function addToCart(){
        $query = "INSERT INTO reservation(id, cin , check_in, check_out, price, payer) VALUES(:id, :cin , :check_in, :check_out, :price, :payer)";

        $statement = $this->connection->getConnection()->prepare($query);

        $ok = $statement->execute([
            ':id'=>$this->id,
            ':cin'=>$this->cin,
            ':check_in'=>$this->check_in,
            ':check_out'=>$this->check_out,
            ':price'=>$this->price,
            ':payer'=> false
        ]);

        if(!$ok){
            throw new Exception("Impossible d'ajouter cette commande au panier");
        }
    }

    public function payed(){
        $query = "UPDATE reservation SET payer = 1 WHERE id = '$this->id' AND cin = '$this->cin'";
        $statement = $this->connection->getConnection()->prepare($query);
        // dd($statement);
        $ok = $statement->execute();
        if(!$ok) {
            throw new Exception("Impossible de changer l'enregistrement $this->id dans la table car");
        }
    }

    public function NoPayed(){
        $query = "UPDATE reservation SET payer = 1 WHERE id = '$this->id' AND cin = '$this->cin'";
        $statement = $this->connection->getConnection()->prepare($query);
        $ok = $statement->execute();
        if(!$ok) {
            throw new Exception("Impossible de changer l'enregistrement $this->id dans la table car");
        }
    }

    public function findCarsRentalOfUser($cin)
    {
        $query = "SELECT  car.id,check_in,check_out,price,modele,daily_price,car_picture,marque FROM reservation, utilisateur, car WHERE utilisateur.cin = '$cin' AND utilisateur.cin = reservation.cin AND reservation.id=car.id AND car.available=1";

        $statement = $this->connection->getConnection()->query($query);
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cars;
    }
    
    public function findCarsRentalOfAllUser()
    {
        $query = "SELECT  car.id,phone_num,email,city,first_name,last_name,check_in,check_out,price,modele,daily_price,utilisateur.cin FROM reservation, utilisateur, car WHERE utilisateur.cin = reservation.cin AND reservation.id=car.id";

        $statement = $this->connection->getConnection()->query($query);
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cars;
    }

    public function findCarsRentaPayed()
    {
        $query = "SELECT  car.id,email,city,first_name,last_name,check_in,check_out,price,modele,marque,daily_price,utilisateur.cin FROM reservation, utilisateur, car WHERE utilisateur.cin = reservation.cin AND reservation.id=car.id AND car.available = 0 AND utilisateur.cin= '$this->cin'";

        $statement = $this->connection->getConnection()->query($query);
        $cars = $statement->fetch(PDO::FETCH_ASSOC);
        return $cars;
    }

    public function deleteReservation(string $id , string $cin)
    {
        $query = "DELETE FROM reservation WHERE id = '$id' AND cin = '$cin'";

        $ok = $this->connection->getConnection()->exec($query);

        if(!$ok) {
            throw new Exception("Impossible de supprimer cette reservation");
        }
    }

    public function getTotal(): int
    {
        $totalPrice = 0;

        $query = "SELECT price FROM reservation, utilisateur WHERE reservation.cin=utilisateur.cin AND utilisateur.cin='$this->cin'";
        
        $statement = $this->connection->getConnection()->query($query);

        $prices = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($prices as $price)
        {
            $totalPrice=$totalPrice+(int)$price['price'];
        }
        return $totalPrice;
        
    }

    public function paymentSuccess()
    {
        $query = "UPDATE car,reservation SET car.available = 0 WHERE car.id = reservation.id AND reservation.cin = '$this->cin'";
        $statement = $this->connection->getConnection()->prepare($query);
        $ok = $statement->execute();
        if(!$ok) {
            throw new Exception("Impossible de changer l'enregistrement $this->id dans la table car");
        }
    }

    public function garage()
    {
        $query = "SELECT id,marque,daily_price,car_picture,check_in,check_out,price FROM car,reservation WHERE car.available=0 AND car.id=reservation.id AND reservation.cin = '$this->cin'";
        $statement = $this->connection->getConnection()->query($query);
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cars;
    }

    // Getter & Setter

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(): self
    {
        $query = "SELECT daily_price FROM car WHERE car.id = '$this->id'";

        $statement = $this->connection->getConnection()->query($query);
        $price = $statement->fetch(PDO::FETCH_ASSOC);
        $days = (int)(self::getCheck_in()->diff(self::getCheck_out()))->format('%R%a');
        $this->price = $price['daily_price']*(int)$days;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getcin()
    {
        return $this->cin;
    }

    public function setcin($cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getCheck_in(): DateTime
    {
        return new DateTime($this->check_in);
    }

    public function setCheck_in($check_in): self
    {
        $this->check_in = $check_in;

        return $this;
    }

    public function getCheck_out(): DateTime
    {
        return new DateTime($this->check_out);
    }

    public function setCheck_out($check_out): self
    {
        $this->check_out = $check_out;

        return $this;
    }

   
}