<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../scss/styles.css">
    <!-- Material Ui -->
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
                <form action="">
                    <h4>Hemen Giriş Yap ve Emlakla!</h4>
                    <div class="form-group">
                        <label for="name">Adınız</label>
                        <input type="text" placeholder="Adınız" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Soyadınız</label>
                        <input type="text" placeholder="Soyadınızı Giriniz" name="last_name" id="last_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Mail Adresinizi Giriniz" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Şifrenizi Giriniz" name="password" id="password" class="form-control">
                    </div>
                    <div class='prm-button'>
                      <button>Giriş Yap</button>
                    </div>
                    <a href="" class='no-account'>Hesabın yok mu hemen <span>kayıt ol</span></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>