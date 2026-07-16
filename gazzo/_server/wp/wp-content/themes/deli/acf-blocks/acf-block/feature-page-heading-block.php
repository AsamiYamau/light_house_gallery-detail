<?php
$type = get_field('feature_page_heading_type') ?: 'normal';
$en = buffet_feature_page_text(get_field('feature_page_heading_en'), '');
$ja = buffet_feature_page_text(get_field('feature_page_heading_ja'), '');

if ($type === 'sub') :
?>
  <section class="p_feature-page-heading p_feature-page-heading--sub">
    <div class="p_feature-page-plan__subhead">
      <h3 class="p_feature-page-plan__subttl"><?= nl2br(esc_html($ja)); ?></h3>
    </div>
  </section>
<?php elseif ($type === 'side_ribon') : ?>
  <section class="p_feature-page-section p_feature-page-heading">
    <div class="p_feature-page__head side-ribon">
      <div class="wrap">
        <?php if ($en): ?><p class="en"><?= esc_html($en); ?></p><?php endif; ?>
        <?php if ($ja): ?><h2 class="ja"><span class="c-mini-ribon"></span><span class="txt-wrap"><?= nl2br(esc_html($ja)); ?></span><span class="c-mini-ribon"></span></h2><?php endif; ?>
      </div>
    </div>
  </section>
<?php else : ?>
  <section class="p_feature-page-section p_feature-page-heading">
    <div class="p_feature-page__head">
      <?php if ($en): ?><p class="en"><?= esc_html($en); ?></p><?php endif; ?>
      <?php if ($ja): ?><h2 class="ja"><?= nl2br(esc_html($ja)); ?></h2><?php endif; ?>
      <div class="c-mini-ribon"></div>
    </div>
  </section>
<?php endif; ?>
