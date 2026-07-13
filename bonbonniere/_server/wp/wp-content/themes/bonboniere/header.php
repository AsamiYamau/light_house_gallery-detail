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

  <title></title>

  <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/swiper-bundle.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/style.css">

  <?php wp_head(); ?>


</head>

<body>
  <div id="wrapper" class="<?php if (is_home() || is_front_page()) echo 'is-top'; ?>">
    <header>
      <div id="header" class="outer-block header">
        <div class="header__wrap">
          <?php if (is_home() || is_front_page()): ?>
            <h1 class="header__logo">
              <a href="<?= $home_url ?>/">
                <img src="<?= $template_url ?>/img/common/logo.svg" alt="BON BON NIÉRE">
              </a>
            </h1>
          <?php else: ?>
            <div class="header__logo">
              <a href="<?= $home_url ?>/">
                <img src="<?= $template_url ?>/img/common/logo.svg" alt="BON BON NIÉRE">
              </a>
            </div>
          <?php endif; ?>
          <div class="header__box">

            <div class="header__navs pc">
              <nav class="header__nav">
                <ul class="header-list">
                  <li class="header-list__li">
                    <a href="<?= $home_url ?>/" class="header-list__link">
                      <p class="header-list__top">TOP</p>
                      <p class="header-list__main">TOP</p>
                    </a>
                  </li>
                  <li class="header-list__li hover-menu">
                    <span class="header-list__link">
                      <p class="header-list__top">FOR COMPANY</p>
                      <p class="header-list__main">オフィシャルパーティ</p>
                      <p class="header-list__bottom">団体様向け</p>
                    </span>
                    <div class="header-list__submenu">
                      <!-- for-companyと紐づいているtax_cake_catのタームを表示 -->
                      <?php
                      // for-company の投稿ID取得
                      $posts01 = get_posts([
                        'post_type'      => 'service',
                        'posts_per_page' => -1,
                        'fields'         => 'ids',
                        'tax_query'      => [
                          [
                            'taxonomy' => 'tax_usage_type',
                            'field'    => 'slug',
                            'terms'    => 'for-company',
                          ],
                        ],
                      ]);

                      $term_ids = [];

                      foreach ($posts01 as $post_id) {
                        $terms = get_the_terms($post_id, 'tax_cake_cat');

                        if (!empty($terms) && !is_wp_error($terms)) {
                          foreach ($terms as $term) {
                            $term_ids[$term->term_id] = $term;
                          }
                        }
                      }

                      if (!empty($term_ids)) :
                      ?>

                        <ul class="hover-menu-list">
                          <?php foreach ($term_ids as $term) : ?>

                            <?php
                            $en_ttl = get_term_meta($term->term_id, 'en_ttl', true);
                            $image  = get_term_meta($term->term_id, 'bg_img', true); // SCF等で画像ID保存の場合

                            $thumb = $template_url . '/img/common/dummy02.jpg';
                            if ($image) {
                              $thumb = wp_get_attachment_image_url($image, 'medium');
                            }
                            ?>

                            <li class="hover-menu-list__li">
                              <a href="<?= esc_url(get_term_link($term)); ?>" class="hover-menu-list__link">

                                <?php if ($thumb) : ?>
                                  <div class="hover-menu-list__img">
                                    <img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr($term->name); ?>">
                                  </div>
                                <?php endif; ?>

                                <div class="hover-menu-list__txt">
                                  <?php if ($en_ttl) : ?>
                                    <p class="hover-menu-list__en">
                                      <?= esc_html($en_ttl); ?>
                                    </p>
                                  <?php endif; ?>

                                  <p class="hover-menu-list__ja">
                                    <?= nl2br(esc_html($term->name)); ?>
                                  </p>
                                </div>

                              </a>
                            </li>

                          <?php endforeach; ?>
                        </ul>

                      <?php endif; ?>
                    </div>
                  </li>
                  <li class="header-list__li hover-menu">
                    <span class="header-list__link">
                      <p class="header-list__top">FOR YOU</p>
                      <p class="header-list__main">ホームパーティ</p>
                      <p class="header-list__bottom">大切な方のプレゼント</p>
                    </span>
                    <div class="header-list__submenu">
                      <!-- for-youと紐づいているtax_cake_catのタームを表示 -->
                      <?php
                      // for-you の投稿ID取得
                      $posts_02 = get_posts([
                        'post_type'      => 'service',
                        'posts_per_page' => -1,
                        'fields'         => 'ids',
                        'tax_query'      => [
                          [
                            'taxonomy' => 'tax_usage_type',
                            'field'    => 'slug',
                            'terms'    => 'for-you',
                          ],
                        ],
                      ]);

                      $term_ids_02 = [];

                      foreach ($posts_02 as $post_id_02) {
                        $terms_02 = get_the_terms($post_id_02, 'tax_cake_cat');

                        if (!empty($terms_02) && !is_wp_error($terms_02)) {
                          foreach ($terms_02 as $term_02) {
                            $term_ids_02[$term_02->term_id] = $term_02;
                          }
                        }
                      }

                      if (!empty($term_ids_02)) :
                      ?>

                        <ul class="hover-menu-list">
                          <?php foreach ($term_ids_02 as $term_02) : ?>

                            <?php
                            $en_ttl_02 = get_term_meta($term_02->term_id, 'en_ttl', true);
                            $image_02  = get_term_meta($term_02->term_id, 'bg_img', true);

                            $thumb_02 = $template_url . '/img/common/dummy02.jpg';
                            if ($image_02) {
                              $thumb_02 = wp_get_attachment_image_url($image_02, 'medium');
                            }
                            ?>

                            <li class="hover-menu-list__li">
                              <a href="<?= esc_url(get_term_link($term_02) . '?usage=foryou'); ?>" class="hover-menu-list__link">

                                <?php if ($thumb_02) : ?>
                                  <div class="hover-menu-list__img">
                                    <img src="<?= esc_url($thumb_02); ?>" alt="<?= esc_attr($term_02->name); ?>">
                                  </div>
                                <?php endif; ?>

                                <div class="hover-menu-list__txt">
                                  <?php if ($en_ttl_02) : ?>
                                    <p class="hover-menu-list__en">
                                      <?= esc_html($en_ttl_02); ?>
                                    </p>
                                  <?php endif; ?>

                                  <p class="hover-menu-list__ja">
                                    <?= nl2br(esc_html($term_02->name)); ?>
                                  </p>
                                </div>

                              </a>
                            </li>

                          <?php endforeach; ?>
                        </ul>

                      <?php endif; ?>
                    </div>
                  </li>
                  <li class="header-list__li">
                    <a href="<?= $home_url ?>/collection/" class="header-list__link">
                      <p class="header-list__top">COLLECTION</p>
                      <p class="header-list__main">
                        BONBONNIERE<br>
                        コレクション
                      </p>
                    </a>
                  </li>
                  <li class="header-list__li">
                    <a href="<?= $home_url ?>/description/" class="header-list__link">
                      <p class="header-list__top">FULL ORDER</p>
                      <p class="header-list__main">
                        フルオーダーメイド
                      </p>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="header__btns pc">
              <a href="<?= $home_url ?>/consultation/" class="header-btn lite_brown">
                <p class="header-btn__en poppins">FULL ORDER</p>
                <p class="header-btn__ja">フルオーダーケーキ相談</p>
              </a>
              <a href="<?= $home_url ?>/contact/" class="header-btn brown">
                <p class="header-btn__en poppins">CONTACT</p>
                <p class="header-btn__ja">ご注文・お問い合わせ</p>
              </a>

            </div>

            <div class="header__ham nav-btn">
              <span></span>
              <span></span>
            </div>

          </div>
        </div>
      </div><!-- /header -->
    </header>

    <div class="header-sp-nav nav-wrap">
      <div class="inner-block">
        <div class="header-sp-nav__wrap">
          <div class="header-sp-nav__list">
            <ul class="header-sp-nav-list">
              <li class="header-sp-nav-list__li">
                <a href="<?= $home_url ?>/" class="header-sp-nav-list__link">
                  <p class="header-sp-nav-list__top">TOP</p>
                  <p class="header-sp-nav-list__main">TOP</p>
                </a>
              </li>
              <li class="header-sp-nav-list__li">
                <span class="header-sp-nav-list__link">
                  <p class="header-sp-nav-list__top">FOR COMPANY</p>
                  <p class="header-sp-nav-list__main">オフィシャルパーティ</p>
                </span>
                <!-- for-companyと紐づいているtax_cake_catのタームを表示 -->
                <?php
                // for-company の投稿ID取得
                $posts01 = get_posts([
                  'post_type'      => 'service',
                  'posts_per_page' => -1,
                  'fields'         => 'ids',
                  'tax_query'      => [
                    [
                      'taxonomy' => 'tax_usage_type',
                      'field'    => 'slug',
                      'terms'    => 'for-company',
                    ],
                  ],
                ]);

                $term_ids = [];

                foreach ($posts01 as $post_id) {
                  $terms = get_the_terms($post_id, 'tax_cake_cat');

                  if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                      $term_ids[$term->term_id] = $term;
                    }
                  }
                }

                if (!empty($term_ids)) :
                ?>

                  <ul class="hover-menu-list ptn_nav u-mt" style="--mt: 5px">
                    <?php foreach ($term_ids as $term) : ?>

                      <?php
                      $en_ttl = get_term_meta($term->term_id, 'en_ttl', true);
                      $image  = get_term_meta($term->term_id, 'bg_img', true); // SCF等で画像ID保存の場合

                      $thumb = $template_url . '/img/common/dummy02.jpg';
                      if ($image) {
                        $thumb = wp_get_attachment_image_url($image, 'medium');
                      }
                      ?>

                      <li class="hover-menu-list__li">
                        <a href="<?= esc_url(get_term_link($term)); ?>" class="hover-menu-list__link">

                          <?php if ($thumb) : ?>
                            <div class="hover-menu-list__img">
                              <img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr($term->name); ?>">
                            </div>
                          <?php endif; ?>

                          <div class="hover-menu-list__txt">
                            <?php if ($en_ttl) : ?>
                              <p class="hover-menu-list__en">
                                <?= esc_html($en_ttl); ?>
                              </p>
                            <?php endif; ?>

                            <p class="hover-menu-list__ja">
                              <?= nl2br(esc_html($term->name)); ?>
                            </p>
                          </div>

                        </a>
                      </li>

                    <?php endforeach; ?>
                  </ul>

                <?php endif; ?>
              </li>
              <li class="header-sp-nav-list__li">
                <span class="header-sp-nav-list__link">
                  <p class="header-sp-nav-list__top">FOR YOU</p>
                  <p class="header-sp-nav-list__main">ホームパーティ</p>
                </span>
                <!-- for-youと紐づいているtax_cake_catのタームを表示 -->
                <?php
                // for-you の投稿ID取得
                $posts_02 = get_posts([
                  'post_type'      => 'service',
                  'posts_per_page' => -1,
                  'fields'         => 'ids',
                  'tax_query'      => [
                    [
                      'taxonomy' => 'tax_usage_type',
                      'field'    => 'slug',
                      'terms'    => 'for-you',
                    ],
                  ],
                ]);

                $term_ids_02 = [];

                foreach ($posts_02 as $post_id_02) {
                  $terms_02 = get_the_terms($post_id_02, 'tax_cake_cat');

                  if (!empty($terms_02) && !is_wp_error($terms_02)) {
                    foreach ($terms_02 as $term_02) {
                      $term_ids_02[$term_02->term_id] = $term_02;
                    }
                  }
                }

                if (!empty($term_ids_02)) :
                ?>

                  <ul class="hover-menu-list ptn_nav u-mt" style="--mt: 5px">
                    <?php foreach ($term_ids_02 as $term_02) : ?>

                      <?php
                      $en_ttl_02 = get_term_meta($term_02->term_id, 'en_ttl', true);
                      $image_02  = get_term_meta($term_02->term_id, 'bg_img', true);

                      $thumb_02 = $template_url . '/img/common/dummy02.jpg';
                      if ($image_02) {
                        $thumb_02 = wp_get_attachment_image_url($image_02, 'medium');
                      }
                      ?>

                      <li class="hover-menu-list__li">
                        <a href="<?= esc_url(get_term_link($term_02) . '?usage=foryou'); ?>" class="hover-menu-list__link">

                          <?php if ($thumb_02) : ?>
                            <div class="hover-menu-list__img">
                              <img src="<?= esc_url($thumb_02); ?>" alt="<?= esc_attr($term_02->name); ?>">
                            </div>
                          <?php endif; ?>

                          <div class="hover-menu-list__txt">
                            <?php if ($en_ttl_02) : ?>
                              <p class="hover-menu-list__en">
                                <?= esc_html($en_ttl_02); ?>
                              </p>
                            <?php endif; ?>

                            <p class="hover-menu-list__ja">
                              <?= nl2br(esc_html($term_02->name)); ?>
                            </p>
                          </div>

                        </a>
                      </li>

                    <?php endforeach; ?>
                  </ul>

                <?php endif; ?>
              </li>
              <li class="header-sp-nav-list__li">
                <a href="<?= $home_url ?>/collection/" class="header-sp-nav-list__link">
                  <p class="header-sp-nav-list__top">COLLECTION</p>
                  <p class="header-sp-nav-list__main">
                    BONBONNIERE<br>
                    コレクション
                  </p>
                </a>
              </li>
            </ul>
          </div>
          <div class="header-sp-nav__btns">
            <a href="<?= $home_url ?>/consultation/" class="header-btn lite_brown">
              <p class="header-btn__en poppins">FULL ORDER</p>
              <p class="header-btn__ja">フルオーダーケーキ相談</p>
            </a>
            <a href="<?= $home_url ?>/contact/" class="header-btn brown">
              <p class="header-btn__en poppins">CONTACT</p>
              <p class="header-btn__ja">ご注文・お問い合わせ</p>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="sp-cta sp c-bg-brown01">
      <div class="header-sp-nav__btns sp-cta__wrap">
        <a href="<?= $home_url ?>/consultation/" class="header-btn lite_brown">
          <p class="header-btn__en poppins">FULL ORDER</p>
          <p class="header-btn__ja">フルオーダーケーキ相談</p>
        </a>
        <a href="<?= $home_url ?>/contact/" class="header-btn brown">
          <p class="header-btn__en poppins">CONTACT</p>
          <p class="header-btn__ja">ご注文・お問い合わせ</p>
        </a>
      </div>
    </div>