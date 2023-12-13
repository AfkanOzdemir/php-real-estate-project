// document.addEventListener("DOMContentLoaded", function () {
//   let filterSatilik = document.querySelector(".f-satilik");
//   let filterSatilikDaire = document.querySelector(".f-satilik-daire");
//   let filterSatilikResidence = document.querySelector(".f-satilik-residence");
//   let filterSatilikVilla = document.querySelector(".f-satilik-villa");
//   let filterSatilikMev = document.querySelector(".f-satilik-mev");
//   let filterSatilikKonak = document.querySelector(".f-satilik-konak");
//   let filterSatilikYali = document.querySelector(".f-satilik-yali");
//   let filterSatilikCiftlik = document.querySelector(".f-satilik-ciftlik");
//   let filterSatilikYazlik = document.querySelector(".f-satilik-yazlik");
//   let filterSatilikPrefabrik = document.querySelector(".f-satilik-prefabrik");
//   let filterSatilikKooperatif = document.querySelector(".f-satilik-kooperatif");
//   let filterSatilikDiger = document.querySelector(".f-satilik-diger");

//   let filterKiralik = document.querySelector(".f-kiralik");
//   let filterKiralikDaire = document.querySelector(".f-kiralik-daire");
//   let filterKiralikResidence = document.querySelector(".f-kiralik-residence");
//   let filterKiralikVilla = document.querySelector(".f-kiralik-villa");
//   let filterKiralikMev = document.querySelector(".f-kiralik-mev");
//   let filterKiralikKonak = document.querySelector(".f-kiralik-konak");
//   let filterKiralikYali = document.querySelector(".f-kiralik-yali");
//   let filterKiralikCiftlik = document.querySelector(".f-kiralik-ciftlik");
//   let filterKiralikYazlik = document.querySelector(".f-kiralik-yazlik");
//   let filterKiralikPrefabrik = document.querySelector(".f-kiralik-prefabrik");
//   let filterKiralikKooperatif = document.querySelector(".f-kiralik-kooperatif");
//   let filterKiralikDiger = document.querySelector(".f-kiralik-diger");

//   filterSatilik.addEventListener("click", function () {
//     filterSatilik.classList.toggle("active");
//     filterSatilikDaire.classList.toggle("active");
//     filterSatilikResidence.classList.toggle("active");
//     filterSatilikVilla.classList.toggle("active");
//     filterSatilikMev.classList.toggle("active");
//     filterSatilikKonak.classList.toggle("active");
//     filterSatilikYali.classList.toggle("active");
//     filterSatilikCiftlik.classList.toggle("active");
//     filterSatilikYazlik.classList.toggle("active");
//     filterSatilikPrefabrik.classList.toggle("active");
//     filterSatilikKooperatif.classList.toggle("active");
//     filterSatilikDiger.classList.toggle("active");

//     filterKiralik.classList.toggle("hidden");
//     filterKiralikDaire.classList.toggle("hidden");
//     filterKiralikResidence.classList.toggle("hidden");
//     filterKiralikVilla.classList.toggle("hidden");
//     filterKiralikMev.classList.toggle("hidden");
//     filterKiralikKonak.classList.toggle("hidden");
//     filterKiralikYali.classList.toggle("hidden");
//     filterKiralikCiftlik.classList.toggle("hidden");
//     filterKiralikYazlik.classList.toggle("hidden");
//     filterKiralikPrefabrik.classList.toggle("hidden");
//     filterKiralikKooperatif.classList.toggle("hidden");
//     filterKiralikDiger.classList.toggle("hidden");
//   });

//   filterKiralik.addEventListener("click", function () {
//     filterKiralik.classList.toggle("active");
//     filterKiralikDaire.classList.toggle("active");
//     filterKiralikResidence.classList.toggle("active");
//     filterKiralikVilla.classList.toggle("active");
//     filterKiralikMev.classList.toggle("active");
//     filterKiralikKonak.classList.toggle("active");
//     filterKiralikYali.classList.toggle("active");
//     filterKiralikCiftlik.classList.toggle("active");
//     filterKiralikYazlik.classList.toggle("active");
//     filterKiralikPrefabrik.classList.toggle("active");
//     filterKiralikKooperatif.classList.toggle("active");
//     filterKiralikDiger.classList.toggle("active");

//     filterSatilik.classList.toggle("hidden");
//     filterSatilikDaire.classList.toggle("hidden");
//     filterSatilikResidence.classList.toggle("hidden");
//     filterSatilikVilla.classList.toggle("hidden");
//     filterSatilikMev.classList.toggle("hidden");
//     filterSatilikKonak.classList.toggle("hidden");
//     filterSatilikYali.classList.toggle("hidden");
//     filterSatilikCiftlik.classList.toggle("hidden");
//     filterSatilikYazlik.classList.toggle("hidden");
//     filterSatilikPrefabrik.classList.toggle("hidden");
//     filterSatilikKooperatif.classList.toggle("hidden");
//     filterSatilikDiger.classList.toggle("hidden");
//   });

//   filterSatilikDaire.addEventListener("click", function () {
//     filterSatilikDaire.classList.toggle("active");
//     filterSatilikResidence.classList.toggle("hidden");
//     filterSatilikVilla.classList.toggle("hidden");
//     filterSatilikMev.classList.toggle("hidden");
//     filterSatilikKonak.classList.toggle("hidden");
//     filterSatilikYali.classList.toggle("hidden");
//     filterSatilikCiftlik.classList.toggle("hidden");
//     filterSatilikYazlik.classList.toggle("hidden");
//     filterSatilikPrefabrik.classList.toggle("hidden");
//     filterSatilikKooperatif.classList.toggle("hidden");
//     filterSatilikDiger.classList.toggle("hidden");

//     filterKiralikDaire.classList.toggle("hidden");
//     filterKiralikResidence.classList.toggle("hidden");
//     filterKiralikVilla.classList.toggle("hidden");
//     filterKiralikMev.classList.toggle("hidden");
//     filterKiralikKonak.classList.toggle("hidden");
//     filterKiralikYali.classList.toggle("hidden");
//     filterKiralikCiftlik.classList.toggle("hidden");
//     filterKiralikYazlik.classList.toggle("hidden");
//     filterKiralikPrefabrik.classList.toggle("hidden");
//     filterKiralikKooperatif.classList.toggle("hidden");
//     filterKiralikDiger.classList.toggle("hidden");
//   });
//   filterSatilikResidence.addEventListener("click", function () {
//     filterSatilikResidence.classList.toggle("active");
//     filterSatilikDaire.classList.toggle("hidden");
//     filterSatilikVilla.classList.toggle("hidden");
//     filterSatilikMev.classList.toggle("hidden");
//     filterSatilikKonak.classList.toggle("hidden");
//     filterSatilikYali.classList.toggle("hidden");
//     filterSatilikCiftlik.classList.toggle("hidden");
//     filterSatilikYazlik.classList.toggle("hidden");
//     filterSatilikPrefabrik.classList.toggle("hidden");
//     filterSatilikKooperatif.classList.toggle("hidden");
//     filterSatilikDiger.classList.toggle("hidden");

//     filterKiralikDaire.classList.toggle("hidden");
//     filterKiralikResidence.classList.toggle("hidden");
//     filterKiralikVilla.classList.toggle("hidden");
//     filterKiralikMev.classList.toggle("hidden");
//     filterKiralikKonak.classList.toggle("hidden");
//     filterKiralikYali.classList.toggle("hidden");
//     filterKiralikCiftlik.classList.toggle("hidden");
//     filterKiralikYazlik.classList.toggle("hidden");
//     filterKiralikPrefabrik.classList.toggle("hidden");
//     filterKiralikKooperatif.classList.toggle("hidden");
//     filterKiralikDiger.classList.toggle("hidden");
//   });
// });

// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-daire">
// // //     Daire
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-residence">
// // //     Residence
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-villa">
// // //     Villa
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-mev">
// // //     Müstakil Ev
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-konak">
// // //     Köşk &amp; Konak
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-yali">
// // //     Yalı Dairesi
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-ciftlik">
// // //     Çiftlik Evi
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-yazlik">
// // //     Yazlık
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-prefabrik">
// // //     Prefabrik Ev
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-kooperatif">
// // //     Kooperatif
// // // </span>
// // // </div>
// // // <div class="sub-category-item">
// // // <span class="sub-category-item-text f-satilik-diger">
// // //     Diğer
// // // </span>
// // // </div>
// // // </div>
