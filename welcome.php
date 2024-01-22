<?php
session_start();

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoş Geldin</title>
</head>
<body>
    <h2>Hoş Geldin, <?php echo $username; ?>!</h2>
    <p><a href="logout.php">Çıkış Yap</a></p>
</body>
</html>