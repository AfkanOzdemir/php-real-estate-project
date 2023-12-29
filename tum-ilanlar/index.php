<?php
session_start(); // Session başlat
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tüm İlanlar | Emlakla.com</title>
    <link rel="stylesheet" href="../scss/styles.css">
    <!-- Material Ui -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <?php include_once '../inc/navbar.php'; ?>
    <div class="all-features-container">
        <?php
        include '../config.php'; // Veritabanı bağlantı bilgilerini alır
        // Veritabanı bağlantısı
        $conn = new mysqli($servername, $username, $password, $dbname); // Veritabanı bağlantısı

        // Bağlantıyı kontrol et
        if ($conn->connect_error) { // Bağlantı başarısız ise Hata mesajı gösterir
            die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
        }
        // Ürün verilerini sorgula
        $sql = "SELECT * FROM emlaklar ORDER BY id ASC"; // Veritabanından kullanıcı bilgilerini çeker
        $result = $conn->query($sql); // Sorguyu çalıştırır
        if ($result && $result->num_rows > 0) { // Eğer ilan varsa
            // Sonuçları döngü ile göster   
            while ($row = $result->fetch_assoc()) { // Sonuçları döngü ile göster
                echo $htmlContent = <<<HTML
                    <a href="../ilan/?id={$row['id']}" class="feature-card {$row['kategori']} {$row['tipi']}">  // İlanın id'sini alır
                <div class="card">  
                    <img src='{$row["r1"]}' alt="Property Image">   // İlanın resmini alır
                    <div class="card-body"> 
                        <h3 class="card-title">{$row["baslik"]}</h3>    // İlanın başlığını alır
                        <p class="card-location">{$row["il"]}, {$row["ilce"]}</p>   // İlanın il ve ilçesini alır
                        <div class="card-infos">
                            <span><span class="material-symbols-outlined">home</span>{$row["tipi"]}</span></span>   // İlanın tipini alır
                            <span><span class="material-symbols-outlined">weekend</span>{$row["oda"]}</span>    // İlanın oda sayısını alır
                            <span><span class="material-symbols-outlined">layers</span>{$row["kat"]}.Kat</span> // İlanın katını alır
                            <span><span class="material-symbols-outlined">texture</span>{$row["mkare"]} m2</span>   // İlanın m2'sini alır
                        </div>
                        <p class="card-price">{$row["fiyat"]} TL</p>    // İlanın fiyatını alır
                    </div>  
                </div>
            </a>
        HTML;
            }
        } else {    // Eğer ilan yoksa hata mesajı gösterir
            echo "HERHANGİ BİR İLAN BULUNAMADI";
        }
        $conn->close(); // Veritabanı bağlantısını kapatır
        ?>


    </div>
</body>

</html>