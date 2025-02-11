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
    $("body,html").animate({
      scrollTop: 0
    }, 1000, "swing");
    return false;
  });

  // ==================================
  // インフォメーションページのタブの動きを制御
  // ==================================
  $(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search); // URLのクエリパラメータを取得
    var tabParam = urlParams.get("tab"); // "tab"パラメータの値を取得
    var $tabs = $(".js-tab"); // 全てのタブ
    var $contents = $(".js-content"); // 全てのコンテンツ

    if (tabParam) {
      // パラメータが指定されている場合
      var targetIndex = $tabs.filter("[data-tab=\"".concat(tabParam, "\"]")).index();
      if (targetIndex !== -1) {
        $tabs.removeClass("current").eq(targetIndex).addClass("current"); // 該当タブを選択状態に
        $contents.hide().eq(targetIndex).fadeIn(300); // 対応コンテンツを表示
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

      $contents.hide().eq(index).fadeIn(300); // 対応するコンテンツを表示

      // URLにクエリパラメータを設定
      var newUrl = "".concat(window.location.origin).concat(window.location.pathname, "?tab=").concat(tabId);
      window.history.replaceState(null, null, newUrl);
    });

    // 初期タブ表示用の関数
    function showDefaultTab() {
      $tabs.first().addClass("current");
      $contents.hide().first().show();
    }
  });

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
    $("#grayDisplay").html("<div class=\"modal-content\">".concat(imageHtml, "</div>")).css("display", "flex") // 先にdisplay: flexを設定
    .hide().fadeIn(200); // フェードインのみ適用

    $("body").addClass("no-scroll"); // スクロール無効化
  });

  $(document).on("click", "#grayDisplay, #grayDisplay img", function (event) {
    $("#grayDisplay").fadeOut(200);
    $("body").removeClass("no-scroll");
  });

  //================================
  // トップ動画の上に、GSAP アニメーション
  //================================
  // GSAP アニメーションの適用
  // GSAPのタイムラインを作成（最初のアニメーション開始時刻を0.5秒遅らせる）
  var tl = gsap.timeline({
    delay: 0.5
  });

  // 1つ目の要素（.first）のアニメーション
  tl.to(".first", {
    opacity: 1,
    y: 0,
    duration: 1.5,
    ease: "power2.out"
  });

  // 2つ目の要素（.second）のアニメーション
  tl.to(".second", {
    opacity: 1,
    y: 0,
    duration: 1.5,
    ease: "power2.out"
  }, "+1.5"); // 直前のアニメーションが終わってから1.5秒後に開始

  // 3つ目の要素（.third）のアニメーション
  tl.to(".third", {
    opacity: 1,
    y: 0,
    duration: 1.5,
    ease: "power2.out"
  }, "+3"); // 直前のアニメーションが終わってから1.5秒後に開始
}); // ← jQuery(function ($) { の閉じタグ