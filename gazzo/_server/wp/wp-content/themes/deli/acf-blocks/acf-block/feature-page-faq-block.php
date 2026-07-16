<?php
$items = get_field('feature_page_faq_items') ?: [];
?>

<section class="p_feature-page-faq">
  <div class="p_feature-page-faq-list">
    <?php foreach ($items as $item): ?>
      <?php
      $q = $item['q'] ?? '';
      $a = $item['a'] ?? '';
      ?>
      <article class="p_feature-page-faq-item">
        <?php if ($q): ?>
          <div class="p_feature-page-faq-item__q">
            <span class="p_feature-page-faq-item__label">Q</span>
            <p class="p_feature-page-faq-item__txt"><?= esc_html($q); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($a): ?>
          <div class="p_feature-page-faq-item__a">
            <span class="p_feature-page-faq-item__label is-a">A</span>
            <p class="p_feature-page-faq-item__txt"><?= nl2br(esc_html($a)); ?></p>
          </div>
        <?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div>
</section>
