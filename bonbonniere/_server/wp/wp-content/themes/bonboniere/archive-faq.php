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

<main class="outer-block p_faq c-dec">
  <div class="l-mv c-bg-brown01">

    <div class="p_faq-bread">
      <div class="inner-block">
        <ul class="c-bread">
          <li class="c-bread__item">
            <a href="<?= $home_url ?>/">TOP</a>
          </li>
          <li class="c-bread__item">
            よくある質問
          </li>
        </ul>
      </div>
    </div>

    <div class="c-ttl02 ptn_orange">
      <span class="dec"><img src="<?= $template_url ?>/img/common/kuma-dec01.svg" alt=""></span>
      <p class="en">FAQ</p>
      <h2 class="ja">よくある質問</h2>
    </div>

  </div>


  <div class="p_faq-cont c-wave02">
    <div class="inner-block">
      <!-- アンカーリンク -->
      <div class="p_faq__anker u-mt" style="--mt-pc:60px; --mt-sp: 30px;">
        <?php
        $terms = get_terms(array(
          'taxonomy'   => 'tax_faq',
          'hide_empty' => true, // 投稿が紐付いているものだけ
        ));
        ?>
        <?php if (!empty($terms) && !is_wp_error($terms)): ?>
          <ul class="c-anker-list col-3">
            <?php foreach ($terms as $term): ?>
              <li class="c-anker-list__li">
                <a href="#<?= $term->slug ?>" class="c-anker-list__item order">
                  <div class="c-anker-list__txt">
                    <?= esc_html($term->name) ?>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
      <!-- /アンカーリンク -->

      <!-- コンテンツ -->
      <?php if (!empty($terms) && !is_wp_error($terms)): ?>
        <?php foreach ($terms as $term): ?>
          <?php
          $faq_en = get_term_meta($term->term_id, 'faq_en', true);
          ?>
          <section id="<?= $term->slug ?>" class="p_faq-sec u-mt" style="--mt-pc:80px; --mt-sp: 40px;">
            <div class="c-crown-ttl lite_blown">
              <span class="c-crown-ttl__en en"><?= esc_html($faq_en) ?></span>
              <h2 class="c-crown-ttl__ja"><?= esc_html($term->name) ?></h2>
            </div>
            <div class="u-mt" style="--mt-pc:40px; --mt-sp: 20px;">
              <ul class="c-simple-list faq-list">
                <?php
                $faq_posts = get_posts(array(
                  'post_type' => 'faq',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'tax_faq',
                      'field'    => 'slug',
                      'terms'    => $term->slug,
                    ),
                  ),
                  'numberposts' => -1,
                ));
                ?>
                <?php if (!empty($faq_posts)): ?>
                  <?php foreach ($faq_posts as $post): setup_postdata($post); ?>
                    <li class="l-card">
                      <h3 class="c-simple-list__ttl">
                        <span class="en question">Q.</span>
                        <span class="question-text"><?php the_title(); ?></span>
                      </h3>
                      <div class="c-simple-list__txt">
                        <span class="en answer">A.</span> <?= wp_strip_all_tags(get_the_content()) ?>
                      </div>
                    </li>
                  <?php endforeach;
                  wp_reset_postdata(); ?>
                <?php else: ?>
                  <li>現在、このカテゴリーのFAQはありません。</li>
                <?php endif; ?>
              </ul>
            </div>
          </section>
        <?php endforeach; ?>
      <?php else: ?>
        <p>現在、FAQはありません。</p>
      <?php endif; ?>
      <!-- /コンテンツ -->
    </div>
  </div>



</main>

<?php
get_footer();
