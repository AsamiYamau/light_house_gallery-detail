<?php
global $home_url;
global $template_url;
global $wp_query;
// タクソノミーアーカイブ用の記述
$taxonomy_slug = '';
$taxonomy_name = '';
if(get_query_var('taxonomy')){
  $taxonomy_slug = get_query_var('taxonomy');
  $taxonomy_obj = get_taxonomy($taxonomy_slug);
  $taxonomy_name = $taxonomy_obj->label;
  $taxonomy_slug = $taxonomy_obj->name;
}else{
  // タクソノミーアーカイブではない場合、通常のアーカイブになるが、メニューアーカイブは存在するページがないため、topにリダイレクトしておく。
  wp_redirect(home_url());
  exit;
}

get_header();

?>

<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <!-- メインコンテンツ -->

  <div class="c-page__wrapper p_column">
    <h1 class="c-page__title p_column__title">
      <?= $taxonomy_name ?>から選ぶ
      <span class="c-page__subtitle p_column__subtitle Allura">Menu</span>
    </h1>
    <div class="c-page__content">
      <!-- パンくずリスト -->
      <ul class="c-breadcrumb">
        <li class="c-breadcrumb__item">
          <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/">トップページ</a>
        </li>
        <li class="c-breadcrumb__item">
          <span
            class="c-breadcrumb__link c-breadcrumb__link--current"><?= $taxonomy_name ?>から選ぶ</span>
        </li>
      </ul>
    </div>

    <!-- メインエリア -->
    <?php
    $found_posts = $wp_query->found_posts;
    ?>
    <div class="c-menu-summary">
      <p class="c-menu-summary__total">全<?= $found_posts ?>商品</p>
      <div class="c-menu-summary__header">
        <h2 class="c-menu-summary__title">
        <?= $taxonomy_name ?>
          <span class="c-menu-summary__title-sub">の商品一覧</span>
        </h2>
        <p class="c-menu-summary__note">
          ※金額は全て税込です
        </p>
      </div>
    </div>
    <?php get_template_part('inc/menu_body', '', array('term_query' => $wp_query)); ?>
  </div>
</div>

<?php get_footer(); ?>