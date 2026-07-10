<?php
global $template_url;
global $home_url;
?>
<li>
  <a href="<?php the_permalink(); ?>" class="c-menu-list__item">
    <div class="c-menu-list__img">
      <?php
      $img_id = get_post_thumbnail_id();
      $img_src = '';
      if ($img_id) {
        $img_src = wp_get_attachment_url($img_id);
      }
      ?>
      <img src="<?= $img_src; ?>" alt="<?php the_title(); ?>" />
    </div>
    <div class="c-menu-list__txt-box mt-small">
      <h3 class="c-menu-list__ttl deli">
        <?php the_title(); ?>
      </h3>
      <p class="c-menu-list__cap">
        <?php the_field('deli_desc01'); ?>
      </p>
      <div class="c-menu-list__box">
        <div class="c-price-box deli">
          <span class="wrap">
            <span class="fz1">全</span><span class="fz2"><?php the_field('deli_num'); ?></span><span class="fz1">品</span>
          </span>
          <span class="wrap">
            <?php
            $price_tax = get_field('deli_price_tax');
            if ($price_tax) {
              $price_tax = safe_number_format($price_tax);
            }
            ?>
            <span class="fz3">￥</span><span class="fz4"><?= $price_tax; ?></span>
          </span>
          <span class="wrap">
            <?php
            $price = get_field('deli_price');
            if ($price) {
              $price = safe_number_format($price);
            }
            ?>
            <span class="fz5">(税抜¥<span class="fz6"><?= $price; ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
          </span>
        </div>
        <div class="p_menu-archive-cont__btn">
          <div class="c-view-more bg_img deli">View More</div>
        </div>
      </div>
    </div>
  </a>
</li>