<?php
global $template_url;

$items = get_field('feature_page_recommend_items') ?: [];
?>

<section class="p_feature-page-recommend">
  <div class="p_home-cont01">
    <?php foreach ($items as $item): ?>
      <?php
      $img = buffet_feature_page_img_url($item['img'] ?? '', $template_url . '/img/common/no_img.jpg');
      $link_url = buffet_feature_page_url($item['link_url'] ?? '', '#');
      ?>
      <div class="p_home-cont01__box">
        <a href="<?= esc_url($link_url); ?>" class="p_home-cont01__img01">
          <img src="<?= esc_url($img); ?>" alt="">
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</section>
