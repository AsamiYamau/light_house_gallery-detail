<?php
global $home_url;
global $template_url;
?>

<aside class="c-sidebar">
  <section class="p_column__sidebar__category">
    <h3 class="p_column__sidebar__title">
      カテゴリー
    </h3>
    <ul class="p_column__sidebar__list">
      <?php
      $tax_budget_terms = get_terms(array(
        'taxonomy' => 'tax_column',
        'hide_empty' => false,
      ));
      ?>
      <?php
       foreach ($tax_budget_terms as $term): 
       $term_link = get_term_link($term); 
       ?>
      <li class="p_column__sidebar__list-item">
        <a
          href="<?= $term_link ?>"
          class="p_column__sidebar__link p_column__sidebar__category__link">
          <?= $term->name ?>  
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>

  <?php if (class_exists('\WordPressPopularPosts\Query')) : ?>
    <?php
    $args = array(
      'range' => 'monthly',//集計する期間 {daily(1日), weekly(1週間), monthly(1ヶ月), all(全期間)}
      'order_by' => 'views',//表示順｛views（閲覧数),comments（コメント数）,avg（1日の平均）}
      'post_type' => 'column',//複数の場合は'post, name1, nem2'
      'limit' => 5, //表示数
    );
    $popular_query = new \WordPressPopularPosts\Query($args);
    $popular_posts = $popular_query->get_posts();
    ?>
  <section class="p_column__sidebar__popular">
    <h3 class="p_column__sidebar__title">
      人気記事
    </h3>
    <ul class="p_column__sidebar__list">
      <?php
       foreach ($popular_posts as $i => $item): 
        $popular_id = $item->id;
        $popular_title = $item->title;
        $popular_link = get_the_permalink($popular_id);

        $flg = '';
        if ($i == 0) {
          $flg = 'gold';
        }elseif ($i == 1) {
          $flg = 'silver';
        }elseif ($i == 2) {
          $flg = 'bronze';
        }

        $thumb = '';
        if (has_post_thumbnail($popular_id)) {
          $thumb = get_the_post_thumbnail_url($popular_id);
        } else {
          $thumb = $template_url . '/img/common/no_img.jpg';
        }
       ?>
      <li class="p_column__sidebar__list-item">
        <a
          href="<?= $popular_link ?>"
          class="p_column__sidebar__link p_column__sidebar__popular__link">
          <div
            class="p_column__sidebar__img-wrapper p_column__sidebar__img-wrapper__rank <?= $flg ?>">
            <img
              src="<?= $thumb ?>"
              alt="" />
          </div>
          <p
            class="p_column__sidebar__link-title">
            <?= $popular_title ?>
          </p>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
  <?php endif; ?>
</aside>