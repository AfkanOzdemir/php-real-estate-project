<?php

session_start();

//delete /emlakla/user/delete.php?id={$allEstates['id']}


if (!isset($_SESSION['user'])) {
    header("Location: /emlakla/auth/");
    exit;
}

include '../config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM emlaklar WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /emlakla/user/");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>