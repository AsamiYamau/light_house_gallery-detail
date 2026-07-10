<?php

/**
 * Template Name: 特集ページ
 */
get_header();
?>

<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <div class="l-main__main">
    <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();

        $template_url = get_template_directory_uri();
        $mv_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $mv_img = $mv_img ?: $template_url . '/img/template/mv01.jpg';
        $thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $mv_alt = $thumbnail_id ? get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true) : '';
        $mv_eyebrow = get_field('feature_page_mv_eyebrow');
        $mv_title = get_field('feature_page_mv_title_display') ?: get_the_title();
        $mv_lead = get_field('feature_page_mv_lead');
    ?>
        <main class="outer-block p_feature-page bg_img">
          <section class="p_feature-page-mv">
            <div class="p_feature-page-mv__bg">
              <img src="<?= esc_url($mv_img); ?>" alt="<?= esc_attr($mv_alt); ?>">
            </div>
            <div class="p_feature-page-mv__body">
              <div>
                <p class="p_feature-page__eyebrow"><?= esc_html($mv_eyebrow); ?></p>
                <h1 class="p_feature-page-mv__ttl"><?= nl2br(esc_html($mv_title)); ?></h1>
                <?php if ($mv_lead) : ?>
                  <p class="p_feature-page-mv__lead"><?= esc_html($mv_lead); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </section>

          <div class="inner-block02">
            <?php the_content(); ?>
          </div>
        </main>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</div>

<?php
get_footer();
