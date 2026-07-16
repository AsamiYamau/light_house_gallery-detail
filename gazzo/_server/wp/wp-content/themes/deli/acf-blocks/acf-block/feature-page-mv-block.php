<?php
global $template_url;

$img = buffet_feature_page_img_url(get_field('feature_page_mv_img'), $template_url . '/img/template/mv01.jpg');
$eyebrow = get_field('feature_page_mv_eyebrow') ?: '';
$title = get_field('feature_page_mv_title') ?: "";
$lead = get_field('feature_page_mv_lead') ?: '';
?>

<section class="p_feature-page-mv">
  <div class="p_feature-page-mv__bg">
    <img src="<?= esc_url($img); ?>" alt="">
  </div>
  <div class="p_feature-page-mv__body">
    <p class="p_feature-page__eyebrow"><?= esc_html($eyebrow); ?></p>
    <h1 class="p_feature-page-mv__ttl"><?= nl2br(esc_html($title)); ?></h1>
    <p class="p_feature-page-mv__lead"><?= esc_html($lead); ?></p>
  </div>
</section>
