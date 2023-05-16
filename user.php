<?php

class User
{
    private $name;
    private $email;
    private $phone;
    private $city;


    public function __construct($name, $email, $phone, $city)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->city = $city;
    }

    public function insertUser($conn)
    {
        $sql = "INSERT INTO usuario (name, email, phone, city)
        VALUES ('$this->name', '$this->email', '$this->phone', '$this->city')";

        $conn->query($sql);
    }

    public function getLastNUsers($conn, $limit)
    {
        $sql = "SELECT name, email, phone, city FROM usuario ORDER BY id_user DESC LIMIT :limit";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $usersArray = array(); // Arreglo para almacenar los usuarios

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $name = $row['name'];
                $email = $row['email'];
                $phone = $row['phone'];
                $city = $row['city'];

                $usersArray[] = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'city' => $city
                );
            }
        }

        return $usersArray;
    }
}
