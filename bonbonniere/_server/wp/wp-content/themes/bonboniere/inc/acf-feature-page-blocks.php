<?php

/* --------------------------------------------
 * Feature page ACF blocks
 * -------------------------------------------- */
add_action('acf/init', 'buffet_register_feature_page_blocks');

function buffet_register_feature_page_blocks()
{
  if (!function_exists('acf_register_block_type')) {
    return;
  }

  $style = get_template_directory_uri() . '/acf-blocks/acf-block-style/acf-block-feature.css';
  $blocks = array(
    array('feature-page-heading', '特集ページ 見出し', 'acf-blocks/acf-block/feature-page-heading-block.php', 'heading', array('特集ページ', '見出し', 'リボン', '子見出し')),
    array('feature-page-plan-1col', '特集ページ プラン 1カラム', 'acf-blocks/acf-block/feature-page-plan-1col-block.php', 'align-wide', array('特集ページ', 'プラン', '1カラム')),
    array('feature-page-plan-2col', '特集ページ プラン 2カラム', 'acf-blocks/acf-block/feature-page-plan-2col-block.php', 'columns', array('特集ページ', 'プラン', '2カラム')),
    array('feature-page-plan-3col', '特集ページ プラン 3カラム', 'acf-blocks/acf-block/feature-page-plan-3col-block.php', 'grid-view', array('特集ページ', 'プラン', '3カラム')),
    array('feature-page-plan-4col', '特集ページ プラン 4カラム', 'acf-blocks/acf-block/feature-page-plan-4col-block.php', 'screenoptions', array('特集ページ', 'プラン', '4カラム')),
    array('feature-page-recommend', '特集ページ おすすめ', 'acf-blocks/acf-block/feature-page-recommend-block.php', 'images-alt2', array('特集ページ', 'おすすめ')),
    array('feature-page-gallery', '特集ページ ギャラリー', 'acf-blocks/acf-block/feature-page-gallery-block.php', 'format-gallery', array('特集ページ', 'ギャラリー')),
    array('feature-page-scene', '特集ページ シーン', 'acf-blocks/acf-block/feature-page-scene-block.php', 'screenoptions', array('特集ページ', 'シーン')),
    array('feature-page-list', '特集ページ リスト', 'acf-blocks/acf-block/feature-page-list-block.php', 'yes-alt', array('特集ページ', 'リスト')),
    array('feature-page-faq', '特集ページ FAQ', 'acf-blocks/acf-block/feature-page-faq-block.php', 'editor-help', array('特集ページ', 'FAQ')),
    array('feature-page-cta', '特集ページ CTA', 'acf-blocks/acf-block/feature-page-cta-block.php', 'phone', array('特集ページ', 'CTA')),
  );

  foreach ($blocks as $block) {
    acf_register_block_type(
      array(
        'name'            => $block[0],
        'title'           => __($block[1]),
        'description'     => __($block[1]),
        'render_template' => $block[2],
        'category'        => 'formatting',
        'icon'            => $block[3],
        'keywords'        => $block[4],
        'enqueue_style'   => $style,
        'mode'            => 'auto',
      )
    );
  }
}

function buffet_feature_page_img_url($image, $fallback = '')
{
  if (is_array($image) && !empty($image['url'])) {
    return $image['url'];
  }
  if (is_numeric($image)) {
    $url = wp_get_attachment_image_url($image, 'full');
    if (!empty($url)) {
      return $url;
    }
  }
  if (is_string($image) && $image !== '') {
    return $image;
  }
  return $fallback;
}

function buffet_feature_page_url($url, $fallback = '#')
{
  if (is_array($url) && !empty($url['url'])) {
    $url = trim($url['url']);
    return $url !== '' ? $url : $fallback;
  }
  if (is_string($url) && $url !== '') {
    $url = trim($url);
    return $url !== '' ? $url : $fallback;
  }
  return $fallback;
}

function buffet_feature_page_plan_link_url($link)
{
  if (is_array($link)) {
    $url = trim($link['url'] ?? '');
  } elseif (is_string($link)) {
    $url = trim($link);
  } else {
    $url = '';
  }
  return ($url !== '' && $url !== '#') ? $url : '';
}

function buffet_feature_page_text($value, $fallback = '')
{
  if (is_string($value)) {
    $value = trim($value);
    return $value !== '' ? $value : $fallback;
  }
  return !empty($value) ? $value : $fallback;
}

function buffet_feature_page_plan_card($item, $template_url, $class = '')
{
  $img = buffet_feature_page_img_url($item['img'] ?? '', $template_url . '/img/common/no_img.jpg');
  $eyebrow = buffet_feature_page_text($item['eyebrow'] ?? '');
  $title = buffet_feature_page_text($item['title'] ?? '');
  $text = buffet_feature_page_text($item['text'] ?? '');
  $link = $item['link_url'] ?? '';
  $link_url = buffet_feature_page_plan_link_url($link);
  $link_text = buffet_feature_page_text($item['link_text'] ?? '', '');
  if (!$link_text && is_array($link) && !empty($link['title'])) {
    $link_text = $link['title'];
  }
  if (!$link_text) {
    $link_text = 'View More';
  }
?>
  <article class="p_feature-page-plan-card<?= $class ? ' ' . esc_attr($class) : ''; ?>">
    <div class="p_feature-page-plan-card__img">
      <img src="<?= esc_url($img); ?>" alt="">
    </div>
    <div class="p_feature-page-plan-card__body">
      <?php if ($eyebrow): ?><p class="p_feature-page-plan-card__eyebrow"><?= esc_html($eyebrow); ?></p><?php endif; ?>
      <?php if ($title): ?><h3 class="p_feature-page-plan-card__ttl"><?= esc_html($title); ?></h3><?php endif; ?>
      <?php if ($text): ?><p class="p_feature-page-plan-card__txt"><?= nl2br(esc_html($text)); ?></p><?php endif; ?>
      <?php if ($link_url): ?>
        <div class="p_feature-page-plan-card__btn">
          <a href="<?= esc_url($link_url); ?>" class="p_feature-page-btn"><?= esc_html($link_text); ?></a>
        </div>
      <?php endif; ?>
    </div>
  </article>
<?php
}
