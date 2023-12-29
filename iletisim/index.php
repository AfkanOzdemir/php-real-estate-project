<!-- Contact us -->

<?php
session_start(); // Session başlat

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name']; // Formdan gelen name değerini alır
    $surname = $_POST['surname'];   // Formdan gelen surname değerini alır
    $email = $_POST['email'];   // Formdan gelen email değerini alır
    $message = $_POST['message'];   // Formdan gelen message değerini alır

    include '../config.php';    // Veritabanı bağlantısı

    // Veritabanı bağlantısı
    $conn = new mysqli($servername, $username, $password, $dbname); // Veritabanı bağlantısı

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);   // Bağlantı başarısız ise Hata mesajı gösterir
    }

    $sql = "INSERT INTO iletisim (name, surname, email, message) VALUES ('$name', '$surname', '$email', '$message')";  
    // Veritabanından kullanıcı bilgilerini çeker

    if ($conn->query($sql) === TRUE) {  // Sorguyu çalıştırır
        echo "Mesajınız başarıyla gönderildi."; 
    } else {    // Eğer kullanıcı yoksa hatayı gösterir
        echo "Error: " . $sql . "<br>" . $conn->error;  
    }

    $conn->close(); // Veritabanı bağlantısını kapat
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <link rel="stylesheet" href="./scss/styles.css">
    <!-- Material Ui -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel='stylesheet' href='../scss/styles.css'>
</head>

<body>
    <?php include_once '../inc/navbar.php'; ?>
    <div class="contact-us">
        <h1>İletişim</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="name" placeholder="Adınız">
                <input type="text" name="surname" placeholder="Soyadınız">
                <input type="email" name="email" placeholder="Emailiniz">
                <textarea name="message" id="" cols="30" rows="10" placeholder="Mesajınız"></textarea>

            </div>
            <button type="submit">Gönder</button>
        </form>
    </div>
</body>



</html>