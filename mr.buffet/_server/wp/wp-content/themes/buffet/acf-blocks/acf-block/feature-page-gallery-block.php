<?php
global $template_url;

$items = get_field('feature_page_gallery_items') ?: [];
?>

<section class="p_feature-page-gallery">
  <ul class="l-gallery-list">
    <?php foreach ($items as $i => $item): ?>
      <?php
      $img = buffet_feature_page_img_url($item['img'] ?? '', $template_url . '/img/common/no_img.jpg');
      $title = $item['title'] ?? '';
      $text = $item['text'] ?? '';
      ?>
      <li class="l-gallery-list__item js-modal-btn" data-gallery="gallery_<?= esc_attr($i + 1); ?>">
        <div class="l-gallery-list__img">
          <img src="<?= esc_url($img); ?>" alt="">
        </div>
        <div class="l-gallery-list__txt">
          <div class="l-gallery-list__txt-box">
            <?php if ($title): ?><div class="ttl"><?= esc_html($title); ?></div><?php endif; ?>
            <?php if ($text): ?>
              <div class="txt">
                <p><?= esc_html($text); ?></p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
