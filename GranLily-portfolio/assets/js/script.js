"use strict";

jQuery(function ($) {
  // ドキュメントが読み込まれた時に実行される
  //==================================
  //ハンバーガーとドロワー
  // ==================================
  // ハンバーガーボタンクリックで、ドロワーメニューの開閉
  $("#js-hamburger").click(function () {
    $("body").toggleClass("is-drawerActive");
    var isExpanded = $(this).attr("aria-expanded") === "true";
    $(this).attr("aria-expanded", !isExpanded);
    $("#js-global-menu").css("visibility", isExpanded ? "hidden" : "visible").attr("aria-hidden", isExpanded);
  });

  // ドロワーのリンクがクリックされたらメニューを閉じる
  $("#js-global-menu a").click(function () {
    $("body").removeClass("is-drawerActive");
    $("#js-hamburger").attr("aria-expanded", false);
    $("#js-global-menu").css("visibility", "hidden").attr("aria-hidden", "true");
    $("#js-drawer-background").removeClass("is-drawerActive");
  });

  //==================================
  //FVを過ぎたら、headerの色が変わる
  // ==================================
  $(function () {
    var fvHeight = $(".js-fv").outerHeight();
    var isScrolled = false; // 状態管理用の変数（無駄なクラスの追加・削除を防ぐ）

    // スクロールイベント
    $(window).on("scroll", function () {
      if (!isScrolled) {
        requestAnimationFrame(updateHeader);
        isScrolled = true;
      }
    });
    function updateHeader() {
      var scrollTop = $(window).scrollTop(); // 現在のスクロール量を取得
      if (scrollTop > fvHeight) {
        $(".js-header").addClass("is-scroll");
        $(".js-header .header-menu__item a").addClass("is-scroll");
      } else {
        $(".js-header").removeClass("is-scroll");
        $(".js-header .header-menu__item a").removeClass("is-scroll");
      }
      isScrolled = false;
    }
  });

  //================================
  // ボタンをクリックしてページトップに戻る
  // ===============================
  $(".js-page-top-button").click(function () {
    $("html").animate({
      scrollTop: 0
    }, 1000, "linear");
    return false;
  });

  // ==================================
  // インフォメーションページのタブの動きを制御
  // ==================================
  // $(document).ready(function () {
  var urlParams = new URLSearchParams(window.location.search); // URLのクエリパラメータを取得
  var tabParam = urlParams.get("tab"); // "tab"パラメータの値を取得
  var $tabs = $(".js-tab"); // 全てのタブ
  var $contents = $(".js-content"); // 全てのコンテンツ

  if (tabParam) {
    // パラメータが指定されている場合
    var targetIndex = $tabs.filter("[data-tab=\"".concat(tabParam, "\"]")).index();
    if (targetIndex !== -1) {
      $tabs.removeClass("current").eq(targetIndex).addClass("current"); // 該当タブを選択状態に
      $contents.hide().eq(targetIndex).fadeIn(300, function () {
        ScrollTrigger.refresh();
      }); // 対応コンテンツを表示
    } else {
      // 該当するタブがない場合、デフォルトタブを表示
      showDefaultTab();
    }
  } else {
    // クエリパラメータがない場合、デフォルトタブを表示
    showDefaultTab();
  }

  // タブクリック時のイベント
  $tabs.on("click", function () {
    var $clickedTab = $(this); // クリックされたタブを取得
    var index = $clickedTab.index(); // タブのインデックス番号を取得
    var tabId = $clickedTab.data("tab"); // タブに設定したデータ属性からIDを取得

    $tabs.removeClass("current"); // 全てのタブの選択状態を解除
    $clickedTab.addClass("current"); // クリックされたタブを選択状態に

    $contents.hide().eq(index).fadeIn(300, function () {
      ScrollTrigger.refresh(); // アニメーション完了後にリフレッシュ
    }); // 対応するコンテンツを表示

    // URLにクエリパラメータを設定
    var newUrl = "".concat(window.location.origin).concat(window.location.pathname, "?tab=").concat(tabId);
    window.history.replaceState(null, null, newUrl);
  });

  // 初期タブ表示用の関数
  function showDefaultTab() {
    $tabs.first().addClass("current");
    $contents.hide().first().fadeIn(300, function () {
      ScrollTrigger.refresh(); // 初期表示時もリフレッシュ
    });
  }

  //================================
  //  サイドのアーカイブメニューの動作
  // ===============================
  $(".js-year-toggle").click(function () {
    var $monthList = $(this).next(".side-archive__month-list");
    $(".side-archive__month-list").not($monthList).slideUp();
    $monthList.slideToggle();
    $(this).parent(".side-archive__year").toggleClass("active");
  });

  //================================
  // アコーディオンの動作
  //==================================
  $(".js-accordion-top").click(function () {
    // アコーディオンの開閉動作
    $(this).next().slideToggle(300);

    // 開いている場合はis-openを追加し、is-closeを削除
    if ($(this).hasClass("is-open")) {
      $(this).removeClass("is-open").addClass("is-close");
    } else {
      // 閉じている場合はis-closeを追加し、is-openを削除
      $(this).removeClass("is-close").addClass("is-open");
    }
  });

  //================================
  // 画像に色背景がついてから、写真が出てくる
  //==================================
  //要素の取得とスピードの設定
  var box = $(".colorbox"),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($(".color")),
      image = $(this).find("img");
    var counter = 0;
    image.css("opacity", "0");
    color.css("width", "0%");

    //inviewを使って背景色が画面に現れたら処理をする
    color.on("inview", function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          width: "100%"
        }, speed, function () {
          image.css("opacity", "1");
          $(this).css({
            left: "0",
            right: "auto"
          });
          $(this).animate({
            width: "0%"
          }, speed);
        });
        counter = 1;
      }
    });
  });

  //================================
  // profile 画像が右からfade-in
  //================================
  $(function () {
    var fadeElements = document.querySelectorAll(".fade-in-right");
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
        }
      });
    }, {
      root: null,
      threshold: 0.1,
      rootMargin: "0px"
    });
    fadeElements.forEach(function (element) {
      observer.observe(element);
    });
  });

  //================================
  // gallery一覧の拡大画像モーダル処理
  //================================
  $(document).on("click", ".js-modal-open img", function () {
    var imageHtml = $(this).prop("outerHTML");
    $("#grayDisplay").hide() // 先に非表示
    .html("<div class=\"modal-content\">".concat(imageHtml, "</div>")).css("display", "flex") // ここでdisplay: flexを適用
    .fadeIn(200);
    $("body").addClass("no-scroll"); // スクロール無効化
  });

  $(document).on("click", "#grayDisplay, #grayDisplay img", function (event) {
    $("#grayDisplay").fadeOut(200);
    $("body").removeClass("no-scroll");
  });
}); // ← jQuery(function ($) { の閉じタグ

//================================
//loading
//================================
jQuery(window).on("load", function () {
  function checkVisited() {
    return sessionStorage.getItem("visited") !== null;
  }
  function setVisitedFlag() {
    sessionStorage.setItem("visited", "true");
  }
  if (!checkVisited()) {
    setVisitedFlag();
    jQuery(".splash__logo").delay(800).fadeOut(600, function () {
      jQuery(".splash").fadeOut(600, function () {
        jQuery(".fv__slide").addClass("is-active");
      });
    });
  } else {
    jQuery(".splash").hide();
    jQuery(".fv__slide").addClass("is-active");
  }
});

//================================
//GSAP
//================================
// GSAPのプラグインを登録
gsap.registerPlugin(MotionPathPlugin);

// 楕円のサイズ（横幅900px、高さ100px）
var ellipseWidth = 900;
var ellipseHeight = 100;

// 楕円の中心座標
var centerX = ellipseWidth / 2;
var centerY = ellipseHeight / 2;

// 楕円の半径
var radiusX = ellipseWidth / 2;
var radiusY = ellipseHeight / 2;

// 楕円の上半分のパスデータを作成
var pathData = "M 0,".concat(centerY, " A ").concat(radiusX, ",").concat(radiusY, " 0 0,1 ").concat(ellipseWidth, ",").concat(centerY);

// 楕円全体のパスデータを作成
// const pathData = `M 0,${centerY}
//                   A ${radiusX},${radiusY} 0 0,1 ${ellipseWidth},${centerY}
//                   A ${radiusX},${radiusY} 0 0,1 0,${centerY}`;

// ページが読み込まれた後に処理を実行
document.addEventListener("DOMContentLoaded", function () {
  var flightPath = document.querySelector("#flightPath");
  if (!flightPath) {
    console.error("エラー: #flightPath が見つかりません！");
  } else {
    flightPath.setAttribute("d", pathData);
  }
  // SVGの <path> にパスデータをセット（純粋なJS版）
  document.querySelector("#flightPath").setAttribute("d", pathData);

  // 飛行機を軌道に沿って移動
  gsap.to("#airplane", {
    duration: 4,
    // 4秒でアニメーション
    repeat: -1,
    // 無限ループ
    ease: "power1.inOut",
    // イージング適用
    motionPath: {
      path: "#flightPath",
      // 参照するSVGパス
      align: "#flightPath",
      // パスに沿って回転
      autoRotate: true,
      // 自動回転
      start: 0,
      // 開始位置
      end: 1 // 終了位置
    }
  });
});

//================================
//GSAP galleryに パララックス効果
//================================
// ScrollTrigger を登録
gsap.registerPlugin(ScrollTrigger);

// パララックス効果の適用
gsap.utils.toArray(".gallery__item img").forEach(function (img) {
  gsap.fromTo(img, {
    y: "-10%"
  },
  // 初期位置（少し上）
  {
    y: "10%",
    // スクロール時に下へ動く
    scrollTrigger: {
      trigger: img,
      //     要素の  画面の
      start: "top bottom",
      // 画像がビューポートに入るタイミング
      end: "bottom top",
      // 画像がビューポートから出るタイミング
      scrub: true // スクロールに応じて動く
    }
  });
});

//================================
//タブ切替で、MVも変更
//================================
document.addEventListener("DOMContentLoaded", function () {
  // タブを取得
  var tabs = document.querySelectorAll(".js-tab");

  // MVの画像とタイトル要素を取得
  var mvImg = document.querySelector(".mv__img img");
  var mvTitle = document.querySelector(".mv__title");
  tabs.forEach(function (tab) {
    tab.addEventListener("click", function () {
      // タブが持つデータ属性を取得
      var newMvImg = this.getAttribute("data-mv-img");
      var newMvTitle = this.getAttribute("data-mv-title");

      // MVの画像とタイトルを変更
      if (mvImg) {
        mvImg.src = newMvImg;
      }
      if (mvTitle) {
        mvTitle.innerHTML = newMvTitle;
      }

      // タブのアクティブ状態を更新
      tabs.forEach(function (t) {
        return t.removeAttribute("current");
      });
      this.setAttribute("current", true);
    });
  });
});

//================================
//スタープランページ  タブ切替で、MVも変更
//================================
// document.addEventListener("DOMContentLoaded", function () {
//   const mainVisual = document
//     .getElementById("js-main-visual")
// 		.querySelector("img");
// 	const defaultImage = mainVisual.getAttribute("data-default-image");
//   const categoryItems = document.querySelectorAll(".category-list__item");

//   categoryItems.forEach((item) => {
//     item.addEventListener("click", function (event) {

//       const newImage = item.getAttribute("data-image");

//       if (newImage && newImage !== "") {
//         mainVisual.src = newImage; // カテゴリの画像に変更
//       } else {
//         mainVisual.src = defaultImage; // ALLを押したときは初期画像に戻す
//       }
//     });
//   });
// });