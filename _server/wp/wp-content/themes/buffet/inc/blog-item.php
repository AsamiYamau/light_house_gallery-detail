<?php
global $home_url;
global $template_url;
?>

<li class="c-article-list__li">
  <a href="<?php the_permalink(); ?>" class="c-article-list__link">
    <?php
    $img_id = get_post_thumbnail_id();
    $img_src = ''.$template_url.'/img/common/no_img.jpg';
    if($img_id){
      $img_src = wp_get_attachment_url($img_id);
    }
    ?>
    <div class="c-article-list__img">
      <img src="<?= $img_src; ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="c-article-list__txt">
      <div class="c-article-list__tag">
        <?php $the_terms = get_the_terms( $post->ID,'tax_blog');?>
        <?php if(isset($the_terms[0])):?>
          <p class="c-article-list__cate">
            <?= $the_terms[0]->name; ?>
          </p>
        <?php endif; ?>
        <p class="c-article-list__date">
          <?php the_time('Y.m.d'); ?>
        </p>
      </div>
      <h2 class="c-article-list__ttl">
        <?php the_title(); ?>
      </h2>
      <p class="c-article-list__cap pc">
        <?php my_excerpt(150); ?>
      </p>
      <div class="c-article-list__dec">
        <div class="c-article-next">続きを読む</div>
      </div>
    </div>
  </a>
</li>