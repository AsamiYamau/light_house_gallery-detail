<div class="p_menu-archive-cont">
  <div class="inner-block">
    <div class="p_menu-archive-cont__cont">
      <?php
      $scene_section01 = get_field('scene_section01', 'option');
      if (isset($scene_section01)) :
      ?>
        <ul class="c-menu-list ptn_long anm-list">
          <?php foreach ($scene_section01 as $i => $item) :
            $long = ($i == 0) ? 'long' : '';
            $post_type = '';
            $post_type_name = '';
            if ($item->post_type == 'cateling') {
              $post_type = 'cateling';
              $post_type_name = 'ケータリング';
            } else if ($item->post_type == 'delivery') {
              $post_type = 'deli';
              $post_type_name = 'デリバリー';
            }
          ?>
            <li class="num_ico">
              <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                <div class="c-menu-list__img pat-scene">
                  <?php
                  $img_id = get_post_thumbnail_id($item->ID);
                  $img_src = '';
                  if ($img_id) {
                    $img_src = wp_get_attachment_url($img_id);
                  } ?>
                  <img src="<?= $img_src ?>" alt="" />
                </div>
                <div class="c-menu-list__txt-box">
                  <h3 class="c-menu-list__ttl cataling">
                    <?= $item->post_title ?>
                  </h3>
                  <?php
                  $desc01 = get_field('' . $post_type . '_desc01', $item->ID);
                  if (isset($desc01)) :
                  ?>
                    <p class="c-menu-list__cap">
                      <?= $desc01 ?>
                    </p>
                  <?php endif; ?>
                  <div class="c-menu-list__box">
                    <div class="c-price-box cataling">
                      <?php
                      $num = get_field('' . $post_type . '_num', $item->ID);
                      if (isset($num)) :
                      ?>
                        <span class="wrap">
                          <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                        </span>
                      <?php endif; ?>
                      <?php
                      $price_tax = get_field('' . $post_type . '_price_tax', $item->ID);
                      if (isset($price_tax)) :
                      ?>
                        <span class="wrap">
                          <span class="fz3">￥</span>
                          <span class="fz4"><?= $price_tax ?></span>
                        </span>
                      <?php endif; ?>
                      <?php
                      $price = get_field('' . $post_type . '_price', $item->ID);
                      if (isset($price)) :
                      ?>
                        <span class="wrap">
                          <span class="fz5">(税抜¥<span class="fz6"><?= $price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                        </span>
                      <?php endif; ?>
                    </div>
                    <div class="p_menu-archive-cont__btn">
                      <div class="c-view-more bg_img cataling">
                        View More
                      </div>
                    </div>
                  </div>
                  <div class="c-menu-list__tag pat-<?= $post_type ?>"><?= $post_type_name ?></div>
                </div>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

  </div>
</div>