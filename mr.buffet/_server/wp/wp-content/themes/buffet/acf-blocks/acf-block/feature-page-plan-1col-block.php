<?php
global $template_url;

$one = get_field('feature_page_plan_1col') ?: [];
$one_img = buffet_feature_page_img_url($one['img'] ?? '');
$one_eyebrow = buffet_feature_page_text($one['eyebrow'] ?? '');
$one_title = buffet_feature_page_text($one['title'] ?? '');
$one_text = buffet_feature_page_text($one['text'] ?? '');
$one_link = $one['link_url'] ?? '';
$one_link_url = buffet_feature_page_plan_link_url($one_link);
$one_link_text = buffet_feature_page_text($one['link_text'] ?? '', '');
if (!$one_link_text && is_array($one_link) && !empty($one_link['title'])) {
  $one_link_text = $one_link['title'];
}
if (!$one_link_text) {
  $one_link_text = 'View More';
}
?>

<section class="p_feature-page-plan">
  <div class="p_feature-page-plan__1col">
    <?php if ($one_img): ?>
      <div class="p_feature-page-plan-card__img">
        <img src="<?= esc_url($one_img); ?>" alt="">
      </div>
    <?php endif; ?>
    <div class="p_feature-page-plan-card__body">
      <?php if ($one_eyebrow): ?><p class="p_feature-page-plan-card__eyebrow"><?= esc_html($one_eyebrow); ?></p><?php endif; ?>
      <?php if ($one_title): ?><h3 class="p_feature-page-plan-card__ttl"><?= esc_html($one_title); ?></h3><?php endif; ?>
      <?php if ($one_text): ?><p class="p_feature-page-plan-card__txt"><?= nl2br(esc_html($one_text)); ?></p><?php endif; ?>
      <?php if ($one_link_url): ?>
        <div class="p_feature-page-plan-card__btn">
          <a href="<?= esc_url($one_link_url); ?>" class="p_feature-page-btn"><?= esc_html($one_link_text); ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
