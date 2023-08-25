<a>Kayıt ekleme</a>
<?php
session_start();

if (isset($_SESSION["uyeler_username"])) {
    $uyeler_username = $_SESSION["uyeler_username"];
} else {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ana Sayfa</title>
</head>
<body>

<div style="text-align: right;">
    Hoş geldiniz, <?php echo $uyeler_username; ?>! | <a href="logout.php">Çıkış Yap</a>
</div>

<h2>Ana Sayfa</h2>
<!-- Sayfa içeriği -->

</body>
</html>