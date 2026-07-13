<?php
global $template_url;
global $home_url;

?>

<div class="l-sidebar <?php if (isDelivery()) echo 'deli'; ?>">
  <div class="l-sidebar__wrap">
    <div class="l-sidebar__logo pc">
      <a class="l-sidebar-logo" href="<?= $home_url; ?>/">
        <div class="l-sidebar-logo__img-wrap">
          <img class="l-sidebar-logo__img" src="<?= $template_url; ?>/img/common/tokyo-logo-white.png" alt="Mr.BUFFET">
        </div>
      </a>
    </div>

    <div class="l-sidebar__list">
      <ul class="nav-list01">
        <li class="nav-list01__li js-left-btn">
          <div class="nav-list01__item">
            <div class="nav-list01__jp">
              ケータリングメニュー
            </div>
            <div class="nav-list01__en Allura c-gold01">
              Cateling Menu
            </div>
          </div>
          <div class="nav-sub">
            <div class="nav-sub__inner">
              <div class="nav-sub__ttl">
                <div class="nav-sub-ttl">
                  <div class="nav-sub-ttl__jp">
                    ケータリング メニュー
                  </div>
                  <div class="nav-sub-ttl__en Allura c-gold01">
                    Catering Menu
                  </div>
                </div>
              </div>
              <div class="nav-sub__item">
                <ul class="nav-sub-list">
                  <li>
                    <a class="nav-sub-list__item" href="<?= $home_url; ?>/cateling/">
                      スタンダードプラン
                    </a>
                  </li>
                  <li>
                    <a class="nav-sub-list__item" href="<?= $home_url; ?>/cateling-drink/">
                      ドリンクプラン<br>
                      （飲み放題・単品）
                    </a>
                  </li>
                  <li>
                    <a class="nav-sub-list__item" href="<?= $home_url; ?>/cateling-option/">
                      オプションサービス
                    </a>
                  </li>
                  <?php
                  $option_cats = get_terms('tax_option');
                  ?>
                  <?php if (!empty($option_cats)) : ?>
                    <?php $link = ''; ?>

                    <?php foreach ($option_cats as $i => $cat) {
                      //$catのスラッグを取得
                      $link = $cat->slug;
                      if($link == 'option02') {
                        $link = 'option02';
                        break;
                      }

                    }
                    ?>
                      <li>
                        <a class="nav-sub-list__item" href="<?= $home_url; ?>/cateling-options/#<?= $link ?>">
                          Liveケータリング
                        </a>
                      </li>

                  <?php endif; ?>
                </ul>
                <div class="c-series-banner nav-sub-series">
                  <?php
                  $tax_cateling = get_terms('tax_cateling');
                  if (!empty($tax_cateling)):
                  ?>
                    <?php
                    foreach ($tax_cateling as $i => $tax):
                      $term_name = $tax->name;
                      $en_name = get_term_meta($tax->term_id, 'tax_cateling-name-en', true);
                      $term_img = get_term_meta($tax->term_id, 'tax_cateling-bg', true);
                      $link = 'cate_cat' . $i + 1;
                      $discription = $tax->description;

                      $img = '';
                      if (!empty($term_img)) {
                        $img = wp_get_attachment_url($term_img);
                      }
                    ?>
                      <div class="c-series-banner__item">
                        <a href="<?= $home_url ?>/cateling/#<?= $link ?>" class="c-series-banner__link bg_img side">
                          <?php if (!empty($en_name)): ?>
                            <div class="c-series-banner__en mincho"><?= $en_name ?></div>
                          <?php endif; ?>
                          <?php if (!empty($discription)): ?>
                            <div class="c-series-banner__cap">
                              <?= $discription ?>
                            </div>
                          <?php endif; ?>
                          <?php if (!empty($term_img)): ?>
                            <div class="c-series-banner__ja"><?= $term_name ?></div>
                          <?php endif; ?>
                        </a>
                        <?php if (!empty($term_img)): ?>
                          <div class="c-series-banner__img">
                            <img src="<?= $img ?>" alt="">
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>

                </div>
              </div>
              <div class="nav-sub__item">
                <div class="nav-sub-ttl02">
                  <div class="nav-sub-ttl02__ttl">
                    ケータリングプラン
                  </div>
                </div>
                <?php
                $cateling_args = array(
                  'post_type' => array('cateling'),
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'order' => 'ASC',
                  'orderby' => 'menu_order'
                );
                $cateling_query = new WP_Query($cateling_args);
                ?>
                <?php if ($cateling_query->have_posts()) : ?>
                  <ul class="nav-sub-list">
                    <?php while ($cateling_query->have_posts()) : $cateling_query->the_post(); ?>
                      <li>
                        <a href="<?php the_permalink(); ?>" class="nav-sub-list__item">
                          <?php
                          $en = get_field('cateling_name_en');
                          $jp = get_field('cateling_name_jp');
                          $num = get_field('cateling_num');
                          $price = get_field('cateling_price_tax');
                          if ($price) {
                            $price = safe_number_format($price);
                          }
                          ?>
                          【<?= $num ?>品】 <?= $price ?>円<br>
                          <?php echo $en; ?> <?php echo $jp; ?>
                        </a>
                      </li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </div>

            </div>
          </div>
        </li>
        <li class="nav-list01__li js-left-btn">
          <div class="nav-list01__item">
            <div class="nav-list01__jp">
              オードブル<br>
              デリバリーメニュー
            </div>
            <div class="nav-list01__en Allura c-gold01">
              Delivery Menu
            </div>
          </div>
          <div class="nav-sub deli">
            <div class="nav-sub__inner">
              <div class="nav-sub__ttl">
                <div class="nav-sub-ttl">
                  <div class="nav-sub-ttl__jp">
                    オードブル<br>デリバリーメニュー
                  </div>
                  <div class="nav-sub-ttl__en Allura c-gold01">
                    Delivery Menu
                  </div>
                </div>
              </div>
              <div class="nav-sub__item">
                <ul class="nav-sub-list">
                  <li>
                    <a class="nav-sub-list__item" href="<?= $home_url; ?>/delivery/">
                      オードブル<br>デリバリープラン一覧
                    </a>
                  </li>
                  <li>
                    <a class="nav-sub-list__item" href="<?= $home_url; ?>/delivery-drink/">
                      オードブルデリバリードリンクプラン
                    </a>
                  </li>
                  <li>
                    <a class="nav-sub-list__item" href="<?= $home_url; ?>/delivery-options/">
                      オプションフード
                    </a>
                  </li>
                </ul>

                <?php
                $tax_delivery = get_terms('tax_delivery');
                if(!empty($tax_delivery)):
                  ?>
                  <div class="c-series-banner nav-sub-series">
                    <?php
                    foreach($tax_delivery as $i => $tax):
                      $term_name = $tax->name;
                      $en_name = get_term_meta($tax->term_id, 'tax_deli-name-en', true);
                      $term_img = get_term_meta($tax->term_id, 'tax_deli-bg', true);
                      $link = 'deli_cat'.$i + 1;
                      $discription = $tax->description;

                      $img = '';
                      if(!empty($term_img)){
                        $img = wp_get_attachment_url($term_img);
                      }
                      ?>
                      <div class="c-series-banner__item">
                        <a href="<?= $home_url ?>/delivery/#<?= $link ?>" class="c-series-banner__link bg_img deli side">
                          <?php if(!empty($en_name)): ?>
                            <div class="c-series-banner__en mincho deli"><?= $en_name ?></div>
                          <?php endif; ?>
                          <div class="c-series-banner__cap deli">
                            <?= $discription ?>
                          </div>
                          <div class="c-series-banner__ja deli"><?= $term_name ?></div>
                        </a>
                        <div class="c-series-banner__img">
                          <img src="<?= $img ?>" alt="">
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>

              </div>

            </div>
          </div>
        </li>
        <li class="nav-list01__li">
          <div class="nav-list01__item">
            <a href="<?= $home_url; ?>/budget/" class="nav-list01__item scene">
              <div class="nav-list01__jp">
                予算から選ぶ
              </div>
              <div class="nav-list01__en Allura c-gold01">
                Budget
              </div>
            </a>
          </div>
        </li>
        <li class="nav-list01__li">
          <div class="nav-list01__item">
            <a href="<?= $home_url; ?>/scene/" class="nav-list01__item scene">
              <div class="nav-list01__jp">
                シーンから選ぶ
              </div>
              <div class="nav-list01__en Allura c-gold01">
                Scene
              </div>
            </a>
          </div>
        </li>
      </ul>
    </div>
    <div class="l-sidebar__cta pc">
      <div class="l-sidebar-cta">
        <div class="l-sidebar-cta__cap">
          お気軽にご相談・お電話ください
        </div>
        <div class="l-sidebar-cta__tel">
          <div class="l-sidebar-cta__tel-top">
            <a href="tel:0120507286" class="l-sidebar-cta__tel-wrap">
              <div class="l-sidebar-cta__tel-icon">
                <img src="<?= $template_url; ?>/img/common/icon-tel.svg" alt="" class="cate">
                <!-- <img src="<?= $template_url; ?>/img/common/icon-tel-deli.svg" alt="" class="deli"> -->
              </div>
              <div class="l-sidebar-cta__tel-num">
                0120-507-286
              </div>
            </a>
          </div>
          <div class="l-sidebar-cta__tel-bottom">
            営業時間 09:00~19:00
          </div>
        </div>
        <div class="l-sidebar-cta__btn">
          <a class="c-contact-btn" href="<?= $home_url; ?>/contact/">
            <div class="c-contact-btn__mail">
              <img src="<?= $template_url; ?>/img/common/icon-mail.svg" alt="" class="cate">
              <!-- <img src="<?= $template_url; ?>/img/common/icon-mail-deli.svg" alt="" class="deli"> -->
            </div>
            <div class="c-contact-btn__txt">
              お問い合わせ<br>
              ご注文はこちら
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="l-sidebar__banner">
      <a href="<?= $home_url ?>/difference/">
        <img src="<?= $template_url ?>/img/common/deff_banner.jpg" alt="">
      </a>
    </div>
    <div class="l-sidebar__img01">
      <img src="<?= $template_url; ?>/img/common/sidebar-img01.png" alt="">
    </div>

  </div>

</div>