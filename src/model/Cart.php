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
    
    public function addToCart(){
        $query = "INSERT INTO reservation(id, cin , check_in, check_out, price) VALUES(:id, :cin , :check_in, :check_out, :price)";

        $statement = $this->connection->getConnection()->prepare($query);

        $ok = $statement->execute([
            ':id'=>$this->id,
            ':cin'=>$this->cin,
            ':check_in'=>$this->check_in,
            ':check_out'=>$this->check_out,
            ':price'=>$this->price
        ]);

        if(!$ok){
            throw new Exception("Impossible d'ajouter cette commande au panier");
        }
    }

    public function findCarsRental($cin)
    {
        $query = "SELECT  car.id,check_in,check_out,price,modele,daily_price FROM reservation, utilisateur, car WHERE utilisateur.cin = '$cin' AND utilisateur.cin = reservation.cin AND reservation.id=car.id AND car.available=1";

        $statement = $this->connection->getConnection()->query($query);
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
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
        // dd($prices);
        
        foreach($prices as $price)
        {
            // dd((int)$price);
            $totalPrice=$totalPrice+(int)$price['price'];
        }
        // dd($price);
        // dd($totalPrice);
        return $totalPrice;
        
    }

    public function paymentSuccess()
    {
        $query = "UPDATE car,reservation SET car.available = 0 WHERE car.id = reservation.id AND reservation.cin = '$this->cin'";
        $statement = $this->connection->getConnection()->prepare($query);
        // dd($statement);
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
        // dd($statement);
        $price = $statement->fetch(PDO::FETCH_ASSOC);
        // dd($price['daily_price']);
        $days = (int)(self::getCheck_in()->diff(self::getCheck_out()))->format('%R%a');
        // dd($days);
        $this->price = $price['daily_price']*(int)$days;
        // dd($this->price);
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