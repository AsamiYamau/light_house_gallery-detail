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
    <section class="p_area-mv">
      <div class="p_area-mv__img">
        <img class="pc" src="<?php echo $template_url; ?>/img/home/mv_gazzo_01.png" alt="">
        <img class="sp" src="<?php echo $template_url; ?>/img/home/mv_gazzo_01_sp.png" alt="">
      </div>
      <div class="p_area-mv__area-box">
        <div class="p_area-mv__area-circle anm-up" style="animation-delay: 0.6s;">
          <div class="p_area-mv__area-ttl">
            <?php the_title(); ?>エリア
          </div>
        </div>
      </div>
      <div class="p_area-mv__txt-area" style="display: none;">
        <div class="p_area-mv__ttl-box anm-up">
                  <span class="p_area-mv__ttl">
                    <img src="<?php echo $template_url; ?>/img/home/mv-ttl-parts01.svg" alt="オシャレでおいしい。">
                  </span>
        </div>
        <div class="p_area-mv__ttl-box anm-up" style="animation-delay: 0.2s;">
                  <span class="p_area-mv__ttl">
                    <img src="<?php echo $template_url; ?>/img/home/mv-ttl-parts02.svg" alt="オードブルの、">
                  </span>
        </div>
        <div class="p_area-mv__ttl-box anm-up" style="animation-delay: 0.4s;">
                  <span class="p_area-mv__ttl">
                    <img src="<?php echo $template_url; ?>/img/home/mv-ttl-parts03.svg" alt="デリバリー専門店">
                  </span>
        </div>
      </div>
    </section>

    <main class="">

      <div class="c-page__content">
        <!-- パンくずリスト -->
        <ul class="c-breadcrumb">
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/">トップページ</a>
          </li>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/area/">対応エリア一覧</a>
          </li>
          <li class="c-breadcrumb__item">
            <span class="c-breadcrumb__link c-breadcrumb__link--current"><?php the_title(); ?></span>
          </li>
        </ul>
      </div>

      <section class="p_area-copy">
        <div class="inner-block">
          <div class="p_area-copy__ttl">
            <?php the_title(); ?>エリアにも<br class="sp">デリバリーいたします！
          </div>
          <div class="p_area-copy__caption">
            当店のオードブルデリバリーは、<br>
            思わず写真に撮りたくなるような美しさと美味しさを兼ね備えています。<br>
            お客様のご予算や利用シーンに合わせて、最適なオードブルをお届けします。<br>
            <br>
            <?php the_title(); ?>エリアをはじめ、周辺地域にもお届け可能ですので、<br>
            ご家庭でも職場でも、特別な集まりにも、ぜひご利用ください。
          </div>
        </div>
      </section>

      <!-- メインエリア -->
      <section class="p_top-about  p_area-category-about">
        <p class="p_top-about__text anm">
          思わず写真に撮りたくなるようなオードブルデリバリーを<br class="pc" />
          お客様の予算や利用シーンに合わせて提供します。
        </p>
        <div class="p_top-about__point-wrap anm-list">
          <div class="p_top-about__point-item">
            <div class="icon">
              <img src="<?php echo $template_url; ?>/img/home/icon_crown02.svg" alt="" width="30" height="20" />
            </div>
            <p class="text">脅威の<br />リピート率</p>
            <p class="number">91<span class="percent">%</span></p>
          </div>
          <div class="p_top-about__point-item">
            <div class="icon">
              <img src="<?php echo $template_url; ?>/img/home/icon_crown02.svg" alt="" width="30" height="20" />
            </div>
            <p class="text">おひとり様</p>
            <p class="number">1,200<span class="yen">円</span></p>
            <p class="text">からご用意</p>
          </div>
        </div>
        <a href="<?php echo $home_url; ?>/about/" class="c-button -green">
          <span class="ja">私たちについて</span>
          <span class="icon"><img src="<?php echo $template_url; ?>/img/common/icon_arrow.svg" alt="" width="16" height="16" /></span>
        </a>

        
      </section>

      <div class="p_category-green">

        <section class="p_category-sec02">
          <p class="p_category-sec02__cap01">
            配送対応エリアのご紹介をさせていただきます。<br>
            各配送エリアごとに、最低注文金額（税込）を<br class="sp">設定させていただいております。<br>
            各エリアの詳細よりご確認をよろしくお願いいたします。
          </p>
          <div class="p_category-sec02__box01">
            <h2 class="p_category-sec02__ttl01">
              <?php the_title(); ?>の配送可能エリア
            </h2>
            <p class="p_category-sec02__cap02">
              <?php
              $area_text = SCF::get('area_delivery_araa');
              ?>
              <?php echo nl2br($area_text); ?>
            </p>
          </div>


          <?php
          $area_deli_price_group = SCF::get('area_deli_price_group');
          ?>
          <?php if($area_deli_price_group && $area_deli_price_group[0]['area_deli_price_ttl']): ?>
            <div class="p_category-sec02__box02">
              <h2 class="p_category-sec02__ttl02">
                エリア別最低注文金額
              </h2>
              <p class="p_category-sec02__cap01">
                最低ご利用金額は料理プランの合計金額です。<br class="sp">ドリンクやオプションの金額は含みません。<br>
                また、下記金額は全て税込価格です。
              </p>

              <table class="p_category-table01">
                <?php foreach ($area_deli_price_group as $area_deli_price): ?>
                  <tr>
                    <th>
                      <?php echo $area_deli_price['area_deli_price_ttl']; ?>
                    </th>
                    <td>
                      <?php echo deli_format_price($area_deli_price['area_deli_price_num']); ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
              <div class="p_category-sec02__btn01">
                <a href="<?php echo $home_url; ?>/guide/" class="c-btn02">
                  ご注文から商品受け取りまでの<br class="sp">流れはこちらから
                </a>
              </div>
            </div>
          <?php endif; ?>


          <?php
          $related_columns_taxnomy = SCF::get('area_related_column_taxonomy');
          $related_term = null;
          $related_query = null;
          if($related_columns_taxnomy && $related_columns_taxnomy[0]){
            $target_term = get_term( $related_columns_taxnomy[0] );
            if($target_term){
              $related_term = $target_term;
            }
            $related_args = array(
              'post_type' => 'column',
              'posts_per_page' => 3,
              'tax_query' => array(
                array(
                  'taxonomy' => 'tax_column',
                  'field' => 'slug',
                  'terms' => $related_term->slug,
                ),
              ),
            );
            $related_query = new WP_Query($related_args);
          }
          ?>
          <?php if($related_term && $related_query && $related_query->have_posts()): ?>
            <div class="p_category-sec02__box03">
              <h2 class="p_category-sec02__ttl02">
                <?php the_title(); ?>エリアの人気コラム
              </h2>
              <div class="p_category-sec02__box04">
                <ul class="p_category-card01">
                  <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <?php
                    $thumb = '';
                    if (has_post_thumbnail()) {
                      $thumb = get_the_post_thumbnail_url();
                    } else {
                      $thumb = $template_url . '/img/common/no_img.jpg';
                    }

                    $term = get_the_terms($post->ID, 'tax_column');
                    $term_name = '';
                    if (!empty($term)) {
                      $term_name = $term[0]->name;
                    }

                    ?>
                    <li>
                      <div class="p_category-card01__box02">
                        <a href="<?php the_permalink(); ?>" class="p_category-card01__link">
                          <div class="p_category-card01__img">
                            <img src="<?= $thumb ?>" alt="" />
                          </div>
                          <div class="p_category-card01__box01">
                            <span class="p_category-card01__cap01"><?php echo $term_name; ?></span>
                            <span class="p_category-card01__date"><?php the_time('Y.m.d'); ?></span>
                          </div>
                          <h3 class="p_category-card01__ttl01">
                            <?php the_title(); ?>
                          </h3>
                          <p class="p_category-card01__cap02">
                            <?php echo wp_trim_words(get_the_excerpt(), 40); ?>
                          </p>
                          <span class="p_category-card01__cap03 en">View More</span>
                        </a>
                      </div>
                    </li>
                  <?php endwhile; ?>
                </ul>
              </div>
            </div>
            <div class="p_category-sec02__btn02">
              <a href="<?php echo get_term_link($related_term); ?>" class="c-btn02">
                もっとみる
              </a>
            </div>
          <?php endif; ?>
        </section>
      </div>
    </main>
  </div>




</div>


<?php get_footer(); ?>
