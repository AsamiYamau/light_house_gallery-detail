(function ($) {
  "use strict";

  // PC/SP判定
  // スクロールイベント
  // リサイズイベント
  // スムーズスクロール

  /* ここから */
  var break_point = 767; //ブレイクポイント
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

  /*------------------------------------
    header
  -------------------------------------*/
  let scrollpos = 0;

  var Header = {
    init: function () {
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
    },
    open: function () {
      scrollpos = $(window).scrollTop();

      console.log(scrollpos);
      this.$btn.addClass("active");
      this.$nav.addClass("active");

      $('body').addClass('is-open').css('top', -scrollpos + 'px');
    },
    close: function () {
      this.$btn.removeClass("active");
      this.$nav.removeClass("active");
      const top = parseInt($('body').css('top')) || 0;
      const restorePos = Math.abs(top);

      $('body').removeClass('is-open').css('top', "");

      window.scrollTo(0, restorePos);
    },
  };
  Header.init();

  $(window).on("scroll",function(){
    if ($('body').hasClass('is-open')) return;

    if($(window).scrollTop() > 50) {
      $('.header').addClass('is-color');
    } else {
      $('.header').removeClass('is-color');
    }
  });

  /*------------------------------------
    スムーズスクロール
  -------------------------------------*/
  // #で始まるアンカーをクリックした場合にスムーススクロール
  $('a[href^="#"]').on("click", function () {
    var speed = 500;
    // アンカーの値取得
    var href = $(this).attr("href");
    // 移動先を取得
    var target = $(href == "#" || href == "" ? "html" : href);
    // 移動先を数値で取得
    var position = target.offset().top;

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

  /*------------------------------------
    animation
  -------------------------------------*/

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

  /*------------------------------------
    slider
  -------------------------------------*/
  
  /* -------- slick ---------- */

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

  /* -------- swiper ---------- */

if ($(".p_home-sec01__gallery").length) {
  $(".p_home-sec01__gallery").each(function () {
    const $this = $(this);
    const $wrap = $this.closest(".p_home-sec01");

    new Swiper(this, {
      loop: true,
      slidesPerView: 4,
      spaceBetween: 20,

      breakpoints: {
        375: {
          slidesPerView: 1.5,
          centeredSlides: true,
        },
        768: {
          slidesPerView: 4,
          centeredSlides: false,
        }
      },

      navigation: {
        nextEl: $wrap.find(".p_home-sec01__gallery-button-next")[0],
        prevEl: $wrap.find(".p_home-sec01__gallery-button-prev")[0],
      },

      speed: 800,

      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
    });
  });
}

    /*------------------------------------
    タブ切り替え
  -------------------------------------*/
    $(".js-tab-trigger").on("click", function () {

    const tabID = $(this).data("tab");
    $(".js-tab-trigger").removeClass("is-active");
    $(this).addClass("is-active");
    $(".js-tab-content").removeClass("is-active");

    $('.js-tab-content[data-tab="' + tabID + '"]').addClass("is-active");

  });

/* ---------------------------------------------------
- formのドラッグ&ドロップ 
--------------------------------------------------- */
 // ==========================
  // ドラッグ&ドロップエリア
  // ==========================

  $(document).on('dragenter dragover', '.js-file-upload', function (e) {

    // ブラウザのデフォルト動作を停止
    // （ファイルを開こうとする挙動を防ぐ）
    e.preventDefault();
    e.stopPropagation();

    // ドラッグ中の見た目
    $(this).addClass('is-dragover');

  });

  // ==========================
  // ドラッグエリアから離れた
  // ==========================

  $(document).on('dragleave', '.js-file-upload', function (e) {

    e.preventDefault();
    e.stopPropagation();

    $(this).removeClass('is-dragover');

  });

  // ==========================
  // ファイルをドロップ
  // ==========================

  $(document).on('drop', '.js-file-upload', function (e) {

    e.preventDefault();
    e.stopPropagation();

    const $upload = $(this);

    // このアップロードエリア内のinput[type=file]
    const $input = $upload.find('.c-contact__upload-input');

    // ファイル名表示エリア
    const $fileName = $upload.next('.c-contact__file-name');

    // ドラッグ中の見た目を解除
    $upload.removeClass('is-dragover');

    // ドロップされたファイル取得
    const files = e.originalEvent.dataTransfer.files;

    // ファイルが無ければ終了
    if (!files.length) {
      return;
    }

    // input[type=file]へセット
    // 通常選択と同じ状態になる
    $input[0].files = files;

    // ファイル名表示
    $fileName.text(files[0].name);

  });

  // ==========================
  // 通常のファイル選択
  // ==========================

  $(document).on('change', '.c-contact__upload-input', function () {

    const $upload = $(this).closest('.js-file-upload');
    const $fileName = $upload.next('.c-contact__file-name');

    // ファイル未選択
    if (!this.files.length) {
      return;
    }

    // ファイル名表示
    $fileName.text(this.files[0].name);

  });

/* ---------------------------------------------------
- formのデザイン性のあるラジオボタン用　
--------------------------------------------------- */
//クリックした要素のdata属性の値をmwwpformのタグの値にセットする
$(function () {

  function setupSelector(selector, hiddenName) {



    $(document).on('click', selector, function () {

    const value = $(this).data('value');

    $(selector).removeClass('is-active');
    $(this).addClass('is-active');

    $('[name="' + hiddenName + '"][value="' + value + '"]')
      .prop('checked', true);

    });

  }

  function restoreSelector(selector, hiddenName) {

  const value = $('[name="' + hiddenName + '"]:checked').val();


  $(selector).removeClass('is-active');

  $(selector).filter(function () {

    return $(this).data('value') == value;

  }).addClass('is-active');

}

  setupSelector('.js-shape-card', 'cake_shape');//土台の形
  setupSelector('.js-cake-size', 'cake_size');//サイズ
  setupSelector('.js-sponge', 'sponge');//スポンジ
  setupSelector('.js-cream', 'cream');//クリーム
  setupSelector('.js-budget', 'budget');//予算
  setupSelector('.js-delivery', 'delivery');//受け取り方法
  setupSelector('.js-payment', 'payment');//支払い方法

  restoreSelector('.js-shape-card', 'cake_shape');
restoreSelector('.js-cake-size', 'cake_size');
restoreSelector('.js-sponge', 'sponge');
restoreSelector('.js-cream', 'cream');
restoreSelector('.js-budget', 'budget');
restoreSelector('.js-delivery', 'delivery');
restoreSelector('.js-payment', 'payment');

});

/* ---------------------------------------------------
- formの日付制御　２週間後から選択可能に
--------------------------------------------------- */
$(function() {
  const minDate = new Date();
  minDate.setDate(minDate.getDate() + 14);

  const yyyy = minDate.getFullYear();
  const mm = String(minDate.getMonth() + 1).padStart(2, '0');
  const dd = String(minDate.getDate()).padStart(2, '0');

  $('input[name="date"]')
    .attr('type', 'date')
    .attr('min', `${yyyy}-${mm}-${dd}`);
});

/* ---------------------------------------------------
- formの　「その他」の入力時の表示制御
--------------------------------------------------- */
$(function () {
  const $form = $('.mw_wp_form_confirm');

  if (!$form.length) return;

  const fieldRules = [
    {
      otherName: 'other_sponge',
      normalFieldSelector: '.js-field-sponge',
      otherFieldSelector: '.js-field-other-sponge'
    },
    {
      otherName: 'other_cream',
      normalFieldSelector: '.js-field-cream',
      otherFieldSelector: '.js-field-other-cream' 
    },
    {
      otherName: 'other_shape',
      normalFieldSelector: '.js-field-shape',
      otherFieldSelector: '.js-field-other-shape'
    }
  ];

  fieldRules.forEach(function (rule) {
    const $otherInput = $form.find('[name="' + rule.otherName + '"]');

    if (!$otherInput.length) return;

    const otherValue = $.trim($otherInput.val());

    if (otherValue !== '') {
      // その他に入力がある場合：通常選択肢を非表示
      $form.find(rule.normalFieldSelector).hide();
    } else {
      // その他が空の場合：その他欄を非表示
      $form.find(rule.otherFieldSelector).hide();
    }
  });
});

/* ---------------------------------------------------
- cta　スクロール制御
--------------------------------------------------- */
let scrollTimer;

$(window).on('scroll', function () {
  $('.sp-cta').addClass('is-hide');

  clearTimeout(scrollTimer);

  scrollTimer = setTimeout(function () {
    $('.sp-cta').removeClass('is-hide');
  }, 200);
});

})(jQuery);
