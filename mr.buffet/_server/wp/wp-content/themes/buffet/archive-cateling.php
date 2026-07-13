<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
global $home_url;
global $template_url;

get_header();
?>
<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <div class="l-main__main">
    <main class="outer-block p_menu-archive bg_img">
      <div class="p_menu-archive-mv">
        <div class="p_menu-archive-mv__img">
          <img src="<?= $template_url; ?>/img/cateling/mv.jpg" alt="" />
        </div>
        <div class="p_menu-archive-mv__txt anm">
          <img src="<?= $template_url; ?>/img/cateling/mv_txt.png" alt="" />
        </div>
      </div>
      <div class="c-bread">
        <div class="inner-block">
          <ul class="c-bread-list">
            <li class="c-bread-list__li">
              <a href="<?= $home_url; ?>/" class="c-bread-list__item">トップページ</a>
            </li>
            <li class="c-bread-list__li">
              <span class="c-bread-list__txt">ケータリングメニュー</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="p_menu-archive__cap anm">
        <div class="inner-block">
          お料理をお届けするだけはなく、<br class="sp">基本的にはスタッフが常駐し、<br />
          セッティングやドリンクの提供・<br class="sp">後片付けをスタッフが行います。
        </div>
      </div>

      <div class="p_menu-archive-ankor">
        <div class="inner-block">
          <?php
          $tax_cateling = get_terms('tax_cateling');
          if (!empty($tax_cateling)):
          ?>
            <div class="c-series-banner  p_menu-archive-ankor__banner">
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
                $no_mt = ($i == 0) ? '' : 'no_mt';
              ?>
                <div class="c-series-banner__item <?= $no_mt ?>">
                  <a href="#<?= $link ?>" class="c-series-banner__link bg_img side">
                    <?php if (!empty($en_name)): ?>
                      <div class="c-series-banner__en mincho"><?= $en_name ?></div>
                    <?php endif; ?>
                    <?php if (!empty($discription)): ?>
                      <div class="c-series-banner__cap">
                        <?= $discription ?>
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($term_name)): ?>
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

            </div>
          <?php endif; ?>
        </div>
      </div>

      <section class="p_menu-archive__cont">
        <!-- <h2 class="p_menu-archive-kv">
          <span class="p_menu-archive-kv__img">
            <img src="<?= $template_url; ?>/img/cateling/kv.jpg" alt="" />
          </span>
          <span class="p_menu-archive-kv__ttl anm">
            <span class="Allura en">Catering Plans</span>
            <span class="ja">ケータリング　プランズ</span>
          </span>
        </h2> -->

        <h1 class="l-kv kv">
          <span class="l-kv__img">
            <img src="<?= $template_url; ?>/img/cateling/kv.jpg" alt="" />
          </span>
          <span class="l-kv__txt-box anm txt-box">
            <span class="Allura en p_menu-archive__en">Catering Plans</span>
            <span class="ja p_menu-archive__ja">ケータリング　プランズ</span>
          </span>
        </h1>




        <div class="p_menu-archive-cont">
          <div class="inner-block">
            <div class="p_menu-archive-cont__cont">
              <?php
              $cate_ninki = get_field('popular_cateling_menu', 'option');

              ?>
              <ul class="c-menu-list ptn_long anm-list">
                <?php foreach ($cate_ninki as $i => $item) :
                  $long = ($i == 0) ? 'long' : '';
                ?>
                  <li class="num_ico">
                    <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                      <div class="c-menu-list__img">
                        <?php
                        $img_id = get_post_thumbnail_id($item->ID);
                        $img_src = '';
                        if ($img_id) {
                          $img_src = wp_get_attachment_url($img_id);
                        } ?>
                        <img src="<?= $img_src ?>" alt="" />
                      </div>
                      <div class="c-menu-list__txt-box">
                        <h2 class="c-menu-list__ttl">
                          <?= $item->post_title ?>
                        </h2>
                        <?php
                        $cateling_desc01 = get_field('cateling_desc01', $item->ID);
                        if (isset($cateling_desc01)) :
                        ?>
                          <p class="c-menu-list__cap">
                            <?= $cateling_desc01 ?>
                          </p>
                        <?php endif; ?>
                        <div class="c-menu-list__box">
                          <div class="c-price-box">
                            <?php
                            $cateling_num = get_field('cateling_num', $item->ID);
                            if (isset($cateling_num)) :
                            ?>
                              <span class="wrap">
                                <span class="fz1">全</span><span class="fz2 adjust"><?= $cateling_num ?></span><span class="fz1">品</span>
                              </span>
                            <?php endif; ?>
                            <?php
                            $cateling_price_tax = get_field('cateling_price_tax', $item->ID);
                            if ($cateling_price_tax) {
                              $cateling_price_tax = safe_number_format($cateling_price_tax);
                            }
                            if (isset($cateling_price_tax)) :
                            ?>
                              <span class="wrap">
                                <span class="fz3 adjust">￥</span><span class="fz4 adjust"><?= $cateling_price_tax ?></span><br class="sp">
                              </span>
                            <?php endif; ?>
                            <?php
                            $cateling_price = get_field('cateling_price', $item->ID);
                            if ($cateling_price) {
                              $cateling_price = safe_number_format($cateling_price);
                            }
                            if (isset($cateling_price)) :
                            ?>
                              <span class="wrap">
                                <span class="fz5">(税抜¥<span class="fz6"><?= $cateling_price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
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

            </div>

            <?php
            $cateling_cats = get_terms('tax_cateling');
            ?>
            <?php foreach ($cateling_cats as $i => $cat) :
              $link = 'cate_cat'.$i + 1;
              
            ?>
              <div class="p_menu-archive-cont__cont" id="<?= $link ?>">
                <div class="c-ttl-ribon anm-up">
                  <div class="c-ttl-ribon__en Allura"><?php the_field('tax_cateling-name-en', $cat); ?></div>
                  <h2 class="c-ttl-ribon__ja"><?= $cat->name ?></h2>
                </div>
                <?php
                $cateling_category_args = array(
                  'post_type' => array('cateling'),
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'order' => 'ASC',
                  'orderby' => 'menu_order',
                  'tax_query' => array(
                    'relation' => 'AND',
                    array(
                      'taxonomy' => 'tax_cateling',
                      'field' => 'term_id',
                      'terms' => $cat->term_id
                    )
                  ),
                );
                $cateling_category_query = new WP_Query($cateling_category_args);
                ?>
                <?php if ($cateling_category_query->have_posts()) : ?>
                  <ul class="c-menu-list mt anm-list">
                    <?php while ($cateling_category_query->have_posts()) : $cateling_category_query->the_post(); ?>
                      <?php get_template_part('inc/cateling-item'); ?>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <div class="p_menu-archive__bottom">
        <ul class="p_menu-archive-bottom">
          <li>
            <a href="<?= $home_url; ?>/cateling-drink/" class="p_menu-archive-bottom__item">
              <div class="p_menu-archive-bottom__img">
                <img src="<?= $template_url; ?>/img/cateling/drink.jpg" alt="">
              </div>
              <div class="p_menu-archive-bottom__txt">
                <span class="txt01">ケータリングメニュー</span>
                <span class="txt02">ドリンクプラン</span>
                <span class="txt03 Allura">Drink plan</span>
              </div>
              <div class="p_menu-archive-bottom__btn">
                <div class="c-view-more bg_img col2">View More</div>
              </div>
            </a>
          </li>
          <li>
            <a href="<?= $home_url; ?>/cateling-options/" class="p_menu-archive-bottom__item">
              <div class="p_menu-archive-bottom__img">
                <img src="<?= $template_url; ?>/img/cateling/option.jpg" alt="">
              </div>
              <div class="p_menu-archive-bottom__txt">
                <span class="txt01">ケータリングメニュー</span>
                <span class="txt02">オプションサービス</span>
                <span class="txt03 Allura">Optional Services</span>
              </div>
              <div class="p_menu-archive-bottom__btn">
                <div class="c-view-more bg_img col2">View More</div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </main>
  </div>
</div>
<?php
get_footer();
