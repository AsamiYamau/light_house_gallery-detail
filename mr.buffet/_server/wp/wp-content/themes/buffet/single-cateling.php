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
          <img src="<?= $template_url; ?>/img/cateling/detail/mv.jpg" alt="" />
        </div>
        <div class="l-mv__txt">
          <div class="inner-block02">
            <h1 class="l-mv__txtbox anm-right">
              <span class="en">Catering Menu</span>
              <span class="ja">ケータリングメニュー</span>
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
              <a href="<?= $home_url; ?>/cateling/" class="c-bread-list__item">ケータリングメニュー</a>
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
              <h2 class="c-mini-ribon-ttl">
                <span class="pc"><?php the_title(); ?></span>
                <span class="sp">
                  <?php the_field('cateling_name_en'); ?><br>
                  <?php the_field('cateling_name_jp'); ?>
                </span>

                <span class="c-mini-ribon-ttl__dec">
                  <span class="c-mini-ribon"></span>
                </span>
              </h2>
              <div class="p_menu-d-top__cont">
                <div class="p_menu-d-top__wrap">
                  <div class="p_menu-d-top__img-area">
                    <?php $foods = get_field('cateling_food'); ?>
                    <?php if ($foods) : ?>
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
                        <?php foreach ($foods as $food) : ?>
                          <li class="c-slider__item">
                            <?php $food_img = $food['cateling_food_img']; ?>
                            <div class="c-slider__img">
                              <img src="<?= $food_img; ?>" alt="<?php if (isset($food['cateling_food_name'])) echo $food['cateling_food_name']; ?>" />
                            </div>
                            <div class="c-slider__txt">
                              <?php if (isset($food['cateling_food_name'])) echo $food['cateling_food_name']; ?>
                            </div>
                          </li>
                        <?php endforeach; ?>
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
                          if($thumb_img): ?>
                          <li>
                            <div class="c-slider-thumbnail__item">
                              <img src="<?= $thumb_img; ?>" alt="<?php the_title(); ?>" />
                            </div>
                          </li>
                          <?php endif; ?>
                          <?php foreach ($foods as $food) : ?>
                            <?php $food_img = $food['cateling_food_img']; ?>
                            <li>
                              <div class="c-slider-thumbnail__item">
                                <img src="<?= $food_img; ?>" alt="<?php if (isset($food['cateling_food_name'])) echo $food['cateling_food_name']; ?>" />
                              </div>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="p_menu-d-top__txt-area">
                    <h3 class="ttl">
                      <?php the_field('cateling_desc01') ?>
                    </h3>
                    <div class="cap">
                      <?php the_field('cateling_desc02') ?>
                    </div>
                    <div class="p_menu-d-top__price">
                      <div class="c-price-box pl-none">
                        <span class="wrap">
                          <span class="fz1">全</span><span class="fz2 adjust"><?php the_field('cateling_num') ?></span><span class="fz1">品</span>
                        </span>
                        <span class="wrap">
                          <span class="fz3 adjust">￥</span><span class="fz4 adjust"><?php echo safe_number_format(get_field('cateling_price_tax')) ?></span>
                        </span>
                        <span class="wrap">
                          <span class="fz5">(税抜¥<span class="fz6"><?php echo safe_number_format(get_field('cateling_price')) ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                        </span>
                      </div>
                      <div class="p_menu-d-top__btn">
                        <a href="<?= $home_url; ?>/contact/?type=mitsumori" class="c-btn02 bg_img">注文はこちら</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="c-menu-name p_menu-d-top__menu">
                  <div class="c-menu-name__ttl">料理名</div>
                  <?php $foods = get_field('cateling_food'); ?>
                  <ul class="c-menu-name-list">
                    <?php foreach ($foods as $food) : ?>
                      <?php if (isset($food['cateling_food_name'])) : ?>
                        <li class="c-menu-name-list__item">
                          <?php echo $food['cateling_food_name']; ?>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="p_menu-d-cont">
        <div class="inner-block">
          <h2 class="c-ttl-ribon anm-up">
            <div class="c-ttl-ribon__en Allura adjust1">Drink plan</div>
            <div class="c-ttl-ribon__ja">ドリンクメニュー</div>
          </h2>
          <div class="p_menu-d-cont__drink anm">
            フリードリンクプランをプラス
          </div>

          <?php
          $drink_plan_args = array(
            'post_type' => array('cateling-drinkplan'),
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'order' => 'ASC',
            'orderby' => 'menu_order'
          );
          $drink_plan_query = new WP_Query($drink_plan_args);
          ?>
          <?php if ($drink_plan_query->have_posts()) : ?>
            <ul class="c-circle-list p_menu-d-cont__list anm-list">
              <?php while ($drink_plan_query->have_posts()) : $drink_plan_query->the_post(); ?>
                <li class="c-circle-list__item">
                  <h3 class="c-circle-list__ttl">
                    <?php the_title(); ?>
                  </h3>
                  <div class="c-circle-list__img">
                    <?php
                    $img_id = get_post_thumbnail_id();
                    $img_src = '';
                    if ($img_id) {
                      $img_src = wp_get_attachment_url($img_id);
                    }
                    ?>
                    <?php if ($img_src) : ?>
                      <img src="<?= $img_src; ?>" alt="" />
                    <?php endif; ?>
                  </div>
                  <div class="c-circle-list__price">
                    <div class="c-price-box">
                      <span class="wrap">
                        <span class="fz1">お一人様</span>
                      </span>
                      <span class="wrap">
                        <?php
                        $price = get_field('cateling-drink-plan-price-tax');
                        if ($price) {
                          $price = safe_number_format($price);
                        }
                        ?>
                        <?php if ($price) : ?>
                          <span class="fz3">￥</span><span class="fz4"><?= $price; ?></span><span class="fz5">(税込)</span>
                        <?php endif; ?>
                      </span>
                    </div>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
          <div class="p_menu-d-cont__btn anm-up">
            <a href="<?= $home_url; ?>/cateling-drink/" class="c-btn02 bg_img ico1">
              ドリンクメニューはこちら
            </a>
          </div>
        </div>
      </section>

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
            <a href="<?= $home_url; ?>/cateling-options/" class="c-btn02 bg_img ico2">
              オプションサービスはこちら
            </a>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>


<?php get_footer(); ?>