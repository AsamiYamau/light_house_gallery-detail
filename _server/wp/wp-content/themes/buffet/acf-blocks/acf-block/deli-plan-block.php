<?php
global $template_url;

//カスタムフィールド名link-card
$deli_plan_group = (get_field('block_deli_plan_group')) ?: [];

?>

<!-- p-link-block -->
<?php if ($deli_plan_group[0]) : ?>
  <ul class="c-menu-list block-item">
    <?php foreach($deli_plan_group as $item): 
      ?>
    <li>
      <a href="<?= get_the_permalink($item['block_deli_plan_item']->ID) ?>" class="c-menu-list__item long">
        <div class="c-menu-list__img">
          <?php
          $img_id = get_post_thumbnail_id($item['block_deli_plan_item']->ID);
          $img_src = '';
          if ($img_id) {
            $img_src = wp_get_attachment_url($img_id);
          } ?>
          <img src="<?= $img_src ?>" alt="" />
        </div>
        <div class="c-menu-list__txt-box mt-small">
          <h3 class="c-menu-list__ttl">
          <?= $item['block_deli_plan_item']->post_title ?>
          </h3>
          <?php
            $desc01 = get_field('deli_desc01', $item['block_deli_plan_item']->ID);
            if (isset($desc01)) :
            ?>
          <p class="c-menu-list__cap">
          <?= $desc01 ?>  
          </p>
          <?php endif; ?>
          <div class="c-menu-list__box">
            <div class="c-price-box">
            <?php
              $num = get_field('deli_num', $item['block_deli_plan_item']->ID);
              if (isset($num)) :
              ?>
              <span class="wrap">
                <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
              </span>
              <?php endif; ?>
              <?php
                $price_tax = get_field('deli_price_tax', $item['block_deli_plan_item']->ID);
                if ($price_tax) {
                  $price_tax = safe_number_format($price_tax);
                }
                if (isset($price_tax)) :
                ?>
              <span class="wrap">
                <span class="fz3">￥</span><span class="fz4"><?= $price_tax; ?></span>
              </span>
              <?php endif; ?>
              <?php
                $price = get_field('deli_price', $item['block_deli_plan_item']->ID);
                if (isset($price)) :
                ?>
              <span class="wrap">
                
                <span class="fz5">(税抜¥<span class="fz6"><?= $price; ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
              </span>
              <?php endif; ?>
            </div>
            <div class="p_menu-archive-cont__btn">
              <div class="c-view-more bg_img">View More</div>
            </div>
          </div>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
<!-- /p-link-block -->