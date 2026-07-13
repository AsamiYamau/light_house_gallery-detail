<?php
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
            <a href="<?= $home_url ?>/column/">コラム</a>
          </li>
          <li class="c-bread__item">
            <?php the_title(); ?>
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
          <div class="p_column-cont__main l-article">
            <!-- タイトル -->
            <?php
            $categories = get_the_terms($post->ID, 'tax_column');
            $date = get_the_date('Y.m.d');
            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
            ?>
            <div class="l-article__top">
              <div class="l-article__cat">
                <?php if ($categories && !is_wp_error($categories)): ?>
                  <?php foreach ($categories as $cat): ?>
                    <ul class="c-category-list02">
                      <li class="c-category-list02__item pink"><?= $cat->name ?></li>
                    <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                  <time class="l-article__date"><?= $date ?></time>
              </div>
              <h1 class="l-article__ttl"><?php echo the_title(); ?></h1>
            </div>

            <!-- サムネイル -->
             <?php if($thumbnail_url): ?>
            <div class="l-article__thumbnail u-mt" style="--mt-pc: 40px; --mt-sp: 20px;">
              <img src="<?= $thumbnail_url ?>" alt="">
            </div>
            <?php endif; ?>

            <!-- コンテンツ -->
            <div class="l-article__cont u-mt" style="--mt-pc: 40px; --mt-sp: 20px;">
              <?php the_content(); ?>
            </div>

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


<?php get_footer(); ?>