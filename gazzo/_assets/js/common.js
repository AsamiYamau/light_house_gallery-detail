(function ($) {
  "use strict";

  // PC/SP判定
  // スクロールイベント
  // リサイズイベント
  // スムーズスクロール

  /* ここから */
  var break_point = 640; //ブレイクポイント
  var mql = window.matchMedia("screen and (max-width: " + break_point + "px)"); //、MediaQueryListの生成
  var deviceFlag = mql.matches ? 1 : 0; // 0 : PC ,  1 : SP

  // リサイズイベント

  var checkBreakPoint = function (mql) {
    deviceFlag = mql.matches ? 1 : 0; // 0 : PC ,  1 : SP
    // → PC
    if (deviceFlag == 0) {
    } else {
      // →SP
    }
    deviceFlag = mql.matches;
  };

  // ブレイクポイントの瞬間に発火
  mql.addListener(checkBreakPoint); //MediaQueryListのchangeイベントに登録

  // 初回チェック
  checkBreakPoint(mql);

  var Header = {
    init: function () {
      this.$button = $(".nav-button");
      this.$nav = $(".nav-wrap");
      this.event();
    },
    event: function () {
      var _this = this;
      this.$button.on("click", function () {
        if ($(this).hasClass("active")) {
          _this.close();
        } else {
          _this.open();
        }
      });
    },
    open: function () {
      this.$button.addClass("active");
      this.$nav.addClass("active");
    },
    close: function () {
      this.$button.removeClass("active");
      this.$nav.removeClass("active");
    },
  };
  Header.init();

  // スムーズスクロール
  // #で始まるアンカーをクリックした場合にスムーススクロール
  $('a[href^="#"]').on("click", function () {
    var speed = 500;
    // アンカーの値取得
    var href = $(this).attr("href");
    // 移動先を取得
    var target = $(href == "#" || href == "" ? "html" : href);
    // 移動先を数値で取得
    var position = target.offset().top - 80;

    // スムーススクロール
    $("body,html").animate(
      {
        scrollTop: position,
      },
      speed,
      "swing"
    );
    return false;
  });

  /* animation
  ------------------------------*/

  // scroll effects
  $.fn.acs = function (options) {
    var elements = this;
    var defaults = {
      screenPos: 1.4,
      className: "is-animated",
    };
    var setting = $.extend(defaults, options);

    $(window).on("load scroll", function () {
      add_class_in_scrolling();
    });

    function add_class_in_scrolling() {
      var winScroll = $(window).scrollTop();
      var winHeight = $(window).height();
      var scrollPos = winScroll + winHeight * setting.screenPos;

      if (elements.offset().top < scrollPos) {
        elements.addClass(setting.className);
      }
    }
  };

  $('.anm, [class*="anm-"], .anm-list > *').each(function () {
    $(this).acs();
  });

  $(".c-text01-box > *,.c-text02-box > *,.home-tab-map > *").each(function () {
    $(this).acs();
  });

  // list animation delay
  $.fn.anmDelay = function (options) {
    var elements = this;
    var defaults = {
      delay: 0.2,
      property: "animation-delay",
    };
    var setting = $.extend(defaults, options);

    var index = elements.index();
    var time = index * setting.delay;
    elements.css(setting.property, time + "s");
  };

  $(".anm-list > *").each(function () {
    $(this).anmDelay();
  });

  // var slider01 = $('.l-slider01-block__slider');
  // if(slider01[0]){
  //   slider01.slick({
  //     autoplay:true,
  //     slidesToShow:3,
  //     slidesToScroll:1,
  //     centerMode: true,
  //     speed:2000,
  //     nextArrow:'<button class="slick-next slick-arrow" aria-label="Next" type="button" style=""></button>',
  //     prevArrow:'<button class="slick-prev slick-arrow" aria-label="Prev" type="button" style=""></button>',
  //     responsive: [
  //       {
  //         breakpoint: 641,
  //         settings: {
  //           slidesToShow:1,
  //           speed:800,
  //         }
  //       }
  //     ]
  //   });
  // }

  //*-----------------------
  // アコーディオン
  //*-----------------------
  let $js_aco_btn = $(".js-aco-btn");
  let js_aco_body = ".js-aco-body";
  $(js_aco_body).hide();
  $js_aco_btn.on("click", function () {
    let $this = $(this);
    let $target = $this.next(js_aco_body);
    $this.toggleClass("is-open");
    $target.slideToggle();
  });

  //*-----------------------
  // 住所入力
  //*-----------------------
  //住所入力のボタンクリックの挙動
  let $form = $(".mw_wp_form form");
  if ($form) {
    $form.addClass("h-adr");
  }

  let cancelFlag = true;

  //イベントをキャンセル
  const onKeyupCanceller = function (e) {
    if (cancelFlag) {
      e.stopImmediatePropagation();
    }
    return false;
  };

  // 郵便番号の入力欄
  const postalcode = $form.find(".p-postal-code"),
    postalField = postalcode[postalcode.length - 1];
  // console.log(postalcode);
  // console.log(postalField);

  //通常の挙動をキャンセルできるようにイベントを追加
  if (postalField) {
    postalField.addEventListener("keyup", onKeyupCanceller, false);
  }
  //ボタンクリック時
  const btn = $form.find(".postal-search");
  if (btn) {
    btn.on("click", function (e) {
      //キャンセルを解除
      cancelFlag = false;

      //処理実行
      let event;
      if (typeof Event === "function") {
        event = new Event("keyup");
      } else {
        event = document.createEvent("Event");
        event.initEvent("keyup", true, true);
      }
      postalField.dispatchEvent(event);

      //キャンセルを戻す
      cancelFlag = true;
    });
  }
  //*-----------------------
  // formバリデーション文
  //*-----------------------
  let $error = $(".mw_wp_form .error");
  if ($error.text()) {
    $error.text("必須項目です");
  }

  /* menu__slider
  ----------------------------------------*/

  if ($(".menu-slider-main")[0]) {
    $(".menu-slider-main").slick({
      autoplay: false,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      asNavFor: ".menu-slider-thumb", // サムネイルと同期
    });
    $(".menu-slider-thumb").slick({
      autoplay: false,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      prevArrow: '<div class="slick-prev"></div>',
      nextArrow: '<div class="slick-next"></div>',
      dots: false,
      asNavFor: ".menu-slider-main", // メインスライダーと同期
      focusOnSelect: true, // サムネイルクリックを有効化
    });
  }

  /* slider
  ----------------------------------------*/

  if ($(".slider")[0]) {
    $(".slider").slick({
      autoplay: false,
      autoplaySpeed: 3000,
      speed: 500,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      pauseOnDotsHover: false,
    });

    //スマホ用：スライダーをタッチしても止めずにスライドをさせたい場合
    $(".slider").on("touchmove", function (event, slick, currentSlide, nextSlide) {
      $(".slider").slick("slickPlay");
    });
  }

  /*------------------------------------------------------------------------------
    modal
  ------------------------------------------------------------------------------*/
  class Modal {
    //コンストラクター(インスタンス化じに動くメソッド。初期用のやつ。)
    constructor(key) {
      console.log('.js-modal-btn[data-modal="' + key + '"]');
      this.$btn = $('.js-modal-btn[data-modal="' + key + '"]');
      this.$cont = $('.js-modal-body[data-modal="' + key + '"]');

      this.$close_btn = this.$cont.find(".js-modal-close");
      this.$inner = this.$cont.find(".modal-cont");
      this.event();
    }

    //イベント登録用
    event() {
      let _this = this;
      this.$btn.on("click", function () {
        _this.modalOpen();
        $("body").css("overflow-y", "hidden"); // 本文の縦スクロールを無効
      });
      this.$close_btn.on("click", function () {
        _this.modalClose();
        $("body").css("overflow-y", "auto"); // 本文の縦スクロールを無効
      });
      this.$cont.on("click", function () {
        _this.modalClose();
        $("body").css("overflow-y", "auto"); // 本文の縦スクロールを無効
      });
      this.$inner.on("click", function (e) {
        e.stopPropagation();
      });
    }

    //ひらく
    modalOpen(key) {
      // body切り替え
      this.$cont.addClass("active");
    }

    //とじる

    modalClose(key) {
      this.$cont.removeClass("active");
    }
  }

  let modalObject = [];
  $(".js-modal-body").each(function (i, val) {
    let key = $(val).attr("data-modal");
    modalObject[key] = new Modal(key);
  });
})(jQuery);

// $(document).ready(function() {
//   // スライダーのリンクをクリックしたとき
//   $('.p-set-menu__slider-link').on('click', function(e) {
//       e.preventDefault(); // リンクのデフォルト動作を防ぐ

//       // クリックしたリンクから新しい画像とタイトルを取得
//       var newImage = $(this).data('src');
//       var newTitle = $(this).data('title');

//       // 上の画像とタイトルを更新
//       $('#mainImage').attr('src', newImage); // 画像のsrcを変更
//       $('#mainImage').attr('alt', newTitle); // 画像のalt属性を更新
//       $('#mainTitle').text(newTitle); // タイトルを更新
//   });

//   // スライダーの前後矢印をクリックしたとき
//   $('.slick-prev, .slick-next').on('click', function() {
//       // 現在表示されているスライドのインデックスを取得
//       var currentIndex = $('.menu-slider').slick('slickCurrentSlide');

//       // 現在のスライドから新しい画像とタイトルを取得
//       var newImage = $('.menu-slider .slick-slide').eq(currentIndex).find('a').data('src');
//       var newTitle = $('.menu-slider .slick-slide').eq(currentIndex).find('a').data('title');

//       // 上の画像とタイトルを更新
//       $('#mainImage').attr('src', newImage); // 画像のsrcを変更
//       $('#mainImage').attr('alt', newTitle); // 画像のalt属性を更新
//       $('#mainTitle').text(newTitle); // タイトルを更新
//   });
// });
