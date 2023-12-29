<?php
$servername = "localhost"; // Sunucu Adı
$username = "root"; // Kullanıcı Adı
$password = ""; // Şifre
$dbname = "emlakla";    // Veritabanı Adı
$conn = new mysqli($servername, $username, $password, $dbname); // Veritabanı bağlantısı
$conn->set_charset("utf8"); // Türkçe karakter sorunu için utf8 olarak ayarlar
if ($conn->connect_error) { // Bağlantı başarısız ise Hata mesajı gösterir
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}   
$conn->close();   // Bağlantıyı kapatır
