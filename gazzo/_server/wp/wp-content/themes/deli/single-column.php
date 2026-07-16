<?php
global $home_url;
global $template_url;

get_header();



?>
<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <!-- メインコンテンツ -->
  <main class="c-page__wrapper p_column">
    <h1 class="c-page__title p_column__title">
      コラム
      <span class="c-page__subtitle p_column__subtitle Allura">Column</span>
    </h1>
    <div class="c-page__content">
      <!-- パンくずリスト -->
      <ul class="c-breadcrumb">
        <li class="c-breadcrumb__item">
          <a class="c-breadcrumb__link" href="/">トップページ</a>
        </li>
        <li class="c-breadcrumb__item">
          <a class="c-breadcrumb__link" href="/column/">コラム</a>
        </li>
        <li class="c-breadcrumb__item">
          <span
            class="c-breadcrumb__link c-breadcrumb__link--current"><?php the_title(); ?></span>
        </li>
      </ul>
    </div>

    <div class="c-main-wrapper c-page-wrapper">
      <!-- メインエリア -->
      <div class="c-main-area">
        <p class="p_announcement-info">
          <?php
          $terms = get_the_terms($post->ID, 'tax_column');
          $term_name = '';
          if (!empty($terms)) {
            $term_name = $terms[0]->name;
          }
          ?>
          <?php if (!empty($term_name)): ?>
            <span class="p_column__announcement-label">
              <?php echo $term_name; ?>
            </span>
          <?php endif; ?>
          <?php $date = get_the_date('Y.m.d'); ?>
          <time
            class="p_column__announcement-date"
            datetime="2024-05-20">
            <?php echo $date; ?>
          </time>
        </p>
        <h2 class="p_column__announcement-title">
          <?php the_title(); ?>
        </h2>
        <div class="c-blog-contents">
          <?php
          $thumb = '';
          if (has_post_thumbnail()) {
            $thumb = get_the_post_thumbnail_url();
          } else {
            $thumb = $template_url . '/img/common/no_img.jpg';
          }
          ?>
          <div
            class="p_column__announcement-image-wrapper">
            <img
              src="<?php echo $thumb; ?>"
              alt="オードブル情報"
              class="p_column__announcement-image" />
          </div>
          <?php the_content(); ?>

          <!-- menu -->
          <?php
          $column_menu = SCF::get('column_menu');
          if (!empty($column_menu)):
          ?>
            <section class="p_column__menu">
              <h2 class="p_column__menu-title">
                おすすめメニュー
              </h2>
              <ul class="c-menu-list">
                <?php foreach ($column_menu as $menu): ?>
                  <li class="c-menu-item">
                    
                      <?php
                      $thumb = '';
                      if (has_post_thumbnail($menu)) {
                        $thumb = get_the_post_thumbnail_url($menu);
                      } else {
                        $thumb = $template_url . '/img/common/no_img.jpg';
                      }
                      $ttl = get_the_title($menu);
                      $volume = SCF::get('menu_volume', $menu);
                      $price = SCF::get('menu_price', $menu);
                      ?>
                      <div
                        class="c-menu-item-image-wrapper">
                        <img
                          src="<?php echo $thumb; ?>"
                          alt=""
                          class="c-menu-item-image" />
                      </div>
                      <div
                        class="c-menu-item-details">
                        <h3
                          class="c-menu-item-name">
                          <?php echo $ttl; ?>
                        </h3>
                        <div class="c-menu-item__txt">
                          
                          <?php if (!empty($volume)): ?>
                            <p
                              class="c-menu-item-serving">
                              <span
                                class="c-menu-item-serving-unit">1皿</span>
                              <span
                                class="c-menu-item-serving-people">
                                <?php echo $volume; ?>
                              </span>
                              <span
                                class="c-menu-item-serving-unit">人前</span>
                            </p>
                          <?php endif; ?>
                          <?php if (!empty($price)):
                            $price = deli_format_price($price);
                          ?>
                            <p
                              class="c-menu-item-price__wrapper">
                              <span
                                class="c-menu-item-price">
                                <?php echo $price; ?>
                              </span>
                              <span
                                class="c-menu-item-price-currency">円</span>
                            </p>
                          <?php endif; ?>
                          <div
                            class="c-menu-item-quantity">
                            <label
                              class="c-menu-item-quantity-label">数量:</label>
                            <select
                              class="c-menu-item-quantity-select">
                              <option
                                value="1"
                                selected>
                                1
                              </option>
                              <option value="2">
                                2
                              </option>
                              <option value="3">
                                3
                              </option>
                              <option value="4">
                                4
                              </option>
                              <option value="5">
                                5
                              </option>
                            </select>
                          </div>
                          <button
                            type="button"
                            class="c-menu-item-cart-button">
                            カートに入れる
                          </button>
                          <a
                            href="/menu/page/"
                            class="c-menu-item-details-link">詳しく見る</a>
                        </div>
                      </div>
                    
                  </li>
                <?php endforeach; ?>
              </ul>
            </section>
          <?php endif; ?>
        </div>
      </div>

      <!-- サイドバー -->
      <?php // get_template_part('inc/column-sidebar'); ?>
    </div>
  </main>
</div>


<?php get_footer(); ?>
