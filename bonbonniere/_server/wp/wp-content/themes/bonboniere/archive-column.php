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

<main class="outer-block p_column c-dec">
  <div class="l-mv c-bg-brown01">

    <div class="p_column-bread">
      <div class="inner-block">
        <ul class="c-bread">
          <li class="c-bread__item">
            <a href="<?= $home_url ?>/">TOP</a>
          </li>
          <li class="c-bread__item">
            コラム
          </li>
        </ul>
      </div>
    </div>

    <h1 class="c-ttl02 ptn_orange">
      <span class="dec"><img src="<?= $template_url ?>/img/common/kuma-dec01.svg" alt=""></span>
      <p class="en">COLUMN</p>
      <div class="ja">コラム</div>
</h1>

  </div>


  <div class="p_column-cont c-wave02">
    <div class="inner-block">
      <div class="p_column-cont__wrap">
        <!-- メインコンテンツ -->
        <?php if (have_posts()): ?>
          <div class="p_column-cont__main">
            <ul class="l-article-list pat01">
              <?php while (have_posts()): the_post(); ?>
              
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
                      <h3 class="l-article-list__cap">
                        <?= $title ?>
                      </h3>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>

            <?php
            set_query_var('paging_query', $wp_query);
            get_template_part('paging');
            ?>

          </div>
        <?php endif; ?>
        <!-- /メインコンテンツ -->

        <!-- サイドバー -->
        <?php
        $terms = get_terms(array(
          'taxonomy'   => 'tax_column',
          'hide_empty' => true, // 投稿が紐付いているものだけ
        ));
        ?>
        <div class="p_column-cont__side">
          <div class="p_column-side">
            <div class="c-sec-ttl">
              <div class="c-sec-ttl__ttl u-tac">
                <p class="en">CATEGORY</p>
                <h3 class="ja">カテゴリー</h3>
              </div>
              <span class="c-sec-ttl__line"></span>
            </div>
            <ul class="p_column-side-list">
              <?php if (!empty($terms) && !is_wp_error($terms)): ?>
                <?php foreach ($terms as $term): ?>
                  <li class="p_column-side-list__li">
                    <a href="<?= get_term_link($term) ?>" class="p_column-side-list__link">
                      <?= esc_html($term->name) ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>

        <!-- /サイドバー -->
      </div>
    </div>
  </div>



</main>

<?php
get_footer();
