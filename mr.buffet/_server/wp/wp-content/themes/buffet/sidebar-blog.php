<?php
global $template_url;
global $home_url;


$terms = get_terms('tax_blog');
$term = get_queried_object();


?>

<div class="c-article__side">
  <div class="c-article__box">
    <div class="c-article__ttl">
      <div class="c-ttl-ribon02">
        <p class="c-ttl-ribon02__ttl">カテゴリー</p>
      </div>
    </div>
    <div class="c-article__list">
      <?php if($terms): ?>
      <ul class="c-arrow-list">
        <?php foreach ($terms as $term): ?>
          <?php 
            $blog_bool = get_field('blog_bool',$term);
            if(!$blog_bool):
            ?>
          <li class="c-arrow-list__li">
            <a href="<?php echo get_term_link($term) ?>" class="c-arrow-list__link">
              <?= $term->name; ?>
            </a>
          </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>


  <?php if (class_exists('\WordPressPopularPosts\Query')) : ?>
    <?php
    $args = array(
      'range' => 'monthly',//集計する期間 {daily(1日), weekly(1週間), monthly(1ヶ月), all(全期間)}
      'order_by' => 'views',//表示順｛views（閲覧数),comments（コメント数）,avg（1日の平均）}
      'post_type' => 'blog',//複数の場合は'post, name1, nem2'
      'limit' => 5, //表示数
    );
    $wpp_query = new \WordPressPopularPosts\Query($args);
    $wpp_posts = $wpp_query->get_posts();
    ?>
    <div class="c-article__box top">
      <div class="c-article__ttl">
        <div class="c-ttl-ribon02">
          <p class="c-ttl-ribon02__ttl">人気記事</p>
        </div>
      </div>
      <div class="c-article__list">
        <ul class="c-article-list02">
          <?php foreach($wpp_posts as $wpp_post): ?>
          <li class="c-article-list02__li">
            <a href="<?php get_the_permalink($wpp_post->id); ?>" class="c-article-list02__link">
              <div class="c-article-list02__imgbox dec">
                <?php
                $img_id = get_post_thumbnail_id($wpp_post->id);
                $img_src = ''.$template_url.'/img/common/no_img.jpg';
                if($img_id){
                  $img_src = wp_get_attachment_url($img_id);
                }
                ?>
                <div class="c-article-list02__img">
                  <img src="<?= $img_src; ?>" alt="">
                </div>
              </div>
              <div class="c-article-list02__txt">
                <p class="c-article-list02__ttl">
                  <?php echo $wpp_post->title; ?>
                </p>
                <div class="c-article-list02__dec">
                  <div class="c-article-next small">続きを読む</div>
                </div>
              </div>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  <?php endif; ?>
</div>