<?php
global $home_url;
global $template_url;
global $wp_query;
// 現在のタクソノミーとタームを取得
$queried_object = get_queried_object();
$current_taxonomy = $queried_object->taxonomy;
$taxonomy_name = get_taxonomy($current_taxonomy)->labels->singular_name; // タクソノミー名を取得
$term_name = $queried_object->name; //ターム名

$yen_show_flg = false;
if($current_taxonomy == 'tax_allbudget' || $current_taxonomy == 'tax_budget'){
  $yen_show_flg = true;
  $term_name = deli_format_price($term_name);
}

?>

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
        <a class="c-breadcrumb__link" href="<?php echo $home_url,'/'.$current_taxonomy; ?>/"><?= $taxonomy_name ?>から選ぶ</a>
      </li>
      <li class="c-breadcrumb__item">
          <span
            class="c-breadcrumb__link c-breadcrumb__link--current"><?= $term_name ?><?php if($yen_show_flg){echo '円';} ?></span>
      </li>
    </ul>
  </div>

  <!-- メインエリア -->

  <?php
  $found_posts = $wp_query->found_posts;
  ?>
  <div class="c-menu-summary">
    <p class="c-menu-summary__total">全<?= $found_posts ?>商品</p>
    <p class="c-menu-summary__type"><?= $taxonomy_name ?></p>
    <div class="c-menu-summary__header">

      <h2 class="c-menu-summary__title">
        <?= $term_name ?><?php if($yen_show_flg){ echo '円'; } ?>
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
