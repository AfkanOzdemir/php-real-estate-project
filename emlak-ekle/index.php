<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /emlakla/auth/");
}

include '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sahipId = $_SESSION['user']['id'];
    $ilanNo = rand(100000, 9999999999);
    $guncelTarih = date("Y-m-d H:i:s");
    $baslik = $_POST['baslik'];
    $fiyat = $_POST['fiyat'];
    $kategori = $_POST['kategori'];
    $tipi = $_POST['tipi'];
    $oda = $_POST['oda'];
    $il = $_POST['il'];
    $ilce = $_POST['ilce'];
    $mahalle = $_POST['mahalle'];
    $mkare = $_POST['mkare'];
    $kat = $_POST['kat'];
    $aciklama = $_POST['aciklama'];

    $sql = "INSERT INTO emlaklar (sahip_id, ilan_no, baslik, kategori, guncel_tarih, fiyat, tipi, oda, il, ilce, mahalle, mkare, kat, aciklama) VALUES ('$sahipId','$ilanNo','$baslik','$kategori','$guncelTarih', '$fiyat',  '$tipi', '$oda', '$il', '$ilce', '$mahalle', '$mkare', '$kat', '$aciklama')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /emlakla/user/");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emlak Ekle</title>
    <link rel="stylesheet" href="../scss/styles.css">
    <!-- Material Ui -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Sweet alert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/10.12.5/sweetalert2.min.css" />
</head>

<body style="overflow: hidden;">
    <?php include_once '../inc/navbar.php'; ?>
    <div class="add-estate-transactions">
        <div class="estate-card">
            <div class="head">
                <div class="switch">
                    <span class="add-estate-switch selected">Emlak Ekle</span>
                    <hr />
                    <span class="update-estate-switch">Emlak Güncelle</span>
                </div>
            </div>
            <div class="add-estate-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <!-- Resim1 -->
                        <div class="input-group">
                            <label for="estate-image1">Emlak Resmi 1</label>
                            <input class="estate-image" type="file" name="r1" id="estate-image1" />
                        </div>
                        <!-- Resim2 -->
                        <div class="input-group">
                            <label for="estate-image2">Emlak Resmi 2</label>
                            <input class="estate-image" type="file" name="r2" id="estate-image2" />
                        </div>
                        <!-- Resim3 -->
                        <div class="input-group">
                            <label for="estate-image3">Emlak Resmi 3</label>
                            <input class="estate-image" type="file" name="r3" id="estate-image3" />
                        </div>
                        <!-- Resim4 -->
                        <div class="input-group">
                            <label for="estate-image4">Emlak Resmi 4</label>
                            <input class="estate-image" type="file" name="r4" id="estate-image4" />
                        </div>
                        <!-- Resim5 -->
                        <div class="input-group">
                            <label for="estate-image5">Emlak Resmi 5</label>
                            <input class="estate-image" type="file" name="r5" id="estate-image5" />
                        </div>

                        <div class="input-group">
                            <label for="estate-title">Emlak Başlığı</label>
                            <input type="text" minlength="10" maxlength="25" name="baslik" id="estate-title" placeholder="Emlak Başlığı" />
                        </div>
                        <div class="input-group">
                            <label for="estate-price">Emlak Fiyatı</label>
                            <input type="number" name="fiyat" id="estate-price" placeholder="Emlak Fiyatı" />
                        </div>
                        <div class="input-group">
                            <label for="estate-type">Emlak</label>
                            <select name="kategori" id="estate-type">
                                <option value="Satılık">Satılık</option>
                                <option value="Kiralık">Kiralık</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="estate-type">Emlak Tipi</label>
                            <select name="tipi" id="estate-type">
                                <option value="Daire">Daire</option>
                                <option value="Residence">Residence</option>
                                <option value="Villa">Villa</option>
                                <option value="Müstakil Ev">Müstakil Ev</option>
                                <option value="Köşk & Konak">Köşk & Konak</option>
                                <option value="Yalı Dairesi">Yalı Dairesi</option>
                                <option value="Çiftlik Evi">Çiftlik Evi</option>
                                <option value="Yazlık">Yazlık</option>
                                <option value="Prefabrik Ev">Prefabrik Ev</option>
                                <option value="Kooperatif">Kooperatif</option>
                                <option value="Ofis">Ofis</option>
                                <option value="Diğer">Diğer</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="estate-room">Oda Sayısı</label>
                            <select name="oda" id="estate-room">
                                <option value="1+0">1+0</option>
                                <option value="1+1">1+1</option>
                                <option value="2+1">2+1</option>
                                <option value="3+1">3+1</option>
                                <option value="4+1">4+1</option>
                                <option value="5+1">5+1</option>
                                <option value="2+2">2+2</option>
                                <option value="3+2">3+2</option>
                                <option value="4+2">4+2</option>
                                <option value="5+2">5+2</option>
                                <option value="6+2">6+2</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="estate-city">İl</label>
                            <input type="text" name="il" id="estate-city" placeholder="Emlak Şehri" />
                        </div>
                        <div class="input-group">
                            <label for="estate-district">İlçe</label>
                            <input type="text" name="ilce" id="estate-district" placeholder="Emlak İlçesi" />
                        </div>
                        <div class="input-group">
                            <label for="estate-neighborhood">Mahalle</label>
                            <input type="text" name="mahalle" id="estate-neighborhood" placeholder="Emlak Mahallesi" />
                        </div>
                        <div class="input-group">
                            <label for="estate-area">Emlak Alanı</label>
                            <input type="number" name="mkare" id="estate-area" placeholder="Metre Kare" />
                        </div>
                        <div class="input-group">
                            <label for="estate-floor">Emlak Katı</label>
                            <input type="number" name="kat" id="estate-floor" placeholder="Emlak Katı" />
                        </div>
                        <div class="input-group">
                            <label for="estate-description">Emlak Açıklaması</label>
                            <textarea name="aciklama" id="estate-description" cols="30" rows="10" placeholder="Emlak Açıklaması"></textarea>
                        </div>
                    </div>
                    <button>Bu emlağı ekle !</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>