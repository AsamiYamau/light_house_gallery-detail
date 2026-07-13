<?php

global $template_url;

$f_gallery_query = new WP_Query(array(
  'post_type'      => 'f_gallery',
  'posts_per_page' => -1,
  'post_status'    => 'publish',
  'orderby'        => 'menu_order',
));
?>

<?php if ($f_gallery_query->have_posts()): ?>
  <section class="p_description-sec02 c-wave02">
    <div class="inner-block">
      <div class="c-ttl02">
        <span class="dec"><img src="<?= $template_url ?>/img/common/kuma-dec02_gray.svg" alt=""></span>
        <p class="en">Gallery</p>
        <h2 class="ja">制作事例</h2>
      </div>

      <p class="p_description-sec02__txt">
        お客様の「こんなケーキが欲しい」を叶えた、<br class="sp">世界にひとつだけの作品たち。
      </p>

      <!-- カテゴリー -->
      <?php
      $tax_f_gallery_cake_cat = get_terms([
        'taxonomy'   => 'tax_f_gallery_cake_cat',
        'hide_empty' => true,
      ]);
      ?>

      <ul class="p_description-sec02__cat-list">
        <li class="p_description-sec02__cat-item js-tab-trigger is-active" data-tab="tab1">
          <span class="p_description-sec02__cat-link">
            All
          </span>
        </li>

        <?php if (!is_wp_error($tax_f_gallery_cake_cat) && !empty($tax_f_gallery_cake_cat)) : ?>
          <?php foreach ($tax_f_gallery_cake_cat as $index => $term) : ?>
            <li
              class="p_description-sec02__cat-item js-tab-trigger"
              data-tab="tab<?= $index + 2; ?>">
              <span class="p_description-sec02__cat-link">
                <?= esc_html($term->name); ?>
              </span>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <!-- /カテゴリー -->

      <!-- タブコンテンツ -->
      <!-- All -->
      <div class="js-tab-content is-active" data-tab="tab1">
        <ul class="p_description-sec02__gallery-list">
          <?php while ($f_gallery_query->have_posts()) : $f_gallery_query->the_post(); ?>

            <?php
            $post_id = get_the_ID();
            // サムネイル処理
            $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
            if (!$thumbnail_url) {
              $thumbnail_url = $template_url . '/img/common/dummy.jpg';
            }
            ?>
            <li class="p_description-sec02__gallery-item">
              <div class="p_description-sec02__gallery-link l-gallery-list__item">
                <div class="p_description-sec02__gallery-img l-gallery-list__img">
                  <img src="<?= $thumbnail_url ?>" alt="">
                </div>
                <div class="l-gallery-list__txt">
                  <div class="l-gallery-list__txt-box">
                    <div class="ttl">
                      <?php the_title(); ?>
                    </div>
                    <div class="txt">
                      <?php the_excerpt(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </li>

          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>

        </ul>
      </div>

      <!-- 各ターム -->
      <?php if (!is_wp_error($tax_f_gallery_cake_cat) && !empty($tax_f_gallery_cake_cat)) : ?>
        <?php foreach ($tax_f_gallery_cake_cat as $index => $term) : ?>

          <?php
          $term_query = new WP_Query([
            'post_type'      => 'f_gallery',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'tax_query'      => [
              [
                'taxonomy' => 'tax_f_gallery_cake_cat',
                'field'    => 'term_id',
                'terms'    => $term->term_id,
              ],
            ],
          ]);
          ?>

          <div
            class="js-tab-content"
            data-tab="tab<?= $index + 2; ?>">
            <ul class="p_description-sec02__gallery-list">

              <?php if ($term_query->have_posts()) : ?>
                <?php while ($term_query->have_posts()) : $term_query->the_post(); ?>
                  <?php
                  $post_id = get_the_ID();
                  // サムネイル処理
                  $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
                  if (!$thumbnail_url) {
                    $thumbnail_url = $template_url . '/img/common/dummy.jpg';
                  }
                  ?>
                  <li class="p_description-sec02__gallery-item">
                    <div class="p_description-sec02__gallery-link l-gallery-list__item">
                      <div class="p_description-sec02__gallery-img l-gallery-list__img">
                        <img src="<?= $thumbnail_url ?>" alt="">
                      </div>
                      <div class="l-gallery-list__txt">
                        <div class="l-gallery-list__txt-box">
                          <div class="ttl">
                            <?php the_title(); ?>
                          </div>
                          <div class="txt">
                            <?php the_excerpt(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>

                <?php endwhile; ?>
              <?php endif; ?>

            </ul>
          </div>

          <?php wp_reset_postdata(); ?>

        <?php endforeach; ?>
      <?php endif; ?>
      <!-- タブコンテンツ -->
    </div>
  </section>
<?php endif; ?>