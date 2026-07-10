<?php
global $home_url;
global $template_url;

$top_flg = isset($args['top_flg']) ? (bool) $args['top_flg'] : false;

$area_args = array(
  'post_type' => array('region'),
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'menu_order'
);
$area_query = new WP_Query($area_args);
?>
<?php if ($area_query->have_posts()) : ?>
  <?php while ($area_query->have_posts()) : $area_query->the_post(); ?>
    <?php if ($top_flg && strpos(get_the_title(), '東京') === false) continue; ?>
    <div class="c-area">
      <h2 class="c-area__ttl">
        <?php the_title(); ?>
      </h2>
      <div class="c-area__img">
        <?php $img = get_field('area_img'); ?>
        <img src="<?= $img; ?>" alt="">
      </div>
      <div class="c-area__table">
        <?php $area_group = get_field('area_group'); ?>
        <?php if ($area_group) : ?>
          <div class="c-area__box">
            <table class="c-table01">
              <tr>
                <th class="name">エリア名</th>
                <th class="catering">ケータリング</th>
                <th class="delivery">デリバリー</th>
              </tr>
              <?php foreach ($area_group as $area) : ?>
                <tr>
                  <td class="name">
                    <?php if (isset($area['area_group_name'])) : ?>
                      <?php
                         if(!empty($area['area_group_link'])): 
                          
                          $area_group_link_id = $area['area_group_link']->ID;
                          $area_group_link_url = get_permalink($area_group_link_id);
                          
                         ?>
                        <a href="<?= $area_group_link_url ?>" class="link">
                          <?= $area['area_group_name']; ?>
                        </a>
                      <?php else: ?>
                        <?= $area['area_group_name']; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                  </td>
                  <td class="catering">
                    <?php if (isset($area['area_group_cateling_price'])) : ?>
                      <?= $area['area_group_cateling_price']; ?>
                    <?php endif; ?>
                  </td>
                  <td class="delivery">
                    <?php if (isset($area['area_group_delivery_price'])) : ?>
                      <?= $area['area_group_delivery_price']; ?>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>
        <?php $area_group2 = get_field('area_group2'); ?>
        <?php if ($area_group2) : ?>
          <div class="c-area__box">
            <table class="c-table01">
              <tr>
                <th class="name">エリア名</th>
                <th class="catering">ケータリング</th>
                <th class="delivery">デリバリー</th>
              </tr>
              <?php foreach ($area_group2 as $area) : ?>
                <tr>
                  <td class="name">
                    <?php if (isset($area['area_group_name2'])) : ?>
                      <?= nl2br($area['area_group_name2']); ?>
                    <?php endif; ?>
                  </td>
                  <td class="catering">
                    <?php if (isset($area['area_group_cateling_price2'])) : ?>
                      <?= nl2br($area['area_group_cateling_price2']); ?>
                    <?php endif; ?>
                  </td>
                  <td class="delivery">
                    <?php if (isset($area['area_group_delivery_price2'])) : ?>
                      <?= nl2br($area['area_group_delivery_price2']); ?>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>
      </div>

      <!-- 各県の「オススメ会場」「お役立ち情報」ごとのリンク -->
      <?php
      //オススメ　リンク　
      $area_blog_link = get_field('area_blog_link');
      //お役立ち　リンク　
      $area_blog_link2 = get_field('area_blog_link2');
      $terms = get_the_terms($post->ID, 'tax_region');
      if ($terms[0]) {
        foreach ($terms as $term) {
          $place_name = $term->name;
        }
      }
      ?>

      <div class="p_home-sec06__box06">
        <?php if ($area_blog_link) : ?>
          <div class="p_home-sec06__btn">
            <a href="<?= $home_url ?>/tax_blog/<?= $area_blog_link->slug ?>" class="c-dec-btn pat-contact">
              <span class="jp"><?= $place_name ?>のケータリング・<br>オードブルデリバリー<br>オススメ会場</span>
              <span class="en Allura">Recommend</span>
              <span class="dec">View More</span>
            </a>
          </div>
        <?php endif; ?>
        <?php if ($area_blog_link2) : ?>
          <div class="p_home-sec06__btn">
            <a href="<?= $home_url ?>/tax_blog/<?= $area_blog_link2->slug ?>" class="c-dec-btn pat-estimate">
              <span class="jp"><?= $place_name ?>のケータリング・<br>オードブルデリバリー<br>お役立ち情報</span>
              <span class="en Allura">information</span>
              <span class="dec">View More</span>
            </a>
          </div>
        <?php endif; ?>

      </div>

    </div>
  <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>