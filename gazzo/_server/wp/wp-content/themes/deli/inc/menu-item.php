<?php
global $template_url;
global $home_url;

?>
<li class="c-menu-item <?php echo has_term('hokahoka', 'tax_single') ? 'is-hokahoka' : ''; ?>">
  <div class="c-menu-item-wrapper">
    <?php
    $thumb = '';
    if (has_post_thumbnail()) {
      $thumb = get_the_post_thumbnail_url();
    } else {
      $thumb = $template_url . '/img/common/no_img.jpg';
    }

    ?>
    <div
      class="c-menu-item-image-wrapper">
      <img
        src="<?= $thumb; ?>"
        alt=""
        class="c-menu-item-image" />
    </div>
    <div class="c-menu-item-details">
      <h3 class="c-menu-item-name">
        <?= the_title(); ?>
      </h3>
      <?php
      $menu_volume = SCF::get('menu_volume');
      $menu_volume_front = SCF::get('menu_volume_font');
      $menu_volume_after = SCF::get('menu_volume_after');
      if (!empty($menu_volume)):
        ?>
        <!-- <p class="c-menu-item-serving">
          <?php if($menu_volume_front): ?>
          <span class="c-menu-item-serving-unit"><?php echo $menu_volume_front; ?></span>
          <?php endif; ?>
          <span class="c-menu-item-serving-people"><?= $menu_volume; ?></span>
          <?php if($menu_volume_after): ?>
          <span class="c-menu-item-serving-unit"><?php echo $menu_volume_after; ?></span>
          <?php endif; ?>
        </p> -->
      <?php endif; ?>
      <?php
      $menu_num = SCF::get('menu_num');
      if (!empty($menu_num)):
        ?>
        <p class="c-menu-item-serving">
                      <span
                        class="c-menu-item-serving-unit">全</span>
          <span
            class="c-menu-item-serving-people">
                        <?= $menu_num; ?>
                      </span>
          <span
            class="c-menu-item-serving-unit">品</span>
        </p>
      <?php endif; ?>
      <?php
      $menu_price = SCF::get('menu_price');
      if (!empty($menu_price)):
        $menu_price = deli_format_price($menu_price);
        ?>
        <p
          class="c-menu-item-price__wrapper">
                      <span
                        class="c-menu-item-price">
                        <?= $menu_price; ?>
                      </span>
          <span
            class="c-menu-item-price-currency">円</span>
        </p>
      <?php endif; ?>

      <div>
        <?php $product_id = SCF::get('menu_product_id'); ?>
        <?php set_query_var('product_id',$product_id); ?>
        <?php get_template_part('delicart_inc/add_cart'); ?>
      </div>

      <a
        href="<?php the_permalink(); ?>"
        class="c-menu-item-details-link">詳しく見る</a>
    </div>
  </div>
</li>
