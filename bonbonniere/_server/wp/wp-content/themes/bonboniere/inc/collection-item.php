<?php
global $template_url;
$post_id = get_the_ID();

// サムネイル処理
$thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
if (!$thumbnail_url) {
    $thumbnail_url = $template_url . '/img/common/dummy02.jpg';
}

// SCFカスタムフィールド取得
$price = SCF::get('price', $post_id);
$introduction = SCF::get('introduction', $post_id);
?>
<li class="c-product-list__item">
  <a href="<?php the_permalink(); ?>" class="c-product-list__link">
    <div class="c-product-list__img">
      <img src="<?= esc_url($thumbnail_url); ?>" alt="<?= esc_attr(get_the_title()); ?>">
    </div>
    <div class="c-product-list__txtArea">
      
      <?php
      $post_cake_cats = get_the_terms($post_id, 'tax_collection');
      if (!is_wp_error($post_cake_cats) && !empty($post_cake_cats)) :
      ?>
      <ul class="c-category-list02">
        <?php foreach ($post_cake_cats as $post_cat) : ?>
        <li class="c-category-list02__item"><?php echo esc_html($post_cat->name); ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
      
      <p class="c-product-list__ttl"><?php the_title(); ?></p>
      
      <?php if (!empty($price)) : ?>
      <p class="c-product-list__price poppins"><span class="small01">¥</span><?php echo esc_html($price); ?><span class="small02">（税込）</span></p>
      <?php endif; ?>

      <p class="c-product-list__txt">
        <?php 
        if (!empty($introduction)) {
            echo esc_html(wp_strip_all_tags($introduction));
        } else {
            echo esc_html(get_the_excerpt());
        }
        ?>
      </p>
      <div class="c-product-list__btn">詳細を見る</div>
    </div>
  </a>
</li>