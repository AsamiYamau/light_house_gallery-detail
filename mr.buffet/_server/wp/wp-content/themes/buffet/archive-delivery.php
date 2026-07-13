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
    <main class="outer-block p_menu-archive bg_img deli">
      <div class="p_menu-archive-mv">
        <div class="p_menu-archive-mv__img">
          <img src="<?= $template_url; ?>/img/delivery/mv.jpg" alt="" />
        </div>
        <div class="p_menu-archive-mv__txt anm">
          <img src="<?= $template_url; ?>/img/delivery/mv_txt.png" alt="" />
        </div>
      </div>
      <div class="c-bread">
        <div class="inner-block">
          <ul class="c-bread-list">
            <li class="c-bread-list__li">
              <a href="<?= $home_url; ?>/" class="c-bread-list__item">トップページ</a>
            </li>
            <li class="c-bread-list__li">
              <span class="c-bread-list__txt">オードブルデリバリーメニュー</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="p_menu-archive__cap anm deli">
        <div class="inner-block">
          <div class="txt">
            おしゃれな使い捨て容器に綺麗に盛り付けたオードブルをお届けします。<br />
            基本的にスタッフは常駐せず、お気軽にパーティをお楽しみいただきます。
          </div>
          <span class="c-mini-ribon-dec">
            <span class="c-mini-ribon deli"></span>
          </span>
        </div>
      </div>

      <div class="p_menu-archive-ankor">
          <div class="inner-block">
            <?php
              $tax_delivery = get_terms('tax_delivery');
              if(!empty($tax_delivery)):
            ?>
            <div class="c-series-banner p_menu-archive-ankor__banner">
              <?php 
                foreach($tax_delivery as $i => $tax):
                $link = 'deli_cat'.$i+1;
                $term_name = $tax->name;
                $en_name = get_term_meta($tax->term_id, 'tax_deli-name-en', true);
                $term_img = get_term_meta($tax->term_id, 'tax_deli-bg', true);
                $discription = $tax->description;

                $img = '';
                if (!empty($term_img)) {
                  $img = wp_get_attachment_url($term_img);
                }
                $no_mt = ($i == 0) ? '' : 'no_mt';
                ?>
              <div class="c-series-banner__item <?= $no_mt ?>">
                <a href="#<?= $link ?>" class="c-series-banner__link bg_img deli">
                  <?php if(!empty($en_name)): ?>
                  <div class="c-series-banner__en mincho deli"><?= $en_name ?></div>
                  <?php endif; ?>
                  <?php if(!empty($discription)): ?>
                  <div class="c-series-banner__cap deli">
                    <?= $discription ?>
                  </div>
                  <?php endif; ?>
                  <?php if(!empty($term_name)): ?>
                  <div class="c-series-banner__ja deli"><?= $term_name ?></div>
                  <?php endif; ?>
                </a>
                <?php if(!empty($img)): ?>
                <div class="c-series-banner__img">
                  <img src="<?= $img ?>" alt="" />
                </div>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>



      <section class="p_menu-archive__cont">
        <h1 class="l-kv kv">
          <span class="l-kv__img">
            <img src="<?= $template_url; ?>/img/cateling/kv.jpg" alt="" />
          </span>
          <span class="l-kv__txt-box anm txt-box">
            <span class="Allura en p_menu-archive__en">Delivery Plans</span>
            <span class="ja p_menu-archive__ja">オードブルデリバリー　プランズ</span>
          </span>
        </h1>


        <div class="p_menu-archive-cont">
          <div class="inner-block">
            <div class="p_menu-archive-cont__cont">
              <?php
              $deli_ninki = get_field('popular_delivery_menu', 'option');
              if (!empty($deli_ninki[0])) :
              ?>
                <ul class="c-menu-list ptn_long anm-list">
                  <?php foreach ($deli_ninki as $i => $item) :
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
                          $deli_desc01 = get_field('deli_desc01', $item->ID);
                          if (isset($deli_desc01)) :
                          ?>
                            <p class="c-menu-list__cap">
                              <?= $deli_desc01 ?>
                            </p>
                          <?php endif; ?>
                          <div class="c-menu-list__box">
                            <div class="c-price-box">
                              <?php
                              $deli_num = get_field('deli_num', $item->ID);
                              if (isset($deli_num)) :
                              ?>
                                <span class="wrap">
                                  <span class="fz1">全</span><span class="fz2 adjust"><?= $deli_num ?></span><span class="fz1">品</span>
                                </span>
                              <?php endif; ?>
                              <?php
                              $deli_price_tax = get_field('deli_price_tax', $item->ID);
                              if ($deli_price_tax) {
                                $deli_price_tax  = safe_number_format($deli_price_tax);
                              }
                              if (isset($deli_price_tax)) :
                              ?>
                                <span class="wrap">
                                  <span class="fz3 adjust">￥</span><span class="fz4 adjust"><?= $deli_price_tax ?></span><br class="sp">
                                </span>
                              <?php endif; ?>
                              <?php
                              $deli_price = get_field('deli_price', $item->ID);
                              if ($deli_price) {
                                $deli_price = safe_number_format($deli_price);
                              }
                              if (isset($deli_price)) :
                              ?>
                                <span class="wrap">
                                  <span class="fz5">(税抜¥<span class="fz6"><?= $deli_price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
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
            </div>

            <?php
            $delivery_cats = get_terms('tax_delivery');
            ?>
            <?php foreach ($delivery_cats as $i => $cat) :
              $link = 'deli_cat' . $i + 1;
              
              $cat_txt = '';
              if ($cat->term_id == 12) {
                
                $cat_txt = '1人分ずつ小分けになっている大人気のシリーズ。環境に配慮したオシャレな紙容器を使用しているため、見た目の美しさは勿論後片付けも楽チンです！';
              } else if ($cat->term_id == 46) {
                
                $cat_txt = 'ボリューム重視の料理をたくさん食べたい方に人気のシリーズ。お子様や男性が多い、食事をしっかり食べたい懇親会などにおススメのシリーズです！';
              }else if ($cat->term_id == 11) {
                
                $cat_txt = '女性に圧倒的人気のクリスタルプレートに入った洗練されたオードブル。フィンガーフード中心で食べやすく、レセプションパーティやお客様を迎えた懇親会で利用されています！';
              }
            ?>
              <div class="p_menu-archive-cont__cont" id="<?= $link ?>">
                <h2 class="c-ttl-ribon anm-up">
                  <div class="c-ttl-ribon__en Allura deli"><?php the_field('tax_deli-name-en', $cat); ?></div>
                  <div class="c-ttl-ribon__ja deli"><?= $cat->name ?></div>
                  <div class="c-ttl-ribon__ja deli weight_nomal"><?= $cat_txt ?></div>
                </h2>
                <?php
                $delivery_category_args = array(
                  'post_type' => array('delivery'),
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'order' => 'ASC',
                  'orderby' => 'menu_order',
                  'tax_query' => array(
                    'relation' => 'AND',
                    array(
                      'taxonomy' => 'tax_delivery',
                      'field' => 'term_id',
                      'terms' => $cat->term_id
                    )
                  ),
                );
                $delivery_category_query = new WP_Query($delivery_category_args);
                ?>
                <?php if ($delivery_category_query->have_posts()) : ?>
                  <ul class="c-menu-list mt anm-list">
                    <?php while ($delivery_category_query->have_posts()) : $delivery_category_query->the_post(); ?>
                      <?php get_template_part('inc/delivery-item'); ?>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <div class="p_menu-deli-top">
        <div class="inner-block">
          <div class="p_menu-deli-top__txt-box">
            <div class="ttl">ホカホカ容器でオードブル！</div>
            <div class="cap">
            水を注ぐだけでホカホカに！<br> 
            電気やガスを使わずに、簡単に温かいオードブルを楽しめる「ホカホカ容器」が大人気です。<br>
            パーティーやイベントで大活躍すること間違いなし。
            </div>
          </div>
          <div class="p_menu-deli-top__img-box">
            <div class="p_menu-deli-top__img c-stripe">
              <div class="img">
                <img src="<?= $template_url; ?>/img/deli/top_img01.png" alt="" />
              </div>
            </div>
            <div class="p_menu-deli-top__img c-stripe">
              <div class="img">
                <img src="<?= $template_url; ?>/img/deli/top_img02.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="p_menu-archive__bottom">
        <ul class="p_menu-archive-bottom">
          <li>
            <a href="<?= $home_url; ?>/delivery-drink/" class="p_menu-archive-bottom__item deli">
              <div class="p_menu-archive-bottom__img">
                <img src="<?= $template_url; ?>/img/cateling/drink.jpg" alt="">
              </div>
              <div class="p_menu-archive-bottom__txt">
                <span class="txt01">オードブルデリバリーメニュー</span>
                <span class="txt02">ドリンクプラン</span>
                <span class="txt03 Allura">Drink plan</span>
              </div>
              <div class="p_menu-archive-bottom__btn">
                <div class="c-view-more bg_img col2 deli">View More</div>
              </div>
            </a>
          </li>
          <li>
            <a href="<?= $home_url; ?>/delivery-options/" class="p_menu-archive-bottom__item deli">
              <div class="p_menu-archive-bottom__img">
                <img src="<?= $template_url; ?>/img/cateling/option.jpg" alt="">
              </div>
              <div class="p_menu-archive-bottom__txt">
                <span class="txt01">オードブルデリバリーメニュー</span>
                <span class="txt02">オプションサービス</span>
                <span class="txt03 Allura">Optional Services</span>
              </div>
              <div class="p_menu-archive-bottom__btn">
                <div class="c-view-more bg_img col2 deli">View More</div>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="p_deli__table">
        <div class="inner-block">
          <h2 class="c-l-ttl anm-up deli">
            オードブルデリバリーと<br class="sp" />ケータリングの違い
          </h2>
          <?php get_template_part('inc/difference'); ?>

        </div>
      </div>
    </main>
  </div>
</div>
<?php
get_footer();
