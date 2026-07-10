<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage 
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

  <div class="p_home l-main__main bg_img">

    <main class="outer-block">
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


      <div class="p_home-bg-wrap bg_img">
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
        <!-- welcome  -->

        <div class="p_home-lead">
          <div class="inner-block">
            <div class="p_home-banner">
              <a href="https://buffettokyo-catering.com/%e3%82%aa%e3%83%bc%e3%83%80%e3%83%bc%e3%83%a1%e3%82%a4%e3%83%89%e3%82%b1%e3%83%bc%e3%82%bf%e3%83%aa%e3%83%b3%e3%82%b0/">
                  <img src="<?= $template_url ?>/img/home/full_bnr.jpg?0916" width="1000" height="250" class="pc" alt="世界に一つだけのケータリング フルオーダーメイドケータリング">
                  <img src="<?= $template_url ?>/img/home/full_bnr.jpg?0916"  class="sp" alt="世界に一つだけのケータリング フルオーダーメイドケータリング">

              </a>
            </div>
            <!-- <div class="p_menu-archive-cont__cont">
              <ul class="c-menu-list ptn_long ptn02 anm-list pat-home is-animated">
                <li class="num_ico is-animated" style="animation-delay: 0s;">
                  <div class="p_home-populer01">
                    <div class="p_home-populer01__img">
                      <img src="<?= $template_url; ?>/img/home/home_icon-white.png" alt="Mr.BUFFET">
                    </div>
                  </div>
                  <a href="<?= $home_url ?>/cateling/detail/" class="c-menu-list__item long ptn02">
                    <div class="c-menu-list__img">
                      <img src="<?= $template_url; ?>/img/cateling/cont01_01.jpg" alt="">
                    </div>
                    <div class="c-menu-list__txt-box ptn02">
                      <h3 class="c-menu-list__ttl fz28 blown">
                        フルオーダーメイドケータリング
                      </h3>
                      <p class="c-menu-list__cap">
                        ご要望をゼロから形にする完全カスタムのケータリング。<br>
                        メニュー開発から装飾・スタッフ手配までワンストップでプロデュースし、唯一無二の食体験をお届けします。<br>
                        イベント規模やテーマを問わず、最高のおもてなしを実現します。
                      </p>
                      <div class="c-menu-list__box">
                        <div class="p_menu-archive-cont__btn">
                          <div class="c-view-more bg_img blown">View More</div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>

              </ul>
            </div> -->
          </div>
          <div class="p_home-lead-sec01">
            <div class="p_home-lead-sec01__ttl">
              <span class="c-ttl01">
                <span class="inner-block">
                  <span class="c-ttl01__wrap">
                    <span class="c-ttl01__box">
                      <span class="c-ttl01__dec ptn01">
                        <img src="<?= $template_url; ?>/img/common/pin-l.svg" alt="">
                      </span>
                      <span class="c-ttl01__dec ptn02">
                        <img src="<?= $template_url; ?>/img/common/pin-r.svg" alt="">
                      </span>
                      <h1 class="c-ttl01__txt-box">
                        <span class="c-ttl01__txt">
                          <span class="big">東京</span>の<span class="big">ケータリング</span>なら
                        </span>
                        <div class="c-ttl01__img">
                          <img src="<?= $template_url; ?>/img/common/logo01.svg" alt="ミスタービュッフェ">
                        </div>
                      </h1>
                    </span>
                  </span>
                </span>
              </span>
            </div>
            <div class="p_home-lead-sec01__cont">
              <div class="p_home-lead-sec01__cap">
                リピート率<span class="box"><span class="dec"><img src="<?= $template_url; ?>/img/home/cap-dec.svg" alt=""></span><span class="num">9</span></span>割超えの<span class="line"><br class="sp">東京のケータリング専門店</span>が<br>
                心躍るビュッフェをご提案
              </div>
              <div class="p_home-lead-sec01__img">

              </div>
            </div>
            <div class="p_home-lead-sec01__cont02">
              <div class="inner-block">
                <div class="p_home-sec02__box01">
                  <?php
                  $campaigns = get_field('top_campaign', 'option');
                  ?>

                  <div class="p_home-cont01">
                    <?php if ($campaigns) : ?>
                      <?php foreach ($campaigns as $campaign) : ?>
                        <div class="p_home-cont01__box">
                          <a href="<?= $campaign['top_campaign_link']; ?>" class="p_home-cont01__img01" target="_blank">
                            <img src="<?= $campaign['top_campaign_img']; ?>" alt="">
                          </a>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php

          $top_gallery = get_field('top_gallery', 'option');

          ?>

          <?php if (!empty($top_gallery[0])): ?>
            <div class="p_home-lead-sec02">
              <div class="inner-block">
                <div class="p_home-lead-sec02__ttl">
                  <span class="c-ttl02">
                    <span class="c-ttl02__box">
                      <span class="dec"></span>
                      <h2 class="txt">
                        東京で実施した<br class="sp"><span class="big">ケータリング事例</span>
                      </h2>
                      <div class="dec"></div>
                    </span>
                    <span class="c-ttl02__sub">
                      <img src="<?= $template_url; ?>/img/home/Gallery-txt.svg" alt="">
                    </span>
                  </span>
                </div>
                <div class="p_home-lead-sec02__cont">

                  <ul class="l-gallery-list">

                    <?php foreach ($top_gallery as $i => $gallery): ?>
                      <li class="l-gallery-list__item js-modal-btn" data-gallery="gallery_<?= $i; ?>">
                        <?php
                        $gallery_id = $gallery->ID;
                        $gallery_title = $gallery->post_title;
                        $gallery_excerpt = get_the_excerpt($gallery_id);
                        // アイキャッチ画像
                        $thumb_img = '';
                        $thumb = get_the_post_thumbnail_url($gallery_id);
                        if ($thumb) {
                          $thumb_img = $thumb;
                        } else {
                          $thumb_img = $template_url . '/img/common/no_img.jpg';
                        }

                        ?>
                        <div class="l-gallery-list__img">
                          <img src="<?= $thumb_img ?>" alt="">
                        </div>
                        <div class="l-gallery-list__txt">
                          <div class="l-gallery-list__txt-box">
                            <div class="ttl">
                              <?= $gallery_title ?>
                            </div>
                            <div class="txt">
                              <?= nl2br($gallery_excerpt); ?>
                            </div>
                          </div>
                        </div>

                      </li>

                    <?php endforeach; ?>
                  </ul>
                  <?php foreach ($top_gallery as $i => $gallery): ?>
                    <div class="l-gallery-modal js-modal-body" data-gallery="gallery_<?= $i; ?>" style="display: none;">
                      <div class="l-gallery-modal__inner modal-cont">
                        <div class="l-gallery-modal__img">
                          <?php
                          $gallery_id = $gallery->ID;
                          $gallery_title = $gallery->post_title;
                          $gallery_content = $gallery->post_content;
                          $thumb_img = '';
                          $thumb = get_the_post_thumbnail_url($gallery_id);
                          if ($thumb) {
                            $thumb_img = $thumb;
                          } else {
                            $thumb_img = $template_url . '/img/common/no_img.jpg';
                          }
                          ?>
                          <img src="<?= $thumb_img ?>" alt="">
                        </div>
                        <div class="l-gallery-modal__txt">
                          <div class="l-gallery-modal__txt-box">
                            <div class="ttl">
                              <?= $gallery_title ?>
                            </div>
                            <div class="txt">
                              <?= $gallery_content ?>
                            </div>
                          </div>

                          <?php
                          $gallery_field_ttl_txt = get_field('gallery_field_ttl_txt', $gallery_id);
                          $gallery_field_table = get_field('gallery_field_table', $gallery_id);
                          $gallery_field_area = get_field('gallery_field_area', $gallery_id);
                          $gallery_field_contents = get_field('gallery_field_contents', $gallery_id);
                          ?>
                          <?php if (!empty($gallery_field_ttl_txt) || !empty($gallery_field_table[0]) || !empty($gallery_field_area) || !empty($gallery_field_contents[0])): ?>
                            <div class="l-gallery-modal__field">
                              <div class="l-gallery-modal-field">
                                <div class="l-gallery-modal-field__ttl-area">
                                  <div class="l-gallery-modal-field__txt">
                                    <div class="ttl">お客様からのご要望</div>
                                    <?php if (!empty($gallery_field_ttl_txt)) : ?>
                                      <p class="txt">
                                        <?= nl2br($gallery_field_ttl_txt); ?>
                                      </p>
                                    <?php endif; ?>
                                  </div>
                                </div>
                                <div class="l-gallery-modal-field__cont-wrap">
                                  <?php if (!empty($gallery_field_table[0])) : ?>
                                    <table class="c-table02">
                                      <?php foreach ($gallery_field_table as $table) : ?>
                                        <tr>
                                          <?php if (!empty($table['gallery_field_table_ttl'])) : ?>
                                            <th>
                                              <?= $table['gallery_field_table_ttl'] ?>
                                            </th>
                                          <?php endif; ?>
                                          <?php if (!empty($table['gallery_field_table_txt'])) : ?>
                                            <td>
                                              <?= $table['gallery_field_table_txt'] ?>
                                            </td>
                                          <?php endif; ?>
                                        </tr>
                                      <?php endforeach; ?>
                                    </table>
                                  <?php endif; ?>
                                  <?php if (!empty($gallery_field_area)) : ?>
                                    <div class="l-gallery-modal-field__area">会場：<?= $gallery_field_area ?></div>
                                  <?php endif; ?>
                                  <?php if (!empty($gallery_field_contents[0])) : ?>
                                    <div class="l-gallery-modal-field__content">
                                      <?php foreach ($gallery_field_contents as $content) : ?>
                                        <div class="l-gallery-modal-field__content-box">
                                          <?php if (!empty($content['gallery_field_contents_ttl'])) : ?>
                                            <div class="ttl">
                                              <?= $content['gallery_field_contents_ttl'] ?>
                                            </div>
                                          <?php endif; ?>
                                          <?php if (!empty($content['gallery_field_contents_txt'])) : ?>
                                            <p class="txt">
                                              <?= nl2br($content['gallery_field_contents_txt']) ?>
                                            </p>
                                          <?php endif; ?>
                                          <?php if (!empty($content['gallery_field_contents_img'])) : ?>
                                            <?php
                                            $img_url = $content['gallery_field_contents_img']['url'];
                                            ?>
                                            <div class="img">
                                              <img src="<?= $img_url ?>" alt="">
                                            </div>
                                          <?php endif; ?>
                                        </div>
                                      <?php endforeach; ?>
                                    </div>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>

                        <div class="l-gallery-modal__close js-modal-close">
                          <span class="close">CLOSE</span>
                        </div>
                      </div>

                    </div>
                  <?php endforeach; ?>
                  </ul>
                </div>
                <div class="p_home-lead-sec02__btn">
                  <a href="<?= $home_url ?>/gallery/" class="p_home-btn02">
                    東京で実施した<br class="sp">ケータリング事例を見る
                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>


        <?php $popular_cateling_menu = get_field('popular_cateling_menu', 'option'); ?>

        <?php if (!empty($popular_cateling_menu)): ?>
          <div class="p_home-rank">
            <div class="p_home-rank__ttl">
              <span class="p_menu-archive-kv block">
                <span class="p_menu-archive-kv__img">
                  <img src="https://188.mh-test-4932.com/wp/wp-content/themes/buffet/img/cateling/kv.jpg" alt="">
                </span>
                <span class="p_menu-archive-kv__ttl ptn02 anm is-animated">
                  <span class="c-ttl02">
                    <span class="c-ttl02__box">
                      <span class="dec white"></span>
                      <h2 class="txt white">
                        東京のケータリングの<br class="sp"><span class="big">ランキング</span>
                      </h2>
                      <div class="dec white"></div>
                    </span>
                    <span class="c-ttl02__sub">
                      <img src="<?= $template_url; ?>/img/home/Ranking-txt.svg" alt="">
                    </span>
                  </span>
                </span>
              </span>
            </div>
            <div class="p_home-rank__cont">
              <div class="inner-block">
                <ul class="c-menu-list ptn_long ptn02 anm-list pat-home is-animated">
                  <?php if (!empty($popular_cateling_menu[0])): ?>
                    <?php
                    $menu01 = $popular_cateling_menu[0];
                    $menu01_id = $menu01->ID;
                    $menu01_thumb = get_the_post_thumbnail_url($menu01_id);
                    $menu01_link = get_permalink($menu01_id);
                    $menu01_ttl_en = get_field('cateling_name_en', $menu01_id);
                    $menu01_ttl_jp = get_field('cateling_name_jp', $menu01_id);
                    $menu01_desc01 = get_field('cateling_desc01', $menu01_id);
                    $menu01_num = get_field('cateling_num', $menu01_id);
                    $menu01_price01 = get_field('cateling_price_tax', $menu01_id);
                    $menu01_price02 = get_field('cateling_price', $menu01_id);



                    $menu01_img = $menu01_thumb ? $menu01_thumb : $template_url . '/img/common/no_img.jpg';
                    ?>
                    <li class="num_ico is-animated" style="animation-delay: 0s;">
                      <div class="p_home-populer01">
                        <div class="p_home-populer01__num ptn01"><span class="txt">人気</span><span class="num">No.01</span></div>
                      </div>
                      <a href="<?= $menu01_link ?>"
                        class="c-menu-list__item long">
                        <div class="c-menu-list__img">
                          <img src="<?= $menu01_img ?>" alt="">
                        </div>
                        <div class="c-menu-list__txt-box ptn02">
                          <?php if (!empty($menu01_ttl_en) || !empty($menu01_ttl_jp)): ?>
                            <h3 class="c-menu-list__ttl fz28 blown">
                              <?php if (!empty($menu01_ttl_en)): ?>
                                <?= $menu01_ttl_en ?> <br>
                              <?php endif; ?>
                              <?php if (!empty($menu01_ttl_jp)): ?>
                                <?= $menu01_ttl_jp ?>
                              <?php endif; ?>
                            </h3>
                          <?php endif; ?>
                          <?php if (!empty($menu01_desc01)): ?>
                            <p class="c-menu-list__cap">
                              <?= nl2br($menu01_desc01); ?>
                            </p>
                          <?php endif; ?>
                          <div class="c-menu-list__box">
                            <div class="c-price-box ptn01">
                              <div class="box">
                                <?php if (!empty($menu01_num)): ?>
                                  <span class="wrap">
                                    <span class="fz1">全</span><span class="fz2 adjust"><?= $menu01_num ?></span><span class="fz1">品</span>
                                  </span>
                                <?php endif; ?>
                                <?php if (!empty($menu01_price01)): ?>
                                  <?php $menu01_price01 = safe_number_format($menu01_price01) ?>
                                  <span class="wrap">
                                    <span class="fz3 adjust">￥</span><span class="fz4 adjust"><?= $menu01_price01 ?></span><br class="sp">
                                  </span>
                                <?php endif; ?>
                              </div>
                              <?php if (!empty($menu01_price02)): ?>
                                <?php $menu01_price02 = safe_number_format($menu01_price02) ?>
                                <span class="wrap">
                                  &emsp;<span class="fz5">(税抜¥<span class="fz6"><?= $menu01_price02 ?></span>)/</span><span class="fz6">1</span><span
                                    class="fz5">名あたり</span>
                                </span>
                              <?php endif; ?>
                            </div>
                            <div class="p_menu-archive-cont__btn mtm">
                              <div class="c-view-more bg_img blown">View More</div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endif; ?>

                </ul>
              </div>
            </div>
            <div class="p_home-rank__bottom">
              <div class="inner-block">
                <ul class="c-menu-list mt anm-list pat-home03 is-animated">
                  <?php if (!empty($popular_cateling_menu[1])): ?>
                    <?php
                    $menu02 = $popular_cateling_menu[1];
                    $menu02_id = $menu02->ID;
                    $menu02_thumb = get_the_post_thumbnail_url($menu02_id);
                    $menu02_link = get_permalink($menu02_id);
                    $menu02_ttl_en = get_field('cateling_name_en', $menu02_id);
                    $menu02_ttl_jp = get_field('cateling_name_jp', $menu02_id);
                    $menu02_desc01 = get_field('cateling_desc01', $menu02_id);
                    $menu02_num = get_field('cateling_num', $menu02_id);
                    $menu02_price01 = get_field('cateling_price_tax', $menu02_id);
                    $menu02_price02 = get_field('cateling_price', $menu02_id);


                    $menu_img02 = $menu02_thumb ? $menu02_thumb : $template_url . '/img/common/no_img.jpg';
                    ?>
                    <li style="animation-delay: 0s;" class="is-animated">
                      <div class="p_home-populer02 ptn02">
                        <span class="num"><span class="txt">人気</span><span class="line02">No.02</span></span>
                      </div>
                      <a href="<?= $menu02_link ?>" class="c-menu-list__item">
                        <div class="c-menu-list__img">
                          <img src="<?= $menu_img02 ?>" alt="">
                        </div>
                        <div class="c-menu-list__txt-box mt-small">
                          <h3 class="c-menu-list__ttl fz24 blown">
                            <?php if (!empty($menu02_ttl_en)): ?>
                              <?= $menu02_ttl_en ?> <br>
                            <?php endif; ?>
                            <?php if (!empty($menu02_ttl_jp)): ?>
                              <?= $menu02_ttl_jp ?>
                            <?php endif; ?>
                          </h3>
                          <?php if (!empty($menu02_desc01)): ?>
                            <p class="c-menu-list__cap ls0">
                              <?= nl2br($menu02_desc01); ?>
                            </p>
                          <?php endif; ?>

                          <div class="c-menu-list__box">
                            <div class="c-price-box ptn01">
                              <div class="box">
                                <?php if (!empty($menu02_num)): ?>
                                  <span class="wrap">
                                    <span class="fz1">全</span><span class="fz2"><?= $menu02_num ?></span><span class="fz1">品</span>
                                  </span>
                                <?php endif; ?>
                                <?php if (!empty($menu02_price01)): ?>
                                  <?php $menu02_price01 = safe_number_format($menu02_price01) ?>
                                  <span class="wrap">
                                    <span class="fz3">￥</span><span class="fz4"><?= $menu02_price01 ?></span>
                                  </span>
                                <?php endif; ?>
                              </div>
                              <?php if (!empty($menu02_price02)): ?>
                                <?php $menu02_price02 = safe_number_format($menu02_price02) ?>
                                <span class="wrap">
                                  <span class="fz5">(税抜¥<span class="fz6"><?= $menu02_price02 ?></span>)/</span><span class="fz6">1</span><span
                                    class="fz5">名あたり</span>
                                </span>
                              <?php endif; ?>
                            </div>
                            <div class="p_menu-archive-cont__btn">
                              <div class="c-view-more bg_img blown mt02">View More</div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if (!empty($popular_cateling_menu[2])): ?>
                    <?php
                    $menu03 = $popular_cateling_menu[2];
                    $menu03_id = $menu03->ID;
                    $menu03_thumb = get_the_post_thumbnail_url($menu03_id);
                    $menu03_link = get_permalink($menu03_id);
                    $menu03_ttl_en = get_field('cateling_name_en', $menu03_id);
                    $menu03_ttl_jp = get_field('cateling_name_jp', $menu03_id);
                    $menu03_desc01 = get_field('cateling_desc01', $menu03_id);
                    $menu03_num = get_field('cateling_num', $menu03_id);
                    $menu03_price01 = get_field('cateling_price_tax', $menu03_id);
                    $menu03_price02 = get_field('cateling_price', $menu03_id);

                    $menu_img03 = $menu03_thumb ? $menu03_thumb : $template_url . '/img/common/no_img.jpg';
                    ?>
                    <li style="animation-delay: 0.2s;" class="is-animated">
                      <div class="p_home-populer02 ptn02">
                        <span class="num"><span class="txt">人気</span><span class="line02">No.03</span></span>
                      </div>
                      <a href="<?= $menu03_link ?>" class="c-menu-list__item">
                        <div class="c-menu-list__img">
                          <img src="<?= $menu_img03 ?>" alt="">
                        </div>
                        <div class="c-menu-list__txt-box mt-small">
                          <h3 class="c-menu-list__ttl fz24 blown">
                            <?php if (!empty($menu03_ttl_en)): ?>
                              <?= $menu03_ttl_en ?> <br>
                            <?php endif; ?>
                            <?php if (!empty($menu03_ttl_jp)): ?>
                              <?= $menu03_ttl_jp ?>
                            <?php endif; ?>
                          </h3>
                          <?php if (!empty($menu03_desc01)): ?>
                            <p class="c-menu-list__cap ls0">
                              <?= nl2br($menu03_desc01); ?>
                            </p>
                          <?php endif; ?>
                          <div class="c-menu-list__box">
                            <div class="c-price-box ptn01">
                              <div class="box">
                                <?php if (!empty($menu03_num)): ?>
                                  <span class="wrap">
                                    <span class="fz1">全</span><span class="fz2"><?= $menu03_num ?></span><span class="fz1">品</span>
                                  </span>
                                <?php endif; ?>
                                <?php if (!empty($menu03_price01)): ?>
                                  <?php $menu03_price01 = safe_number_format($menu03_price01) ?>
                                  <span class="wrap">
                                    <span class="fz3">￥</span><span class="fz4"><?= $menu03_price01 ?></span>
                                  </span>
                                <?php endif; ?>
                              </div>
                              <?php if (!empty($menu03_price02)): ?>
                                <?php $menu03_price02 = safe_number_format($menu03_price02) ?>
                                <span class="wrap">
                                  <span class="fz5">(税抜¥<span class="fz6"><?= $menu03_price02 ?></span>)/</span><span class="fz6">1</span><span
                                    class="fz5">名あたり</span>
                                </span>
                              <?php endif; ?>
                            </div>
                            <div class="p_menu-archive-cont__btn">
                              <div class="c-view-more bg_img blown mt02">View More</div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
            <div class="p_home-rank__btn">
              <a href="<?= $home_url ?>/cateling/" class="p_home-btn02">
                ケータリングプランを見る
              </a>
            </div>
          </div>
        <?php endif; ?>


        <div class="p_home-price">
          <div class="p_home-price__ttl">
            <span class="p_menu-archive-kv small block">
              <span class="p_menu-archive-kv__img">
                <img src="<?= $template_url; ?>/img/home/kv02.jpg" alt="">
              </span>
              <span class="p_menu-archive-kv__ttl ptn03 anm is-animated">
                <span class="c-ttl02">
                  <span class="c-ttl02__box">
                    <span class="dec white"></span>
                    <h2 class="txt white">
                      東京のケータリングを<br class="sp"><span class="big">予算から探す</span>
                    </h2>
                    <div class="dec white"></div>
                  </span>
                  <span class="c-ttl02__sub">
                    <img src="<?= $template_url; ?>/img/home/Budget-txt.svg" alt="">
                  </span>
                </span>
              </span>
            </span>
          </div>
          <div class="p_home-price__cont">
            <div class="inner-block">
              <div class="p_home-price__box">
                <div class="p_home-price__subttl">
                  <div class="p_budget-ankor__ttl c-l-ttl">ケータリング</div>
                </div>
                <div class="p_home-price__list">
                  <?php
                  //tax_delivery_priceとtax_cateling_priceを取得
                  $terms_cateling = get_terms('tax_cateling_price');
                  $terms_delivery = get_terms('tax_delivery_price');

                  //オプションページのカスタムフィールド取得
                  $budget_catering = get_field('budget_catering', 'option');

                  $budget_deli = get_field('budget_deli', 'option');

                  $is_top = true;

                  ?>
                  <?php if ($budget_catering) : ?>
                    <ul class="p_scene-list p_price-list p_budget-ankor__list anm-list is-animated">
                      <?php foreach ($budget_catering as $i => $item) : ?>
                        <?php $i++; ?>
                        <li style="animation-delay: 0s;" class="is-animated">
                          <a href="<?= $is_top ? home_url('/budget/#budget_c' . $i) : '#budget_c' . $i ?>" class="c-img-btn p_small">
                            <div class="c-img-btn__img-wrap">
                            </div>
                            <div class="c-img-btn__txt p_budget-ankor__txt">
                              <span class="big"><?= esc_html($item['budget_catering_price']) ?></span>円〜
                            </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              </div>
              <div class="p_home-price__box">
                <div class="p_home-price__subttl">
                  <div class="p_budget-ankor__ttl c-l-ttl green">オードブルデリバリー</div>
                </div>
                <div class="p_home-price__list">
                  <?php
                  // page-budget 上部のアンカーと同一仕様に合わせる（ACFオプション）
                  $budget_deli = get_field('budget_deli', 'option');
                  ?>
                  <?php if (!empty($budget_deli)) : ?>
                    <ul class="p_scene-list p_price-list p_budget-ankor__list anm-list is-animated">
                      <?php foreach ($budget_deli as $i => $item) : ?>
                        <?php
                        $i++;
                        $href = home_url('/budget/#budget_d' . $i);
                        $price = isset($item['budget_deli_price']) ? $item['budget_deli_price'] : '';
                        ?>
                        <li style="animation-delay: 0s;" class="is-animated">
                          <a href="<?= esc_url($href) ?>" class="c-img-btn p_small green">
                            <div class="c-img-btn__img-wrap"></div>
                            <div class="c-img-btn__txt p_budget-ankor__txt">
                              <?php if (!empty($price)) : ?>
                                <span class="big"><?= esc_html($price) ?></span>円〜
                              <?php endif; ?>
                            </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              </div>
              <div class="p_home-price__btn">
                <a href="<?= $home_url ?>/budget/" class="p_home-btn02">
                  予算別で<br class="sp">ケータリングプランを見る
                </a>
              </div>
            </div>
          </div>
        </div>


        <?php
        $top_options = get_field('top_option', 'option');
        ?>
        <?php if (!empty($top_options[0])): ?>
          <div class="p_home-option">

            <div class="p_home-option__ttl">
              <span class="p_menu-archive-kv small block">
                <span class="p_menu-archive-kv__img">
                  <img src="<?= $template_url; ?>/img/home/kv02.jpg" alt="">
                </span>
                <span class="p_menu-archive-kv__ttl ptn03 anm is-animated">
                  <span class="c-ttl02">
                    <span class="c-ttl02__box">
                      <span class="dec white"></span>
                      <h2 class="txt white">
                        東京のケータリングで<br class="sp"><span class="big">人気なオプションプラン</span>
                      </h2>
                      <div class="dec white"></div>
                    </span>
                    <span class="c-ttl02__sub">
                      <img src="<?= $template_url; ?>/img/home/Option-txt.svg" alt="">
                    </span>
                  </span>
                </span>
              </span>
            </div>

            <div class="p_home-option__cont">

              <div class="inner-block">
                <div class="p_home-option__list">
                  <ul class="c-menu-list anm-list is-animated">

                    <?php foreach ($top_options as $item): ?>
                      <?php
                      $top_option_id = $item->ID;
                      $top_option_ttl_custom = get_field('cateling_option_name_custom', $top_option_id);
                      $top_option_ttl = $top_option_ttl_custom ? $top_option_ttl_custom : $item->post_title;

                      $top_option_cap = get_field('cateling_option_cap', $top_option_id);
                      $top_option_img = get_the_post_thumbnail_url($top_option_id);
                      $item_img = $top_option_img ? $top_option_img : $template_url . '/img/common/no_img.jpg';
                      $item_link = get_permalink($top_option_id);
                      ?>
                      <li class="is-animated" style="animation-delay: 0s;">
                        <a href="<?= $item_link ?>"
                          class="c-menu-list__item">
                          <div class="c-menu-list__img pat-scene">
                            <img src="<?= $item_img; ?>" alt="">
                          </div>
                          <div class="c-menu-list__txt-box pt15">
                            <?php if (!empty($top_option_ttl)): ?>
                              <h3 class="c-menu-list__ttl cataling p15 blown">
                                <?= $top_option_ttl; ?>
                              </h3>
                            <?php endif; ?>
                            <?php if (!empty($top_option_cap)): ?>
                              <p class="c-menu-list__cap p15 ls0 mt5">
                                <?= nl2br($top_option_cap); ?>
                              </p>
                            <?php endif; ?>
                            <div class="c-menu-list__box">
                              <div class="p_menu-archive-cont__btn small">
                                <div class="c-view-more bg_img cataling blown">
                                  View More
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </li>
                    <?php endforeach; ?>


                  </ul>

                </div>

                <div class="p_home-option__btn">
                  <a href="<?= $home_url ?>/cateling-options/" class="p_home-btn02">
                    ケータリング<br class="sp">オプションプランを見る
                  </a>
                </div>


              </div>


            </div>


          </div>
        <?php endif; ?>


      </div>

      <!-- Compelling -->
      <div class="p_home-bg-wrap02 bg_img">
        <div class="p_home-sec03__dec01 pc">
          <img src="<?= $template_url; ?>/img/home/home_dec-drink02.svg" alt="">
        </div>
        <div class="p_home-sec04 anm-up">
          <div class="inner-block">
            <div class="p_home-ttl02 Allura">
              Compelling
            </div>
            <div class="p_home-ttl02__sub">
              選ばれる理由
            </div>
            <h2 class="p_home-sec04__img">
              <img src="<?= $template_url; ?>/img/home/home_reason.png" alt="Mr.BUFFETが選ばれる理由">
            </h2>
            <div class="p_home-sec04__cap">
              たくさんのお客様からリピートいただいております。<br>レセプションパーティー等の一度きりのイベントを除くと、 ほぼ 100% のリピート率です。
            </div>
            <div class="p_home-sec04__list">
              <ul class="p_home-list02 anm-list">
                <li class="c-stripe">
                  <div class="p_home-list02__item">
                    <div class="p_home-list02__icon">
                      <img src="<?= $template_url; ?>/img/home/home_list01.png" alt="">
                    </div>
                    <div class="p_home-list02__box01">
                      <div class="p_home-list02__ttl">
                        <span class="num Allura">01</span>
                        <h3 class="txt">
                          セッティングから後片付けまで<br class="pc">箸、取り皿など備品を無料でご用意
                        </h3>
                      </div>
                      <div class="p_home-list02__cap">
                        テーブルのセッティングなどパーティの準備から後片付けまで全て我々にお任せください。ケータリングに必要な備品なども準備いたします。
                      </div>
                    </div>
                    <div class="p_home-list02__img">
                      <img src="<?= $template_url; ?>/img/home/home_human_list01.jpg" class="pc" alt="">
                    </div>
                  </div>
                </li>
                <li class="c-stripe">
                  <div class="p_home-list02__item">
                    <div class="p_home-list02__icon">
                      <img src="<?= $template_url; ?>/img/home/home_list02.png" alt="">
                    </div>
                    <div class="p_home-list02__box01">
                      <div class="p_home-list02__ttl">
                        <span class="num Allura">02</span>
                        <h3 class="txt">
                          経験豊富なスタッフがご対応します
                        </h3>
                      </div>
                      <div class="p_home-list02__cap">
                        ケータリングの運営経験が豊富なスタッフがパーティの企画段階からサポートします。女性が多い、年配の方が多い、立食パーティ向きの食事を準備してほしい・・・等ご要望に合わせて最高のケータリングを提案します。
                      </div>
                    </div>
                    <div class="p_home-list02__img">
                      <img src="<?= $template_url; ?>/img/home/home_human_list02.jpg" class="pc" alt="">
                    </div>
                  </div>
                </li>
                <li class="c-stripe">
                  <div class="p_home-list02__item">
                    <div class="p_home-list02__icon">
                      <img src="<?= $template_url; ?>/img/home/home_list03.png" alt="">
                    </div>
                    <div class="p_home-list02__box01">
                      <div class="p_home-list02__ttl">
                        <span class="num Allura">03</span>
                        <h3 class="txt">
                          アツアツ料理を提供します
                        </h3>
                      </div>
                      <div class="p_home-list02__cap">
                        オシャレな料理もいいけどやはり温かくておいしい料理も食べたい。そんなご要望に合わせてアツアツで美味しい料理をお選びいただきます。詳しくはケータリングやオードブルデリバリーのメニューをご覧ください。
                      </div>
                    </div>
                    <div class="p_home-list02__img list03">
                      <img src="<?= $template_url; ?>/img/home/home_human_list03.jpg" class="pc" alt="">
                    </div>
                  </div>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>


      <!-- price  -->
      <div class="p_home-bg-wrap bg_img p_home-price">

        <div class="p_home-sec07 blog anm-up">
          <div class="inner-block">
            <div class="p_home-ttl03">
              <span class="dec"></span>
              <div class="p_home-ttl03__box">
                <img src="<?= $template_url; ?>/img/home/home_blog01.svg" alt="">
                <h2 class="p_home-ttl03__ttl">
                  <span class="en Allura">
                    Blog
                  </span>

                </h2>
              </div>

              <span class="dec"></span>
            </div>

            <div class="p_home-sec07__list">
              <?php
              $blog_args = array(
                'post_type' => array('blog'),
                'post_status' => 'publish',
                'posts_per_page' => 3,
              );
              $blog_query = new WP_Query($blog_args);
              ?>
              <?php if ($blog_query->have_posts()) : ?>
                <ul class="c-article-list">
                  <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <?php get_template_part('inc/blog-item'); ?>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>

            <div class="p_home-sec07__btn">
              <a href="<?= $home_url ?>/blog/" class="p_home-btn02">一覧はこちら</a>
            </div>

          </div>
        </div>

        <div class="p_home-sec08 insta anm-up bg_img">
          <div class="inner-block">
            <h2 class="p_home-ttl02 Allura">
              Instagram
            </h2>
            <div class="p_home-sec08__list">
              <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
            </div>

            <div class="p_home-sec08__btn">
              <a href="https://www.instagram.com/mr.buffet_catering/" target="_blank" class="p_home-btn02">公式アカウントはこちら</a>
            </div>

          </div>
        </div>
      </div>






      <!-- faq  -->
      <div class="p_home-bg-wrap02 bg_img">
        <div class="p_home-sec09 faq anm-up">
          <div class="p_home-sec09__dec01 pc">
            <img src="<?= $template_url; ?>/img/home/home_dec-pizza02.svg" alt="">
          </div>
          <div class="inner-block">
            <h2 class="p_home-ttl02 Allura">
              FAQ
            </h2>

            <?php
            $faq = get_field('top_faq', 'options');
            if ($faq[0]) :
            ?>
              <div class="p_faq-body__cont">

                <ul class="c-faq-list anm-list">
                  <?php foreach ($faq as $item) :
                    $cont = get_field('faq_a', $item->ID);
                  ?>
                    <li>
                      <div class="c-faq-list__item">
                        <div class="c-faq-list__q">
                          <span class="c-faq-list__dec01">Q</span>
                          <div class="c-faq-list__txtbox">
                            <p class="c-faq-list__txt01"><?= $item->post_title ?></p>
                            <div class="c-faq-list__btn">
                              <span></span>
                              <span></span>
                            </div>
                          </div>
                        </div>
                        <div class="c-faq-list__a" style="display: none;">
                          <span class="c-faq-list__dec02">A</span>
                          <p class="c-faq-list__txt02">
                            <?= nl2br($cont) ?>
                          </p>
                        </div>
                      </div>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>

            <?php endif; ?>


          </div>
        </div>

        <!-- 対応エリア -->
        <div class="p_home-sec10 area anm-up">
          <div class="inner-block">
            <div class="p_home-ttl03">
              <span class="dec"></span>
              <div class="p_home-ttl03__box">
                <img src="<?= $template_url; ?>/img/home/home_car.svg" alt="">
                <h2 class="p_home-ttl03__ttl pat-area">
                  <span class="en pat-area">
                    AREA
                  </span>
                </h2>
              </div>
              <span class="dec"></span>
            </div>
            <div class="p_home-sec10__box">
              <?php get_template_part('inc/area-item', null, ['top_flg' => true]); ?>
            </div>

          </div>
        </div>
      </div>


    </main>
  </div>
</div>

<?php
get_footer();
