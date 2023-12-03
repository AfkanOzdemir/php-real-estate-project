<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emlakla";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}
$conn->close();
