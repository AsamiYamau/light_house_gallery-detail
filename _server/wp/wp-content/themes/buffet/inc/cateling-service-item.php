<?php
global $template_url;
global $home_url;
?>
<li>
  <a href="<?php the_permalink(); ?>" class="c-menu-list__item detail">
    <?php
    $icon_select = get_field('cateling_option_icon');
    $icon_arr = [];
    if ($icon_select && in_array('warm', $icon_select)) {
      // 暖かい
      $icon_arr[] = $template_url . '/img/cateling/detail/ico02.svg';
    }
    if ($icon_select && in_array('chef', $icon_select)) {
      // シェフが目の前で料理
      $icon_arr[] = $template_url . '/img/cateling/detail/ico01.svg';
    }
    ?>
    <?php if ($icon_arr) : ?>
      <div class="ico">
        <?php foreach ($icon_arr as $icon) : ?>
          <img src="<?= $icon; ?>" alt="">
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php
    $thumb = get_the_post_thumbnail_url();
    $thumb_img = '';
    if ($thumb) {
      $thumb_img = $thumb;
    } else {
      $thumb_img = $template_url . '/img/common/no_img.jpg';
    }
    if ($thumb_img):
    ?>
      <div class="c-menu-list__img">
        <img src="<?= $thumb_img ?>" alt="" />
      </div>
    <?php endif; ?>
    <div class="c-menu-list__txt-box mt-small">
      <?php
      $title = get_field('cateling_option_name_custom');
      $title = ($title) ?: get_the_title();
      ?>
      <h3 class="c-menu-list__ttl">
        <?= $title; ?>
      </h3>
      <?php if (get_field('cateling_option_cap')) : ?>
        <p class="c-menu-list__cap">
          <?php echo nl2br(get_field('cateling_option_cap')); ?>
        </p>
      <?php endif; ?>
      <?php #if (get_field('cateling_option_desc')) : ?>
        <!-- <p class="c-menu-list__cap"> -->
          <?php #echo nl2br(get_field('cateling_option_desc')); ?>
        <!-- </p> -->
      <?php #endif; ?>
      <div class="c-menu-list__box">
        <?php
        $cateling_option_price = get_field('cateling_option_price');
        $cateling_option_price_small01 = get_field('cateling_option_price_small01');
        $cateling_option_price_small02 = get_field('cateling_option_price_small02');
        $cateling_option_price_under = get_field('cateling_option_price_under');
        ?>
        <div class="c-price-box">

          <?php if (!empty($cateling_option_price_small01)): ?>
            <span class="wrap">
              <span class="fz3"><?= $cateling_option_price_small01 ?></span>
            </span>
          <?php endif; ?>
          <?php if (!empty($cateling_option_price)): ?>
            <span class="wrap">
              <span class="fz4"><?= safe_number_format($cateling_option_price) ?></span>
            </span>
          <?php endif; ?>
          <?php if (!empty($cateling_option_price_small02)): ?>
            <span class="wrap">
              <span class="fz1"><?= $cateling_option_price_small02 ?></span>
            </span>
          <?php endif; ?>
        </div>
        <?php if (!empty($cateling_option_price_under)): ?>
          <div class="c-price-box__under">
            <?= $cateling_option_price_under ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="p_menu-archive-cont__btn">
        <div class="c-view-more bg_img">View More</div>
      </div>
    </div>
  </a>
</li>