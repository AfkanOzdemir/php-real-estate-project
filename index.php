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
            <div class="hero-input-container">
                <form action="">
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <select id="select-category" class="demo-default">
                            <option value="1">SATILIK</option>
                            <option value="2">KİRALIK</option>
                        </select>
                    </div>
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            location_city
                        </span>
                        <select id="select-category" class="demo-default">
                            <!-- Default İl -->
                            <option value="0">İL</option>
                            <!-- İl Listesi -->
                            <option value="1">Adana</option>
                            <option value="2">Adıyaman</option>
                            <option value="3">Afyonkarahisar</option>
                            <option value="4">Ağrı</option>
                            <option value="5">Amasya</option>
                            <option value="6">Ankara</option>
                            <option value="7">Antalya</option>
                            <option value="8">Artvin</option>
                            <option value="9">Aydın</option>
                            <option value="10">Balıkesir</option>
                            <option value="11">Bilecik</option>
                            <option value="12">Bingöl</option>
                            <option value="13">Bitlis</option>
                            <option value="14">Bolu</option>
                            <option value="15">Burdur</option>
                            <option value="16">Bursa</option>
                            <option value="17">Çanakkale</option>
                            <option value="18">Çankırı</option>
                            <option value="19">Çorum</option>
                            <option value="20">Denizli</option>
                            <option value="21">Diyarbakır</option>
                            <option value="22">Edirne</option>
                            <option value="23">Elazığ</option>
                            <option value="24">Erzincan</option>
                            <option value="25">Erzurum</option>
                        </select>
                    </div>
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            <!-- İlçe  İkon-->
                            location_on
                        </span>
                        <input type="text" placeholder="İlçe" />
                    </div>
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            signpost
                        </span>
                        <input type="text" placeholder="Mahalle" />
                    </div>
                    <div class="form-box">
                        <span class="material-symbols-outlined">
                            search
                        </span>
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
                    <a href="#" class="swiper-slide feature-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" alt="Property Image">
                            <div class="card-body">
                                <h3 class="card-title">3+1 Apartment in Istanbul</h3>
                                <p class="card-location">İstanbul, Gop</p>
                                <div class="card-infos">
                                    <span><span class="material-symbols-outlined">home</span>Daire</span>
                                    <span><span class="material-symbols-outlined">weekend</span>3+1</span>
                                    <span><span class="material-symbols-outlined">layers</span>3.Kat</span>
                                    <span><span class="material-symbols-outlined">texture</span>120 m2</span>
                                </div>
                                <p class="card-price">250,000TL</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="swiper-slide feature-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" alt="Property Image">
                            <div class="card-body">
                                <h3 class="card-title">3+1 Apartment in Istanbul</h3>
                                <p class="card-location">İstanbul, Gop</p>
                                <div class="card-infos">
                                    <span><span class="material-symbols-outlined">home</span>Daire</span>
                                    <span><span class="material-symbols-outlined">weekend</span>3+1</span>
                                    <span><span class="material-symbols-outlined">layers</span>3.Kat</span>
                                    <span><span class="material-symbols-outlined">texture</span>120 m2</span>
                                </div>
                                <p class="card-price">250,000TL</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="swiper-slide feature-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" alt="Property Image">
                            <div class="card-body">
                                <h3 class="card-title">3+1 Apartment in Istanbul</h3>
                                <p class="card-location">İstanbul, Gop</p>
                                <div class="card-infos">
                                    <span><span class="material-symbols-outlined">home</span>Daire</span>
                                    <span><span class="material-symbols-outlined">weekend</span>3+1</span>
                                    <span><span class="material-symbols-outlined">layers</span>3.Kat</span>
                                    <span><span class="material-symbols-outlined">texture</span>120 m2</span>
                                </div>
                                <p class="card-price">250,000TL</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="swiper-slide feature-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" alt="Property Image">
                            <div class="card-body">
                                <h3 class="card-title">3+1 Apartment in Istanbul</h3>
                                <p class="card-location">İstanbul, Gop</p>
                                <div class="card-infos">
                                    <span><span class="material-symbols-outlined">home</span>Daire</span>
                                    <span><span class="material-symbols-outlined">weekend</span>3+1</span>
                                    <span><span class="material-symbols-outlined">layers</span>3.Kat</span>
                                    <span><span class="material-symbols-outlined">texture</span>120 m2</span>
                                </div>
                                <p class="card-price">250,000TL</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="swiper-slide feature-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" alt="Property Image">
                            <div class="card-body">
                                <h3 class="card-title">3+1 Apartment in Istanbul</h3>
                                <p class="card-location">İstanbul, Gop</p>
                                <div class="card-infos">
                                    <span><span class="material-symbols-outlined">home</span>Daire</span>
                                    <span><span class="material-symbols-outlined">weekend</span>3+1</span>
                                    <span><span class="material-symbols-outlined">layers</span>3.Kat</span>
                                    <span><span class="material-symbols-outlined">texture</span>120 m2</span>
                                </div>
                                <p class="card-price">250,000TL</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="swiper-slide feature-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" alt="Property Image">
                            <div class="card-body">
                                <h3 class="card-title">3+1 Apartment in Istanbul</h3>
                                <p class="card-location">İstanbul, Gop</p>
                                <div class="card-infos">
                                    <span><span class="material-symbols-outlined">home</span>Daire</span>
                                    <span><span class="material-symbols-outlined">weekend</span>3+1</span>
                                    <span><span class="material-symbols-outlined">layers</span>3.Kat</span>
                                    <span><span class="material-symbols-outlined">texture</span>120 m2</span>
                                </div>
                                <p class="card-price">250,000TL</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="swiper-slide feature-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" alt="Property Image">
                            <div class="card-body">
                                <h3 class="card-title">3+1 Apartment in Istanbul</h3>
                                <p class="card-location">İstanbul, Gop</p>
                                <div class="card-infos">
                                    <span><span class="material-symbols-outlined">home</span>Daire</span>
                                    <span><span class="material-symbols-outlined">weekend</span>3+1</span>
                                    <span><span class="material-symbols-outlined">layers</span>3.Kat</span>
                                    <span><span class="material-symbols-outlined">texture</span>120 m2</span>
                                </div>
                                <p class="card-price">250,000TL</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
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