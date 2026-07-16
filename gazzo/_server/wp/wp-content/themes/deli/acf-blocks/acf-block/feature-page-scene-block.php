<?php
global $template_url;

$items = get_field('feature_page_scene_items') ?: [];
?>

<section class="p_feature-page-scene">
  <div class="p_feature-page-scene-grid">
    <?php foreach ($items as $item): ?>
      <?php
      $img = buffet_feature_page_img_url($item['img'] ?? '', $template_url . '/img/common/no_img.jpg');
      $title = $item['title'] ?? '';
      ?>
      <div class="p_feature-page-scene-card">
        <img src="<?= esc_url($img); ?>" alt="">
        <?php if ($title): ?><span><?= esc_html($title); ?></span><?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>
