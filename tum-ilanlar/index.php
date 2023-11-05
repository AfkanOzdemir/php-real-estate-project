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

    <body>
        <div class="sidebar-container">
            <div class="sidebar-button">
                Hemen Emlakla
                <span class="material-symbols-outlined">
                    menu
                </span>
            </div>
            <hr class="sidebar-line">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="category">
                        <div class="category-head">
                            <span class="category-icon material-symbols-outlined">
                                home
                            </span>
                            <span class="category-title-text">
                                Konut
                            </span>
                            <span class="expand material-symbols-outlined">
                                expand_more
                            </span>
                        </div>
                        <div class="category-content">
                            <div class="category-content-item">
                                <span class="category-content-item-text">
                                    Satılık
                                </span>
                                <span class="expand-content active-expand material-symbols-outlined">
                                    expand_more
                                </span>
                            </div>
                            <div class="category-content-item">
                                <span class="category-content-item-text">
                                    Kiralık
                                </span>
                                <span class="expand-content material-symbols-outlined">
                                    expand_more
                                </span>
                            </div>
                            <div class="category-content-item">
                                <span class="category-content-item-text">
                                    Emlak Projeleri
                                </span>
                                <span class="expand-content material-symbols-outlined">
                                    expand_more
                                </span>
                            </div>
                            <div class="category-content-item">
                                <span class="category-content-item-text">
                                    Emlak Arayanlar
                                </span>
                                <span class="expand-content material-symbols-outlined">
                                    expand_more
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>

</html>