<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage 
 * @since 1.0.0
 */
global $home_url;
global $template_url;

//新着記事
//$args = array(
//  'post_type' => 'post',
//  'post_status' => 'publish',
//  'posts_per_page' => 9,
//  'paged' => get_query_var('paged'),
//  'order' => 'DESC',
//  'orderby' => 'date',
//);
//$new_query = new WP_Query($args);

get_header();
?>

<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>
  <div class="l-main__main">
    <main class="outer-block">

      <section class="p_top-mv">
        <div class="p_top-mv__img">
          <img class="pc" src="<?php echo $template_url; ?>/img/home/mv20260703.png" alt="">
          <img class="sp" src="<?php echo $template_url; ?>/img/home/mv20260703_sp.png" alt="">
        </div>
        <div class="p_top-mv__txt-area" style="display:none;">
          <div class="p_top-mv__ttl-box anm-up">
            <span class="p_top-mv__ttl">
              <img src="<?php echo $template_url; ?>/img/home/mv-ttl-parts01.svg" alt="オシャレで旨い">
            </span>
          </div>
          <div class="p_top-mv__ttl-box anm-up" style="animation-delay: 0.2s;">
            <span class="p_top-mv__ttl">
              <img src="<?php echo $template_url; ?>/img/home/mv-ttl-parts02.svg" alt="オードブルとお寿司を">
            </span>
          </div>
          <div class="p_top-mv__ttl-box anm-up" style="animation-delay: 0.4s;">
            <span class="p_top-mv__ttl">
              <img src="<?php echo $template_url; ?>/img/home/mv-ttl-parts03.svg" alt="心を込めてお届けします">
            </span>
          </div>
        </div>
      </section>

      <section class="p_top-about">

        <div class="inner-block" style="display:none;">
          <div class="p_top-about__point-wrap anm-list">
            <div class="p_top-about__point-item">
              <div class="icon">
                <img
                  src="<?= $template_url ?>/img/home/icon_crown02.svg"
                  alt=""
                  width="30"
                  height="20" />
              </div>
              <p class="text">脅威の<br />リピート率</p>
              <p class="number">91<span class="percent">%</span></p>
            </div>
            <div class="p_top-about__point-item">
              <div class="icon">
                <img
                  src="<?= $template_url ?>/img/home/icon_crown02.svg"
                  alt=""
                  width="30"
                  height="20" />
              </div>
              <p class="text">おひとり様</p>
              <p class="number">1,200<span class="yen">円</span></p>
              <p class="text">からご用意</p>
            </div>
          </div>
          <a href="<?php echo $home_url; ?>/about/" class="c-button -green">
            <span class="ja">私たちについて</span>
            <span class="icon"><img
                src="<?= $template_url ?>/img/common/icon_arrow-wt.svg"
                alt=""
                width="16"
                height="16" /></span>
          </a>

          <div class="p_top-about__banner">

          </div>


        </div>
      </section>
      <div class="p_top-green bg_img">
        <div class="inner-block">
          <!-- シリーズ  -->
          <?php
          $tax_series = get_terms('tax_series', array('hide_empty' => false));
          if (!empty($tax_series)):
          ?>
            <section class="p_top-series" style="display:none;">
              <h2 class="c-title anm">
                <span class="circle">
                  <span class="logo"><img
                      src="<?= $template_url ?>/img/common/icon-three01.svg"
                      alt=""
                      width=""
                      height="" /></span>
                  <span class="quadra">
                    シリーズ
                  </span>
                  <span class="ja">から選ぶ</span>
                </span>
              </h2>
              <div class="p_top-series-list anm-list">
                <?php foreach ($tax_series as $term): ?>
                  <?php
                  $term_id = $term->term_id;
                  $term_name = $term->name;
                  $term_link = get_term_link($term);

                  $term_img = get_term_meta($term_id, 'series_img', true);
                  if (!empty($term_img)) {
                    $term_img = wp_get_attachment_url($term_img);
                  } else {
                    $term_img = $template_url . '/img/common/no_img.jpg';
                  }

                  $term_description = $term->description;
                  ?>
                  <a href="<?= $term_link ?>" class="p_top-series-list__link">
                    <div class="p_top-series-list__link-image">
                      <img
                        src="<?= $term_img ?>"
                        alt=""
                        width="308"
                        height="326" />
                    </div>
                    <div class="p_top-series-list__link-content">
                      <h3 class="title">
                        <span class="ja"><?= $term_name ?><span class="small">シリーズ</span></span>
                        <span class="icon"><img
                            src="<?= $template_url ?>/img/common/icon_arrow.svg"
                            alt=""
                            width="22"
                            height="22" /></span>
                      </h3>
                      <p class="text">
                        <?= nl2br($term_description) ?>
                      </p>

                    </div>
                  </a>
                <?php endforeach; ?>
              </div>

            </section>
          <?php endif; ?>


          <!-- 予算  -->
          <!--
          <section class="p_top-budget">
            <h2 class="c-title anm">
              <span class="circle">
                <span class="logo"><img
                    src="<?= $template_url; ?>/img/common/icon_ribbon.svg"
                    alt=""
                    width=""
                    height="" /></span>
                <span class="quadra"><img
                    src="<?= $template_url; ?>/img/home/title_budget.svg"
                    alt="一人当たりの予算"
                    width=""
                    height="" /></span>
                <span class="ja">から選ぶ</span>
              </span>
            </h2>

            <?php
            $tax_budget_terms = get_terms('tax_budget', array('hide_empty' => false));
            ?>
            <?php foreach ($tax_budget_terms as $tax_budget_term): ?>
              <?php
              $popular_menus = SCF::get_term_meta($tax_budget_term->term_id, 'tax_budget', 'budget_popular_menus');
              $budget_color = SCF::get_term_meta($tax_budget_term->term_id, 'tax_budget', 'budget_color');
              $background_style_str = '';
              if ($budget_color) {
                $background_style_str  = 'background-color : ' . $budget_color . ';';
              }
              $budget_args = array(
                'post_type' => 'menu',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'post__in' => $popular_menus,
                'orderby' => 'post__in'
              );
              $budget_query = new WP_Query($budget_args);
              ?>
              <?php if (!empty($popular_menus) && $budget_query->have_posts()): ?>
                <div class="p_top-budget-plan">
                  <h3 class="p_top-budget-title anm">
                    <span class="price" style="<?= $background_style_str; ?>">
                      <span class="icon">
                        <img
                          src="<?= $template_url; ?>/img/home/icon_coin.svg"
                          alt=""
                          width="28"
                          height="20" /> </span><?php echo deli_format_price($tax_budget_term->name); ?> <span class="yen">円</span></span>までの人気プラン
                  </h3>
                  <div class="p_top-budget-list anm-list">
                    <?php $i = 0; ?>
                    <?php while ($budget_query->have_posts()): $budget_query->the_post(); ?>
                      <?php
                      $rank_slug = '';
                      if ($i == 0) {
                        $rank_slug = 'first';
                      } elseif ($i == 1) {
                        $rank_slug = 'second';
                      } elseif ($i == 2) {
                        $rank_slug = 'third';
                      }
                      $icon_img = $template_url . '/img/home/icon_crown.svg';
                      if ($i != 0) {
                        $icon_img = $template_url . '/img/home/icon_crown_white.svg';
                      }
                      ?>
                      <a href="<?php the_permalink(); ?>" class="p_top-budget-list__link">
                        <div class="p_top-budget-list__rank <?php echo $rank_slug; ?>">
                          <div class="icon">
                            <img src="<?= $icon_img; ?>" alt="" width="34" height="28" />
                          </div>
                          <p class="text">
                            <span class="number"><?php echo $i + 1 ?></span>番人気
                          </p>
                        </div>
                        <div class="p_top-budget-list__link-image">
                          <?php
                          $thumb = '';
                          if (has_post_thumbnail()) {
                            $thumb = get_the_post_thumbnail_url();
                          } else {
                            $thumb = $template_url . '/img/common/no_img.jpg';
                          }
                          ?>
                          <img src="<?= $thumb; ?>" alt="<?php the_title(); ?>" />
                        </div>
                        <div class="p_top-budget-list__link-content">
                          <h4 class="title">
                            <?php the_title(); ?><span class="icon"><img src="<?= $template_url; ?>/img/common/icon_arrow.svg" alt="" width="22" height="22" /></span>
                          </h4>
                          <?php
                          $menu_cap = SCF::get('menu_cap');
                          $menu_num = SCF::get('menu_num');
                          $menu_price = deli_format_price(SCF::get('menu_price'));
                          ?>
                          <p class="text">
                            <?php echo nl2br($menu_cap); ?>
                          </p>
                          <div class="info-wrap">
                            <div class="info">
                              <div class="icon">
                                <img src="<?= $template_url; ?>/img/home/icon_menu.svg" alt="" width="24" height="24" />
                              </div>
                              全<span class="number"><?php echo $menu_num; ?></span>品
                            </div>
                            <div class="info">
                              <div class="icon">
                                <img src="<?= $template_url; ?>/img/home/icon_coin02.svg" alt="" width="24" height="24" />
                              </div>
                              <span class="number"><?php echo $menu_price; ?></span>円/1人あたり
                            </div>
                          </div>
                        </div>
                      </a>
                      <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                  </div>
                  <p class="p_top-notice">※金額は全て税込です</p>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </section>
          -->

          <!-- 総額  -->
          <?php
          $tax_all = get_terms('tax_allbudget', array('hide_empty' => false));
          if (!empty($tax_all)):
          ?>
            <section class="p_top-total">
              <h2 class="c-title anm">
                <span class="circle">
                  <span class="logo"><img
                      src="<?= $template_url ?>/img/common/icon-three01.svg"
                      alt=""
                      width=""
                      height="" /></span>
                  <span class="quadra">
                    セットプラン
                  </span>
                  <span class="ja">から選ぶ</span>
                </span>
              </h2>
              <div class="p_top-total-list anm-list">
                <?php foreach ($tax_all as $term): ?>
                  <?php
                  $term_id = $term->term_id;
                  $term_name = deli_format_price($term->name);
                  $term_link = get_term_link($term);

                  $menu_num = '';
                  $menu_link = $term_link;

                  $menu_query = new WP_Query(array(
                    'post_type'      => 'menu',
                    'post_status'    => 'publish',
                    'posts_per_page' => 1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'tax_query'      => array(
                      array(
                        'taxonomy' => 'tax_allbudget',
                        'field'    => 'term_id',
                        'terms'    => $term_id,
                      ),
                    ),
                  ));

                  if ($menu_query->have_posts()) {
                    $menu_query->the_post();

                    $menu_num  = SCF::get('menu_num');
                    $menu_link = get_permalink();

                    wp_reset_postdata();
}

                  $term_img = SCF::get_term_meta($term->term_id, 'tax_allbudget', 'tax_allbudget_thumb');
                  if (!empty($term_img)) {
                    $term_img = wp_get_attachment_url($term_img);
                  } else {
                    $term_img = $template_url . '/img/common/no_img.jpg';
                  }

                  ?>
                  <a href="<?= esc_url($menu_link); ?>" class="p_top-total-list__link">
                    <p class="p_top-total-list__tag">8~12人セット</p>
                    <div class="p_top-total-list__tag02">
                      <div class="top-img-tag">
                        <p class="top-img-tag__txt">
                          おすすめ<br>
                          品数
                        </p>
                        <div class="top-img-tag__box">
                          全<div class="top-img-tag__num"><?= $menu_num ?></div>品
                        </div>
                      </div>
                    </div>
                    <div class="p_top-total-list__link-image">
                      <img
                        src="<?= $term_img ?>"
                        alt=""
                        width="308"
                        height="240" />
                    </div>
                    <div class="p_top-total-list__link-content">
                      <div class="note">
                        <div class="note-cont">
                          <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 18 18" fill="none" style="color:#341B1B" aria-hidden="true">
                              <circle cx="9" cy="4.3" r="3.05" stroke="currentColor" stroke-width="1.25" />
                              <path d="M2.35 16.25V14.6C2.35 11.85 5.15 9.7 9 9.7C12.85 9.7 15.65 11.85 15.65 14.6V16.25H2.35Z" stroke="currentColor" stroke-width="1.25" stroke-linejoin="round" />
                            </svg>
                          </div>
                          10名様向け　<span class="small">(8~12名程度でご利用頂けます。)</span>
                        </div>
                      </div>
                      <div class="info">
                        <div class="price">
                          総額<span class="number"><?= $term_name ?></span><span class="red">円</span> <span class="small">(税込)</span>
                        </div>
                        <div class="one">
                          <p class="one-txt">1名あたり</p>
                          <?php
                          $one_price = $price = (int) str_replace(',', '', deli_format_price($term->name)) / 10;
                          ?>
                          <?= number_format($one_price); ?> <span class="small">円</span>
                        </div>
                        <span class="icon"><img
                            src="<?= $template_url ?>/img/common/icon_arrow.svg"
                            alt=""
                            width="22"
                            height="22" /></span>
                      </div>
                    </div>
                  </a>
                <?php endforeach; ?>
              </div>
              <p class="p_top-notice">※金額は全て税込です</p>

              <secton class="p_top-bottom-note">
                <div class="p_top-bottom-note__box">
                  <h3 class="p_top-bottom-note__ttl">
                    セットのご利用について
                  </h3>
                  <ul class="p_top-set-list">
                    <li class="p_top-set-list__li">
                      <div class="p_top-set-list__box">
                        <div class="p_top-set-list__icon">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none" aria-hidden="true">
                            <path d="M15.3 35.7V31.9C15.3 26.9 19 23.3 24 23.3C29 23.3 32.7 26.9 32.7 31.9V35.7H15.3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                            <circle cx="24" cy="15" r="7" stroke="currentColor" stroke-width="2" />
                            <path d="M14.8 20.2C13.8 19.1 13.2 17.7 13.2 16.2C13.2 12.9 15.8 10.3 19.1 10.3" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M8.5 33.1V29.5C8.5 25.9 11.3 23.1 15.3 22.4" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
                            <path d="M33.2 20.2C34.2 19.1 34.8 17.7 34.8 16.2C34.8 12.9 32.2 10.3 28.9 10.3" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M39.5 33.1V29.5C39.5 25.9 36.7 23.1 32.7 22.4" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
                            <path d="M8.5 33.1H15.3" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M32.7 33.1H39.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                          </svg>
                        </div>
                        <div class="p_top-set-list__txtbox">
                          <h4 class="p_top-set-list__ttl">10名様を基準にご用意しています</h4>
                          <p class="p_top-set-list__txt">
                            各セットは10名様でちょうど良いボリュームを想定してお作りしています。
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="p_top-set-list__li">
                      <div class="p_top-set-list__box">
                        <div class="p_top-set-list__icon">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" role="img" aria-label="fork and knife icon">
                            <g fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M16 8v19c0 3.3 2.7 6 6 6s6-2.7 6-6V8" />
                              <path d="M20 8v21" />
                              <path d="M24 8v21" />
                              <path d="M22 33v21" />
                              <path d="M19 54v2.2a3 3 0 0 0 6 0V54" />
                              <path d="M45 8c-5.7 5.2-8.8 13.4-8.8 24.5 0 2 1.6 3.5 3.5 3.5H45v18" />
                              <path d="M45 8h1.8c2.2 0 4 1.8 4 4v42.2a3 3 0 0 1-6 0V54" />
                            </g>
                          </svg>
                        </div>
                        <div class="p_top-set-list__txtbox">
                          <h4 class="p_top-set-list__ttl">8～12名様でご利用いただけます</h4>
                          <p class="p_top-set-list__txt">
                            しっかりお食事をされる場合は8名様程度、<br class="pc">軽食や懇親会でのご利用は12名様程度が目安となります。
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </secton>

              <a href="<?= $home_url ?>/tax_allbudget/" class="c-button">
                <span class="en">View More</span>
                <span class="icon"><img
                    src="<?= $template_url ?>/img/common/icon_arrow.svg"
                    alt=""
                    width="22"
                    height="22" /></span>
              </a>
            </section>
          <?php endif; ?>


          <!-- 単品  -->

          <section class="p_top-menu">
            <h2 class="c-title anm">
              <span class="circle">
                <span class="logo"><img
                    src="<?php echo $template_url; ?>/img/common/icon-three01.svg"
                    alt=""
                    width=""
                    height="" /></span>
                <span class="quadra">
                  単品メニュー
                </span>
                <span class="ja">から選ぶ</span>
              </span>
            </h2>

            <?php
            $tax_single_terms = get_terms('tax_single', array('hide_empty' => false));
            ?>
            <?php foreach ($tax_single_terms as $tax_single_term): ?>
              <?php
              $single_args = array(
                'post_type' => 'menu',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'orderby' => 'menu_order',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'tax_single',
                    'field' => 'slug',
                    'terms' => $tax_single_term->slug,
                  ),
                ),
              );
              $single_query = new WP_Query($single_args);
              ?>
              <?php if ($single_query->have_posts()): ?>
                <h3 class="p_top-menu-title anm"><?php echo $tax_single_term->name; ?></h3>
                <div class="p_top-menu-list anm-list">
                  <?php while ($single_query->have_posts()): $single_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="p_top-menu-list__link <?php if ($tax_single_term->slug === 'hokahoka') echo ' is-hokahoka'; ?>">
                      <div class="p_top-menu-list__link-image">
                        <?php
                        $thumb = '';
                        if (has_post_thumbnail()) {
                          $thumb = get_the_post_thumbnail_url();
                        } else {
                          $thumb = $template_url . '/img/common/no_img.jpg';
                        }
                        ?>
                        <img src="<?= $thumb; ?>" alt="<?php the_title(); ?>" />
                      </div>
                      <div class="p_top-menu-list__link-content">
                        <div class="head">
                          <h4 class="title">
                            <?php the_title(); ?>
                            <span class="icon">
                              <img src="<?php echo $template_url; ?>/img/common/icon_arrow.svg" alt="" width="22" height="22" />
                            </span>
                          </h4>
                        </div>
                        <div class="info">
                          <div class="icon">
                            <img src="<?php echo $template_url; ?>/img/home/icon_coin02.svg" alt="" width="24" height="24" />
                          </div>
                          <?php
                          $menu_volume = SCF::get('menu_volume');
                          $menu_volume_front = SCF::get('menu_volume_font');
                          $menu_volume_after = SCF::get('menu_volume_after');
                          $volume_text = '';
                          if ($menu_volume || $menu_volume_front || $menu_volume_after) {
                            $volume_text = ' / ' . $menu_volume_front . $menu_volume . $menu_volume_after;
                          }
                          ?>
                          <span class="number"><?php echo deli_format_price(SCF::get('menu_price')); ?></span>円<?php echo $volume_text; ?>
                        </div>
                      </div>
                    </a>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </div>
                <p class="p_top-notice">※金額は全て税込です</p>
                <a href="<?php echo get_term_link($tax_single_term); ?>" class="c-button">
                  <span class="en">View More</span>
                  <span class="icon"><img
                      src="<?php echo $template_url; ?>/img/common/icon_arrow.svg"
                      alt=""
                      width="22"
                      height="22" /></span>
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </section>

        </div>
      </div>

      <!-- <section class="p_top-instagram">
        <div class="inner-block">
          <div class="p_top-instagram__cont">
            <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
          </div>
          <div class="p_top-instagram__btn">
            <a href="https://www.instagram.com/mr.buffet_catering/" target="_blank" class="c-btn02">
              公式アカウントはこちら
            </a>
          </div>
        </div>
      </section> -->

      <section class="p_top-buttons">
        <div class="inner-block">
          <div class="p_top-buttons-illust illust01">
            <img
              src="<?= $template_url ?>/img/home/buttons_illust01.png"
              alt=""
              width="313"
              height="204" />
          </div>
          <div class="p_top-buttons-wrap anm-list">
            <a href="<?= $home_url ?>/guide/" class="p_top-buttons-wrap__button">
              <span class="icon">
                <img
                  src="<?= $template_url ?>/img/home/icon_question.svg"
                  alt=""
                  width="27"
                  height="27" />
              </span>
              <span class="ja">ご利用ガイド・<br class="pc" />よくある質問</span>
            </a>
            <a href="<?= $home_url ?>/area/" class="p_top-buttons-wrap__button">
              <span class="icon">
                <img
                  src="<?= $template_url ?>/img/home/icon_pin.svg"
                  alt=""
                  width="26"
                  height="30" />
              </span>
              <span class="ja">配達エリア</span>
            </a>
          </div>
          <div class="p_top-buttons-illust illust02">
            <img
              src="<?= $template_url ?>/img/home/buttons_illust02.png"
              alt=""
              width="215"
              height="137" />
          </div>
        </div>
      </section>
    </main>
  </div>
</div>


<?php
get_footer();
