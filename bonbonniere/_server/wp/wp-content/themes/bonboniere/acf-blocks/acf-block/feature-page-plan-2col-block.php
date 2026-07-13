<?php
global $template_url;

$cols = get_field('feature_page_plan_2col') ?: [];
?>

<section class="p_feature-page-plan">
  <div class="p_feature-page-plan__2col">
    <?php foreach ($cols as $item): ?>
      <?php buffet_feature_page_plan_card($item, $template_url, 'is-wide'); ?>
    <?php endforeach; ?>
  </div>
</section>
