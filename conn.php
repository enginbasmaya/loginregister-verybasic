<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "loginregister";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Veritabanına bağlantı hatası: ".$e->getMessage());
}
?>