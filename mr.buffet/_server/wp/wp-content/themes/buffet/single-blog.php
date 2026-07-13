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
    <main class="outer-block">

      <section class="l-mv">
        <div class="l-mv__img">
          <img src="<?= $template_url; ?>/img/blog/blog-top.jpg" alt="">
        </div>
        <div class="l-mv__txt anm">
          <div class="inner-block02">
            <div class="l-mv__txtbox">
              <p class="en">BLog</p>
              <p class="ja">ブログ</p>
            </div>
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
              <a href="<?= $home_url; ?>/blog/" class="c-bread-list__item">ブログ</a>
            </li>
            <li class="c-bread-list__li">
              <sapn class="c-bread-list__txt"><?php the_title(); ?></sapn>
            </li>
          </ul>
        </div>
      </div>

      <section class="p_bloc-body c-article-d c-box c-bg bg_img">
        <div class="inner-block">
          <div class="c-article__wrap anm-list">
            <div class="c-article-d__main">
              <div class="c-article-d__ttlbox">
                <div class="c-article-d__tag">
                  <?php $the_terms = get_the_terms($post->ID, 'tax_blog'); ?>
                  <?php if (isset($the_terms[0])): ?>
                    <p class="c-article-d__cate"><?php echo $the_terms[0]->name; ?></p>
                  <?php endif; ?>
                  <p class="c-article-d__date"><?php the_time('Y.m.d'); ?></p>
                </div>
                <h1>
                  <?php the_title(); ?>
                </h1>
              </div>
              <div class="c-article-d__body">

                <?php
                $img_id = get_post_thumbnail_id();
                $img_src = '' . $template_url . '/img/common/no_img.jpg';
                if ($img_id) {
                  $img_src = wp_get_attachment_url($img_id);
                }
                ?>
                <?php if ($img_src): ?>
                  <div class="c-article-d__thumbnail">
                    <img src="<?= $img_src ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php endif; ?>

                <?php the_content(); ?>


              </div>
              <?php
              $blog_author_choice = get_field('blog_author_choice');
              if (!empty($blog_author_choice)):

                $blog_author_id = $blog_author_choice->ID;
                $blog_author_name = $blog_author_choice->post_title;
                $blog_author_ico = get_field('blog_author_ico', $blog_author_id);
                $blog_author_job = get_field('blog_author_job', $blog_author_id);
                $blog_author_txt = get_field('blog_author_txt');
              ?>

                <!-- 執筆者 -->
                <div class="c-article-d-card">
                  <div class="c-article-d-card__box01">
                    <?php if ($blog_author_ico): ?>
                      <div class="c-article-d-card__ico">
                        <img src="<?= $blog_author_ico ?>" alt="">
                      </div>
                    <?php endif; ?>
                    <div class="c-article-d-card__txt">
                      <p class="c-article-d-card__dec">【執筆者】</p>
                      <p class="c-article-d-card__dec">
                        <span class="name">
                          <?= $blog_author_name ?>
                        </span>
                        <?php if (!empty($blog_author_job)): ?>
                          <span class="charge">
                            <?= $blog_author_job ?>
                          </span>
                        <?php endif; ?>
                      </p>
                    </div>
                  </div>
                  <?php if ($blog_author_txt): ?>
                    <div class="c-article-d-card__cap">
                      <?= nl2br($blog_author_txt) ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <div class="c-article-d__nav">
                <?php if ($prev_post = get_previous_post()): ?>
                  <a class="prev" href="<?php print get_the_permalink($prev_post->ID); ?>"></a>
                <?php endif; ?>
                <a class="back" href="<?php print $home_url; ?>/blog/">一覧へ戻る</a>
                <?php if ($next_post = get_next_post()): ?>
                  <a class="next" href="<?php print get_the_permalink($next_post->ID); ?>"></a>
                <?php endif; ?>
              </div>
            </div>

            <?php get_sidebar('blog'); ?>

          </div>
        </div>
      </section>

    </main>
  </div>
</div>


<?php get_footer(); ?>