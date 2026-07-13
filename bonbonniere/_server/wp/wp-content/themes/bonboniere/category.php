<?php get_header(); ?>
<?php

//現在のカテゴリを取得
$current_cat = get_category($cat);
$cat_id = $current_cat->term_id;
$cat_name = $current_cat->name;
$cat_slug = $current_cat->slug;


//カテゴリー記事
$args = array(
  'post_type' => 'post',
  'cat' => $cat_id,
  'post_status' => 'publish',
  'posts_per_page' => 9,
  'paged' => get_query_var('paged'),
  'order' => 'DESC',
  'orderby' => 'date',
);

$cat_query = new WP_Query($args);

?>

<main class="clearfix">

  <div class="outer-block contents-block">
    <div class="inner-block">

      <div class="main-block">
        <div class="main-ttl-block">
          <div class="c-ttl01">
            <span class="ja">
              <?php echo $cat_name; ?>
            </span>
            <span class="en">
              <?php echo $cat_slug; ?>
            </span>
          </div>
        </div><!-- /main-ttl-block -->

        <div class="main-list-block">
          <ul class="item-list01">
            <?php include('inc/item_list01_create.php'); ?>
            <?php item_list01_create($cat_query) ?>
          </ul>
        </div>

      </div><!-- /main-block -->

      <div class="sidebar-block">
        <?php get_sidebar(); ?>
      </div><!-- /sidebar-block -->

    </div><!-- /inner-block -->
  </div><!-- /outer-block -->

</main>

<?php get_footer(); ?>