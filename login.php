<?php
require_once "conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try{
        $stmt = $conn->prepare("SELECT
                                    password
                                FROM
                                    users
                                WHERE
                                    username = ? AND
                                    status='A'");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row && password_verify($password, $row["password"])){
            session_start();
            $_SESSION["username"] = $username;
            header("Location: welcome.php");
            exit;
        }
    }catch(PDOException $e){
        echo "Giriş işlemi sırasında bir hata oluştu: ".$e->getMessage();
    }

    echo "Geçersiz kullanıcı adı veya şifre";
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
</head>
<body>
    <h2>Giriş Yap</h2>
    <form method="post" action="login.php">
        <label>Kullanıcı Adı:</label>
        <input type="text" name="username" required><br>

        <label>Şifre:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>