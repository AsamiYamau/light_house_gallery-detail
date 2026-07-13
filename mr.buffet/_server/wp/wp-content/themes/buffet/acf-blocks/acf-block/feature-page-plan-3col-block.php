<?php
global $template_url;

$cols = get_field('feature_page_plan_3col') ?: [];
?>

<section class="p_feature-page-plan">
  <div class="p_feature-page-plan__3col">
    <?php foreach ($cols as $item): ?>
      <?php buffet_feature_page_plan_card($item, $template_url); ?>
    <?php endforeach; ?>
  </div>
</section>
