<?php
global $template_url;
global $home_url;
get_header();
?>

  <div class="l-main">
    <div class="l-main__side pc">
      <?php get_sidebar(); ?>
    </div>

    <div class="l-main__main">
      <main class="outer-block p_drink-option p_option bg_img deli">
        <section class="l-mv">
          <div class="l-mv__img">
            <img src="<?= $template_url; ?>/img/option/cate_mv.jpg" alt="" />
          </div>
          <div class="l-mv__txt">
            <div class="inner-block02">
              <h1 class="l-mv__txtbox anm-right">
                <span class="en">Optional Services</span>
                <span class="ja">オードブルデリバリーメニュー オプションフード</span>
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
                <a href="<?= $home_url; ?>/delivery/" class="c-bread-list__item"
                >オードブルデリバリーメニュー</a
                >
              </li>
              <li class="c-bread-list__li">
                <span class="c-bread-list__txt">オプションフード</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="l-kv ptn01">
          <div class="l-kv__img">
            <img src="<?= $template_url; ?>/img/option/kv.jpg" alt="">
          </div>
          <div class="l-kv__txt-box">
            <div class="c-mini-en-ttl Allura anm">
              <span class="txt">Options dishdes</span>
            </div>
            <h2 class="l-kv__ttl anm">
              <span class="big">オプション料理</span>
              <!-- <span class="small">テキストが入ります。テキストが入ります。</span> -->
            </h2>
            <div class="l-kv__cap anm">
            パーティを盛り上げる絶品オプションフードや<br>大人気のデザートもおススメです。
            </div>
            <div class="l-kv__btn anm-list">
              <div class="btn">
                <a href="<?= $home_url; ?>/delivery-drink/" class="c-btn02 bg_img ico1 mini white drink">ドリンクプラン</a>
              </div>
              <div class="btn">
                <a href="<?= $home_url; ?>/delivery-options/" class="c-btn02 bg_img ico2 mini deli">オプションフード</a>
              </div>
            </div>
          </div>
        </div>


        <div class="p_option__cont">
          <div class="inner-block">
            <?php
            $option_service_args = array(
              'post_type' => array('delivery-option'),
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'order' => 'ASC',
              'orderby' => 'menu_order'
            );
            $option_service_query = new WP_Query($option_service_args);
            ?>
            <?php if ($option_service_query->have_posts()) : ?>
              <ul class="c-menu-list mt anm-list anm-list">
                <?php while
                ($option_service_query->have_posts()) : $option_service_query->the_post(); ?>
                  <?php get_template_part('inc/delivery-service-item'); ?>
                <?php endwhile ?>
              </ul>
            <?php endif; ?>
            <?php wp_reset_postdata();?>
            <div class="c-ico-info anm-up">
              <div class="c-ico-info__ttl">アイコンの説明</div>
              <div class="c-ico-info__cont">
                <div class="c-ico-info__box">
                  <div class="ico">
                    <img src="<?= $template_url; ?>/img/cateling/detail/ico02.svg" alt="" />
                  </div>
                  <div class="txt">温かいメニューです。</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>




<?php
get_footer();
