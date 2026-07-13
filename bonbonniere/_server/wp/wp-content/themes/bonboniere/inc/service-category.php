<?php
// 現在のタームIDを取得（タクソノミーページの場合はID、アーカイブの場合は0）
$current_term_id = is_tax('tax_cake_cat') ? get_queried_object_id() : 0;
?>
<ul class="c-category-list is-brown u-mt" style="--mt-pc: 60px; --mt-sp: 20px;">
  <li class="c-category-list__item">
    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="c-category-list__link <?php echo ($current_term_id === 0) ? 'is-active' : ''; ?>">すべて</a>
  </li>
  <?php
  $cake_cats = get_terms([
      'taxonomy'   => 'tax_cake_cat',
      'hide_empty' => true,
  ]);
  if (!is_wp_error($cake_cats) && !empty($cake_cats)) :
      foreach ($cake_cats as $cake_cat) :
          $active_class = ($current_term_id === $cake_cat->term_id) ? 'is-active' : '';
  ?>
  <li class="c-category-list__item">
    <a href="<?php echo esc_url(get_term_link($cake_cat)); ?>" class="c-category-list__link <?php echo esc_attr($active_class); ?>">
      <?php echo esc_html($cake_cat->name); ?>
    </a>
  </li>
  <?php
      endforeach;
  endif;
  ?>
</ul> 