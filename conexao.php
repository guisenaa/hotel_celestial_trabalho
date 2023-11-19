<?php
//declaração das variáveis.
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "hotel_celestial";
$port = 3306;

//Teste de conexão com o banco de dados.
try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    //echo"Conexão com banco de dados realizada com sucesso!";
}catch(PDOException $err){
    //echo "Conexão co banco de dados não realizada com sucesso! Erro gerado: " . $err->getMessage();
}

?>