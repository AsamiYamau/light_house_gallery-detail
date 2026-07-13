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
  <?php get_template_part('./inc/collection-mv'); ?>

  <section class="p_service-sec01 c-wave01">
    <div class="c-dec__dec02"><img src="<?= esc_url($template_url) ?>/img/common/dec02.svg" alt=""></div>
    <div class="c-dec__dec03"><img src="<?= esc_url($template_url) ?>/img/common/dec03.svg" alt=""></div>
    <div class="c-dec__dec04"><img src="<?= esc_url($template_url) ?>/img/common/dec04.svg" alt=""></div>

    <div class="inner-block">
      <div class="c-ttl02">
        <span class="dec"><img src="<?= esc_url($template_url) ?>/img/common/kuma-dec02_gray.svg" alt=""></span>
        <p class="en">Collection Lineup</p>
        <h2 class="ja">コレクション 商品一覧</h2>
      </div>

      <!-- 共通化: カテゴリーリストの呼び出し -->
      <?php get_template_part('./inc/collection-category'); ?>

      <!-- 共通化: メインコンテンツの呼び出し -->
      <?php
      // 現在のタームIDを取得（タクソノミーページの場合はID、それ以外は0）
      $current_term_id = is_tax('tax_cake_cat') ? get_queried_object_id() : 0;
      ?>
      <?php
      // tax_queryを初期化
      $tax_query = [];

      // タームがある場合のみ追加
      if ($current_term_id) {
        $tax_query[] = [
          'taxonomy' => 'tax_collection',
          'field'    => 'term_id',
          'terms'    => $current_term_id,
        ];
      }

      // tax_queryがある場合のみrelationを付与
      $args = [
        'post_type'      => 'collection',
        'posts_per_page' => -1,
      ];

      if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
      }

      $query_collection = new WP_Query($args);
      ?>
      <ul class="c-product-list u-mt" style="--mt-pc: 80px; --mt-sp: 40px;">
        <?php
        if ($query_collection->have_posts()) :
          while ($query_collection->have_posts()) : $query_collection->the_post();
            // 共通化: 商品カードの呼び出し
            get_template_part('./inc/collection-item');
          endwhile;
        else:
          echo '<li class="c-product-list__item" style="width:100%; text-align:center;"><p>現在、該当する商品はありません。</p></li>';
        endif;
        wp_reset_postdata();
        ?>
      </ul>
    </div>
  </section>

</main>

<?php get_footer(); ?>