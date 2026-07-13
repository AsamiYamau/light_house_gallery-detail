<?php
/**
 * The template for displaying archive pages
 */
global $home_url;
global $template_url;

get_header();
?>

<main class="outer-block p_service c-dec">
      <!-- 共通化: MVの呼び出し -->
      <?php get_template_part('./inc/service-mv'); ?>

  <section class="p_service-sec01 c-wave01">
    <div class="c-dec__dec02"><img src="<?= esc_url($template_url) ?>/img/common/dec02.svg" alt=""></div>
    <div class="c-dec__dec03"><img src="<?= esc_url($template_url) ?>/img/common/dec03.svg" alt=""></div>
    <div class="c-dec__dec04"><img src="<?= esc_url($template_url) ?>/img/common/dec04.svg" alt=""></div>
    
    <div class="inner-block">
      <div class="c-ttl02">
        <span class="dec"><img src="<?= esc_url($template_url) ?>/img/common/kuma-dec02_gray.svg" alt=""></span>
        <p class="en">Service Lineup</p>
        <h2 class="ja">サービス一覧</h2>
      </div>

      <!-- ① 共通化: カテゴリーリストの呼び出し -->
      <?php get_template_part('./inc/service-category'); ?>

      <div class="p_service-sec01__box01">
        <div class="p_service-sec01__left">
          <div class="p_service-sec01__ttl js-tab-trigger is-active" data-tab="tab1">
            <p class="en">FOR COMPANY</p>
            <p class="ja">法人・団体様向け</p>
          </div>
        </div>
        <div class="p_service-sec01__right">
          <div class="p_service-sec01__ttl js-tab-trigger" data-tab="tab2">
            <p class="en">FOR YOU</p>
            <p class="ja">ホームパーティ</p>
          </div>
        </div>
      </div>
      
      <!-- 共通化: メインコンテンツの呼び出し -->
      <?php get_template_part('./inc/service-body'); ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>