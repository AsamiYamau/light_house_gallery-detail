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
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
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
    })(window, document, 'script', 'dataLayer', 'GTM-WRM9VCC3');
  </script>
  <!-- End Google Tag Manager -->

  



  <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/style.css?20250910">
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

  <?php wp_head(); ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WRM9VCC3"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="wrapper">
    <header>
      <div id="header" class="l-header outer-block">
        <div class="l-header__top bg_img pc">東京・千葉・神奈川でケータリング・オードブルデリバリーならMrBuffet～ミスタービュッフェ～</div>
        <div class="l-header__inner">
          <div class="l-header__list">
            <ul class="c-header-list">
              <li>
                <a href="<?= $home_url; ?>/about/" class="c-header-list__item">
                  私たちについて
                  <span class="en Allura">About us</span>
                </a>
              </li>
              <li>
                <a href="<?= $home_url; ?>/area/" class="c-header-list__item">
                  対応エリア
                  <span class="en Allura">Area</span>
                </a>
              </li>
              <li>
                <a href="<?= $home_url; ?>/guide/" class="c-header-list__item">
                  ご利用ガイド
                  <span class="en Allura">Guide</span>
                </a>
              </li>
              <li>
                <a href="<?= $home_url; ?>/faq/" class="c-header-list__item">
                  よくある質問
                  <span class="en Allura">FAQ</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="l-header-sp-wrap sp">
          <div class="l-header__top bg_img sp">東京・千葉・神奈川でケータリング・オードブルデリバリーなら<br class="sp">MrBuffet～ミスタービュッフェ～</div>
          <div class="l-header-sp sp <?php if (isDelivery()) echo 'deli'; ?>">
            <div class="l-header-sp__logo">
              <a href="<?= $home_url; ?>/">
                <img src="<?= $template_url; ?>/img/common/logo.png?00" alt="" />
              </a>
            </div>
            <div class="l-header-sp__nav">
              <ul class="c-header-sp-nav">
                <li>
                  <a href="tel:0120507286" class="c-header-sp-nav__item">
                    <span class="ico">
                      <img src="<?= $template_url; ?>/img/common/header_tel.svg" alt="" />
                    </span>
                    <span class="txt">電話</span>
                  </a>
                </li>
                <li>
                  <a href="<?= $home_url; ?>/contact/" class="c-header-sp-nav__item">
                    <span class="ico">
                      <img src="<?= $template_url; ?>/img/common/header_mail.svg" alt="" />
                    </span>
                    <span class="txt">フォーム</span>
                  </a>
                </li>
              </ul>
              <div class="l-header-sp__btn nav-btn">
                <div class="c-header-btn">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <span class="txt">メニュー</span>
              </div>
            </div>
          </div>
        </div>
        <div class="l-header-sp-cont nav-wrap sp">
          <nav>
            <ul class="l-header-sp-list">
              <li>
                <a href="<?= $home_url; ?>/about/" class="l-header-sp-list__item">私たちについて</a>
              </li>
              <li>
                <a href="<?= $home_url; ?>/area/" class="l-header-sp-list__item">対応エリア</a>
              </li>
              <li>
                <a href="<?= $home_url; ?>/guide/" class="l-header-sp-list__item">ご利用ガイド</a>
              </li>
              <li>
                <a href="<?= $home_url; ?>/faq/" class="l-header-sp-list__item">よくある質問</a>
              </li>
            </ul>
            <div class="l-header-sp-cont__ttl js-aco-btn active" data-aco="aco01">
              ケータリングメニュー
              <span class="en Allura c-gold01">Catering Menu</span>
              <span class="toggle"></span>
            </div>
            <div class="l-header-sp-cont__body js-aco-body" data-aco="aco01" style>
              <ul class="l-header-sp-list">
                <li>
                  <a href="<?= $home_url; ?>/cateling/" class="l-header-sp-list__item">
                    スタンダードプラン
                  </a>
                </li>
                <li>
                  <a href="<?= $home_url; ?>/cateling-drink/" class="l-header-sp-list__item">
                    ドリンクメニュー
                  </a>
                </li>
                <li>
                  <a href="<?= $home_url; ?>/cateling-option/" class="l-header-sp-list__item">
                    オプションサービス
                  </a>
                </li>
                                  <?php
                  $option_cats = get_terms('tax_option');
                  ?>
                  <?php if (!empty($option_cats)) : ?>
                    <?php $link = ''; ?>

                    <?php foreach ($option_cats as $i => $cat) {
                      //$catのスラッグを取得
                      $link = $cat->slug;
                      if($link == 'option02') {
                        $link = 'option02';
                        break;
                      }

                    }
                    ?>
                <li>
                  <a href="<?= $home_url; ?>/cateling-options/#<?= $link ?>" class="l-header-sp-list__item">
                    Liveケータリング
                  </a>
                </li>
                  <?php endif; ?>

              </ul>
            </div>




            <div class="l-header-sp-cont__ttl js-aco-btn" data-aco="aco02">
              オードブルデリバリーメニュー
              <span class="en Allura c-gold01">Delivery Menu</span>
              <span class="toggle"></span>
            </div>
            <div class="l-header-sp-cont__body js-aco-body" data-aco="aco02" style="display: none;">
              <ul class="l-header-sp-list">
                <li>
                  <a href="<?= $home_url; ?>/delivery/" class="l-header-sp-list__item">オードブルデリバリーメニュー一覧</a>
                </li>
                <li>
                  <a class="l-header-sp-list__item" href="<?= $home_url; ?>/delivery-drink/">
                    ドリンクプラン
                  </a>
                </li>
                <li>
                  <a class="l-header-sp-list__item" href="<?= $home_url; ?>/delivery-options/">
                    オプションフード
                  </a>
                </li>
              </ul>

              <?php
              $tax_delivery = get_terms('tax_delivery');
              if (!empty($tax_delivery)):
                ?>
                <div class="c-series-banner l-header-sp-series">
                  <?php
                  foreach ($tax_delivery as $i => $tax):
                    $term_name = $tax->name;
                    $en_name = get_term_meta($tax->term_id, 'tax_deli-name-en', true);
                    $term_img = get_term_meta($tax->term_id, 'tax_deli-bg', true);
                    $link = 'deli_cat' . $i + 1;
                    $discription = $tax->description;

                    $img = '';
                    if (!empty($term_img)) {
                      $img = wp_get_attachment_url($term_img);
                    }
                    ?>
                    <div class="c-series-banner__item">
                      <a href="<?= $home_url ?>/delivery/#<?= $link ?>" class="c-series-banner__link bg_img deli side">
                        <?php if (!empty($en_name)): ?>
                          <div class="c-series-banner__en mincho deli"><?= $en_name ?></div>
                        <?php endif; ?>
                        <div class="c-series-banner__cap deli">
                          <?= $discription ?>
                        </div>
                        <div class="c-series-banner__ja deli"><?= $term_name ?></div>
                      </a>
                      <div class="c-series-banner__img">
                        <img src="<?= $img ?>" alt="">
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>



            </div>
            <div class="l-header-sp-cont__ttl js-aco-btn" data-aco="aco03">
              予算から選ぶ
              <span class="en Allura c-gold01">Budget</span>
              <span class="toggle"></span>
            </div>
            <div class="l-header-sp-cont__body js-aco-body" data-aco="aco03" style="display: none;">
              <ul class="l-header-sp-list">

                <li>
                  <a class="l-header-sp-list__item" href="<?= $home_url; ?>/budget/">
                    ケータリング
                  </a>
                </li>
                <li>
                  <a href="<?= $home_url; ?>/budget/" class="l-header-sp-list__item">オードブル</a>
                </li>
              </ul>
            </div>
            <div class="l-header-sp-cont__ttl">
              <a href="<?= $home_url; ?>/scene/" class="none-aco">
                シーンから選ぶ
                <span class="en Allura c-gold01">Scene</span>
              </a>
            </div>
            <div class="l-sidebar__banner">
              <a href="<?= $home_url ?>/difference/">
                <img src="<?= $template_url ?>/img/common/deff_banner.jpg" alt="">
              </a>
            </div>

            <div class="l-header-sp-cont__img">
              <img src="<?= $template_url; ?>/img/common/header_item.png" alt="">
            </div>
          </nav>
        </div>
        <!-- /inner-block -->
      </div>
      <!-- /header -->
    </header>