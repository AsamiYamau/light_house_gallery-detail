<?php
global $home_url;
global $template_url;

get_header();

?>

<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <div class="l-main__main">
    <main class="outer-block p_menu-d bg_img">
      <section class="l-mv">
        <div class="l-mv__img">
          <img src="<?= $template_url; ?>/img/option/cate_mv.jpg" alt="" />
        </div>
        <div class="l-mv__txt">
          <div class="inner-block02">
            <h1 class="l-mv__txtbox anm-right">
              <span class="en">Optional Services</span>
              <span class="ja">ケータリングメニュー オプションサービス</span>
            </h1>
          </div>
        </div>
      </section>
      <div class="c-bread">
        <div class="inner-block">
          <ul class="c-bread-list">
            <li class="c-bread-list__li">
              <a href="<?= $home_url; ?>/" class="c-bread-list__item">トップページ</a>
            </li>
            <li class="c-bread-list__li">
              <a href="<?= $home_url; ?>/cateling-option/" class="c-bread-list__item">ケータリングメニュー オプションサービス</a>
            </li>
            <li class="c-bread-list__li">
              <span class="c-bread-list__txt"><?php the_title(); ?></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="p_menu-d-top anm-up">
        <div class="inner-block">
          <div class="c-stripe">
            <div class="c-stripe__cont">
              <?php
              $title = get_field('cateling_option_name_custom');
              $title = ($title) ?: get_the_title();
              ?>
              <h2 class="c-mini-ribon-ttl">
                <span class=""><?= $title ?></span>

                <span class="c-mini-ribon-ttl__dec">
                  <span class="c-mini-ribon"></span>
                </span>
              </h2>
              <div class="p_menu-d-top__cont">
                <div class="p_menu-d-top__wrap">
                  <div class="p_menu-d-top__img-area">
                    <?php $cateling_option_img_group = get_field('cateling_option_img_group'); ?>

                    <ul class="c-slider">
                      <?php
                      $thumb = get_the_post_thumbnail_url();
                      $thumb_img = '';
                      if (isset($thumb)) {
                        $thumb_img = $thumb;
                      }
                      if ($thumb_img) :
                      ?>
                        <li class="c-slider__item">
                          <div class="c-slider__img">
                            <img src="<?= $thumb_img; ?>" alt="<?php the_title(); ?>" />
                          </div>
                        </li>
                      <?php endif; ?>

                      <?php if (!empty($cateling_option_img_group[0])) : ?>
                        <?php foreach ($cateling_option_img_group as $item) : ?>
                          <li class="c-slider__item">
                            <?php $cateling_option_img = $item['cateling_option_img']; ?>
                            <div class="c-slider__img">
                              <img src="<?= $cateling_option_img; ?>" alt="" />
                            </div>
                          </li>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </ul>
                    <div class="dot-img"></div>
                    <div class="c-slider-thumbnail-wrap">
                      <div class="c-slider-arrows"></div>
                      <ul class="c-slider-thumbnail">
                        <?php
                        $thumb = get_the_post_thumbnail_url();
                        $thumb_img = '';
                        if (isset($thumb)) {
                          $thumb_img = $thumb;
                        }
                        if ($thumb_img && !empty($cateling_option_img_group[0])): ?>
                          <li>
                            <div class="c-slider-thumbnail__item">
                              <img src="<?= $thumb_img; ?>" alt="<?php the_title(); ?>" />
                            </div>
                          </li>
                        <?php endif; ?>
                        <?php if (!empty($cateling_option_img_group[0])) : ?>
                          <?php foreach ($cateling_option_img_group as $item) : ?>
                            <?php $cateling_option_img = $item['cateling_option_img']; ?>
                            <li>
                              <div class="c-slider-thumbnail__item">
                                <img src="<?= $cateling_option_img; ?>" alt="" />
                              </div>
                            </li>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </ul>
                    </div>

                  </div>


                  <?php
                  $cateling_option_cap = get_field('cateling_option_cap');
                  $cateling_option_desc = get_field('cateling_option_desc');
                  $cateling_option_price = get_field('cateling_option_price');

                  $cateling_option_price_small01 = get_field('cateling_option_price_small01');
                  $cateling_option_price_small02 = get_field('cateling_option_price_small02');
                  $cateling_option_price_under = get_field('cateling_option_price_under');
                  ?>
                  <div class="p_menu-d-top__txt-area">
                    <?php if (!empty($cateling_option_cap)): ?>
                      <h3 class="ttl">
                        <?= nl2br($cateling_option_cap); ?>
                      </h3>
                    <?php endif; ?>

                    <?php if (!empty($cateling_option_desc)): ?>
                      <div class="cap">
                        <?= nl2br($cateling_option_desc); ?>
                      </div>
                    <?php endif; ?>

                    <div class="p_menu-d-top__price">
                      <?php if (!empty($cateling_option_price || $cateling_option_price_small01 || $cateling_option_price_small02 || $cateling_option_price_under)): ?>
                        <div class="c-price-box pl-none">

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

                      <?php endif; ?>
                      <div class="p_menu-d-top__btn">
                        <a href="<?= $home_url; ?>/cateling-option/" class="c-btn02 bg_img">オプション一覧はこちら</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <section class="p_menu-d-cont">
        <div class="inner-block">
          <h2 class="c-ttl-ribon anm-up ptn02">
            <div class="c-ttl-ribon__en Allura adjust2">Optional Services</div>
            <div class="c-ttl-ribon__ja">オプションサービス</div>
          </h2>
          <?php
          $option_service_args = array(
            'post_type' => array('cateling-option'),
            'post_status' => 'publish',
            'posts_per_page' => -1,
            // 自身の投稿は除外
            'post__not_in' => array(get_the_ID()),
            'order' => 'ASC',
            'orderby' => 'menu_order'
          );
          $option_service_query = new WP_Query($option_service_args);
          ?>
          <?php if ($option_service_query->have_posts()) : ?>
            <ul class="c-menu-list mt anm-list anm-list">
              <?php while ($option_service_query->have_posts()) : $option_service_query->the_post(); ?>
                <?php get_template_part('inc/cateling-service-item'); ?>
              <?php endwhile ?>
            </ul>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
          <div class="c-ico-info anm-up">
            <div class="c-ico-info__ttl">アイコンの説明</div>
            <div class="c-ico-info__cont">
              <div class="c-ico-info__box">
                <div class="ico">
                  <img src="<?= $template_url; ?>/img/cateling/detail/ico01.svg" alt="" />
                </div>
                <div class="txt">シェフが目の前で調理します。</div>
              </div>
              <div class="c-ico-info__box">
                <div class="ico">
                  <img src="<?= $template_url; ?>/img/cateling/detail/ico02.svg" alt="" />
                </div>
                <div class="txt">温かいメニューです。</div>
              </div>
            </div>
          </div>
          <div class="p_menu-d-cont__btn anm-up">
            <a href="<?= $home_url; ?>/cateling-option/" class="c-btn02 bg_img ico2">
              オプションサービスはこちら
            </a>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>


<?php get_footer(); ?>