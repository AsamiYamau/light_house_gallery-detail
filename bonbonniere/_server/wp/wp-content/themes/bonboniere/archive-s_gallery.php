<?php

/**
 * The template for displaying archive pages
 */
global $home_url;
global $template_url;

$usage = $_GET['usage'] ?? '';

get_header();
?>


<main class="outer-block p_service c-dec">
  <div class="l-mv c-bg-brown01">

    <div class="p_column-bread">
      <div class="inner-block">
        <ul class="c-bread">
          <li class="c-bread__item">
            <a href="<?= $home_url ?>/">TOP</a>
          </li>
          <li class="c-bread__item">
            セミオーダーギャラリー
          </li>
        </ul>
      </div>
    </div>

    <h1 class="c-ttl02 ptn_orange">
      <span class="dec"><img src="<?= $template_url ?>/img/common/kuma-dec01.svg" alt=""></span>
      <p class="en">Gallery</p>
      <div class="ja">セミオーダーギャラリー</div>
    </h1>

  </div>


  <?php

  global $template_url;

  $tax_query_company = [
    'relation' => 'AND',
    [
      'taxonomy' => 'tax_s_gallery_usage_type',
      'field'    => 'slug',
      'terms'    => 'for-company',
    ],
  ];

  $tax_query_you = [
    'relation' => 'AND',
    [
      'taxonomy' => 'tax_s_gallery_usage_type',
      'field'    => 'slug',
      'terms'    => 'for-you',
    ],
  ];

  $query_company = new WP_Query([
    'post_type'      => 's_gallery',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'tax_query'      => $tax_query_company,
  ]);
  
  $query_you = new WP_Query([
    'post_type'      => 's_gallery',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'tax_query'      => $tax_query_you,
  ]);

  $has_company = $query_company->have_posts();
  $has_you = $query_you->have_posts();
  $show_tabs = $has_company && $has_you;
  $active_tab = ($show_tabs && rtrim($usage, '/') === 'foryou') || (!$has_company && $has_you) ? 'tab2' : 'tab1';
  ?>

  <?php if ($has_company || $has_you): ?>
    <section class="p_description-sec02 c-wave02">
      <div class="inner-block">

        <!-- カテゴリー -->
        <?php if ($show_tabs): ?>
          <div class="p_service-sec01__box01">
            <div class="p_service-sec01__left">
              <div class="p_service-sec01__ttl js-tab-trigger <?= $active_tab === 'tab1' ? 'is-active' : ''; ?> red" data-tab="tab1">
                <p class="en">FOR COMPANY</p>
                <p class="ja">法人・団体様向け</p>
              </div>
            </div>
            <div class="p_service-sec01__right">
              <div class="p_service-sec01__ttl js-tab-trigger <?= $active_tab === 'tab2' ? 'is-active' : ''; ?> red" data-tab="tab2">
                <p class="en">FOR YOU</p>
                <p class="ja">ホームパーティ</p>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <!-- /カテゴリー -->

        <!-- タブコンテンツ -->

        <?php if ($has_company): ?>
          <!-- タブ1: FOR COMPANY -->
          <div
            class="<?= $show_tabs ? 'js-tab-content' : ''; ?> <?= $active_tab === 'tab1' ? 'is-active' : ''; ?>"
            data-tab="tab1">
            <ul class="p_description-sec02__gallery-list">

              <?php while ($query_company->have_posts()) : $query_company->the_post(); ?>
                  <?php
                  $post_id = get_the_ID();
                  // サムネイル処理
                  $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
                  if (!$thumbnail_url) {
                    $thumbnail_url = $template_url . '/img/common/dummy.jpg';
                  }
                  ?>
                  <li class="p_description-sec02__gallery-item">
                    <div class="p_description-sec02__gallery-link l-gallery-list__item">
                      <div class="p_description-sec02__gallery-img l-gallery-list__img">
                        <img src="<?= $thumbnail_url ?>" alt="">
                      </div>
                      <div class="l-gallery-list__txt">
                        <div class="l-gallery-list__txt-box">
                          <div class="ttl">
                            <?php the_title(); ?>
                          </div>
                          <div class="txt">
                            <?php the_excerpt(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if ($has_you): ?>
          <!-- タブ2: FOR YOU -->
          <div
            class="<?= $show_tabs ? 'js-tab-content' : ''; ?> <?= $active_tab === 'tab2' ? 'is-active' : ''; ?>"
            data-tab="tab2">
            <ul class="p_description-sec02__gallery-list">

              <?php while ($query_you->have_posts()) : $query_you->the_post(); ?>
                  <?php
                  $post_id = get_the_ID();
                  // サムネイル処理
                  $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
                  if (!$thumbnail_url) {
                    $thumbnail_url = $template_url . '/img/common/dummy.jpg';
                  }
                  ?>
                  <li class="p_description-sec02__gallery-item">
                    <div class="p_description-sec02__gallery-link l-gallery-list__item">
                      <div class="p_description-sec02__gallery-img l-gallery-list__img">
                        <img src="<?= $thumbnail_url ?>" alt="">
                      </div>
                      <div class="l-gallery-list__txt">
                        <div class="l-gallery-list__txt-box">
                          <div class="ttl">
                            <?php the_title(); ?>
                          </div>
                          <div class="txt">
                            <?php the_excerpt(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- タブコンテンツ -->
      </div>
    </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>