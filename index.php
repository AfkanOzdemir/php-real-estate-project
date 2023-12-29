<?php
include_once './config.php';
session_start();

// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

// formdaki verileri al, ve bunları filtrele çıkan sonuçları kullanıcıya göster
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = $_POST['kategori']; // Formdan gelen kategori değerini alır
    $il = $_POST['il']; // Formdan gelen il değerini alır
    $ilce = $_POST['ilce']; // Formdan gelen ilçe değerini alır
    $mahalle = $_POST['mahalle'];   // Formdan gelen mahalle değerini alır

    // like ile arama yapar
    $sql2 = "SELECT * FROM emlaklar WHERE kategori LIKE '%$kategori%' OR il LIKE '%$il%' OR ilce LIKE '%$ilce%' OR mahalle LIKE '%$mahalle%'";
    $result2 = $conn->query($sql2);   // Sorguyu çalıştırır

    // Veritabanından gelen sonuçları döngü ile göster
    if ($result2->num_rows > 0) {
        // output data of each row
        while ($row = $result2->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Kategori: " . $row["kategori"] . " - İl: " . $row["il"] . " - İlçe: " . $row["ilce"] . " - Mahalle: " . $row["mahalle"] . "<br>";
        }
    } else {
        echo "0 Sonuç Bulundu";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emlakla.com</title>
    <link rel="stylesheet" href="./scss/styles.css">
    <!-- Material Ui -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
    <?php include_once './inc/navbar.php'; ?>
    <div class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>Hayalindeki evi bulmak için doğru adrestesin.</h1>
                <p>Binlerce ilan arasından hayalindeki evi bulmak için hemen ara.</p>
            </div>

            //
            <div class="hero-input-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class=" form-box">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <select id="select-category" class="demo-default" name="kategori">
                            <option value="1">SATILIK</option>
                            <option value="2">KİRALIK</option>
                        </select>
                    </div>
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            location_city
                        </span>
                        <select id="select-category" class="demo-default" name="il">
                            <!-- Default İl -->
                            <option value="0">İL</option>
                            <!-- İl Listesi -->
                            <option value="Adana">Adana</option>
                            <option value="Adıyaman">Adıyaman</option>
                            <option value="Afyonkarahisar">Afyonkarahisar</option>
                            <option value="Ağrı">Ağrı</option>
                            <option value="Amasya">Amasya</option>
                            <option value="Ankara">Ankara</option>
                            <option value="Antalya">Antalya</option>
                            <option value="Artvin">Artvin</option>
                            <option value="Aydın">Aydın</option>
                            <option value="Balıkesir">Balıkesir</option>
                            <option value="Bilecik">Bilecik</option>
                            <option value="Bingöl">Bingöl</option>
                            <option value="Bitlis">Bitlis</option>
                            <option value="Bolu">Bolu</option>
                            <option value="Burdur">Burdur</option>
                            <option value="Bursa">Bursa</option>
                            <option value="Çanakkale">Çanakkale</option>
                            <option value="Çankırı">Çankırı</option>
                            <option value="Çorum">Çorum</option>
                            <option value="Denizli">Denizli</option>
                            <option value="Diyarbakır">Diyarbakır</option>
                            <option value="Edirne">Edirne</option>
                            <option value="Elazığ">Elazığ</option>
                            <option value="Erzincan">Erzincan</option>
                            <option value="Erzurum">Erzurum</option>
                            <option value="Eskişehir">Eskişehir</option>
                            <option value="Gaziantep">Gaziantep</option>
                            <option value="Giresun">Giresun</option>
                            <option value="Gümüşhane">Gümüşhane</option>
                            <option value="Hakkari">Hakkari</option>
                            <option value="Hatay">Hatay</option>
                            <option value="Isparta">Isparta</option>
                            <option value="Mersin">Mersin</option>
                            <option value="İstanbul">İstanbul</option>
                            <option value="İzmir">İzmir</option>
                            <option value="Kars">Kars</option>
                            <option value="Kastamonu">Kastamonu</option>
                            <option value="Kayseri">Kayseri</option>
                            <option value="Kırklareli">Kırklareli</option>
                            <option value="Kırşehir">Kırşehir</option>
                            <option value="Kocaeli">Kocaeli</option>
                            <option value="Konya">Konya</option>
                            <option value="Kütahya">Kütahya</option>
                            <option value="Malatya">Malatya</option>
                            <option value="Manisa">Manisa</option>
                            <option value="Kahramanmaraş">Kahramanmaraş</option>
                            <option value="Mardin">Mardin</option>
                            <option value="Muğla">Muğla</option>
                            <option value="Muş">Muş</option>
                            <option value="Nevşehir">Nevşehir</option>
                            <option value="Niğde">Niğde</option>
                            <option value="Ordu">Ordu</option>
                            <option value="Rize">Rize</option>
                            <option value="Sakarya">Sakarya</option>
                            <option value="Samsun">Samsun</option>
                            <option value="Siirt">Siirt</option>
                            <option value="Sinop">Sinop</option>
                            <option value="Sivas">Sivas</option>
                            <option value="Tekirdağ">Tekirdağ</option>
                            <option value="Tokat">Tokat</option>
                            <option value="Trabzon">Trabzon</option>
                            <option value="Tunceli">Tunceli</option>
                            <option value="Şanlıurfa">Şanlıurfa</option>
                            <option value="Uşak">Uşak</option>
                            <option value="Van">Van</option>
                            <option value="Yozgat">Yozgat</option>
                            <option value="Zonguldak">Zonguldak</option>
                            <option value="Aksaray">Aksaray</option>
                            <option value="Bayburt">Bayburt</option>
                            <option value="Karaman">Karaman</option>
                            <option value="Kırıkkale">Kırıkkale</option>
                            <option value="Batman">Batman</option>
                            <option value="Şırnak">Şırnak</option>
                            <option value="Bartın">Bartın</option>
                            <option value="Ardahan">Ardahan</option>
                            <option value="Iğdır">Iğdır</option>
                            <option value="Yalova">Yalova</option>
                        </select>
                    </div>
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            <!-- İlçe  İkon-->
                            location_on
                        </span>
                        <input type="text" placeholder="İlçe" name="ilce" />
                    </div>
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            signpost
                        </span>
                        <input type="text" placeholder="Mahalle" name="mahalle" />
                    </div>
                    <div class="form-box">
                        <button type="submit" name="submit  style=" background: transparent; outline: none; border: 0; ">        
                            <span class=" material-symbols-outlined">
                            search
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="featured-ads-container">
        <div class="text-head">
            <h1>Öne Çıkan İlanlar</h1>
            <a href="./tum-ilanlar/">
                Tümünü Gör
                <span class="material-symbols-outlined">
                    chevron_right
                </span>
            </a>
        </div>
        <div class="featured-ads">
            <div class="swiper featured-ads-swiper">
                <div class="swiper-wrapper">
                    <?php
                    $sql = "SELECT * FROM emlaklar ORDER BY id DESC LIMIT 8";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        // Sonuçları döngü ile göster
                        while ($row = $result->fetch_assoc()) {
                            $r = $row['r1'];
                            $r = substr($r, 1);

                            echo $htmlContent = <<<HTML

                            <a href="/emlakla/ilan/?id={$row['id']}" class="swiper-slide feature-card">
                                <div class="card">
                                        <img src="$r" alt="Property Image">
                                    <div class="card-body">
                                        <h3 class="card-title">{$row["baslik"]}</h3>
                                        <p class="card-location">{$row["il"]}, {$row["ilce"]}   </p>
                                        <div class="card-infos">
                                            <span><span class="material-symbols-outlined">home</span>{$row["tipi"]}</span>
                                            <span><span class="material-symbols-outlined">weekend</span>{$row["oda"]}</span>
                                            <span><span class="material-symbols-outlined">layers</span>{$row["kat"]}.Kat</span>
                                            <span><span class="material-symbols-outlined">texture</span>{$row["mkare"]} m2</span>
                                        </div>
                                        <p class="card-price">250,000TL</p>
                                    </div>
                                </div>
                            </a>
                        HTML;
                        }
                    };
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".featured-ads-swiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        freeMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        },

    });
</script>