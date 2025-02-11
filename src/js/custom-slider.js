//================================
//FVのスライダー用
// ==================================
document.addEventListener("DOMContentLoaded", function () {
  let fvSlider = new Swiper(".js-fv-swiper", {
    slidesPerView: 1, // スライドを1枚表示
    spaceBetween: 0, // スライド間のスペース
    effect: "fade", // フェードエフェクト
    autoplay: {
      delay: 4000, // 4秒ごとに自動で次のスライドへ
      disableOnInteraction: false, // ユーザーが操作しても自動再生を継続
    },
    speed: 2000, // スライドの切り替わり速度
  });
});


  //================================
    // worksのスライダー用
  // ==================================
document.addEventListener("DOMContentLoaded", function () {
  let worksSlider = new Swiper(".js-works-swiper", {
    loop: true,
    centeredSlides: true,
    slidesPerView: 1,
    spaceBetween: 30,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    speed: 2000,
    // 前後の矢印
    navigation: {
      nextEl: ".custom-swiper-button-next",
      prevEl: ".custom-swiper-button-prev",
    },

    breakpoints: {

      640: {
        slidesPerView: 2,
        spaceBetween: 50,
      },
      768: {
        slidesPerView: 2.5,
        spaceBetween: 70,
      },
      1080: {
        slidesPerView: 2.5,
        spaceBetween: 100,
      },

    },
  });
});
