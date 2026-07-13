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

  // pagetop
  var timer = null;
  // var $pageTop = $('#pagetop');
  // $pageTop.hide();

  // スクロールイベント
  $(window).on("scroll touchmove", function () {
    // スクロール中か判定
    if (timer !== false) {
      clearTimeout(timer);
    }

    // 200ms後にフェードイン
    timer = setTimeout(function () {
      if ($(this).scrollTop() > 100) {
        // $('#pagetop').fadeIn('normal');
      } else {
        // $pageTop.fadeOut();
      }
    }, 200);

    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var footHeight = parseInt($("#footer").innerHeight());

    if (deviceFlag == 0) {
      // → PC
      if (scrollHeight - scrollPosition <= footHeight) {
        // 現在の下から位置が、フッターの高さの位置にはいったら
        // $pageTop.css({
        //   'position': 'absolute',
        //   'bottom': footHeight
        // });
      }
    } else {
      // → SP
      // $pageTop.css({
      //   'position': 'fixed',
      //   'bottom': '20px'
      // });
    }

    //header上の文言を消す
    let $pc_banner = $(".l-header__top.pc"); //上のやつ
    let $sp_banner = $(".l-header__top.sp"); //上のやつ

    const getHeightAddStyle = function (key) {
      let $banner_height = $(key).innerHeight();
      if ($(window).scrollTop() > $banner_height) {
        $(key).css({
          "margin-top": -$banner_height,
        });
      } else {
        $(key).css({
          "margin-top": "0",
        });
      }
    };

    getHeightAddStyle($pc_banner);
    getHeightAddStyle($sp_banner);
  });

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
      this.$header = $(".l-header");
      this.$footer = $(".c-footer");
      this.$btn = $(".nav-btn");
      this.$nav = $(".nav-wrap");
      this.event();
    },
    event: function () {
      var _this = this;
      this.$btn.on("click", function () {
        if ($(this).hasClass("active")) {
          _this.close();
        } else {
          _this.open();
        }
      });
      // fixedのスクロール対応
      $(window).on("scroll", function () {
        _this.$header.css("left", -$(window).scrollLeft());
        _this.$footer.css("left", -$(window).scrollLeft());
      });

    // #が含まれるリンクをクリックしたら閉じる
    this.$nav.find("a").on("click", function (e) {
      _this.close();
      $('body').css('overflow', '');
    });
    },
    open: function () {
      this.$btn.addClass("active");
      this.$nav.addClass("active");
      this.$btn.find(".txt").text("閉じる");
    },
    close: function () {
      this.$btn.removeClass("active");
      this.$nav.removeClass("active");
      this.$btn.find(".txt").text("メニュー");
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
    var position = target.offset().top;

    var $header_Height = $("#header").innerHeight();

    // スムーススクロール
    $("body,html").animate(
      {
        scrollTop: position - $header_Height,
      },
      speed,
      "swing"
    );
    return false;
  });
  // 別ページアンカーリンク
  $(window).on("load", function () {
    let headerHeight = $("#header").outerHeight();
    let urlHash = location.hash;
    if (urlHash && $(urlHash)[0]) {
      let position = $(urlHash).offset().top - headerHeight;
      $("html, body").animate({ scrollTop: position }, 500);
    }

    var hash = location.hash;
    if (hash) {
      var target = $(hash);
      if (target.length) {
        var position = target.offset().top - $("#header").innerHeight();
        $("html, body").animate(
          {
            scrollTop: position,
          },
          500,
          "swing"
        );
      }
    }
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

  var slider01 = $(".c-slider");
  let thumbnail_slider = $(".c-slider-thumbnail");
  if (slider01[0]) {
    slider01.slick({
      autoplay: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplaySpeed: 3000,
      speed: 1000,
      dots: false,
      // customPaging: function(slick,index) {
      //   var targetImage = slick.$slides.eq(index).find('img').attr('src');
      //   return '<img src=' + targetImage + '>';
      // },
      arrows: false,
      asNavFor: ".c-slider-thumbnail", // サムネイルと同期
      // appendDots:$('.dot-img'),
      appendArrows: $(".c-slider-arrows"),
      nextArrow: '<button class="slick-next slick-arrow next-arrow" aria-label="Next" type="button" style=""></button>',
      prevArrow: '<button class="slick-prev slick-arrow prev-arrow" aria-label="Prev" type="button" style=""></button>',
      responsive: [
        {
          breakpoint: 641,
          settings: {
            slidesToShow: 1,
            speed: 800,
          },
        },
      ],
    });
  }
  if (thumbnail_slider[0]) {
    thumbnail_slider.slick({
      autoplay: false,
      slidesToShow: 3,
      // slidesToScroll: 1,
      autoplaySpeed: 3000,
      speed: 1000,
      dots: false,
      asNavFor: ".c-slider", // メインスライダーと同期
      focusOnSelect: true, // サムネイルクリックを有効化
      arrows: true,
      // appendDots: $('.dot-img'),
      appendArrows: $(".c-slider-arrows"),
      nextArrow: '<button class="slick-next slick-arrow next-arrow" aria-label="Next" type="button" style=""></button>',
      prevArrow: '<button class="slick-prev slick-arrow prev-arrow" aria-label="Prev" type="button" style=""></button>',
    });
  }

  var slider02 = $(".c-slider-top");
  if (slider02[0]) {
    slider02.slick({
      autoplay: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      speed: 1000,
      dots: true,
      centerPadding: "16%",
      arrows: false,
      centerMode: true,
      // fade:true,
      responsive: [
        {
          breakpoint: 641,
          settings: {
            slidesToShow: 1,
            speed: 800,
            centerPadding: "0%",
          },
        },
      ],
    });
  }

  //leftメニュー
  let $leftBtn = $(".js-left-btn");

  if ($leftBtn[0]) {
    $leftBtn.hover(
      function () {
        $(this).parents(".l-main__side").addClass("active");
      },
      function () {
        $(this).parents(".l-main__side").removeClass("active");
      }
    );
  }

  //アコーディオン
  let Aco = {
    init: function () {
      this.js_aco_btn = ".js-aco-btn";
      this.js_aco_body = ".js-aco-body";
      this.event();
    },
    event: function () {
      let _this = this;
      $(this.js_aco_btn).on("click", function () {
        $(this).toggleClass("active");
        let key = $(this).attr("data-aco");

        if ($(this).hasClass("active")) {
          _this.open(key);
        } else {
          _this.close(key);
        }
      });
    },
    open: function (key) {
      $('.js-aco-body[data-aco="' + key + '"]').slideDown();
    },
    close: function (key) {
      $('.js-aco-body[data-aco="' + key + '"]').slideUp();
    },
  };
  Aco.init();

  // faq
  let faqBtn = $(".c-faq-list__q");
  if (faqBtn[0]) {
    $(faqBtn).click(function () {
      $(this).toggleClass("open");
      $(this).find(".c-faq-list__btn").toggleClass("active");
      $(this).next().slideToggle();
    });
  }

  //scroll hint
  let js_scroll = document.querySelector(".js-scroll");
  if (js_scroll) {
    window.addEventListener("DOMContentLoaded", function () {
      new ScrollHint(".js-scroll", {
        scrollHintIconAppendClass: "scroll-hint-icon-white",
        suggestiveShadow: true,
        i18n: {
          scrollable: "スクロールできます",
        },
      });
    });
  }

  // formTab
  let $js_tab_btn = $(".js-tab-btn");
  let $js_tab_body = $(".js-tab-body");
  if ($js_tab_btn[0]) {
    $js_tab_btn.on("click", function () {
      let key = $(this).attr("data-tab");

      $js_tab_btn.removeClass("active");
      $(this).addClass("active bg_img");

      $js_tab_body.hide();
      $('.js-tab-body[data-tab="' + key + '"]').show();
    });
  }

  //住所入力のボタンクリックの挙動
  let $form = $(".mw_wp_form form");
  if ($form) {
    $form.addClass("h-adr");
  }

  //該当フォーム
  const mitsumori_hadr = $(".mitsumori-h-adr");
  const cta_hadr = $(".cta-h-adr");

  if (mitsumori_hadr) {
    let cancelFlag = true;

    //イベントをキャンセル
    const onKeyupCanceller = function (e) {
      if (cancelFlag) {
        e.stopImmediatePropagation();
      }
      return false;
    };

    // 郵便番号の入力欄
    const postalcode = mitsumori_hadr.find(".p-postal-code"),
      postalField = postalcode[postalcode.length - 1];
    // console.log(postalcode);
    // console.log(postalField);

    //通常の挙動をキャンセルできるようにイベントを追加
    if (postalField) {
      postalField.addEventListener("keyup", onKeyupCanceller, false);
    }
    //ボタンクリック時
    const btn = mitsumori_hadr.find(".postal-search");
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
  }
  if (cta_hadr) {
    let cancelFlag = true;

    //イベントをキャンセル
    const onKeyupCanceller = function (e) {
      if (cancelFlag) {
        e.stopImmediatePropagation();
      }
      return false;
    };

    // 郵便番号の入力欄
    const postalcode = cta_hadr.find(".p-postal-code"),
      postalField = postalcode[postalcode.length - 1];
    // console.log(postalcode);
    // console.log(postalField);

    //通常の挙動をキャンセルできるようにイベントを追加
    if (postalField) {
      postalField.addEventListener("keyup", onKeyupCanceller, false);
    }
    //ボタンクリック時
    const btn = cta_hadr.find(".postal-search");
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
  }

  //お問い合わせ

  function getParam(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return "";
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  class Form {
    constructor() {
      this.$form = $(".mw_wp_form form");
      this.$type = $('input[name="type"]');
      this.$radio = $('input[name="mitsumori-radio"]');
      this.$radio_btn = $(".js-radio");

      this.$cate = $('.js-radio[value="ケータリング"]');
      this.$deli = $('.js-radio[value="オードブルデリバリー"]');

      this.radio_form = ".js-form";
      this.$confirm = $(".mw_wp_form_confirm");
      this.js_tab_btn = ".js-tab-btn";
      this.js_tab_body = ".js-tab-body";
      this.$p_contact_tab = $(".p_contact-tab");

      this.$submit_btn = $('button[type="submit"][value="send"]');

      this.$js_radio_change = $(".js-radio-change"); //出し分けたいタイトル
      this.plan_id = "";
      this.init();
      this.event();
    }
    init() {
      let _this = this;
      if (this.$submit_btn[0]) {
        //送信時の制御
        this.submit();
      }

      if (this.$confirm[0]) {
        //確認画面

        $(".p_contact__tel").hide(); //電話リンク非表示

        // タイトル変更
        $(".p_contact__ttl").text("ご入力内容をご確認ください。");
        $(".p_contact__ttl-kome").text("※送信はまだ完了していません。");
        $(".p_contact__ttl-kome").css({
          "text-align": "center",
          color: "red",
        });

        //メールの場合はこちらから非表示
        $(".p_contact__ttl02").hide();

        let $number = $(".amount-box input");
        $number.each(function (i, item) {
          //inputの数値が選択されていない場合は非表示

          if (!$(item).val()) {
            $(item).parents("tr").hide();
          }
        });

        $(".js-aco-btn").off(); //アコーディオン無効化

        this.$p_contact_tab.hide(); //タブ非表示

        if (this.$type.val() == "mitsumori") {
          //見積り
          this.showTabConfirm("mitsumori");

          // ケータリングの場合
          if (this.$radio.val() == "ケータリング") {
            this.changeMenu("ケータリング");
          }

          // オードブルの場合
          if (this.$radio.val() == "オードブルデリバリー") {
            this.changeMenu("オードブルデリバリー");
          }
        }
        if (this.$type.val() == "cta") {
          //お問い合わせ
          this.showTabConfirm("cta");
        }
      } else {
        //入力画面

        if (this.$type.val() == "mitsumori") {
          this.changeTab("mitsumori");

          // ケータリングの場合
          if (this.$cate.prop("checked")) {
            this.changeMenu("ケータリング");
          }

          // オードブルの場合
          if (this.$deli.prop("checked")) {
            this.changeMenu("オードブルデリバリー");
          }
        }
        if (this.$type.val() == "cta") {
          this.changeTab("cta");
        }

        let param = getParam("type");
        if (this.$type.val() == "mitsumori" || param == "mitsumori") {
          this.changeTab("mitsumori");
          this.$type.val("mitsumori");
        }
      }
    }
    event() {
      let _this = this;
      $(this.js_tab_btn).on("click", function () {
        //input hiddenの値
        let data_tab = $(this).attr("data-tab");
        _this.$type.val(data_tab);

        //パラメーター削除
        const url = new URL(window.location.href); // URLを取得

        history.replaceState(null, "", url.pathname); // URLからクエリパラメータを削除
      });

      this.$radio.on("change", function () {
        let radio_val = $(this).val(); //ラジオの値の取得
        $(_this.radio_form).hide(); //いったんフォーム隠す
        _this.changeMenu(radio_val);
      });
    }
    submit() {
      let _this = this;
      this.$submit_btn.on("click", function (e) {
        e.preventDefault();

        let $mitsumori_email = _this.$form.find('input[name="mitsumori-email"]');
        if ($mitsumori_email.val() == "") {
          $mitsumori_email.val("dummy");
        }
        _this.$form.submit();
      });
    }
    changeMenu($menu) {
      //プランの文言、スタイルの切り替え
      let background = "";
      let key = "";
      let menu_name = $menu + "ご利用メニュー";

      if ($menu == "ケータリング") {
        background = "#5F4E3E";
        key = "cateling";
      }
      if ($menu == "オードブルデリバリー") {
        background = "#6D7455";
        key = "deli";
      }
      this.$js_radio_change.text(menu_name);
      this.$js_radio_change.css({
        "background-color": background,
      });

      $(this.radio_form).hide();
      $(this.radio_form + '[data-plan="' + key + '"]').show();
    }
    changeTab(key) {
      $(this.js_tab_btn).removeClass("active");
      $(this.js_tab_body).hide();
      $(this.js_tab_btn + '[data-tab="' + key + '"]').addClass("active");
      $(this.js_tab_body + '[data-tab="' + key + '"]').show();
    }
    showTabConfirm(key) {
      $(this.js_tab_body).hide();
      $(this.js_tab_body + '[data-tab="' + key + '"]').show();
    }
  }
  if ($(".p_contact")[0]) {
    new Form();
  }

  //入力内容に不備があったら上の方にテキスト表示
  let $err = $(".mw_wp_form .error").text();
  let $form_ttl = $(".p_contact__ttl");

  if ($err) {
    $form_ttl.text("未入力項目があります。ご入力内容をご確認ください。");
    $form_ttl.css({
      color: "red",
      background: "#ff00002e",
      padding: "5px",
      border: "1px solid",
    });
  }

  //aboutスライダー
  if ($(".swiper-profile")[0]) {
    const swiperProfile = new Swiper(".swiper-profile", {
      loop: true,
      navigation: {
        nextEl: ".swiper-profile-next",
        prevEl: ".swiper-profile-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
    });
  }

  //バナー
  let $js_banner = $(".c-menu-banner-wrap");
  $(window).on("load", function () {
    $js_banner.animate(
      {
        right: "0",
      },
      1500,
      "swing"
    );
    setTimeout(function () {
      $js_banner.animate(
        {
          right: "-100%",
        },
        1500,
        "swing"
      );
    }, 7000);
  });

  /***********************
   * nav 背景スクロールさせない
   **********************/
  //開いた時のスクロール位置を保持
  var scrollPosition;
  //iOS（iPadOSを含む）かどうかのUA判定
  var ua = window.navigator.userAgent.toLowerCase();
  var isiOS = ua.indexOf("iphone") > -1 || ua.indexOf("ipad") > -1 || (ua.indexOf("macintosh") > -1 && "ontouchend" in document);

  //bodyのスクロール固定
  function bodyFixedOn() {
    if (isiOS) {
      // iOSの場合
      scrollPosition = $(window).scrollTop();
      $("body").css("position", "fixed");
      $("body").css("top", "-" + scrollPosition + "px");
    } else {
      // それ以外
      $("body").css("overflow", "hidden");
    }
  }

  //bodyのスクロール固定を解除
  function bodyFixedOff() {
    if (isiOS) {
      // iOSの場合
      $("body").css("position", "static");
      $("body").css("top", "");
      $(window).scrollTop(scrollPosition);
    } else {
      // それ以外
      $("body").css("overflow", "");
    }
  }

  $(".nav-btn").on("click", function () {
    if ($(this).hasClass("active")) {
      bodyFixedOn();
    } else {
      bodyFixedOff();
    }
  });

  // mvテキストspanで囲む
  let $js_span = $(".js_span");
  let $js_span_sp = $(".js_span.sp");
  if ($js_span[0]) {
    $js_span.each(function () {
      let text = $(this).text();
      // 空白や改行を削除
      text = text.replace(/\s+/g, "");
      let textArr = text.split("");
      let textHtml = "";
      textArr.forEach(function (item) {
        textHtml += "<span>" + item + "</span>";
      });
      $(this).html(textHtml);
    });
  }

  // mvテキストアニメーションの関数
  function textAnimation($targ) {
    const speed = 100; //スピード 大きいとゆっくりになる
    let cnt = 0;
    let letterNum = $targ.find("span").length;
    let timerId = setInterval(function () {
      $targ.find("span").eq(cnt).addClass("is-show");
      if (cnt === letterNum) {
        clearInterval(timerId);
      }
      cnt++;
    }, speed);
  }

  if ($js_span[0]) {
    if (deviceFlag == 0) {
      textAnimation($js_span);
    } else {
      textAnimation($js_span_sp);
    }
  }


  /*------------------------------------------------------------------------------
    modal
  ------------------------------------------------------------------------------*/
  class Modal {
    //コンストラクター(インスタンス化じに動くメソッド。初期用のやつ。)
    constructor(key) {
      console.log('.js-modal-btn[data-gallery="'+key+'"]');
      this.$btn = $('.js-modal-btn[data-gallery="'+key+'"]');
      this.$cont = $('.js-modal-body[data-gallery="'+key+'"]');

      this.$close_btn = this.$cont.find('.js-modal-close');
      this.$inner = this.$cont.find('.modal-cont');
      this.event();
    }

    //イベント登録用
    event(){
      let _this = this;
      this.$btn.on('click',function(){
        _this.modalOpen();
        $('body').css('overflow-y', 'hidden');  // 本文の縦スクロールを無効
      });
      this.$close_btn.on('click',function(){
        _this.modalClose();
        $('body').css('overflow-y', 'auto');  // 本文の縦スクロールを無効
      });
      this.$cont.on('click',function(){
        _this.modalClose();
        $('body').css('overflow-y', 'auto');  // 本文の縦スクロールを無効
      });
      this.$inner.on('click',function(e){
        e.stopPropagation();
      });
    }

    //ひらく 
    modalOpen(key){
      // body切り替え
      this.$cont.addClass('active');
    }

    //とじる

    modalClose(key) {
      this.$cont.removeClass('active');
    }

  }

  let modalObject = [];
  $('.js-modal-body').each(function(i,val){
    let key = $(val).attr('data-gallery');
    modalObject[key] = new Modal(key);
  });
})(jQuery);
