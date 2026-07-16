<?php
global $home_url;
global $template_url;
?>

<ul class="p_column__list">
  <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php
      $thumb = '';
      if (has_post_thumbnail()) {
        $thumb = get_the_post_thumbnail_url();
      } else {
        $thumb = $template_url . '/img/common/no_img.jpg';
      }

      $term = get_the_terms($post->ID, 'tax_column');
      $term_name = '';
      if (!empty($term)) {
        $term_name = $term[0]->name;
      }

      $date = get_the_date('Y.m.d');
      ?>
      <li class="p_column__list-item">
        <a
          href="<?php the_permalink(); ?>"
          class="p_column__list-link">
          <div class="p_column__img-wrapper">
            <img
              src="<?= $thumb ?>"
              alt="" />
          </div>
          <div class="p_column__content-wrapper">
            <p class="p_column__meta">
              <span class="p_column__meta-tag">
                <?php echo $term_name; ?>
              </span>
              <time
                class="p_column__meta-date"
                datetime="2024-05-20">
                <?php echo $date; ?>
              </time>
            </p>
            <h2
              class="p_column__list-link-title">
              <?php the_title(); ?>
            </h2>
            <div class="p_column__description">
              <?php the_excerpt(); ?>
            </div>
            <span class="p_column__view-more">View More</span>
          </div>
        </a>
      </li>
    <?php endwhile; ?>
  <?php else: ?>
    <p>記事がありません。</p>
  <?php endif; ?>
</ul>