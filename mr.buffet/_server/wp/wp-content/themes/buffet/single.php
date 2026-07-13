<?php
global $home_url;
global $template_url;

get_header();

// 記事のカテゴリー情報を取得する
$cat = get_the_category();
$cat_id = $cat[0]->cat_ID; // カテゴリーID
$cat_name = $cat[0]->cat_name; // カテゴリー名
$cat_slug  = $cat[0]->category_nicename; // カテゴリースラッグ
$cat_url = get_category_link($cat_id);


//カスタムフィールドを取得
$meta_data = get_post_meta($post->ID);

?>

  <main class="p-blog-detail-block l-sub-block outer-block">
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
          <li><a href="<?php echo $home_url; ?>/blog/">ブログ</a></li>
          <li><?php the_title(); ?></li>
        </ul>
      </div>
    </div>

    <div class="l-common-block">
      <div class="p-blog-main-block">
        <div class="inner-block">
          <div class="l-two-block">
            <div class="l-two-block-main">
              <div class="p-blog_detail-ttl-area">
                <div class="ttl">
                  <?php the_title(); ?>
                </div>
                <div class="date">
                  <?php the_time('Y.m.d'); ?>
                </div>
                <div class="sns-area">
                  <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>

                  <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="<?php the_permalink(); ?>" data-color="default" data-size="small" data-count="false" style="display: none;"></div>
                  <script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>


                  <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-text="<?php the_title(); ?>" >Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                </div>
              </div>
              <div class="p-blog_detail-cont-area">
                <div class="c-article-cont">
                  <?php the_content(); ?>
                </div>
              </div>

              <div class="p-blog_detail-paging-area">
                <div class="c-paging-detail-block">
                  <?php if ($prev_post = get_previous_post()):?>
                    <a class="prev" href="<?php print get_the_permalink($prev_post->ID); ?>"></a>
                  <?php endif; ?>
                  <a class="back" href="<?php print $home_url; ?>/blog/">記事一覧へ</a>
                  <?php if ($next_post = get_next_post()):?>
                    <a class="next" href="<?php print get_the_permalink($next_post->ID); ?>"></a>
                  <?php endif; ?>
                </div><!-- /paging-area -->
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


<?php get_footer(); ?>