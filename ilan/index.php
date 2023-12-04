<?php

include '../config.php';
// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

// URL'den gelen id parametresini al
$id = $_GET['id'];

// Ürünü sorgula
$sql = "SELECT * FROM emlaklar WHERE id = '$id'";
$result = $conn->query($sql);
?>


<?php
if ($result && $result->num_rows > 0) {
    // Ürünü al
    $row = $result->fetch_assoc();

    echo $htmlContent = <<<HTML
        <!DOCTYPE html>
        <html lang="tr">

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
<div class="ilan-container">
    <div class="images-container">
        <div class="main-image">
            <img src="https://via.placeholder.com/600x400" alt="Property Image">
        </div>
        <div class="other-images">
            <img src="https://via.placeholder.com/500x300" alt="Property Image">
            <img src="https://via.placeholder.com/500x300" alt="Property Image">
            <img src="https://via.placeholder.com/500x300" alt="Property Image">
            <img src="https://via.placeholder.com/500x300" alt="Property Image">
        </div>
    </div>
    <div class="details-container">
        <div class="left-side">
            <div class="advert-title">
                <h1>{$row["baslik"]}</h1>
                <span class="price">{$row["fiyat"]} TL</span>
            </div>
            <div class="advert-informations">
                <h3>İlan Bilgileri</h3>
                <hr>
                <div class="information">
                    <div>
                        <span class="quest">
                            ilan No
                        </span>
                        <span class="response no">
                            {$row["ilan_no"]}
                        </span>
                    </div>
                    <div>
                        <span class="quest">
                            İlan Güncelleme Tarihi
                        </span>
                        <span class="response">
                            {$row["guncel_tarih"]}
                        </span>
                    </div>
                    <div>
                        <span class="quest">
                            Kategorisi
                        </span>
                        <span class="response">
                            {$row["kategorisi"]}
                        </span>
                    </div>
                    <div>
                        <span class="quest">
                            Türü
                        </span>
                        <span class="response">
                            {$row["tur"]}
                        </span>
                    </div>
                    <div>
                        <span class="quest">
                            Tipi
                        </span>
                        <span class="response">
                            {$row["tipi"]}
                        </span>
                    </div>
                </div>
            </div>
            <div class="advert-explain">
                <h3>İlan Açıklaması</h3>
                <hr>
                <p>{$row["aciklama"]}</p>
            </div>
        </div>
    <div class="right-side">
        <div class="user-section">
            <div class="user-image">
                <img src="https://via.placeholder.com/100x100" alt="User Image">
            </div>
            <div class="user-name">
                <h3>Afkan Ozdemir</h3>
            </div>
        </div>
        <hr>
        <div class="contact-info"> 
            <h3>İlteişim Bilgileri</h3>
            <div class="user-phone hiddentext">
                <span class="material-symbols-outlined">call</span>
                <a href="tel:0530 00 00" class="phone">0530 000 00 00</a>
            </div>
            <div class="user-mail">
                <span class="material-symbols-outlined">mail</span>
                <a href="mailto:afkanozdemir@gmail.com">afkanozdemir@gmail.com</a>
            </div>
        </div>

    </div>
    </div>
</div>
</div>
</body>

</html>
HTML;
} else {
    echo "Ürün bulunamadı.";
}
// Veritabanı bağlantısını kapat
$conn->close();
?>