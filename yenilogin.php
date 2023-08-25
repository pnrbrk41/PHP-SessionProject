
<!DOCTYPE html>
<html>
<head>
    <title>Yeni Kullanıcı Kaydı</title>
</head>
<body>

<h2>Yeni Kullanıcı Kaydı</h2>

<form action="yenilogin.php" method="POST">
    <label for="ad">Ad:</label>
    <input type="text" id="ad" name="uyeler_username" required><br><br>
    
    <label for="soyad">Soyad:</label>
    <input type="text" id="soyad" name="uyeler_usersurname" required><br><br>
    
    <label for="email">E-posta:</label>
    <input type="email" id="email" name="uyeler_mail" required><br><br>
    
    <label for="sifre">Şifre:</label>
    <input type="password" id="sifre" name="uye_sifre" required><br><br>
    
    <input type="submit" value="Kaydol">
</form>

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
    $uyeler_username = $_POST['uyeler_username'];
    $uyeler_usersurname = $_POST['uyeler_usersurname'];
    $uyeler_mail = $_POST['uyeler_mail'];
    $uye_sifre = $_POST['uye_sifre'];

    $sql = "INSERT INTO uye (uyeler_username, uyeler_usersurname, uyeler_mail, uye_sifre)
            VALUES ('$uyeler_username', '$uyeler_usersurname', '$uyeler_mail', '$uye_sifre')";

    if ($conn->query($sql) === TRUE) {
        echo "Yeni kullanıcı kaydı başarıyla oluşturuldu.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>