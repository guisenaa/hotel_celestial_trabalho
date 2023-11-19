<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "reservas_hotel_celestial";
$port = "3306";

//Testando conexão com o banco de dados.
try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    //echo"Conexão com banco de dados realizada com sucesso!";
}catch(PDOException $err){
    //echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado ". $err->getMessage();
}
?>