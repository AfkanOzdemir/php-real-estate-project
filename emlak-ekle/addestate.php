<?php
session_start(); //Oturum başlatır
if (!isset($_SESSION['user'])) {    // Eğer kullanıcı yoksa anasayfaya yönlendirir
    header("Location: /emlakla/auth/");
    exit;
}

include '../config.php';    // Veritabanı bağlantı ayarları
$conn = new mysqli($servername, $username, $password, $dbname); // Veritabanı bağlantısı

if ($conn->connect_error) { // Bağlantı başarısız ise Hata mesajı gösterir
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Formdan veri gelip gelmediğini kontrol eder

    $sahipId = $_SESSION['user']['id']; // Formdan gelen mail değerini alır
    $ilanNo = rand(100000, 9999999999); // 100000 ile 9999999999 arasında rastgele sayı üretir ve ilan numarası olarak atar
    $guncelTarih = date("Y-m-d H:i:s"); // Tarih ve saat bilgisini alır
    $baslik = $_POST['baslik']; // Formdan gelen mail değerini alır
    $fiyat = $_POST['fiyat'];   // Formdan gelen fiyat değerini alır
    $kategori = $_POST['kategori']; // Formdan gelen kategori değerini alır
    $tipi = $_POST['tipi']; // Formdan gelen tip değerini alır
    $oda = $_POST['oda'];   // Formdan gelen oda değerini alır
    $il = $_POST['il']; // Formdan gelen il değerini alır
    $ilce = $_POST['ilce']; // Formdan gelen ilçe değerini alır
    $mahalle = $_POST['mahalle'];   // Formdan gelen mahalle değerini alır
    $mkare = $_POST['mkare'];   // Formdan gelen m2 değerini alır
    $kat = $_POST['kat'];   // Formdan gelen kat değerini alır
    $aciklama = $_POST['aciklama']; // Formdan gelen açıklama değerini alır

    $target_dir = "../assets/uploads/"; // Dosyaların yükleneceği klasör
    $target_file1 = $target_dir . basename($_FILES["r1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["r2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["r3"]["name"]);
    $target_file4 = $target_dir . basename($_FILES["r4"]["name"]);
    $target_file5 = $target_dir . basename($_FILES["r5"]["name"]);


    // Dosya adını rastgele sayı ile değiştirir
    $target_file1 = $target_dir . rand(000, 9999999999) . "." . strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $target_file2 = $target_dir . rand(000, 9999999999) . "." . strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $target_file3 = $target_dir . rand(000, 9999999999) . "." . strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
    $target_file4 = $target_dir . rand(000, 9999999999) . "." . strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));
    $target_file5 = $target_dir . rand(000, 9999999999) . "." . strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));


    $uploadOk = 1;  // Dosya yüklenebilir mi kontrolü için değişken
    // Dosya uzantılarını alır
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
    $imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));
    $imageFileType5 = strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));

    // Dosya bir resim mi kontrol eder
    $check1 = getimagesize($_FILES["r1"]["tmp_name"]);
    $check2 = getimagesize($_FILES["r2"]["tmp_name"]);
    $check3 = getimagesize($_FILES["r3"]["tmp_name"]);
    $check4 = getimagesize($_FILES["r4"]["tmp_name"]);
    $check5 = getimagesize($_FILES["r5"]["tmp_name"]);
    if (
        $check1 !== false &&
        $check2 !== false &&
        $check3 !== false &&
        $check4 !== false &&
        $check5 !== false
    ) {
        $uploadOk = 1;  // Dosya bir resim ise yüklenebilir
    } else {
        echo "Dosya bir resim değil.";  // Dosya bir resim değilse hata mesajı gösterir
        $uploadOk = 0;
    }

    // Dosya var mı kontrolü
    if (
        file_exists($target_file1) ||
        file_exists($target_file2) ||
        file_exists($target_file3) ||
        file_exists($target_file4) ||
        file_exists($target_file5)
    ) {
        echo "Üzgünüz, dosya zaten var.";
        $uploadOk = 0;
    }

    // Boyut kontrolü
    if (
        $_FILES["r1"]["size"] > 50000000 ||
        $_FILES["r2"]["size"] > 50000000 ||
        $_FILES["r3"]["size"] > 50000000 ||
        $_FILES["r4"]["size"] > 50000000 ||
        $_FILES["r5"]["size"] > 50000000
    ) {
        echo "Üzgünüz, dosya çok büyük.";
        $uploadOk = 0;
    }

    // Dosya uzantı kontrolü
    if (
        !in_array($imageFileType1, ["jpg", "png", "jpeg", "gif","webp"]) ||
        !in_array($imageFileType2, ["jpg", "png", "jpeg", "gif","webp"]) ||
        !in_array($imageFileType3, ["jpg", "png", "jpeg", "gif","webp"]) ||
        !in_array($imageFileType4, ["jpg", "png", "jpeg", "gif","webp"]) ||
        !in_array($imageFileType5, ["jpg", "png", "jpeg", "gif","webp"])
    ) {
        echo "Üzgünüz, sadece JPG, JPEG, PNG ve GIF dosyalarına izin verilir.";
        $uploadOk = 0;
    }

    // Dosya yüklenebilir mi kontrolü
    if ($uploadOk == 0) {
        echo "Üzgünüz, dosyanız yüklenmedi.";
        // Dosya yüklenebilir ise yükler
    } else {
        if (
            move_uploaded_file($_FILES["r1"]["tmp_name"], $target_file1) &&
            move_uploaded_file($_FILES["r2"]["tmp_name"], $target_file2) &&
            move_uploaded_file($_FILES["r3"]["tmp_name"], $target_file3) &&
            move_uploaded_file($_FILES["r4"]["tmp_name"], $target_file4) &&
            move_uploaded_file($_FILES["r5"]["tmp_name"], $target_file5)
        ) {
            // Dosyalar yüklendiyse bilgi mesajı gösterir
            echo "Dosyalar " . basename($_FILES["r1"]["name"]) . " " . basename($_FILES["r2"]["name"]) . "
             " . basename($_FILES["r3"]["name"]) . " " . basename($_FILES["r4"]["name"]) . " "
              . basename($_FILES["r5"]["name"]) . " olarak yüklendi.";

            // Veritabanına kayıt işlemi
            $sql = "INSERT INTO emlaklar (sahip_id, ilan_no, guncel_tarih, baslik, fiyat
            , kategori, tipi, oda, il, ilce, mahalle, mkare, kat, aciklama, r1, r2, r3, r4, r5)
             VALUES ('$sahipId', '$ilanNo', '$guncelTarih', '$baslik', '$fiyat', '$kategori', 
             '$tipi', '$oda', '$il', '$ilce', '$mahalle', '$mkare', '$kat', '$aciklama', '$target_file1',
              '$target_file2', '$target_file3', '$target_file4', '$target_file5')";
            // Veritabanından kullanıcı bilgilerini çeker
            if ($conn->query($sql) === TRUE) {
                header("Location: /emlakla/user/");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;  // Eğer kullanıcı yoksa hatayı gösterir
            }
        } else {
            echo "Üzgünüz, dosya yüklenirken bir hata oluştu.";
        }
    }

    $conn->close(); // Veritabanı bağlantısını kapatır
}
