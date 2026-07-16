<?php
global $home_url;
global $template_url;

$term_query = $args['term_query'];

?>

<div class="c-main-wrapper c-main-menu-wrapper">
  <?php if ($term_query->have_posts()): ?>
    <div class="c-main-area">
      <!-- menu -->

      <section class="c-menu">
        <ul class="c-menu-list c-menu-list-col2">
          <?php while ($term_query->have_posts()): $term_query->the_post(); ?>
            <?php get_template_part('inc/menu-item'); ?>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </ul>
      </section>

      <!-- ページネーション -->
      <?php
      set_query_var('paging_query', $term_query);
      get_template_part('paging');
      ?>
      <!-- /ページネーション -->
    </div>
  <?php else: ?>
    <p>商品がありません</p>
  <?php endif; ?>
  <!-- サイドバー -->
  <?php get_template_part('inc/menu-sidebar'); ?>
</div>