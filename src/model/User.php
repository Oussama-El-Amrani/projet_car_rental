<?php

namespace App\Model\User;

require_once '../src/lib/database.php';

use App\Lib\Database\DatabaseConnection;


class User
{
    public DatabaseConnection $connection;
    
    private string $cin;
    private string $first_name;
    private string $last_name;
    private string $city;
    private string $phone_num;
    private string $email;
    private string $password;
    private $user_picture;
    private int $admin=0;

    public function addUser(): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO utilisateur(cin,first_name,last_name,city,phone_num,email,password,user_picture) VALUES(?,?,?,?,?,?,?,?)'
        );

        $file_user_picture = self::upload_file($this->user_picture);

        $affectedLines = $statement->execute([$this->cin,$this->first_name,$this->last_name,$this->city,$this->phone_num,$this->email,password_hash($this->password,PASSWORD_BCRYPT),$file_user_picture]);

        return ($affectedLines>0);
    }
    
    public function findByEmail(string $email)
    {
        //
    }

    public function is_user(): bool
    {
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM utilisateur WHERE email=:email');
        $statement->execute(['email'=> $this->email]);
        $user = $statement->fetch(\PDO::FETCH_ASSOC);
        $this->cin=$user['cin'];
        $this->admin=$user['admin'];
        $this->first_name=$user['first_name'];
        $this->last_name=$user['last_name'];
        $this->city=$user['city'];
        $this->phone_num=$user['phone_num'];
        $this->user_picture=$user['user_picture'];

        if(!$user){
            return false;
        }
        if(password_verify($this->password,$user['password'])){
            return true;
        } else {
            return false;
        }
    }

    public function is_admin(): bool
    {
        return $this->admin;
    }

    public function upload_file($file)
    {
        $uploadDir = "./imgs/cars_picture/";
        $uploadFilename = $uploadDir . basename($file['user_picture']['name']);

        move_uploaded_file($_FILES['user_picture']['tmp_name'],$uploadFilename);

        return basename($file['user_picture']['name']);
    }

    // Getter & Setter

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin($cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getFirst_name(): ?string
    {
        return $this->first_name;
    }

    public function setFirst_name($first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLast_name(): ?string
    {
        return $this->last_name;
    }

    public function setLast_name($last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity($city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone_num(): string
    {
        return $this->phone_num;
    }

    public function setPhone_num($phone_num): self
    {
        $this->phone_num = $phone_num;

        return $this;
    }


    public function getEmail():?string
    {
        if($this->email){
            return $this->email;
        }
        return '';
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUser_picture()
    {
        return $this->user_picture;
    }

    public function setUser_picture($user_picture): self
    {
        $this->user_picture = $user_picture;

        return $this;
    }

    public function getAdmin(): bool
    {
        return $this->admin;
    }

}

