<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
</head>
<body>
    <h2>Giriş Yap</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Kullanıcı Adı:</label>
        <input type="text" name="uyeler_username" required><br><br>
        <label>Parola:</label>
        <input type="password" name="uye_sifre" required><br><br>
        <input type="submit" value="Giriş">
        <button onclick="window.location.href='yenilogin.php'">
    Yeni Üyelik
</button>
    </form>
    <?php if(isset($error)) { echo $error; } ?>
</body>
</html>

<?php
$host = "localhost:3306"; // Veritabanı sunucu adı
$db_username = "root"; // Veritabanı kullanıcı adı
$db_password = "1234"; // Veritabanı parolası
$db_name = "kullunici_girisi"; // Veritabanı adı

$conn = new mysqli($host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uyeler_username = $_POST["uyeler_username"];
    $uye_sifre = $_POST["uye_sifre"];

    $sql = "SELECT uyeler_id FROM uye WHERE uyeler_username = '$uyeler_username' AND uye_sifre = '$uye_sifre'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Giriş başarılı
        session_start();
        $_SESSION["uyeler_username"] = $uyeler_username;
        header("Location: kayitekleme.php"); // Giriş yapıldıktan sonra yönlendirilecek sayfa
    } else {
		echo "yanlış parola";
        $error = "Geçersiz kullanıcı adı veya parola.";
    }
}
?>
