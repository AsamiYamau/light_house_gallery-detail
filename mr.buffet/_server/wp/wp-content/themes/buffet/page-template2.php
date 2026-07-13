<?php

/**
 * Template Name: エリア特集テンプレート
 */
global $template_url;
global $home_url;
get_header();
?>
<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>

  </div>

  <div class="p_template2 l-main__main bg_img">

    <main class="outer-block p_template2">
      <div class="p_home-mv bg_img">
        <div class="p_home-mv-pc pc">
          <div class="p_home-mv-pc__wrap">
            <div class="p_home-mv-pc__catering">
              <div class="p_home-mv-pc__img">
                <img src="<?= $template_url ?>/img/home/mv1_2.jpg" alt="">
              </div>
              <div class="p_home-mv-pc-logo cate anm-right">
                <div class="p_home-mv-pc-logo__logo cate">
                  <img src="<?= $template_url ?>/img/cateling/mv_txt.png" alt="">
                </div>
                <div class="p_home-mv-pc-logo__txt">
                  <div class="txt1">スタッフ、テーブルセッティング付き本格ビュッフェ</div>
                  <div class="txt2">※実施日の5日前までにご予約下さい</div>
                </div>
                <div class="p_home-mv-pc-logo__more">
                  <a href="<?= $home_url ?>/cateling/" class="c-more cate">
                    <span class="txt c-gold03">View More</span>
                    <span class="ico">
                      <img src="<?= $template_url ?>/img/home/arrow_cate_2.svg" alt="">
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="p_home-mv-pc__deli">
              <div class="p_home-mv-pc__img">
                <img src="<?= $template_url ?>/img/home/mv2.jpg?05" alt="">
              </div>
              <div class="p_home-mv-pc-logo deli anm-left">
                <div class="p_home-mv-pc-logo__logo deli">
                  <img src="<?= $template_url ?>/img/delivery/mv_txt.png" alt="">
                </div>
                <div class="p_home-mv-pc-logo__txt">
                  <div class="txt1 deli">絶品オートブルを使い捨て容器でデリバリー</div>
                  <div class="txt2 deli">※実施日の2日前までにご予約下さい</div>
                </div>
                <div class="p_home-mv-pc-logo__more">
                  <a href="<?= $home_url; ?>/delivery/" class="c-more deli">
                    <span class="txt c-gold03">View More</span>
                    <span class="ico">
                      <img src="<?= $template_url ?>/img/home/arrow_deli.svg" alt="">
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="p_home-mv-pc__cap">
            <div class="p_home-mv-pc__txt">
              <span class="txt js_span txt-anm">
                オシャレで旨い。
              </span><br>
              <span class="txt mt js_span txt-anm">
                心が躍る出張ビュッフェ専門店
              </span>
            </div>
            <div class="p_home-mv-pc__ribon">
              <img src="<?= $template_url ?>/img/home/ribon.svg" alt="">
            </div>
          </div>
        </div>

        <div class="p_home-mv__img">
          <img src="<?= $template_url ?>/img/home/mv_sp.jpg" class="sp" alt="">
        </div>
        <div class="p_home-mv__logo sp">
          <img src="<?= $template_url ?>/img/common/tokyo-logo-white.png" alt="">
          <div class="p_home-mv__txt-wrap">
            <span class="p_home-mv__txt js_span sp txt-anm">オシャレで旨い。</span>
            <span class="p_home-mv__txt js_span sp txt-anm">心が躍る出張ビュッフェ専門店</span>
          </div>
        </div>

      </div>
      <div class="p_home-mv__link-area">
        <div class="p_home-mv__btn">
          <a href="<?= $home_url ?>/contact/" class="c-btn01 anm-up">
            お問い合わせはこちら
          </a>
        </div>

        <div class="p_home-mv-btn sp">
          <div class="inner-block">
            <div class="p_home-mv-link">
              <div class="p_home-mv-link__item">
                <a href="<?= $home_url ?>/cateling/" class="p_home-mv-link__link cate">
                  <div class="p_home-mv-link__logo">
                    <img src="<?= $template_url ?>/img/cateling/mv_txt.png" alt="">
                  </div>
                  <div class="p_home-mv-link__txt">
                    スタッフ、テーブル<br>
                    セッティング付き本格ビュッフェ
                  </div>
                </a>
                <p class="p_home-mv-link__info">
                  ※実施日の5日前までにご予約下さい
                </p>
              </div>
              <div class="p_home-mv-link__item">
                <a href="<?= $home_url; ?>/delivery/" class="p_home-mv-link__link deli">
                  <div class="p_home-mv-link__logo deli">
                    <img src="<?= $template_url ?>/img/delivery/mv_txt.png" alt="">
                  </div>
                  <div class="p_home-mv-link__txt deli">
                    絶品オートブルを<br>
                    使い捨て容器でデリバリー
                  </div>
                </a>
                <p class="p_home-mv-link__info deli">
                  ※実施日の2日前までにご予約下さい
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      $area_temp_name = get_field('area_temp_name');
      ?>
      <?php if (!empty($area_temp_name)): ?>
        <div class="p_home-lead-sec01__ttl p_template2__lead-ttl bg_img">
          <span class="c-ttl01">
            <span class="inner-block">
              <span class="c-ttl01__wrap">
                <span class="c-ttl01__box">
                  <span class="c-ttl01__dec ptn01">
                    <img src="<?= $template_url ?>/img/common/pin-l.svg" alt="">
                  </span>
                  <span class="c-ttl01__dec ptn02">
                    <img src="<?= $template_url ?>/img/common/pin-r.svg" alt="">
                  </span>
                  <h1 class="c-ttl01__txt-box is-tac">
                    <span class="c-ttl01__txt">
                      <span class="big"><?= $area_temp_name ?></span>での<span class="big"><br class="sp">ケータリング/オードブル</span>なら
                    </span>
                    <div class="c-ttl01__img">
                      <img src="<?= $template_url ?>/img/common/logo01.svg" alt="ミスタービュッフェ">
                    </div>
                  </h1>
                </span>
              </span>
            </span>
          </span>
        </div>
      <?php endif; ?>

      <?php
      $area_temp_cap = get_field('area_temp_cap');
      ?>
      <?php if (!empty($area_temp_cap) && !empty($area_temp_name)): ?>
        <section class="p_template2-top bg_img">
          <h2 class="p_template2-top__ttl">
            <div class="txt">
              <?= $area_temp_name ?>でのさまざまなパーティーに最適なケータリングをご提案
              <div class="c-ttl-ribon02 Allura center">
                <span class="ribon"></span>
              </div>
            </div>
          </h2>

          <div class="p_template2-top__cap">
            <div class="p_template2-top__ico01">
              <img src="<?= $template_url ?>/img/home/home_dec-pizza02.svg" alt="">
            </div>
            <p class="p_template2-top__cap">
              <?= nl2br($area_temp_cap) ?>
            </p>
            <div class="p_template2-top__ico02">
              <img src="<?= $template_url ?>/img/home/home_dec-drink03.svg" alt="">
            </div>
          </div>
        </section>
      <?php endif; ?>

      <?php
      $area_temp_point_group = get_field('area_temp_point_group');
      ?>
      <?php if (!empty($area_temp_name) && !empty($area_temp_point_group[0])): ?>
        <section class="p_template2-sec01 bg_img p_template2__sec">
          <div class="inner-block">
            <div class="c-ttl02">
              <span class="c-ttl02__box">
                <span class="dec"></span>
                <h2 class="txt">
                  <span class="big"><?= $area_temp_name ?></span>でケータリングを実施する上でのポイント
                </h2>
                <div class="dec"></div>
              </span>
            </div>
            <?php foreach ($area_temp_point_group as $area_temp_point): ?>
              <?php
              $area_temp_point_ttl = $area_temp_point['area_temp_point_ttl'];
              $area_temp_point_txt = $area_temp_point['area_temp_point_txt'];
              $area_temp_point_img = $area_temp_point['area_temp_point_img'];

              $area_temp_point_img_url = $template_url . '/img/common/no_img.jpg';
              if (!empty($area_temp_point_img)) {
                $area_temp_point_img_url = $area_temp_point_img;
              }

              ?>
              <div class="p_template2-sec01__box c-stripe is-small">
                <div class="c-stripe__cont p_template2-sec01__wrap">
                  <div class="p_template2-sec01__txt-area">
                    <?php if (!empty($area_temp_point_ttl)): ?>
                      <h2 class="p_template2-sec01__ttl">
                        <div class="ttl"><?= nl2br($area_temp_point_ttl) ?></div>
                        <div class="ico">
                          <img src="<?= $template_url ?>/img/home/home_car.svg" alt="">
                        </div>
                      </h2>
                    <?php endif; ?>
                    <?php if (!empty($area_temp_point_txt)): ?>
                    <div class="p_template2-sec01__txt">
                      <?= nl2br($area_temp_point_txt) ?>
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="p_template2-sec01__img">
                    <img src="<?= $area_temp_point_img_url ?>" alt="">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="p_template2__btn">
              <a href="<?= $home_url ?>/contact/" class="c-btn01 pat01">
                お問い合わせ
              </a>
            </div>
          </div>
        </section>
      <?php endif; ?>


      <!-- 東京はオードブルが別サイトなので、ケータリングとオードブルを別で取得 -->
      <?php
      $area_temp_point_plan = get_field('area_temp_point_plan');// ケータリングプラン
      $area_temp_plan_deli_group = get_field('area_temp_plan_deli_group');// オードブルプラン
      ?>
      <?php if (!empty($area_temp_name)): ?>
        <?php if(!empty($area_temp_point_plan[0]) || !empty($area_temp_plan_deli_group[0])): ?>
        <section class="p_template2-sec02 bg_img p_template2__sec">
          <div class="inner-block">
            <div class="c-ttl02">
              <span class="c-ttl02__box">
                <span class="dec"></span>
                <h2 class="txt">
                  <span class="big"><?= $area_temp_name ?></span>で人気のケータリング/オードブルのプラン
                </h2>
                <div class="dec"></div>
              </span>
            </div>
            <ul class="c-menu-list ptn_long anm-list p_template2__cont">
              <?php
                $count = 0;// カウンター初期化
              ?>
              <!-- ケータリング -->
               <?php if (!empty($area_temp_point_plan[0])): ?>
              <?php foreach($area_temp_point_plan as $i => $catering): ?>
                <?php
                  

                  $catering_id = $catering->ID;
                  $catering_ttl =$catering->post_title;
                  $catering_desc01 = get_field('cateling_desc01', $catering_id);// キャッチコピー
                  $catering_num = get_field('cateling_num', $catering_id);// 品数
                  $catering_price_tax = get_field('cateling_price_tax', $catering_id);// 価格（税込）
                  $catering_price = get_field('cateling_price', $catering_id);// 価格（税抜）
                  $catering_thumb = get_the_post_thumbnail_url($catering_id, 'full');// サムネイル画像
                  $catering_link = get_permalink($catering_id);// プランリンク

                  $catering_thumb_url = $template_url . '/img/common/no_img.jpg';
                  if (!empty($catering_thumb)) {
                    $catering_thumb_url = $catering_thumb;
                  }
                  $catering_link_url = '#';
                  if (!empty($catering_link)) {
                    $catering_link_url = $catering_link;
                  }

                  $long = ($count == 0) ? 'long' : '';  
                  
                  ?>
              <li class="" style="animation-delay: 0s;">
                <a href="<?= $catering_link_url ?>"
                  class="c-menu-list__item <?= $long ?>">
                  <div class="c-menu-list__img">
                    <img src="<?= $catering_thumb_url ?>" alt="">
                  </div>
                  <div class="c-menu-list__txt-box">
                    <?php if (!empty($catering_ttl)): ?>
                      <h2 class="c-menu-list__ttl">
                        <?= $catering_ttl ?>
                      </h2>
                    <?php endif; ?>

                    <?php if (!empty($catering_desc01)): ?>
                      <p class="c-menu-list__cap">
                        <?= $catering_desc01 ?>
                      </p>
                    <?php endif; ?>
                    <div class="c-menu-list__box">
                      <div class="c-price-box">
                        <?php if (!empty($catering_num)): ?>
                          <span class="wrap">
                            <span class="fz1">全</span><span class="fz2 adjust"><?= esc_html($catering_num) ?></span><span class="fz1">品</span>
                          </span>
                        <?php endif; ?>
                        <?php if (!empty($catering_price_tax)): ?>
                          <span class="wrap">
                            <span class="fz3 adjust">￥</span><span class="fz4 adjust"><?= safe_number_format($catering_price_tax) ?></span><br class="sp">
                          </span>
                        <?php endif; ?>
                        <?php if (!empty($catering_price)): ?>
                          <span class="wrap">
                            <span class="fz5">(税抜¥<span class="fz6"><?= safe_number_format($catering_price) ?></span>)/</span><span class="fz6">1</span><span
                              class="fz5">名あたり</span>
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
              <?php
                $count++;
                ?>
              <?php endforeach; ?>
              <?php endif; ?>

              <!-- オードブル -->
              <?php if (!empty($area_temp_plan_deli_group[0])): ?>
                <?php foreach($area_temp_plan_deli_group as $i => $deli): ?>
                  <?php
                    $area_temp_plan_deli_img = $deli['area_temp_plan_deli_img'];
                    $area_temp_plan_deli_ttl = $deli['area_temp_plan_deli_ttl'];
                    $area_temp_plan_deli_txt = $deli['area_temp_plan_deli_txt'];
                    $area_temp_plan_deli_link = $deli['area_temp_plan_deli_link'];
                    $area_temp_plan_deli_num = $deli['area_temp_plan_deli_num'];
                    $area_temp_plan_deli_price1 = $deli['area_temp_plan_deli_price1'];//税込
                    $area_temp_plan_deli_price2 = $deli['area_temp_plan_deli_price2'];//税抜

                    $area_temp_plan_deli_img_url = $template_url . '/img/common/no_img.jpg';
                    if (!empty($area_temp_plan_deli_img)) {
                      $area_temp_plan_deli_img_url = $area_temp_plan_deli_img;
                    }

                    $area_temp_plan_deli_link_url = '#';
                    if (!empty($area_temp_plan_deli_link)) {
                      $area_temp_plan_deli_link_url = $area_temp_plan_deli_link;
                    }


                    $long = ($count == 0) ? 'long' : '';  
                    ?>
              <li class="" style="animation-delay: 0.4s;">
                <a href="<?= $area_temp_plan_deli_link_url ?>" target="_blank" class="c-menu-list__item <?= $long ?>">
                  <div class="c-menu-list__img">
                    <img src="<?= $area_temp_plan_deli_img_url ?>" alt="">
                  </div>
                  <div class="c-menu-list__txt-box">
                    <?php if (!empty($area_temp_plan_deli_ttl)): ?>
                      <h2 class="c-menu-list__ttl">
                        <?= $area_temp_plan_deli_ttl ?>
                      </h2>
                    <?php endif; ?>
                      <?php if (!empty($area_temp_plan_deli_txt)): ?>
                      <p class="c-menu-list__cap">
                        <?= $area_temp_plan_deli_txt ?>
                      </p>
                    <?php endif; ?>
                    <div class="c-menu-list__box">
                      <div class="c-price-box">
                        <?php if (!empty($area_temp_plan_deli_num)): ?>
                          <span class="wrap">
                            <span class="fz1">全</span><span class="fz2 adjust"><?= esc_html($area_temp_plan_deli_num) ?></span><span class="fz1">品</span>
                          </span>
                        <?php endif; ?>
                            <?php if (!empty($area_temp_plan_deli_price1)): ?>

                        <span class="wrap">
                          <span class="fz3 adjust">￥</span><span class="fz4 adjust"><?= safe_number_format($area_temp_plan_deli_price1) ?></span><br class="sp">
                        </span>
                        <?php endif; ?>
                         <?php if (!empty($area_temp_plan_deli_price2)): ?>
                        <span class="wrap">
                          <span class="fz5">(税抜¥<span class="fz6"><?= safe_number_format($area_temp_plan_deli_price2) ?></span>)/</span><span class="fz6">1</span><span
                            class="fz5">名あたり</span>
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
              <?php
                $count++;
                ?>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
            <div class="p_template2__btn-wrap">
              <a href="<?= $home_url ?>/cateling/" class="c-btn01 pat01">
                ケータリングのプランを見る
              </a>
              <a href="<?= $home_url; ?>/delivery/" target="_blank" class="c-btn01 pat01 deli">
                オードブルのプランを見る
              </a>
            </div>
          </div>
        </section>
      <?php endif; ?>
      <?php endif; ?>

      <?php
       $area_temp_blog = get_field('area_temp_blog');
      ?>
      <?php if (!empty($area_temp_name) && !empty($area_temp_blog[0])): ?>
      <section class="p_template2-sec03 bg_img p_template2__sec">
        <div class="inner-block">
          <div class="c-ttl02">
            <span class="c-ttl02__box">
              <span class="dec"></span>
              <h2 class="txt">
                <span class="big"><?= $area_temp_name ?></span>でケータリング/オードブルの利用事例
              </h2>
              <div class="dec"></div>
            </span>
          </div>
          <ul class="c-article-list p_template2__cont">
            <?php foreach($area_temp_blog as $i => $blog): ?>
              <?php
                $blog_id = $blog->ID;
                $blog_ttl = $blog->post_title;
                $blog_date = get_the_date('Y.m.d', $blog_id);
                $blog_excerpt = get_the_excerpt($blog_id);
                $blog_thumb = get_the_post_thumbnail_url($blog_id, 'full');// サムネイル画像
                $blog_link = get_permalink($blog_id);// ブログリンク

                $blog_thumb_url = $template_url . '/img/common/no_img.jpg';
                if (!empty($blog_thumb)) {
                  $blog_thumb_url = $blog_thumb;
                }
                $blog_link_url = '#';
                if (!empty($blog_link)) {
                  $blog_link_url = $blog_link;
                }
              ?>
            <li class="c-article-list__li">
              <a href="<?= $blog_link_url ?>"
                class="c-article-list__link">
                <div class="c-article-list__img">
                  <img src="<?= $blog_thumb_url ?>"
                    alt="">
                </div>
                <div class="c-article-list__txt">
                  <div class="c-article-list__tag">
                    <p class="c-article-list__date">
                      <?= esc_html($blog_date) ?>  
                    </p>
                  </div>
                  <?php if (!empty($blog_ttl)): ?>
                  <h2 class="c-article-list__ttl">
                    <?= $blog_ttl ?>  
                  </h2>
                  <?php endif; ?>
                  <?php if (!empty($blog_excerpt)): ?>
                  <p class="c-article-list__cap pc">
                    <?= $blog_excerpt ?>
                  </p>
                  <?php endif; ?>
                  <div class="c-article-list__dec">
                    <div class="c-article-next">続きを読む</div>
                  </div>
                </div>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
          <div class="p_template2__btn">
            <a href="<?= $home_url ?>/blog/" class="c-btn01 pat01">
              もっと見る
            </a>
          </div>
        </div>
      </section>
      <?php endif; ?>


      <?php
        $area_temp_facility = get_field('area_temp_facility');
      ?>
      <?php if (!empty($area_temp_name) && !empty($area_temp_facility[0])): ?>
      <section class="p_template2-sec04 bg_img p_template2__sec">
        <div class="inner-block">
          <div class="c-ttl02">
            <span class="c-ttl02__box">
              <span class="dec"></span>
              <h2 class="txt">
                <span class="big"><?= $area_temp_name ?></span>でケータリング/オードブルを利用できる施設一覧
              </h2>
              <div class="dec"></div>
            </span>
          </div>
          <p class="p_template2-sec04__cap">※詳しくは施設へお問い合わせください</p>
          <div class="c-link-card p_template2__cont">
            <ul class="c-link-card-list">
              <?php foreach($area_temp_facility as $i => $facility): ?>
                <?php
                  $area_temp_facility_name = $facility['area_temp_facility_name'];
                  $area_temp_facility_add = $facility['area_temp_facility_add'];
                  $area_temp_facility_link = $facility['area_temp_facility_link'];

                  $area_temp_facility_link_url = '';
                  if (!empty($area_temp_facility_link)) {
                    $area_temp_facility_link_url = $area_temp_facility_link;
                  }
                ?>
              <li class="c-link-card-list__item">
                <?php if (!empty($area_temp_facility_name)): ?>
                <a href="<?= $area_temp_facility_link_url ?>" target="_blank" class="c-link-card-list__link">
                  <?= $area_temp_facility_name ?>
                </a>
                <?php endif; ?>
                <?php if (!empty($area_temp_facility_add)): ?>
                <p class="c-link-card-list__txt">
                  <?= $area_temp_facility_add ?>
                </p>
                <?php endif; ?>
                  
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </section>
      <?php endif; ?>




      <section class="p_template-sec03 bg_img">

        <div class="p_template-sec03__img">
          <img src="<?= $template_url ?>/img/template/ttl_bg.jpg" alt="">
          <h2 class="p_template-sec03__ttl Allura">
            Order Flow
          </h2>
        </div>
        <div class="p_template-sec03__cont">
          <div class="inner-block">
            <div class="p_template-sec03__list">
              <?php
              $order_flow = get_field('order_flow');
              if(!empty($order_flow[0])):
              ?>
              <ul class="p_template-sec03-list">
                <?php
                  foreach($order_flow as $i => $value):
                    // $iを01 02のように変換
                    $i = sprintf('%02d', $i + 1);
                ?>
                <li class="p_template-sec03-list__item c-stripe">
                  <div class="p_template-sec03-list__wrap">
                    <div class="num Allura"><?= $i ?></div>
                    <h3 class="ttl">
                      <?= $value['flow_ttl'] ?>
                    </h3>
                    <p class="txt">
                      <?= nl2br($value['flow_txt']) ?>
                    </p>
                  </div>
                </li>
                  <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </div>
            <div class="p_template-sec03__cta">
              <div class="p_guide-list__case01 flex top">
                <div class="p_guide-list__tel">
                  <div class="tel">
                    <a href="tel:0120507286" class="tel-link">
                      0120-507-286
                    </a>
                  </div>
                  <p class="note">営業時間 09:00~19:00</p>
                </div>
                <div class="p_guide-list__btn">
                  <a href="https://132.mh-test-4932.com/contact/" class="c-btn02 bg_img gude">WEBでのご注文はこちら</a>
                </div>
              </div>
            </div>

            <div class="p_template-sec03__guide">
              <div class="inner-block">
                <div class="p_guide-body__lead">
                  より良いサービスをご提供するため、以下のとおり基準を設けております。<br>
                  ご利用前にご一読くださいませ。ご不明な点やご相談がございましたらお気軽にお問い合わせください。
                  <span class="c-mini-ribon-ttl__dec">
                    <span class="c-mini-ribon"></span>
                  </span>
                </div>
                <div class="p_guide-body__list">
                  <ul class="p_guide-list">
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          ご注文方法
                        </div>
                        <div class="p_guide-list__box">
                          <p class="p_guide-list__ttl02">
                            ご注文・お見積もりは<br class="sp">お電話・WEBにて承ります。
                            <span class="p_guide-list__ttl02-line"></span>
                          </p>
                          <div class="p_guide-list__case01 flex top">
                            <div class="p_guide-list__tel">
                              <div class="tel">
                                <a href="tel:0120507286" class="tel-link">
                                  0120-507-286
                                </a>
                              </div>
                              <p class="note">営業時間 10:00~21:00</p>
                            </div>
                            <div class="p_guide-list__btn">
                              <a href="/contact/" class="c-btn02 bg_img gude">WEBでのご注文はこちら</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          ご予約期限
                        </div>
                        <div class="p_guide-list__box top">
                          <div class="p_guide-list__case01">
                            <ul class="c-tag-list">
                              <li class="c-tag-list__li brown">
                                <p class="c-tag-list__tag">ケータリング</p>
                                <p class="c-tag-list__txt">
                                  実施日の5日前
                                </p>
                              </li>
                              <li class="c-tag-list__li green">
                                <p class="c-tag-list__tag">オードブルデリバリー</p>
                                <p class="c-tag-list__txt">
                                  実施日の2日前
                                </p>
                              </li>
                            </ul>
                            <p class="p_guide-list__note">
                              締め切り日を過ぎても対応できる場合もございますのでお気軽にお問い合わせください
                            </p>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          出張可能<br>
                          エリア
                        </div>
                        <div class="p_guide-list__box">
                          <div class="p_guide-list__case01">
                            <ul class="c-tag-list">
                              <li class="c-tag-list__li brown p01">
                                <p class="c-tag-list__tag">ケータリング</p>
                                <div class="c-tag-list__btn">
                                  <a href="/area/" class="c-btn02 bg_img guide">対応エリアは<br class="sp">こちら</a>
                                </div>
                              </li>
                              <li class="c-tag-list__li green p01">
                                <p class="c-tag-list__tag">オードブルデリバリー</p>
                                <div class="c-tag-list__btn">
                                  <a href="/area/" class="c-btn02 bg_img green guide">対応エリアは<br class="sp">こちら</a>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          お支払い方法
                        </div>
                        <div class="p_guide-list__box">
                          <p class="p_guide-list__txt">
                            お支払い方法はご注文時にご指定ください。
                          </p>
                          <div class="p_guide-list__case01">
                            <ul class="p_guide-tag top">
                              <li class="p_guide-tag__li">
                                実施当日現金払い
                              </li>
                              <li class="p_guide-tag__li">
                                実施当時<br class="sp">クレジット払い
                              </li>
                              <li class="p_guide-tag__li">
                                請求書発行後振り込み
                              </li>
                            </ul>
                            <p class="p_guide-list__txt02">
                              ・請求書でのお支払いは、会社・法人のお客様に限らせて頂きます。個人でご利用の場合はお取り扱いできません。<br>
                              ・請求書払いで受け付けましてもお断りのご連絡をさせて頂く場合がございます。<br>
                              ・ご請求書でのお振込み期日は実施日の翌月末日までとさせて頂きます。ただし支払期日についてご要望がございます場合は柔軟に対応いたしますのでご相談くださいませ。<br>
                              ・お振込み手数料はお客様のご負担とさせて頂きます。予めご了承下さい。<br>
                              ・現金支払いの場合は領収書と納品書・お振込の場合は請求書と納品書を発行いたします。<br>
                              ・必要書類の発行なども柔軟に対応いたしますのでお気軽にお申し付けくださいませ。
                            </p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
    </main>
  </div>
</div>
<?php
get_footer();
