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
      <main class="outer-block p_drink-option p_option bg_img">
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
                <a href="<?= $home_url; ?>/cateling/" class="c-bread-list__item">ケータリングメニュー</a>
              </li>
              <li class="c-bread-list__li">
                <sapn class="c-bread-list__txt">オプションサービス</sapn>
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
            <?php
            $option_cats = get_terms('tax_option');
            ?>
            <?php if (!empty($option_cats)) : ?>
              <div class="l-kv__btn anm-list">
                <?php foreach ($option_cats as $i => $cat) :
                  //$catのスラッグを取得
                  $link = $cat->slug;
                  ?>
                  <div class="btn size-big">
                    <a href="#<?= $link ?>" class="c-btn02 bg_img ico1 mini white anchor"><?= $cat->name ?></a>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>


        <?php if(!empty($option_cats)):?>
          <div class="p_option__cont">
            <div class="inner-block">

              <?php foreach ($option_cats as $i => $cat) :
                //$catのスラッグを取得
                $link = $cat->slug;

                ?>
                <div class="p_menu-archive-cont__cont" id="<?= $link ?>">
                  <h2 class="c-ttl-ribon anm-up">
                    <div class="c-ttl-ribon__en Allura"><?php the_field('tax_option-name-en', $cat); ?></div>
                    <div class="c-ttl-ribon__ja"><?= $cat->name ?></div>
                  </h2>

                  <?php
                  $option_service_args = array(
                    'post_type' => array('cateling-option'),
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'menu_order',
                    'tax_query' => array(
                      'relation' => 'AND',
                      array(
                        'taxonomy' => 'tax_option',
                        'field' => 'term_id',
                        'terms' => $cat->term_id
                      )
                    ),
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
                </div>
              <?php endforeach; ?>
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
            </div>
          </div>
        <?php endif; ?>


        <div class="l-box p_drink__cont p_drink-option__bottom anm-up">
          <div class="inner-block">
            <div class="p_drink-box l-box__cont">
              <h2 class="c-mini-ribon-ttl ttl">
                什器・備品リスト<br class="sp"><span class="small">（税込）</span>
                <span class="c-mini-ribon-ttl__dec">
                <span class="c-mini-ribon"></span>
              </span>
              </h2>
              <?php
              $drink_single_args = array(
                'post_type' => array('cateling-equip'),
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'menu_order'
              );
              $drink_single_query = new WP_Query($drink_single_args);
              ?>
              <?php if ($drink_single_query->have_posts()) : ?>
                <ul class="c-list p_drink-option__list">
                  <?php while ($drink_single_query->have_posts()) : $drink_single_query->the_post(); ?>
                    <li class="c-list__item">
                      <span class="c-list__ttl"><?php the_title(); ?></span>
                      <?php
                      $price = get_field('cateling-equip-price');
                      if ($price) {
                        $price = safe_number_format($price);
                      }
                      ?>
                      <?php if ($price): ?>
                        <span class="c-list__price"><?= $price; ?>円</span>
                      <?php endif; ?>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>




<?php
get_footer();
