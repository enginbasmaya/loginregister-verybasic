
<?php
require_once "conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try{
        $stmt = $conn->prepare("INSERT INTO 
                                        users
                                            (username, password)
                                        VALUES
                                            (?, ?)");
        $stmt->execute([$username, $hashedPassword]);
        echo "Kayıt işlemi başarıyla tamamlandı. Giriş yapabilirsiniz.";
    }catch(PDOException $e){
        echo "Kayıt işlemi sırasında bir hata oluştu: ".$e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
</head>
<body>
    <h2>Kayıt Ol</h2>
    <form method="post" action="register.php">
        <label>Kullanıcı Adı:</label>
        <input type="text" name="username" required><br>

        <label>Şifre:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Kayıt Ol">
    </form>
</body>
</html>