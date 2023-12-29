<?php
include_once '../config.php'; // Veritabanı bağlantısı sağlanıyor
session_start();    // Session başlatılıyor bu sayede kullanıcı bilgileri tutulabilecek

// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname); // Veritabanı bağlantısı

// Bağlantıyı kontrol et
if ($conn->connect_error) { // Bağlantı başarısız ise Hata mesajı gösterir
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Formdan veri gelip gelmediğini kontrol eder
    $mail = $_POST['mail']; // Formdan gelen mail değerini alır
    $password = $_POST['password']; // Formdan gelen password değerini alır

    $sql = "SELECT * FROM users WHERE mail='$mail' AND password='$password'";   // Veritabanından kullanıcı bilgilerini çeker
    $result = $conn->query($sql);   // Sorguyu çalıştırır

    if ($result->num_rows > 0) {    // Eğer kullanıcı varsa
        $user = $result->fetch_assoc();     // Kullanıcı bilgilerini alır
        $_SESSION['user'] = $user;  // Session'a kullanıcı bilgilerini kaydeder
        echo "<script>  // Kullanıcı bilgilerini kaydettikten sonra anasayfaya yönlendirir
        localStorage.setItem('user', JSON.stringify(" . json_encode($user) . "));   // Kullanıcı bilgilerini localstorage'a kaydeder
        window.location.href = '/emlakla/'; // Anasayfaya yönlendirir
        </script>";
        exit;   // Çıkış yapar
    } else {    // Eğer kullanıcı yoksa hatayı gösterir
        echo "<script>  
        Swal.fire({
            icon: 'error',
            title: 'Hata...',
            text: 'Kullanıcı adı veya şifre yanlış!'
          })
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="../scss/styles.css">
    <!-- Material Ui -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>

<body>
    <?php include_once '../inc/navbar.php'; ?>
    <div class="auth-container">
        <div class="auth-form">
            <div class="auth-image">
                <img src="../assets/images/login.jpg" alt="">
            </div>
            <div class="auth">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h4>Hemen Giriş Yap ve Emlakla!</h4>
                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="email" placeholder="Mail Adresinizi Giriniz" name="mail" required id="mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input type="password" placeholder="Şifrenizi Giriniz" name="password" required id="password" class="form-control">
                    </div>
                    <div class='prm-button'>
                        <button type="submit">Giriş Yap</button>
                    </div>
                    <a href="/emlakla/auth/register.php" class='no-account'>Hesabın yok mu? Hemen <span>kayıt ol</span></a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>