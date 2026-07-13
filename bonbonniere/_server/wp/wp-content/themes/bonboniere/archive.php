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

  <main class="p-blog-block l-sub-block outer-block">
    <div class="l-sub-ttl-block">
      <div class="inner-block">
        <div class="l-sub-ttl">
          <h1 class="c-ttl01 center">
            <span class="en">
              Blog
            </span>
            <span class="jp">
              ブログ
            </span>
          </h1>
        </div>
      </div>
    </div><!-- /service-block -->

    <div class="bread-block outer-block">
      <div class="inner-block">
        <ul class="bread-list">
          <li><a href="<?php echo $home_url; ?>/">ホーム</a></li>
          <?php if(is_tax()): ?>
            <li><a href="<?php echo $home_url; ?>/blog/">ブログ</a></li>
            <li><?php single_term_title(); ?></li>
          <?php elseif(is_date() && is_month()): ?>
            <?php $date_name = get_query_var('year').'年'.get_query_var('monthnum').'月'; ?>
            <li><a href="<?php echo $home_url; ?>/blog/">ブログ</a></li>
            <li><?php echo $date_name; ?></li>
          <?php else: ?>
            <li>ブログ</li>
          <?php endif;?>
        </ul>
      </div>
    </div>

    <div class="l-common-block">
      <div class="p-blog-main-block">
        <div class="inner-block">
          <div class="l-two-block">
            <div class="l-two-block-main">
              <div class="p-blog-list-area">
                <?php if(have_posts()): ?>
                  <ul class="c-blog-list02">
                    <?php while ( have_posts() ) : the_post(); ?>
                      <li>
                        <a href="<?php the_permalink(); ?>" class="item">
                          <?php
                          $img_id = get_post_thumbnail_id();
                          $img_src = '';
                          if($img_id){
                            $img_src = wp_get_attachment_url($img_id);
                          }
                          ?>
                          <div class="img-area">
                            <div class="img" style="background-image:url('<?php echo $img_src; ?>');"></div>
                          </div>
                          <div class="cont-area">
                            <div class="date"><?php the_time('Y.m.d'); ?>></div>
                            <div class="ttl">
                              <?php the_title(); ?>
                            </div>
                            <div class="desc">
                              <?php my_excerpt( 60 ); ?>
                            </div>
                          </div>
                        </a>
                      </li>
                    <?php endwhile;?>
                  </ul>
                <?php endif; ?>
              </div>

              <div class="p-blog-paging-area">
                <?php
                set_query_var( 'paging_query', $wp_query );
                get_template_part('paging');
                ?>
              </div>
            </div>
            <div class="l-two-block-side">
              <?php get_sidebar(); ?>
            </div>
          </div>

        </div>
      </div>


      <?php
      //お問い合わせバナー
      get_template_part('inc/contact-banner');
      ?>

    </div>


  </main>

<?php
get_footer();
