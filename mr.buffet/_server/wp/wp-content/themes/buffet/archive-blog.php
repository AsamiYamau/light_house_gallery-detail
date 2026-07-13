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
      <main class="outer-block">

        <section class="l-mv">
          <div class="l-mv__img">
            <img src="<?= $template_url; ?>/img/blog/blog-top.jpg" alt="">
          </div>
          <div class="l-mv__txt">
            <div class="inner-block02">
              <h1 class="l-mv__txtbox">
                <p class="en">BLog</p>
                <p class="ja">ブログ</p>
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
                <sapn class="c-bread-list__txt">ブログ</sapn>
              </li>
            </ul>
          </div>
        </div>

        <section class="p_bloc-body c-article c-box c-bg bg_img">
          <div class="inner-block">
            <div class="c-article__wrap">
              <div class="c-article__main">
                <?php if(have_posts()): ?>
                  <ul class="c-article-list">
                    <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('inc/blog-item'); ?>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
                <div class="c-article__page">
                  <?php
                    set_query_var( 'paging_query', $wp_query );
                    get_template_part('paging');
                  ?>
                </div>
              </div>

              <?php get_sidebar('blog'); ?>

            </div>
          </div>
        </section>

      </main>
    </div>
  </div>
<?php
get_footer();
