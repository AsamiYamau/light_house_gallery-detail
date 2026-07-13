<?php
global $template_url;

$cols = get_field('feature_page_plan_4col') ?: [];
?>

<section class="p_feature-page-plan">
  <div class="p_feature-page-plan__4col">
    <?php foreach ($cols as $item): ?>
      <?php buffet_feature_page_plan_card($item, $template_url, 'is-small'); ?>
    <?php endforeach; ?>
  </div>
</section>
