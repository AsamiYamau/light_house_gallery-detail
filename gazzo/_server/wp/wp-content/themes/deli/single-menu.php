<?php
global $home_url;
global $template_url;

get_header();
?>

<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <!-- メインコンテンツ -->
  <main class="c-page__wrapper p_column">
    <h1 class="c-page__title p_column__title">
      メニュー
      <span class="c-page__subtitle p_column__subtitle Allura">Menu</span>
    </h1>
    <div class="c-page__content">
      <!-- パンくずリスト -->
      <ul class="c-breadcrumb">
        <li class="c-breadcrumb__item">
          <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/">トップページ</a>
        </li>
        <li class="c-breadcrumb__item">
          <span class="c-breadcrumb__link" >メニュー一覧</span>
        </li>
        <?php
        $the_post_tax_budget = get_the_terms($post->ID, 'tax_budget');
        $the_post_tax_allbudget = get_the_terms($post->ID, 'tax_allbudget');
        $the_post_tax_single = get_the_terms($post->ID, 'tax_single');
        $the_post_tax_series = get_the_terms($post->ID, 'tax_series');
        $the_post_tax_drink = get_the_terms($post->ID, 'tax_drink');
        ?>
        <?php if(isset($the_post_tax_budget[0])): ?>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/<?php echo $the_post_tax_budget[0]->taxonomy; ?>/">1人当たりの予算から選ぶ</a>
          </li>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo get_term_link($the_post_tax_budget[0]); ?>"><?php echo deli_format_price($the_post_tax_budget[0]->name); ?>円</a>
          </li>
        <?php elseif(isset($the_post_tax_allbudget[0])): ?>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/<?php echo $the_post_tax_allbudget[0]->taxonomy; ?>/">総額予算から選ぶ</a>
          </li>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo get_term_link($the_post_tax_allbudget[0]); ?>"><?php echo deli_format_price($the_post_tax_allbudget[0]->name); ?>円</a>
          </li>
        <?php elseif(isset($the_post_tax_single[0])): ?>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/<?php echo $the_post_tax_single[0]->taxonomy; ?>/">単品メニューから選ぶ</a>
          </li>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo get_term_link($the_post_tax_single[0]); ?>"><?php echo $the_post_tax_single[0]->name; ?></a>
          </li>
        <?php elseif(isset($the_post_tax_series[0])): ?>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/<?php echo $the_post_tax_series[0]->taxonomy; ?>/">シリーズから選ぶ</a>
          </li>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo get_term_link($the_post_tax_series[0]); ?>"><?php echo $the_post_tax_series[0]->name; ?></a>
          </li>
        <?php elseif(isset($the_post_tax_drink[0])): ?>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/<?php echo $the_post_tax_drink[0]->taxonomy; ?>/">ドリンクから選ぶ</a>
          </li>
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo get_term_link($the_post_tax_drink[0]); ?>"><?php echo $the_post_tax_drink[0]->name; ?></a>
          </li>
        <?php endif; ?>

        <li class="c-breadcrumb__item">
          <span class="c-breadcrumb__link c-breadcrumb__link--current"><?php the_title(); ?></span>
        </li>
      </ul>
    </div>

    <!-- メインエリア -->
    <div class="c-main-wrapper c-main-menu-wrapper">
      <div class="c-main-area">
        <!-- set -->
        <section class="p-set-menu">
          <h2 class="p-set-menu__title">
            <?php the_title(); ?>
          </h2>
          <div class="p-set-menu__content">
            <?php
            $thumb_group = SCF::get('thumb_group');

            ?>
            <?php if (isset($thumb_group[0]) && $thumb_group[0]['menu_thumb_img']): ?>
              <div class="p-set-menu__main">
                  <ul class="menu-slider-main">
                    <?php foreach ($thumb_group as $thumb): ?>
                      <?php
                      $img = '';
                      if ($thumb['menu_thumb_img']) {
                        $img = wp_get_attachment_url($thumb['menu_thumb_img']);
                      } else {
                        $img = '/img/common/no_img.jpg';
                      }

                      $fire = '';
                      if ($thumb['menu_thumb_bool'] == 'true') {
                        $fire = 'fire';
                      }
                      ?>
                      <li class="p-set-menu__figure <?= $fire ?>">
                        <img src="<?= $img ?>" class="p-set-menu__image" alt="" />
                        <p class="p-set-menu__caption"></p>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php if(is_array($thumb_group) && count($thumb_group) > 1): ?>
                    <div class="p-set-menu__slider">
                    <ul class="menu-slider menu-slider-thumb p-set-menu__slider-list">
                      <?php foreach ($thumb_group as $thumb): ?>
                        <?php
                        $img = '';
                        if ($thumb['menu_thumb_img']) {
                          $img = wp_get_attachment_url($thumb['menu_thumb_img']);
                        } else {
                          $img = '/img/common/no_img.jpg';
                        }
                        $fire = '';
                        if ($thumb['menu_thumb_bool'] == 'true') {
                          $fire = 'fire';
                        }
                        ?>
                        <li class="p-set-menu__slider-item <?= $fire ?>">
                          <div class="p-set-menu__slider-link">
                            <img src="<?= $img ?>" alt="" />
                          </div>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                  <?php endif; ?>
              </div>
            <?php endif; ?>
            <div class="p-set-menu__info">
              <?php 
                $menu_cap = SCF::get('menu_cap');
                $menu_cap_ttl = SCF::get('menu_cap_ttl');
                $menu_volume_front = SCF::get('menu_volume_front');
                $menu_volume = SCF::get('menu_volume');
                $menu_volume_after = SCF::get('menu_volume_after');
                $menu_num = SCF::get('menu_num');
                $menu_price = SCF::get('menu_price');
              ?>
              <?php if(!empty($menu_cap_ttl)): ?>
              <p class="p-set-menu__copy">
                <?= nl2br($menu_cap_ttl); ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($menu_cap)):  ?>
              <p class="p-set-menu__description"> 
                <?= nl2br($menu_cap); ?> 
              </p>
              <?php endif; ?>
              <div class="p-set-menu__order">
                <?php if($menu_volume || $menu_volume_front || $menu_volume_after):  ?>
                <p class="p-set-menu__serving c-menu-item-serving">
                  <?php if($menu_volume_front):?>
                  <span class="p-set-menu__serving-unit c-menu-item-serving-unit"><?php echo $menu_volume_front; ?></span>
                  <?php endif; ?>
                  <span class="p-set-menu__serving-people c-menu-item-serving-people">
                    <?= $menu_volume ?>
                  </span>
                  <?php if($menu_volume_after): ?>
                  <span class="p-set-menu__serving-unit c-menu-item-serving-unit"><?php echo $menu_volume_after; ?></span>
                  <?php endif; ?>
                </p>
                <?php endif; ?>
                <?php if(!empty($menu_num)):  ?>
                  <p class="p-set-menu__serving c-menu-item-serving">
                    <span class="p-set-menu__serving-unit c-menu-item-serving-unit">全</span>
                    <span class="p-set-menu__serving-people c-menu-item-serving-people">
                    <?= $menu_num ?>
                  </span>
                    <span class="p-set-menu__serving-unit c-menu-item-serving-unit">品</span>
                  </p>
                <?php endif; ?>
                <?php 
                if(!empty($menu_price)):  
                    $menu_price = deli_format_price($menu_price);
                  ?>
                <p class="p-set-menu__price c-menu-item-price__wrapper">
                  <span class="p-set-menu__price-value c-menu-item-price">
                    <?= $menu_price ?>
                  </span>
                  <span class="p-set-menu__price-currency c-menu-item-price-currency">円</span>
                  <span class="p-set-menu__price-note">※金額は税込です</span>
                </p>
                <?php endif; ?>
                

                <div>
                  <?php set_query_var('cart_btn_class','p-set-menu__cart-button'); ?>
                  <?php $product_id = SCF::get('menu_product_id'); ?>
                  <?php set_query_var('product_id',$product_id); ?>
                  <?php get_template_part('delicart_inc/add_cart'); ?>
                </div>
              </div>
            </div>
          </div>
          <?php
            $menu_list = SCF::get('menu_list');
            if ($menu_list[0] && $menu_list[0]['menu_name']):
          ?>
          <div class="p-set-menu__list">
            <h3 class="p-set-menu__list-title">
              料理名
            </h3>
            <ul class="p-set-menu__list-items">
              <?php 
                foreach ($menu_list as $menu):
                $fire = '';
                if ($menu['menu_bool'] == 'true') {
                  $fire = 'fire';
                }
                if(!empty($menu['menu_name'])):
                ?>
              <li class="p-set-menu__list-item <?= $fire ?>">
                <span class="txt"><?= $menu['menu_name'] ?></span>
              </li>
              <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endif; ?>
        </section>





        <?php
        $sushi_posts = SCF::get_option_meta( 'sushi-options', 'sushi_menu_posts' );
        if(!$sushi_posts){
          $sushi_posts = array();
        }
        $sushi_args = array(
          'post_type' => 'menu',
          'posts_per_page' => 4,
          'post__in' => $sushi_posts
        );
        $sushi_query = new WP_Query($sushi_args);
        ?>
        <?php if($sushi_query->have_posts()): ?>
          <section class="p_menu-sushi">
          <h2 class="p_menu-suggestion__title">
            食卓に彩りを添える「お寿司」を<br />
            もう一品いかがですか？
          </h2>
            <?php if($sushi_query->have_posts()): ?>
              <ul class="c-menu-list four-column">
                <?php while($sushi_query->have_posts()): $sushi_query->the_post(); ?>
                  <?php get_template_part('inc/menu-item'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
              </ul>

              <?php while($sushi_query->have_posts()): $sushi_query->the_post(); ?>
<!--                <div class="c-menu-item p-menu-sushi-item">-->
<!--                  <div class="c-menu-item-wrapper p-menu-sushi-item-wrapper">-->
<!--                    <div class="c-menu-item-image-wrapper p-menu-sushi-item-image-wrapper">-->
<!--                      --><?php
//                      $thumb = '';
//                      if (has_post_thumbnail()) {
//                        $thumb = get_the_post_thumbnail_url();
//                      } else {
//                        $thumb = $template_url . '/img/common/no_img.jpg';
//                      }
//                      ?>
<!--                      <img src="--><?php //= $thumb ?><!--" alt="--><?php //the_title(); ?><!--" class="c-menu-item-image p-menu-sushi-item-image" />-->
<!--                      <p class="p-menu-sushi-item-image-text">-->
<!--                        人気<br />メニュー-->
<!--                      </p>-->
<!--                    </div>-->
<!--                    <div class="c-menu-item-details p-menu-sushi-item-details">-->
<!--                      <div class="p-menu-sushi-item-details__inner">-->
<!--                        <h3 class="c-menu-item-name p-menu-sushi-item-name">-->
<!--                          --><?php //the_title(); ?>
<!--                        </h3>-->
<!--                        --><?php
//                        $menu_volume = SCF::get('menu_volume');
//                        $menu_volume_front = SCF::get('menu_volume_font');
//                        $menu_volume_after = SCF::get('menu_volume_after');
//                        $menu_price = SCF::get('menu_price');
//                        ?>
<!--                        <div class="p-menu-sushi__info">-->
<!--                          <p class="c-menu-item-serving p-menu-sushi-item-serving">-->
<!--                            --><?php //if($menu_volume_front): ?>
<!--                            <span class="c-menu-item-serving-unit p-menu-sushi-item-serving-unit">--><?php //echo $menu_volume_front; ?><!--</span>-->
<!--                            --><?php //endif; ?>
<!--                            <span class="c-menu-item-serving-people p-menu-sushi-item-serving-people">--><?php //echo $menu_volume; ?><!--</span>-->
<!--                            --><?php //if($menu_volume_after): ?>
<!--                            <span class="c-menu-item-serving-unit p-menu-sushi-item-serving-unit">--><?php //echo $menu_volume_after; ?><!--</span>-->
<!--                            --><?php //endif; ?>
<!--                          </p>-->
<!--                          <p class="c-menu-item-price__wrapper p-menu-sushi-item-price__wrapper">-->
<!--                            <span class="c-menu-item-price p-menu-sushi-item-price">--><?php //echo $menu_price; ?><!--</span>-->
<!--                            <span class="c-menu-item-price-currency p-menu-sushi-item-price-currency">円</span>-->
<!--                          </p>-->
<!--                      -->
<!--                          <div>-->
<!--                            --><?php //set_query_var('cart_btn_class','p-set-menu__cart-button'); ?>
<!--                            --><?php //$product_id = SCF::get('menu_product_id'); ?>
<!--                            --><?php //set_query_var('product_id',$product_id); ?>
<!--                            --><?php //get_template_part('delicart_inc/add_cart'); ?>
<!--                          </div>-->
<!--                          <a href="--><?php //the_permalink(); ?><!--" class="c-menu-item-details-link p-menu-sushi-item-details-link">詳しく見る</a>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
              <?php endwhile; wp_reset_postdata(); ?>
            <?php endif; ?>

          <p class="p_menu-suggestion__price-note">
            ※金額は全て税込です
          </p>
        </section>
        <?php endif; ?>
        <!-- others -->



        <!-- suggestion -->
        <?php
        $hokahoka_args = array(
          'post_type' => 'menu',
          'posts_per_page' => 4,
          'orderby' => 'rand',
          'tax_query' => array(
            'relation' => 'AND',
            array(
              'taxonomy' => 'tax_single',
              'field' => 'slug',
              'terms' => 'hokahoka'
            )
          )
        );
        $hokahoka_query = new WP_Query($hokahoka_args);
        ?>
        <?php if($hokahoka_query->have_posts()): ?>
          <section class="c-menu p_menu-suggestion">
            <h2 class="p_menu-suggestion__title">
              「ホカホカ容器」で<br />
              もう一品いかがですか？
            </h2>
            <ul class="c-menu-list four-column">
              <?php while($hokahoka_query->have_posts()): $hokahoka_query->the_post(); ?>
                <?php get_template_part('inc/menu-item'); ?>
              <?php endwhile; wp_reset_postdata(); ?>
            </ul>
            <p class="p_menu-suggestion__price-note">
              ※金額は全て税込です
            </p>
            <div class="c-button-wrap-center">
              <a href="<?php echo get_term_link('hokahoka','tax_single') ?>" class="c-button">
                <span class="en">View More</span>
                <span class="icon"><img
                    src="<?= $template_url ?>/img/common/icon_arrow.svg"
                    alt=""
                    width="22"
                    height="22" /></span>
              </a>
            </div>
          </section>
        <?php endif; ?>


        <?php
        $tax_single_terms = get_terms('tax_single', array('hide_empty' => false));
        // $tax_single_termsから、slug配列を生成
        $tax_single_terms_slug = array();
        foreach($tax_single_terms as $tax_single_term){
          $tax_single_terms_slug[] = $tax_single_term->slug;
        }

          //サブクエリ
          $args = array(
            'post_type' => 'menu',
            'posts_per_page' => 8,
            'orderby' => 'rand',
            'post__not_in' => array($post->ID),
            'tax_query' => array(
              'relation' => 'AND',
              array(
                'taxonomy' => 'tax_single',
                'field' => 'slug',
                'terms' => $tax_single_terms_slug,
              )
            )
          );
          $menu_query = new WP_Query($args);
        ?>
        <?php if($menu_query->have_posts()): ?>
        <section class="c-menu p_menu-others">
          <h2 class="p_menu-suggestion__title">
            その他豊富な単品メニューをご用意しております。
          </h2>
          <ul class="c-menu-list four-column">
            <?php while($menu_query->have_posts()): $menu_query->the_post(); ?>
              <?php get_template_part('inc/menu-item'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
          <p class="p_menu-suggestion__price-note">
            ※金額は全て税込です
          </p>
        </section>
        <?php endif; ?>
      </div>

      <!-- サイドバー -->
      <?php get_template_part('inc/menu-sidebar'); ?>
    </div>
  </main>
</div>
<?php get_footer(); ?>
