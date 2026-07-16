<?php
global $template_url;
global $home_url;

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>

<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="<?= $template_url; ?>/img/common/favicon.ico">
  <link rel="apple-touch-icon" href="<?= $template_url ?>/img/common/apple-touch-icon.png">



  <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/style.css?20260608">

  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-M8XCM98P');
  </script>
  <!-- End Google Tag Manager -->

  <?php wp_head(); ?>

  <?php get_template_part('delicart_inc/delicart_head'); ?>

</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M8XCM98P"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="wrapper">
    <!-- カートを見る -->
    <!--    <div id="open">-->
    <!--      <img src="○○/images/cart.jpg" alt="カートを見る" id="cart-btn" >-->
    <!--            <img src="https://placehold.jp/80x350.png" alt="カートを見る" id="cart-btn" >-->
    <!--    </div>-->
    <!-- // カートを見る -->

    <header>
      <div id="open" class="l-header outer-block">
        <div class="l-header__inner">

          <div class="l-header__list">
            <ul class="c-header-list">
              <li>
                <a href="<?= $home_url ?>/about/" class="c-header-list__item">
                  私たちについて
                  <span class="en">About Me</span>
                </a>
              </li>
              <li>
                <a href="<?= $home_url ?>/area/" class="c-header-list__item">
                  配達エリア一覧
                  <span class="en">Area</span>
                </a>
              </li>
              <li>
                <a href="<?= $home_url ?>/guide/" class="c-header-list__item">
                  ご利用ガイド・よくある質問
                  <span class="en">Guide Faq</span>
                </a>
              </li>
            </ul>
          </div>
          <button id="cart-btn" class="c-header-cart pc">
            <span class="cart"><img src="<?= $template_url ?>/img/common/icon_cart.svg" alt="" width="28" height="28" /></span>
            カートを見る
            <span class="icon"><img
                src="<?= $template_url ?>/img/common/icon_arrow_white.svg"
                alt=""
                width="22"
                height="22" /></span>
          </button>
        </div>
        <div class="l-header-sp sp">
          <h1 class="l-header-sp__logo">
            <a href="<?= $home_url ?>/">
              <img
                src="<?= $template_url ?>/img/common/logo.png"
                alt=""
                width="127"
                height="32" />
            </a>
          </h1>
          <button id="cart-btn" class="c-header-cart sp">
            <span class="cart"><img
                src="<?= $template_url ?>/img/common/icon_cart_green.svg"
                alt=""
                width="16"
                height="16" /></span>
            カートを見る
            <span class="icon"><img
                src="<?= $template_url ?>/img/common/icon_arrow_green.svg"
                alt=""
                width="16"
                height="16" /></span>
          </button>

          <a href="tel:0120507286" class="l-header-sp__tel">
            <img src="<?= $template_url ?>/img/common/header_tel.svg" alt="">
          </a>
          <a href="<?= $home_url ?>/contact/" class="l-header-sp__contact">
            <img src="<?= $template_url ?>/img/common/header_mail.svg" alt="">
          </a>

          <div class="l-header-sp__nav">
            <div class="l-header-sp__button nav-button">
              <div class="c-header-button">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>
        </div>
        <div class="l-header-sp-cont nav-wrap sp">
          <nav>
            <ul class="l-header-sp-list">
              <li>
                <h2 class="l-header-sp-list__head">
                  <span class="icon">
                    <img
                      src="<?= $template_url ?>/img/common/icon_tools.svg"
                      alt=""
                      width="18"
                      height="20" />
                  </span>
                  オードブル
                </h2>
              </li>
              <li>
                <h2 class="l-header-sp-list__title">
                  <span class="icon">
                    <img
                      src="<?= $template_url ?>/img/common/icon_person_green.svg"
                      alt=""
                      width="20"
                      height="20" />
                  </span>
                  1人あたりの予算から選ぶ
                </h2>
                <?php
                $tax_budget_terms = get_terms('tax_budget', array('hide_empty' => false));
                ?>
                <?php foreach ($tax_budget_terms as $tax_budget_term): ?>
                  <a href="<?php echo get_term_link($tax_budget_term); ?>" class="l-header-sp-list__item"><?php echo deli_format_price($tax_budget_term->name); ?><span class="yen">円</span></a>
                <?php endforeach; ?>
              </li>
              <li>
                <h2 class="l-header-sp-list__title">
                  <span class="icon">
                    <img
                      src="<?= $template_url ?>/img/common/icon_pot_green.svg"
                      alt=""
                      width="24"
                      height="24" />
                  </span>
                  総額予算から選ぶ
                </h2>
                <?php
                $tax_allbudget_terms = get_terms('tax_allbudget', array('hide_empty' => false));
                ?>
                <?php foreach ($tax_allbudget_terms as $tax_allbudget_term): ?>
                  <a href="<?php echo get_term_link($tax_allbudget_term); ?>" class="l-header-sp-list__item"><?php echo deli_format_price($tax_allbudget_term->name); ?><span class="yen">円</span></a>
                <?php endforeach; ?>
              </li>
              <li>
                <h2 class="l-header-sp-list__title">
                  <span class="icon">
                    <img
                      src="<?= $template_url ?>/img/common/icon_pot_green.svg"
                      alt=""
                      width="24"
                      height="24" />
                  </span>
                  単品メニューから選ぶ
                </h2>
                <?php
                $tax_single_terms = get_terms('tax_single', array('hide_empty' => false));
                ?>
                <?php foreach ($tax_single_terms as $tax_single_term): ?>
                  <a href="<?php echo get_term_link($tax_single_term); ?>" class="l-header-sp-list__item"><?php echo $tax_single_term->name; ?></a>
                <?php endforeach; ?>
              </li>
              <li>
                <h2 class="l-header-sp-list__title">
                  <span class="icon">
                    <img
                      src="<?= $template_url ?>/img/common/icon_book_green.svg"
                      alt=""
                      width="24"
                      height="24" />
                  </span>
                  シリーズから選ぶ
                </h2>
                <?php
                $tax_series_terms = get_terms('tax_series', array('hide_empty' => false));
                ?>
                <?php foreach ($tax_series_terms as $tax_series_term): ?>
                  <?php
                  //termの説明文を取得
                  $tax_series_term_description = $tax_series_term->description;
                  //termの画像を取得
                  $tax_series_term_image = get_term_meta($tax_series_term->term_id, 'series_img', true);
                  $series_img = '';
                  if ($tax_series_term_image) {
                    $series_img = wp_get_attachment_url($tax_series_term_image);
                  } else {
                    $series_img = $template_url . '/img/common/no_img.jpg';
                  }
                  ?>
                  <a href="<?php echo get_term_link($tax_series_term); ?>" class="l-header-sp-list__item"><?php echo $tax_series_term->name; ?>
                    <div class="wrap">
                      <div class="image">
                        <img
                          src="<?php echo $series_img; ?>"
                          alt=""
                          width="80"
                          height="84" />
                      </div>
                      <p class="text">
                        <?php echo nl2br($tax_series_term_description); ?>
                      </p>
                    </div>
                  </a>
                <?php endforeach; ?>
              </li>

              <li>
                <h2 class="l-header-sp-list__head">
                  <span class="icon">
                    <img
                      src="<?php echo $template_url; ?>/img/common/icon-drink-green.svg"
                      alt=""
                      width="18"
                      height="20" />
                  </span>
                  ドリンク・その他
                </h2>
              </li>
              <li>
                <h2 class="l-header-sp-list__title">
                  <span class="icon">
                    <img
                      src="<?php echo $template_url; ?>/img/common/drink-deli.svg"
                      alt=""
                      width="20"
                      height="20" />
                  </span>
                  ドリンク
                </h2>
                <?php
                $tax_drink_terms = get_terms('tax_drink', array('hide_empty' => false));
                ?>
                <?php foreach ($tax_drink_terms as $tax_drink_term): ?>
                  <a href="<?php echo get_term_link($tax_drink_term); ?>" class="l-header-sp-list__item"><?php echo $tax_drink_term->name; ?></a>
                <?php endforeach; ?>
              </li>

              <li>
                <a href="<?= $home_url ?>/about/" class="l-header-sp-list__item small">私たちについて</a>
                <a href="<?= $home_url ?>/area/" class="l-header-sp-list__item small">配達エリア一覧</a>
                <a href="<?= $home_url ?>/guide/" class="l-header-sp-list__item small">ご利用ガイド・よくある質問</a>
              </li>
            </ul>

            <div class="l-header-sp-buffet-banner">
              <div class="l-header-sp-buffet-banner__box">
                <div class="l-header-sp-buffet-banner__ttl">東京エリアのケータリング</div>
                <a target="_blank" href="https://buffettokyo-catering.com/" class="l-header-sp-buffet-banner__link">
                  <img src="<?php echo $template_url; ?>/img/common/bannert03.png" alt="東京　スタッフ・テーブルセッティング付きのケータリングはこちら">
                </a>
              </div>
              <div class="l-header-sp-buffet-banner__box">
                <div class="l-header-sp-buffet-banner__ttl">関西エリアのケータリング</div>
                <a target="_blank" href="https://buffet-catering.com/" class="l-header-sp-buffet-banner__link">
                  <img src="<?php echo $template_url; ?>/img/common/bannerk03.png" alt="関西　スタッフ・テーブルセッティング付きのケータリングはこちら">
                </a>
              </div>
              <div class="l-header-sp-buffet-banner__box">
                <div class="l-header-sp-buffet-banner__ttl">全国エリアのケータリング</div>
                <a target="_blank" href="https://catering-mrbuffet.com/" class="l-header-sp-buffet-banner__link">
                  <img src="<?php echo $template_url; ?>/img/common/banner_all.jpg" alt="全国　スタッフ・テーブルセッティング付きのケータリングはこちら">
                </a>
              </div>
            </div>

            <div class="l-header-sp__contact-wrap">
              <div class="info">
                <h3 class="title">WEBから</h3>
                <a href="<?= $home_url ?>/contact/" class="button mail">
                  <span class="icon">
                    <img
                      src="<?= $template_url ?>/img/common/icon_mail.svg"
                      alt=""
                      width="20"
                      height="16" />
                  </span>
                  メールフォームはコチラ</a>
                <p class="text">24時間受付中</p>
              </div>
              <div class="info">
                <h3 class="title">お電話から</h3>
                <a href="tel:0120507286" class="button tel">
                  <span class="icon">
                    <img
                      src="<?= $template_url ?>/img/common/icon_tel02.svg"
                      alt=""
                      width="34"
                      height="32" />
                  </span>
                  0120-507-286</a>
                <p class="text">営業時間：9:00〜18:00</p>
              </div>
            </div>
          </nav>
        </div>
        <!-- /inner-block -->
      </div>
      <!-- /header -->
    </header>
