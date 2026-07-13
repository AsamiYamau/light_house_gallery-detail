<?php
global $home_url;
global $template_url;

// タクソノミーページ
if (is_tax('tax_collection')) {

  $term = get_queried_object();
  $term_id = $term->term_id;

  $ja_ttl = $term->name;

  $en_ttl = SCF::get_term_meta($term_id, 'tax_collection', 'en_ttl');
  $thumbnail_id = SCF::get_term_meta($term_id, 'tax_collection', 'thumbnail');
  $catch = SCF::get_term_meta($term_id, 'tax_collection', 'catch');
  $introduction = SCF::get_term_meta($term_id, 'tax_collection', 'introduction');

   $thumbnail = $template_url . '/img/common/dummy.jpg';

  if (!empty($thumbnail_id)) {
    $thumbnail = wp_get_attachment_image_url($thumbnail_id, 'full');
  }

} 
?>

<section class="p_service-mv">
  <div class="inner-block">

    <div class="p_guide-bread">
      <ul class="c-bread">
        <li class="c-bread__item">
          <a href="<?= esc_url($home_url) ?>/">TOP</a>
        </li>

        <?php if (is_tax('tax_collection')) : ?>

          <li class="c-bread__item">
            <a href="<?= $home_url ?>/collection/">
              BONBONNIEREコレクション
            </a>
          </li>

          <li class="c-bread__item">
            <?= esc_html($ja_ttl) ?>
          </li>

        <?php else : ?>

          <li class="c-bread__item">
            BONBONNIEREコレクション
          </li>

        <?php endif; ?>

      </ul>
    </div>

    <h1 class="c-ttl02 ptn_orange">
      <span class="dec">
        <img src="<?= esc_url($template_url) ?>/img/common/kuma-dec01.svg" alt="">
      </span>

        <p class="en">Bonbonniere Collection</p>

      <div class="ja">コレクション</div>
    </h1>

    <?php if(is_tax('tax_collection')) : ?>
    <div class="p_service-mv__box01">

      <?php if (!empty($thumbnail)) : ?>
        <div class="p_service-mv__left">
          <img src="<?= esc_url($thumbnail) ?>" alt="<?= esc_attr($ja_ttl) ?>">
          <img src="<?= esc_url($template_url) ?>/img/common/crown-dec02.svg" class="mv-dec" alt="">
        </div>
      <?php endif; ?>

      <div class="p_service-mv__right">

        <div class="c-ttl03 u-mt" style="--mt-pc: 20px;--mt-sp: 10px">
          <h2 class="ja"><?= esc_html($ja_ttl) ?></h2>

          <?php if (!empty($en_ttl)) : ?>
            <p class="en poppins"><?= esc_html($en_ttl) ?></p>
          <?php endif; ?>
        </div>

        <?php if (!empty($catch)) : ?>
          <p class="p_service-mv__txt01">
            <?= wp_kses_post(nl2br($catch)) ?>
          </p>
        <?php endif; ?>

        <?php if (!empty($introduction)) : ?>
          <p class="p_service-mv__txt02">
            <?= nl2br(esc_html($introduction)) ?>
          </p>
        <?php endif; ?>

      </div>

    </div>
    <?php endif; ?>
  </div>
</section>