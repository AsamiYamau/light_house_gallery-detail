<?php
$option_query = new WP_Query(array(
  'post_type'      => 'option',
  'posts_per_page' => -1,
  'post_status'    => 'publish',
  'orderby'        => 'menu_order',
));

if ($option_query->have_posts()) :
?>
  <section class="p_detail-sec-option c-wave03">
    <div class="inner-block">
      <div class="c-ttl02">
        <span class="dec"><img src="<?= $template_url ?>/img/common/kuma-dec02_gray.svg" alt=""></span>
        <p class="en">Option</p>
        <h2 class="ja">オプションメニュー</h2>
      </div>

      <ul class="p_detail-sec-option__list">
        <?php while ($option_query->have_posts()) : $option_query->the_post(); ?>

          <?php
          $price = SCF::get('option_price');
          $txt   = SCF::get('option_txt');
          $small = SCF::get('option_small_txt');
          $terms = get_the_terms(get_the_ID(), 'tax_option');
          ?>

          <li class="p_detail-sec-option__item">

            <?php if ($terms && !is_wp_error($terms)) : ?>
              <ul class="c-category-list02">
                <?php foreach ($terms as $term) : ?>
                  <li class="c-category-list02__item">
                    <?= esc_html($term->name); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <h3 class="p_detail-sec-option__ttl">
              <?php the_title(); ?>
            </h3>

            <?php if ($price) : ?>
              <p class="p_detail-sec-option__price poppins">
                ¥<span class="price"><?= esc_html($price); ?></span>（税込）
              </p>
            <?php endif; ?>

            <?php if ($txt or $small) : ?>
              <p class="p_detail-sec-option__txt01">
                <?php if(!empty($txt)): ?>
                <?= nl2br(esc_html($txt)); ?>
                <?php endif; ?>

                <?php if(!empty($small)): ?>
                <span class="small">
                <?= nl2br(esc_html($small)); ?>
                </span>
                <?php endif; ?>
              </p>

            <?php endif; ?>

          </li>

        <?php endwhile; ?>
      </ul>
    </div>
  </section>
<?php
endif;
wp_reset_postdata();
?>