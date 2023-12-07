<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /emlakla/auth/");
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
</head>

<body>
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
                <form action="" class="dropzone" id="myGreatDropzone">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="baslik">1.Resim</label>
                            <input type="file" class="image-input" name="r1" id="r1">
                        </div>
                    </div>
                    <button>Bu emlağı ekle !</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>