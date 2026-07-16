<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
global $home_url;
global $template_url;

get_header();

$obj = get_queried_object();
$term_name = $obj->name;
?>
 
<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <!-- メインコンテンツ -->
  <main class="c-page__wrapper p_column">
    <h1 class="c-page__title p_column__title">
      コラム
      <span class="c-page__subtitle p_column__subtitle Allura">Column</span>
    </h1>
    <div class="c-page__content">
      <!-- パンくずリスト -->
      <ul class="c-breadcrumb">
        <li class="c-breadcrumb__item">
          <a class="c-breadcrumb__link" href="<?= $home_url ?>/">トップページ</a>
        </li>
        <li class="c-breadcrumb__item">
          <a class="c-breadcrumb__link" href="<?= $home_url ?>/column">コラム</a>
        </li>
        <li class="c-breadcrumb__item">
          <span
            class="c-breadcrumb__link c-breadcrumb__link--current"><?= $term_name ?></span>
        </li>
      </ul>
    </div>

    <div class="c-main-wrapper">
      <!-- メインエリア -->
      <div class="c-main-area">
        <div class="p_column-taxonomy c-ribon-ttl">
          <span class="txt">
            <?= $term_name ?>一覧
          </span>
        </div>


        <!-- list -->
        <?php echo get_template_part('./inc/column-body'); ?>

        <!-- ページネーション -->
        <?php
        set_query_var('paging_query', $wp_query);
        get_template_part('paging');
        ?>
        <!-- /ページネーション -->
      </div>

      <!-- サイドバー -->
      <?php get_template_part('inc/column-sidebar'); ?>
    </div>
  </main>
</div>

<?php
get_footer();
