  <?php
  global $home_url;
  global $template_url;

  $taxonomy = $GLOBALS['recommend_taxonomy'] ?? null;

  // 現在の投稿ID
  $current_id = get_the_ID();

  // 現在の投稿のターム取得
  $terms = ($taxonomy) ? get_the_terms($current_id, $taxonomy) : [];

  $post_ids = [];

  if (!empty($terms) && !is_wp_error($terms)) {

    $term_ids = wp_list_pluck($terms, 'term_id');

    $post_ids = get_posts([
      'post_type'      => get_post_type(),
      'posts_per_page' => 4,
      'post_status'    => 'publish',
      'post__not_in'   => [$current_id],
      'orderby'        => 'menu_order',
      'tax_query'      => [
        [
          'taxonomy' => $taxonomy,
          'field'    => 'term_id',
          'terms'    => $term_ids,
        ]
      ],
    ]);
  }
  ?>

  <?php if (!empty($post_ids)): ?>
    <section class="p_detail-sec03 c-wave01">
      <div class="c-dec__dec03">
        <img src="<?= $template_url ?>/img/common/dec03.svg" alt="">
      </div>

      <div class="c-dec__dec04">
        <img src="<?= $template_url ?>/img/common/dec04.svg" alt="">
      </div>

      <div class="inner-block">

        <div class="c-ttl02">
          <span class="dec">
            <img src="<?= $template_url ?>/img/common/kuma-dec02_gray.svg" alt="">
          </span>
          <p class="en">Recommendation</p>
          <h2 class="ja">おすすめの商品</h2>
        </div>

        <ul class="c-product-list u-mt" style="--mt-pc: 80px; --mt-sp: 40px;">

          <?php foreach ($post_ids as $post_id): ?>

            <?php
            $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
            if (!$thumbnail_url) {
              $thumbnail_url = $template_url . '/img/common/dummy.jpg';
            }
            $introduction = SCF::get('introduction', $post_id);

            // タクソノミー名は必要に応じて変更
            $terms = get_the_terms($post_id, $taxonomy);
            ?>

            <li class="c-product-list__item">
              <a href="<?= esc_url(get_permalink($post_id)); ?>" class="c-product-list__link">

                <div class="c-product-list__img">
                  <?php if ($thumbnail_url): ?>
                    <img src="<?= esc_url($thumbnail_url); ?>" alt="<?= esc_attr(get_the_title($post_id)); ?>">
                  <?php endif; ?>
                </div>

                <div class="c-product-list__txtArea">

                  <?php if ($terms && !is_wp_error($terms)): ?>
                    <ul class="c-category-list02">
                      <?php foreach ($terms as $term): ?>
                        <li class="c-category-list02__item">
                          <?= esc_html($term->name); ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>

                  <p class="c-product-list__ttl">
                    <?= esc_html(get_the_title($post_id)); ?>
                  </p>

                  <p class="c-product-list__txt">
                    <?= esc_html(wp_trim_words(wp_strip_all_tags($introduction), 40, '...')); ?>
                  </p>

                  <div class="c-product-list__btn">
                    詳細を見る
                  </div>

                </div>

              </a>
            </li>

          <?php endforeach; ?>

        </ul>

      </div>
    </section>
  <?php endif; ?>