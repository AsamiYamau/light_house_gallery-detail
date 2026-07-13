<?php
$items = get_field('feature_page_list') ?: [];
?>

<section class="p_feature-page-included">
  <ul class="p_feature-page-included__list">
    <?php foreach ($items as $item): ?>
      <?php $text = is_array($item) ? ($item['text'] ?? '') : $item; ?>
      <?php if ($text): ?><li class="p_feature-page-included__item"><?= esc_html($text); ?></li><?php endif; ?>
    <?php endforeach; ?>
  </ul>
</section>
