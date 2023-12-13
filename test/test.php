<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /emlakla/auth/");
    exit;
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

    //Add images

    $target_dir = "../assets/uploads/";
    $target_file1 = $target_dir . basename($_FILES["r1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["r2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["r3"]["name"]);
    $target_file4 = $target_dir . basename($_FILES["r4"]["name"]);
    $target_file5 = $target_dir . basename($_FILES["r5"]["name"]);

    $uploadOk = 1;
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
    $imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));
    $imageFileType5 = strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
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
        $uploadOk = 1;
    } else {
        echo "Dosya bir resim değil.";
        $uploadOk = 0;
    }

    // Check if file already exists
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

    // Check file size
    if (
        $_FILES["r1"]["size"] > 500000 ||
        $_FILES["r2"]["size"] > 500000 ||
        $_FILES["r3"]["size"] > 500000 ||
        $_FILES["r4"]["size"] > 500000 ||
        $_FILES["r5"]["size"] > 500000
    ) {
        echo "Üzgünüz, dosya çok büyük.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        !in_array($imageFileType1, ["jpg", "png", "jpeg", "gif"]) ||
        !in_array($imageFileType2, ["jpg", "png", "jpeg", "gif"]) ||
        !in_array($imageFileType3, ["jpg", "png", "jpeg", "gif"]) ||
        !in_array($imageFileType4, ["jpg", "png", "jpeg", "gif"]) ||
        !in_array($imageFileType5, ["jpg", "png", "jpeg", "gif"])
    ) {
        echo "Üzgünüz, sadece JPG, JPEG, PNG ve GIF dosyalarına izin verilir.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Üzgünüz, dosyanız yüklenmedi.";
        // if everything is ok, try to upload file
    } else {
        if (
            move_uploaded_file($_FILES["r1"]["tmp_name"], $target_file1) &&
            move_uploaded_file($_FILES["r2"]["tmp_name"], $target_file2) &&
            move_uploaded_file($_FILES["r3"]["tmp_name"], $target_file3) &&
            move_uploaded_file($_FILES["r4"]["tmp_name"], $target_file4) &&
            move_uploaded_file($_FILES["r5"]["tmp_name"], $target_file5)
        ) {
            echo "Dosyalar " . basename($_FILES["r1"]["name"]) . " " . basename($_FILES["r2"]["name"]) . " " . basename($_FILES["r3"]["name"]) . " " . basename($_FILES["r4"]["name"]) . " " . basename($_FILES["r5"]["name"]) . " olarak yüklendi.";

            //Add estate
            $sql = "INSERT INTO emlaklar (sahip_id, ilan_no, guncel_tarih, baslik, fiyat, kategori, tipi, oda, il, ilce, mahalle, mkare, kat, aciklama, resim1, resim2, resim3, resim4, resim5) VALUES ('$sahipId', '$ilanNo', '$guncelTarih', '$baslik', '$fiyat', '$kategori', '$tipi', '$oda', '$il', '$ilce', '$mahalle', '$mkare', '$kat', '$aciklama', '$target_file1', '$target_file2', '$target_file3', '$target_file4', '$target_file5')";

            if ($conn->query($sql) === TRUE) {
                header("Location: /emlakla/user/");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Üzgünüz, dosya yüklenirken bir hata oluştu.";
        }
    }

    $conn->close();
}
?>