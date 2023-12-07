<?php
session_start();
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
    <?php include_once '../inc/Sidebar.php'; ?>
    <div class="all-features-container">


        <?php
        include '../config.php';

        // Veritabanı bağlantısı
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Bağlantıyı kontrol et
        if ($conn->connect_error) {
            die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
        }

        // Ürün verilerini sorgula
        $sql = "SELECT * FROM emlaklar ORDER BY id ASC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Sonuçları döngü ile göster
            while ($row = $result->fetch_assoc()) {
                echo $htmlContent = <<<HTML
                    <a href="../ilan/?id={$row['id']}" class="feature-card">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" alt="Property Image">
                    <div class="card-body">
                        <h3 class="card-title">{$row["baslik"]}</h3>
                        <p class="card-location">{$row["il"]}, {$row["ilce"]}</p>
                        <div class="card-infos">
                            <span><span class="material-symbols-outlined">home</span>{$row["tipi"]}</span></span>
                            <span><span class="material-symbols-outlined">weekend</span>{$row["oda"]}</span>
                            <span><span class="material-symbols-outlined">layers</span>{$row["kat"]}.Kat</span>
                            <span><span class="material-symbols-outlined">texture</span>{$row["mkare"]} m2</span>
                        </div>
                        <p class="card-price">{$row["fiyat"]} TL</p>
                    </div>
                </div>
            </a>
        HTML;
            }
        } else {
            echo "HERHANGİ BİR İLAN BULUNAMADI";
        }
        $conn->close();
        ?>


    </div>
</body>
<script>
    let categoryContentItemContainer = document.querySelectorAll(".category-content-item-container");
    categoryContentItemContainer.forEach((item) => {
        item.querySelector(".category-content-item").addEventListener("click", () => {
            categoryContentItemContainer.forEach(e => {
                e.querySelector(".expand-content").classList.remove("active-expand");
                e.querySelector(".sub-category-items").classList.remove("active-sub-items");
            });
            item.querySelector(".expand-content").classList.toggle("active-expand");
            item.querySelector(".sub-category-items").classList.toggle("active-sub-items");
        })
    })
</script>

</html>