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

//新着記事
//$args = array(
//  'post_type' => 'post',
//  'post_status' => 'publish',
//  'posts_per_page' => 9,
//  'paged' => get_query_var('paged'),
//  'order' => 'DESC',
//  'orderby' => 'date',
//);
//$new_query = new WP_Query($args);

get_header();
?>

<main class="outer-block p_home">
  <section class="p_home-mv">
    <div class="p_home-mv__mv">
      <img src="<?= $template_url ?>/img/home/mv.png" class="pc" alt="トップイメージ">
      <img src="<?= $template_url ?>/img/home/mv_sp.png" class="sp" alt="トップイメージ">
    </div>
    <div class="p_home-mv__noise01"></div>
    <div class="p_home-mv__noise02"></div>
    <div class="p_home-mv__txtArea">
      <p class="p_home-mv__ttl">
        特別な瞬間を彩る<br>
        オーダーメイドケーキ＆スイーツ
      </p>
      <div class="p_home-mv__logo">
        <img src="<?= $template_url ?>/img/home/logo.svg" class="pc" alt="BONBONNIER">
        <img src="<?= $template_url ?>/img/home/logo_white.svg" class="sp" alt="BONBONNIER">
      </div>
    </div>
  </section>

  <!-- FOR COMPANY -->
  <section class="p_home-sec01 c-wave01">
    <div class="inner-block">
      <div class="c-sec-ttl">
        <div class="c-sec-ttl__img">
          <img src="<?= $template_url ?>/img/home/ttl-dec01.png" alt="For Company">
        </div>
        <span class="c-sec-ttl__line"></span>
        <h2 class="c-sec-ttl__txt">オフィシャルパーティー<br>法人・団体様向け</h2>
      </div>

      <!-- コンテンツ -->
      <?php
      $query_company = new WP_Query([
        'post_type'      => 'service',
        'posts_per_page' => 4,
        'tax_query'      => [
          [
            'taxonomy' => 'tax_usage_type',
            'field'    => 'slug',
            'terms'    => 'for-company',
          ],
        ],
      ]);
      ?>
      <?php if ($query_company->have_posts()) : ?>
        <ul class="p_home-sec01__list">

          <?php while ($query_company->have_posts()) : $query_company->the_post(); ?>

            <?php
            $post_id = get_the_ID();

            $ttl_en = SCF::get('ttl_en', $post_id);
            $catch  = SCF::get('catch', $post_id);

            // サムネイル処理
            $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
            if (!$thumbnail_url) {
              $thumbnail_url = $template_url . '/img/common/dummy_light.jpg';
            }
            ?>

            <li class="p_home-sec01__item">
              <a href="<?php the_permalink(); ?>" class="p_home-sec01__link">
                <div class="p_home-sec01__img">
                  <img src="<?= esc_url($thumbnail_url); ?>" alt="<?= esc_attr(get_the_title()); ?>">
                </div>

                <div class="p_home-sec01__txtArea">
                  <p class="p_home-sec01__ttl01 poppins">
                    <?= esc_html($ttl_en); ?>
                  </p>

                  <h3 class="p_home-sec01__ttl02">
                    <?php the_title(); ?>
                  </h3>

                  <p class="p_home-sec01__txt">
                    <?= nl2br(esc_html($catch)); ?>
                  </p>
                </div>
              </a>
            </li>

          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>

        </ul>
      <?php endif; ?>


    </div>
  </section>
  <!-- /FOR COMPANY -->

  <!-- FOR YOU -->
  <section class="p_home-sec02 c-wave03">
    <div class="inner-block">
      <div class="c-sec-ttl">
        <div class="c-sec-ttl__img">
          <img src="<?= $template_url ?>/img/home/ttl-dec02.png" alt="For You">
        </div>
        <span class="c-sec-ttl__line"></span>
        <h2 class="c-sec-ttl__txt">ホームパーティー<br>大切な方へのプレゼント</h2>
      </div>
      <!-- コンテンツ -->
      <?php
      $query_you = new WP_Query([
        'post_type'      => 'service',
        'posts_per_page' => 4,
        'tax_query'      => [
          [
            'taxonomy' => 'tax_usage_type',
            'field'    => 'slug',
            'terms'    => 'for-you',
          ],
        ],
      ]);
      ?>
      <?php if ($query_you->have_posts()) : ?>
        <ul class="p_home-sec01__list">

          <?php while ($query_you->have_posts()) : $query_you->the_post(); ?>

            <?php
            $post_id = get_the_ID();

            $ttl_en = SCF::get('ttl_en', $post_id);
            $catch  = SCF::get('catch', $post_id);

            // サムネイル処理
            $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
            if (!$thumbnail_url) {
              $thumbnail_url = $template_url . '/img/common/dummy.jpg';
            }
            ?>

            <li class="p_home-sec01__item">
              <a href="<?php the_permalink(); ?>" class="p_home-sec01__link">
                <div class="p_home-sec01__img">
                  <img src="<?= esc_url($thumbnail_url); ?>" alt="<?= esc_attr(get_the_title()); ?>">
                </div>

                <div class="p_home-sec01__txtArea">
                  <p class="p_home-sec01__ttl01 poppins">
                    <?= esc_html($ttl_en); ?>
                  </p>

                  <h3 class="p_home-sec01__ttl02">
                    <?php the_title(); ?>
                  </h3>

                  <p class="p_home-sec01__txt">
                    <?= nl2br(esc_html($catch)); ?>
                  </p>
                </div>
              </a>
            </li>

          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>

        </ul>
      <?php endif; ?>

      <!-- ギャラリー -->
      <?php
      $query_s_gallery_you = new WP_Query([
        'post_type'      => 's_gallery',
        'posts_per_page' => -1,
        'tax_query'      => [
          [
            'taxonomy' => 'tax_s_gallery_usage_type',
            'field'    => 'slug',
            'terms'    => 'for-you',
          ],
        ],
      ]);
      ?>
      <h2 class="p_home__ttl01 en">GALLERY</h2>
      <p class="p_home__txt01">お客様の大切な日を彩った、世界にひとつだけのケーキたち。</p>
      <div class="p_home-sec01__gallery-wrap">
        <div class="p_home-sec01__gallery swiper">
          <div class="swiper-wrapper">
            <?php if ($query_s_gallery_you->have_posts()) : ?>
              <?php while ($query_s_gallery_you->have_posts()) : $query_s_gallery_you->the_post(); ?>

                <?php
                $post_id = get_the_ID();

                // サムネイル処理
                $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
                if (!$thumbnail_url) {
                  $thumbnail_url = $template_url . '/img/common/dummy.jpg';
                }
                ?>

                <div class="p_home-sec01__gallery-item swiper-slide">
                  <div class="p_home-sec01__gallery-link l-gallery-list__item">
                    <div class="p_home-sec01__gallery-img l-gallery-list__img">
                      <img
                        src="<?= esc_url($thumbnail_url); ?>"
                        alt="">
                    </div>
                    <div class="l-gallery-list__txt">
                      <div class="l-gallery-list__txt-box">
                        <div class="ttl">
                          <?php the_title(); ?>
                        </div>
                        <div class="txt">
                          <?php the_excerpt(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>

        </div>
        <div class="p_home-sec01__gallery-button-prev"></div>
        <div class="p_home-sec01__gallery-button-next"></div>
      </div>
      <div class="p_home-sec01__btnWrap">
        <a href="<?= $home_url ?>/s_gallery?usage=foryou/" class="c-btn-view-more is-brown">VIEW MORE</a>
      </div>

      <section class="p_home-lead">
        <div class="p_home-lead__dec"></div>
        <div class="p_home-lead__txtwarp">
          <p class="p_home-lead__txt">
            ボンボニエールのオーダーケーキは、<br class="sp">その名の通り、<br>
            お客様一人ひとりの大切な想いや<br class="sp">ご希望に寄り添ってお作りする<br>
            “世界にひとつだけ”の特別なケーキです。
          </p>
          <p class="p_home-lead__txt u-mt"  style="--mt-pc: 50px; --mt-sp: 24px;">
            専門コンシェルジュと<br class="sp">一からデザインを創り上げる「フルオーダー」と、<br>
            お好みのスタイルから注文できる<br class="sp">「セミオーダー」をご用意しております。
          </p>
        </div>
        <div class="p_home-lead__btn u-mt" style="--mt-pc: 85px; --mt-sp: 50px;">
          <a href="<?= $home_url ?>//description/" class="c-goldline-btn litebrown">
            <span class="c-goldline-btn__line"></span>
            <span class="c-goldline-btn__en en">
              FULL ORDER
            </span>
            <span class="c-goldline-btn__ja">
              フルオーダー
            </span>
          </a>
          <a href="<?= $home_url ?>//contact/" class="c-goldline-btn brown">
            <span class="c-goldline-btn__line"></span>
            <span class="c-goldline-btn__en en">
              Contact
            </span>
            <span class="c-goldline-btn__ja">
              お問い合わせ
            </span>
          </a>
        </div>
        <div class="p_home-lead__img01">
          <img src="<?= $template_url ?>/img/home/kuma-dec01.png" alt="セクションイメージ01">
        </div>
      </section>

    </div>
    <div class="p_home-sec02__bottomimg">
      <img src="<?= $template_url ?>/img/home/kuma-dec02.png" alt="セクションイメージ02">
    </div>
  </section>
  <!-- FOR YOU -->


  <section class="p_home-sec03">
    <div class="p_home-sec03__brown">

      <div class="inner-block">
        <div class="p_home-sec03__ttl">
          <div class="c-ttl02 ptn_rightbrown">
            <span class="dec"><img src="<?= $template_url ?>/img/common/kuma-dec02_gray.svg" alt=""></span>
            <h2 class="en u-mt" style="--mt: 16px">OUR LINE UP</h2>
          </div>
        </div>
      </div>

    </div>
    <div class="p_home-sec03__pink">

      <div class="inner-block">


        <div class="p_home-sec03__cont">
          <div class="p_home-sec03-item">
            <div class="p_home-sec03-item__img">
              <img src="<?= $template_url ?>/img/home/photocake.png" alt="セクションイメージ03">
            </div>
            <div class="p_home-sec03-item__ttl">
              <h3 class="p_home-sec03-item__en poppins">PHOTO CAKE</h3>
              <h4 class="p_home-sec03-item__ja">フォトケーキ</h4>
            </div>
            <div class="p_home-sec03-item__capwrap u-mt" style="--mt-pc: 42px; --mt-sp: 20px;">
              <p class="p_home-sec03-item__cap">
                お気に入りの写真をそのままケーキに。
              </p>
              <p class="p_home-sec03-item__cap">
                誕生日や記念日、推し活にも。
              </p>
              <p class="p_home-sec03-item__cap">
                手軽にオーダーできる人気メニューです
              </p>
            </div>
            <div class="p_home-sec03-item__btn u-mt" style="--mt-pc: 42px; --mt-sp: 20px;">
              <a href="<?= $home_url ?>/tax_cake_cat/cake01/" class="c-btn-view-more is-brown non_left">MORE</a>
            </div>
          </div>
          <div class="p_home-sec03-item">
            <div class="p_home-sec03-item__img">
              <img src="<?= $template_url ?>/img/home/ordercake.png" alt="セクションイメージ03">
            </div>
            <div class="p_home-sec03-item__ttl">
              <h3 class="p_home-sec03-item__en poppins">FULL ORDER CAKE</h3>
              <h4 class="p_home-sec03-item__ja">フルオーダーケーキ</h4>
            </div>
            <div class="p_home-sec03-item__capwrap u-mt" style="--mt-pc: 42px; --mt-sp: 20px;">
              <p class="p_home-sec03-item__cap">
                世界にたったひとつ。
              </p>
              <p class="p_home-sec03-item__cap">
                あなたの想いをそのままケーキに。
              </p>
              <p class="p_home-sec03-item__cap">
                デザインから味まで、完全オーダーメイド。
              </p>
            </div>
            <div class="p_home-sec03-item__btn u-mt" style="--mt-pc: 42px; --mt-sp: 20px;">
              <a href="<?= $home_url ?>/description/" class="c-btn-view-more is-brown non_left">MORE</a>
            </div>
          </div>

        </div>
      </div>


    </div>





  </section>

  <section class="p_home-sec04 c-wave01 line_top">
    <div class="inner-block">
      <div class="p_home-sec04__ttl">
        <div class="c-sec-ttl">
          <div class="c-sec-ttl__img">
            <img src="<?= $template_url ?>/img/home/ttl-dec03.png" alt="bon bon collection">
          </div>
          <span class="c-sec-ttl__line"></span>
          <div class="c-sec-ttl__txt">オフィシャルパーティー<br>法人・団体様向け</div>
        </div>
      </div>
      <div class="p_home-sec04__cont">
        <div class="p_home-sec04__img">
          <img src="<?= $template_url ?>/img/home/collection.png" alt="セクションイメージ04">
        </div>
        <div class="p_home-sec04__txt">
          <h2 class="p_home-sec04__txt-ttl">
            <p class="p_home-sec04__txt-en poppins">BON BON COLLECTION</p>
            <p class="p_home-sec04__txt-ja">コレクション</p>
          </h2>
          <div class="p_home-sec04__txt-capwrap u-mt" style="--mt-pc: 40px; --mt-sp: 20px">
            <p class="p_home-sec04__txt-cap">
              ボンボニエール パリが届ける、特別な
            </p>
            <p class="p_home-sec04__txt-cap">
              コレクションライン。
            </p>
            <p class="p_home-sec04__txt-cap">
              シグネチャーのくまケーキをはじめ、
            </p>
            <p class="p_home-sec04__txt-cap">
              パティシエのアートと情熱が詰まった
            </p>
            <p class="p_home-sec04__txt-cap">
              名品たち。
            </p>
          </div>
          <div class="p_home-sec04__btn u-mt" style="--mt-pc: 60px; --mt-sp: 30px">
            <a href="<?= $home_url ?>/collection/" class="c-btn-view-more non_left">MORE</a>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="p_home-sec05">
    <div class="inner-block">
      <div class="p_home-sec05__ttl">
        <h2 class="c-sec-ttl02">
          <p class="c-sec-ttl02__en en">HOW TO ORDER</p>
          <div class="c-sec-ttl02__ja">ご注文の流れ</div>
          </>
      </div>
      <div class="p_home-sec05__list u-mt" style="--mt-pc: 37px; --mt-sp: 15px">
        <ul class="c-num-list02">
          <li class="c-num-list02__li">
            <div class="c-num-list02__num">
              <img src="<?= $template_url ?>/img/home/num01.svg" alt="01">
            </div>
            <p class="c-num-list02__ttl">
              ご相談
            </p>
            <div class="c-num-list02__capwrap">
              <p class="c-num-list02__cap">
                フォームまたはお電話にて<br class="pc">ご希望をお聞かせください。
              </p>
            </div>
          </li>
          <li class="c-num-list02__li">
            <div class="c-num-list02__num">
              <img src="<?= $template_url ?>/img/home/num02.svg" alt="02">
            </div>
            <p class="c-num-list02__ttl">
              お見積り
            </p>
            <div class="c-num-list02__capwrap">
              <p class="c-num-list02__cap">
                デザインと金額をご提案<br class="pc">いたします
              </p>
            </div>
          </li>
          <li class="c-num-list02__li">
            <div class="c-num-list02__num">
              <img src="<?= $template_url ?>/img/home/num03.svg" alt="03">
            </div>
            <p class="c-num-list02__ttl">
              制作
            </p>
            <div class="c-num-list02__capwrap">
              <p class="c-num-list02__cap">
                パティシエが心を込めて<br class="pc">お作りいたします
              </p>
            </div>
          </li>
          <li class="c-num-list02__li">
            <div class="c-num-list02__num">
              <img src="<?= $template_url ?>/img/home/num04.svg" alt="04">
            </div>
            <p class="c-num-list02__ttl">
              配送・受取
            </p>
            <div class="c-num-list02__capwrap">
              <p class="c-num-list02__cap">
                大阪エリア配送または店<br class="pc">頭にてお受け取り
              </p>
            </div>
          </li>
        </ul>
      </div>
      <div class="p_home-sec05__bottom u-mt" style="--mt-pc:24px; --mt-sp: 12px">
        <p class="come-txt color_brown">
          オンライン決済はございません。フォームまたはお電話にてご注文ください。
        </p>
      </div>
      <div class="p_home-sec05__btn u-mt" style="--mt-pc:50px; --mt-sp: 25px">
        <a href="<?= $home_url ?>/consultation/" class="c-btn-view-more long is-brown02">注文・相談フォームへ</a>
      </div>
    </div>
  </section>

  <?php
  $column_query = new WP_Query(array(
    'post_type'      => 'column',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
  ));
  ?>
  <?php if ($column_query->have_posts()): ?>
    <section class="p_home-sec06">
      <div class="p_home-sec06__line">
        <img src="<?= $template_url ?>/img/home/news-line.svg" alt="">
      </div>
      <div class="inner-block">
        <div class="p_home-sec06__ttl">
          <h3 class="c-sec-ttl02">
            <p class="c-sec-ttl02__en en">COLUMN</p>
            <div class="c-sec-ttl02__ja">コラム</div>
          </h3>
        </div>
        <div class="p_home-sec06__cont u-mt" style="--mt-pc: 44px; --mt-sp:20px;">
          <ul class="l-article-list">
            <?php while ($column_query->have_posts()): $column_query->the_post(); ?>
              <?php
              $date = get_the_date('Y.m.d');
              $title = get_the_title();
              $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
              if (!$thumbnail_url) {
                $thumbnail_url = $template_url . '/img/common/dummy.jpg';
              }
              ?>
              <li class="l-article-list__li">
                <a href="<?php the_permalink(); ?>" class="l-article-list__link">
                  <div class="l-article-list__img">
                    <img src="<?= $thumbnail_url ?>" alt="">
                  </div>
                  <div class="l-article-list__txtarea">
                    <time datetime="" class="l-article-list__data"><?= $date ?></time>
                    <h4 class="l-article-list__cap">
                      <?= $title ?>
                    </h4>
                  </div>
                </a>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
        </div>
        <div class="p_home-sec06__btn u-mt" style="--mt-pc: 50px; --mt-sp: 25px;">
          <a href="<?= $home_url ?>/column/" class="c-btn-view-more is-brown02">VIEW MORE</a>
        </div>
      </div>
    </section>
  <?php endif; ?>

</main>


<?php
get_footer();
