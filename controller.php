<?php
require_once('randomUserApi.php');
require_once('conexion.php');
require_once('user.php');

$conexion = new Conexion();
$conn = $conexion->getConnection();

$randomUserAPI = new RandomUserAPI();
$users = $randomUserAPI->getUsers();

foreach ($users['results'] as $user) {
    $name = $user['name']['first']." ".$user['name']['last'];
    $email = $user['email'];
    $phone = $user['phone'];
    $city = $user['location']['city'];
    $user_db = new User($name, $email, $phone, $city);
    $user_db->insertUser($conn); 
}

$last10Users = $user_db->getLastNUsers($conn, 10);

$conexion->closeConnection();

echo json_encode($last10Users);

?>