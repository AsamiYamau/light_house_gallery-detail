<?php
global $home_url;
global $template_url;

get_header();

// 全件取得のためのクエリを設定
query_posts(array(
  'post_type' => 'area', // 投稿タイプを指定（必要に応じて変更）
  'posts_per_page' => -1 // -1で全件取得
));

?>

  <div class="l-main">
    <div class="l-main__side pc">
      <?php get_sidebar(); ?>
    </div>

    <!-- メインコンテンツ -->
    <main class="c-page__wrapper p_area">
      <h1 class="c-page__title">
        対応エリア一覧
        <span class="c-page__subtitle Allura">Area</span>
      </h1>
      <div class="c-page__content">
        <!-- パンくずリスト -->
        <ul class="c-breadcrumb">
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/">トップページ</a>
          </li>
          <li class="c-breadcrumb__item">
            <span class="c-breadcrumb__link c-breadcrumb__link--current">対応エリア一覧</span>
          </li>
        </ul>
      </div>

      <div class="c-main-wrapper c-page-wrapper">
        <!-- メインエリア -->
        <div class="c-main-area">
          <div class="inner-block">
            <p class="p_area__cap">
              配送対応エリアのご紹介を<br class="sp">させていただきます。<br>
              各配送エリアごとに、最低注文金額（税込）を設定させていただいております。<br class="pc">
              各エリアの詳細よりご確認を<br class="sp">よろしくお願いいたします。
            </p>
            <div class="l-ankor p_area__ankor">
              <ul class="l-ankor-list five">
                <?php if(have_posts()): ?>
                  <?php while ( have_posts() ) : the_post(); ?>
                    <li class="l-ankor-list__item">
                      <a href="#<?php echo $post->ID; ?>" class="l-ankor-list__link">
                        <span class="txt"><?php the_title(); ?></span>
                        <span class="ico">
                          <img src="<?php echo $template_url; ?>/img/ico/ico_ankor.svg" alt="" />
                        </span>
                      </a>
                    </li>
                  <?php endwhile; ?>
                <?php endif; ?>
              </ul>
            </div>
            <div class="p_area__cont">
              <?php if(have_posts()): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                  <section class="p_area-cont" id="<?php echo $post->ID; ?>">
                    <h2 class="p_area-cont__ttl">
                    <span class="ico">
                      <img src="<?php echo $template_url; ?>/img/common/map_ico.svg" alt="" />
                    </span>
                      <span class="ttl"><?php the_title(); ?>の配送可能エリア</span>
                    </h2>
                    <p class="p_area-cont__txt" style="text-align: center;">
                      <?php
                      $area_text = SCF::get('area_delivery_araa');
                      ?>
                      <?php echo nl2br($area_text); ?>
                    </p>
                    <div class="p_area-cont__btn">
                      <a href="<?php the_permalink(); ?>" class="c-btn02">
                        <?php the_title(); ?>の配送可能エリア一覧はこちらから
                      </a>
                    </div>
                  </section>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <!-- サイドバー -->
        <aside class="c-sidebar">
          <section class="">
            <h3 class="c-sidebar__ttl">
              配達対応エリア
            </h3>
            <ul class="c-sidebar-list">
              <?php if(have_posts()): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                  <li class="">
                    <a href="<?php the_permalink(); ?>" class="c-sidebar-list__link"><?php the_title(); ?></a>
                  </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </ul>
          </section>
        </aside>
      </div>
    </main>
  </div>
  <?php // クエリをリセット
wp_reset_query(); ?>

<?php get_footer(); ?>