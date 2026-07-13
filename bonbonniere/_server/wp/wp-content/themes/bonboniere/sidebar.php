<?php
global $template_url;
global $home_url;

//category
$args = array(
  'type'                     => 'post',
  'hide_empty'               => false,
  'pad_counts'               => true
);
$cat_list = get_categories($args);


//新着記事
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 5,
  'order' => 'DESC',
  'orderby' => 'date',
);

$new_query = new WP_Query($args);

?>

<div class="c-side-box">
  <div class="c-side-ttl">
    カテゴリー
  </div>
  <div class="c-side-cont">
    <?php $categories = get_terms('tax_blog');
    if ( $categories[0] ): ?>
      <ul class="c-side-cat-list">
        <?php foreach ($categories as $category) : ?>
          <li><a href="<?php echo get_category_link($category); ?>" class=""><?php print mb_strimwidth(strip_tags($category->name), 0, 20, "…", "UTF-8"); ?></a> (<?php echo $category->count; ?>)</li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>


  </div>
</div>

<div class="c-side-box">
  <div class="c-side-ttl">
    アーカイブ
  </div>
  <div class="c-side-cont">
    <ul class="c-side-cat-list">
      <?php wp_get_archives( 'post_type=blog&type=monthly&show_post_count=true' ); ?>
    </ul>
  </div>
</div>