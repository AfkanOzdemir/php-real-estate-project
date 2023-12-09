<?php
session_start();
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
$sahipbul = "SELECT * FROM users WHERE id = (SELECT sahip_id FROM emlaklar WHERE id = '$id')";

$result = $conn->query($sql);
$sahip = $conn->query($sahipbul);
?>


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
    <script src="../assets/script/hideText.js"></script>
</head>

<body>
    <div class="navbar-container">
        <div class="navbar">
            <div class="navbar-logo">
                <a href="/emlakla/index.php">
                    <svg id="logo-86" width="25" height="25" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ccustom" fill-rule="evenodd" clip-rule="evenodd" d="M25.5557 11.6853C23.9112 10.5865 21.9778 10 20 10V0C23.9556 0 27.8224 1.17298 31.1114 3.37061C34.4004 5.56823 36.9638 8.69181 38.4776 12.3463C39.9913 16.0008 40.3874 20.0222 39.6157 23.9018C38.844 27.7814 36.9392 31.3451 34.1421 34.1421C31.3451 36.9392 27.7814 38.844 23.9018 39.6157C20.0222 40.3874 16.0008 39.9913 12.3463 38.4776C8.69181 36.9638 5.56823 34.4004 3.37061 31.1114C1.17298 27.8224 0 23.9556 0 20H10C10 21.9778 10.5865 23.9112 11.6853 25.5557C12.7841 27.2002 14.3459 28.4819 16.1732 29.2388C18.0004 29.9957 20.0111 30.1937 21.9509 29.8078C23.8907 29.422 25.6725 28.4696 27.0711 27.0711C28.4696 25.6725 29.422 23.8907 29.8078 21.9509C30.1937 20.0111 29.9957 18.0004 29.2388 16.1732C28.4819 14.3459 27.2002 12.7841 25.5557 11.6853Z" fill="#007DFC"></path>
                        <path class="ccustom" fill-rule="evenodd" clip-rule="evenodd" d="M10 5.16562e-07C10 1.31322 9.74135 2.61358 9.2388 3.82683C8.73625 5.04009 7.99966 6.14248 7.07107 7.07107C6.14249 7.99966 5.0401 8.73625 3.82684 9.2388C2.61358 9.74134 1.31322 10 5.4439e-06 10L5.00679e-06 20C2.62644 20 5.22716 19.4827 7.65368 18.4776C10.0802 17.4725 12.285 15.9993 14.1421 14.1421C15.9993 12.285 17.4725 10.0802 18.4776 7.65367C19.4827 5.22715 20 2.62643 20 -3.81469e-06L10 5.16562e-07Z" fill="#007DFC"></path>
                    </svg>
                </a>
            </div>
            <div class="navbar-links">
                <ul>
                    <li><a href="/emlakla/index.php">Anasayfa</a></li>
                    <li><a href="#">Hakkımızda</a></li>
                    <li><a href="#">İletişim</a></li>
                    <li class="estate"><a href="/emlakla/emlak-ekle/">Hemen Emlakla</a></li>
                    <li class="user">
                        <a href="/emlakla/auth/"><span class="material-symbols-outlined">account_circle</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if ($result && $result->num_rows > 0 && $sahip && $sahip->num_rows > 0) {
        // Ürünü al
        $row = $result->fetch_assoc();
        $sahip = $sahip->fetch_assoc();
        echo $htmlContent = <<<HTML
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
                            {$row["kategori"]}
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
                        <img src="../assets/images/aeecc22a67dac7987a80ac0724658493.jpg" alt="User Image">
                    </div>
                    <div class="user-name">
                        <h3>
                            {$sahip["name"]} {$sahip["last_name"]}
                        </h3>
                    </div>
                </div>
                <hr>
                <div class="contact-info">
                    <h3>İlteişim Bilgileri</h3>
                    <div class="user-phone hiddentext">
                        <span class="material-symbols-outlined">call</span>
                        <a href="tel:0530 00 00" class="phone">{$sahip["phone"]}</a>
                    </div>
                    <div class="user-mail">
                        <span class="material-symbols-outlined">mail</span>
                        <a href="mailto:afkanozdemir@gmail.com">{$sahip["mail"]}</a>
                    </div>
                    <div class="user-location">
                        <span class="material-symbols-outlined">location_on</span>
                        <a href="mailto:afkanozdemir@gmail.com">
                            <!-- Row adress -->
                            {$row["il"]}, {$row["ilce"]}, {$row["mahalle"]}
                        </a>
                    </div>
                </div>
            </div>
            HTML;
    } else {
        echo "İlan bulunamadı.";
    }
    $conn->close();
    ?>
    </div>
    </div>
    </div>
</body>

</html>