<?php
class RandomUserAPI {
    private $url = "https://randomuser.me/api/?results=10";
    
    public function getUsers() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
}
$api = new RandomUserAPI();
$users = $api->getUsers();

echo json_encode($users);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba_ajax";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

foreach ($users['results'] as $user) {
    $name = $user['name']['first']." ".$user['name']['last'];
    $email = $user['email'];
    $phone = $user['phone'];
    $city = $user['location']['city'];

    $sql = "INSERT INTO usuario (name, email, phone, city)
    VALUES ('$name', '$email', '$phone', '$city')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); 
?>
