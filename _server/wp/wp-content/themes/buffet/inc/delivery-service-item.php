<?php
global $template_url;
global $home_url;
?>
<li>
  <div class="c-menu-list__item pb detail">
    <?php
    $icon_select = get_field('deli_option_icon');
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
      if($thumb) {
        $thumb_img = $thumb;
      }else {
        $thumb_img = $template_url.'/img/common/no_img.jpg';
      }
      if($thumb_img):
    ?>
    <div class="c-menu-list__img">
      <img src="<?= $thumb_img ?>" alt="" />
    </div>
    <?php endif; ?>
    <div class="c-menu-list__txt-box mt-small deli">
      <?php
      $title = get_field('deli_option_name_custom');
      $title = ($title) ?: get_the_title();
      ?>
      <h3 class="c-menu-list__ttl deli">
        <?= $title; ?>
      </h3>
      <?php if (get_field('deli_option_desc')) : ?>
        <p class="c-menu-list__cap">
          <?php echo nl2br(get_field('deli_option_desc')); ?>
        </p>
      <?php endif; ?>
      <div class="c-menu-list__box">
        <div class="c-price-box deli">
          <span class="wrap">
            <?php
            $price = get_field('deli_option_price');
            if ($price) {
              $price = safe_number_format($price);
            }
            ?>
            <?php if ($price) : ?>
              <span class="fz3">￥</span><span class="fz4"><?= $price; ?></span>
            <?php endif; ?>
          </span>
          <span class="wrap">
            <span class="fz5">(税込)</span>
          </span>
        </div>
      </div>
    </div>
  </div>
</li>