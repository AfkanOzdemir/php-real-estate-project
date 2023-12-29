<?php
session_start(); // Session başlat
if (!isset($_SESSION['user'])) {    // Eğer kullanıcı giriş yapmadıysa
    header("Location: /emlakla/auth/"); // Giriş sayfasına yönlendir
}
include '../config.php';        // Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname); // Veritabanı bağlantısı
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);   // Bağlantı başarısız ise Hata mesajı gösterir
}
$user_id = $_SESSION['user']['id']; // Sessionda tutulan kullanıcı id değerini alır
$sql = "SELECT * FROM users WHERE id = '$user_id'"; // Veritabanından kullanıcı bilgilerini çeker
$result = $conn->query($sql);   // Sorguyu çalıştırır
$allEstates = "SELECT * FROM emlaklar WHERE sahip_id = '$user_id'"; // Veritabanından kullanıcı bilgilerini çeker
$allEstatesResult = $conn->query($allEstates);  // Sorguyu çalıştırır
$user = $result->fetch_assoc(); // Sonuçları döngü ile göster
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../scss/styles.css">
    <!-- Material Ui -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <?php include_once '../inc/navbar.php'; ?>
    <div class="user-container">
        <div class="user-profile">
            <div class="head">
                <h2>Profilim</h2>
                <hr />
                <h4>Merhaba <?php echo $user['name'] . " " . "!"; ?></h4>
            </div>
            <div class="user-info-container">
                <div class="user-profile-image">
                    <img src="../assets/images/aeecc22a67dac7987a80ac0724658493.jpg" alt="">
                    <hr />
                </div>
                <div class="user-profile-info">
                    <div class="user-profile-info-item">
                        <div>
                            <span class="material-symbols-outlined icon">account_circle</span>
                            <span class="value"><?php echo $user['name'] . " " . $user['last_name']; ?></span>
                        </div>
                    </div>
                    <div class="user-profile-info-item">
                        <div>
                            <span class="material-symbols-outlined icon">email</span>
                            <span class="value">
                                <?php
                                if (strlen($user['mail']) > 15) {
                                    echo substr($user['mail'], 0, 15) . "...";
                                } else {
                                    echo $user['mail'];
                                } ?>
                            </span>
                        </div>
                    </div>
                    <div class="user-profile-info-item">
                        <div>
                            <span class="material-symbols-outlined icon">phone</span>
                            <span class="value"><?php echo $user['phone']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-all-features">
            <ul class="feature-list">
                <h3>Tüm Emlaklarım</h3>
                <?php
                if ($allEstatesResult && $allEstatesResult->num_rows > 0) { // Eğer sonuç varsa
                    while ($allEstates = $allEstatesResult->fetch_assoc()) {    // Sonuçları döngü ile göster
                        echo $htmlContent = <<<HTML
                        <li class="item">
                            <div class="itemId">
                                #{$allEstates["id"]}
                            </div>
                            <div class="item-image">
                                <img src="{$allEstates['r1']}" alt="">
                            </div>
                            <div class="item-title">
                                {$allEstates["baslik"]}
                            </div>
                            <div class="price">
                                {$allEstates["fiyat"]} TL
                            </div>
                            <div class="item-actions">
                                <span class="material-symbols-outlined delete"
                                    onclick="window.location.href = '/emlakla/user/delete.php?id={$allEstates['id']}'"
                                >delete</span>
                            </div>
                        </li>
                        HTML;
                    }
                } else {
                    echo "<h3>Henüz bir emlak ilanı eklenmemiş.</h3>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>