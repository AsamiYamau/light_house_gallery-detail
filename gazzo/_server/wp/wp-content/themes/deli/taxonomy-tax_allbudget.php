<?php
global $home_url;
global $template_url;

get_header();
?>
  <div class="l-main">
    <div class="l-main__side pc">
      <?php get_sidebar(); ?>
    </div>

    <!-- メインコンテンツ -->
    <?php get_template_part('inc/menu-taxonomy'); ?>

<?php get_footer(); ?>