<?php
include '../config.php';
// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, last_name, mail, phone, password) VALUES ('$name', '$last_name', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /emlakla/auth/");
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
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="../scss/styles.css">
    <!-- Material Ui Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                        <label for="name">Adınız</label>
                        <input type="text" placeholder="Adınız" name="name" required id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Soyadınız</label>
                        <input type="text" placeholder="Soyadınızı Giriniz" name="last_name" required id="last_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Mail Adresinizi Giriniz" name="email" required id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon Numaranız</label>
                        <input type="tel" placeholder="Telefon Numaranızı Giriniz" name="phone" required id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input type="password" placeholder="Şifrenizi Giriniz" name="password" required id="password" class="form-control">
                    </div>
                    <div class='prm-button'>
                        <button>Kayıt Ol</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>