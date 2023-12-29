<?php

session_start(); // Session başlat

if (!isset($_SESSION['user'])) {    // Eğer kullanıcı giriş yapmadıysa
    header("Location: /emlakla/auth/"); // Giriş sayfasına yönlendir
    exit;   
}

include '../config.php';    // Veritabanı bağlantısı

$conn = new mysqli($servername, $username, $password, $dbname); // Veritabanı bağlantısı

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);   // Bağlantı başarısız ise Hata mesajı gösterir
}

$id = $_GET['id'];  // Formdan gelen id değerini alır

$sql = "DELETE FROM emlaklar WHERE id = '$id'"; // Veritabanından kullanıcı bilgilerini çeker

if ($conn->query($sql) === TRUE) {  // Sorguyu çalıştırır
    header("Location: /emlakla/user/"); // Anasayfaya yönlendirir
} else {
    echo "Error deleting record: " . $conn->error;  // Eğer kullanıcı yoksa hatayı gösterir
}

$conn->close(); // Veritabanı bağlantısını kapat
?>

