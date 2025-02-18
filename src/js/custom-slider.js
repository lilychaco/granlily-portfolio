
  //================================
    // planのスライダー用
// ==================================
document.addEventListener("DOMContentLoaded", function () {
  let campaignSlider = new Swiper(".js-plan-swiper", {
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: true,
    },
    speed: 2000,
    slidesPerView: "auto", // スライドの数を自動調整
    // 前後の矢印
    navigation: {
      nextEl: ".custom-swiper-button-next",
      prevEl: ".custom-swiper-button-prev",
    },

    breakpoints: {
      769: {
        // 769px以上のデバイスでの設定
        slidesPerView: "auto", // PCでは3枚半表示
      },
    },
  });
});


// document.addEventListener("DOMContentLoaded", function () {
// 	let planSlider = new Swiper(".js-plan-swiper", {
// 		loop: true,
//     centeredSlides: true,
//     slidesPerView: 1,
//     spaceBetween: 30,
//     speed: 2000,
//     // 前後の矢印
//     navigation: {
//       nextEl: ".custom-swiper-button-next",
//       prevEl: ".custom-swiper-button-prev",
//     },

//     breakpoints: {

//       640: {
//         slidesPerView: 2,
//         spaceBetween: 50,
//       },
//       768: {
//         slidesPerView: 2.5,
//         spaceBetween: 70,
//       },
//       1080: {
//         slidesPerView: 2.5,
//         spaceBetween: 100,
//       },

//     },
//   });
// });
