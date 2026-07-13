<?php
global $template_url;
global $home_url;
get_header();
?>

  <div class="l-main">
    <div class="l-main__side pc">
      <?php get_sidebar(); ?>
    </div>

    <div class="l-main__main">
      <main class="outer-block p_drink-option p_drink bg_img deli">
        <section class="l-mv">
          <div class="l-mv__img">
            <img src="<?= $template_url; ?>/img/drink/deli_mv.jpg" alt="" />
          </div>
          <div class="l-mv__txt">
            <div class="inner-block02">
              <h1 class="l-mv__txtbox anm-right">
                <span class="en">Drink plan</span>
                <span class="ja">ドリンクデリバリーメニュー</span>
              </h1>
            </div>
          </div>
        </section>
        <div class="c-bread">
          <div class="inner-block">
            <ul class="c-bread-list">
              <li class="c-bread-list__li">
                <a href="<?= $home_url; ?>/" class="c-bread-list__item">トップページ</a>
              </li>
              <li class="c-bread-list__li">
                <a href="<?= $home_url; ?>/delivery/" class="c-bread-list__item"
                >オードブルデリバリーメニュー</a
                >
              </li>
              <li class="c-bread-list__li">
                <span class="c-bread-list__txt">ドリンクデリバリーメニュー</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="l-kv ptn01">
          <div class="l-kv__img">
            <img src="<?= $template_url; ?>/img/drink/kv.jpg" alt="">
          </div>
          <div class="l-kv__txt-box">
            <div class="c-mini-en-ttl Allura anm">
              <span class="txt">Free drink plan</span>
            </div>
            <h2 class="l-kv__ttl anm">
              <span class="big">ドリンクデリバリーメニュー</span>
              
            </h2>
            <div class="l-kv__cap anm">
              ワイン、焼酎、ウィスキー、ハイボール、<br class="sp">ソフトドリンクなど<br>
              豊富なドリンクを取り揃えております。
            </div>
            <div class="l-kv__btn anm-list">
              <div class="btn">
                <a href="<?= $home_url; ?>/delivery-drink/" class="c-btn02 bg_img ico1 mini deli">ドリンクプラン</a>
              </div>
              <div class="btn">
                <a href="<?= $home_url; ?>/delivery-options/" class="c-btn02 bg_img ico2 mini white">オプションフード</a>
              </div>
            </div>
          </div>
        </div>


        <div class="p_drink__cont">
          <div class="inner-block">
            <?php
            $drink_plan_args = array(
              'post_type' => array('delivery-drinkplan'),
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'order' => 'ASC',
              'orderby' => 'menu_order'
            );
            $drink_plan_query = new WP_Query($drink_plan_args);
            ?>
            <?php if ($drink_plan_query->have_posts()) : ?>
              <?php while
              ($drink_plan_query->have_posts()) : $drink_plan_query->the_post(); ?>
                <div class="p_drink-box anm-up">
                  <h3 class="c-mini-ribon-ttl ttl deli">
                    <?php the_title(); ?>
                    <span class="c-mini-ribon-ttl__dec">
                      <span class="c-mini-ribon"></span>
                    </span>
                  </h3>
                  <div class="p_drink-box__wrap">
                    <div class="p_drink-box__img-area">
                      <div class="p_drink-box__txt">
                        <?php echo nl2br(get_field('deli-drink-plan-catch')); ?>
                      </div>
                      <div class="p_drink-box__img">
                        <?php
                        $img_id = get_post_thumbnail_id();
                        $img_src = '';
                        if($img_id){
                          $img_src = wp_get_attachment_url($img_id);
                        }
                        ?>
                        <?php if($img_src): ?>
                          <img src="<?= $img_src; ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="p_drink-box__menu">
                      <div class="c-menu-name mini deli">
                        <div class="c-menu-name__ttl deli">ドリンク内容</div>
                        <?php $plan_drinks = get_field('deli-drink-plan-menu'); ?>
                        <?php if($plan_drinks): ?>
                          <ul class="c-menu-name-list one">
                            <?php foreach ($plan_drinks as $plan_drink): ?>
                              <li class="c-menu-name-list__item no_flex">
                                <?php if(isset($plan_drink['deli-drink-plan-menu-name'])): ?>
                                  <span class="list-ttl"><?php echo $plan_drink['deli-drink-plan-menu-name'] ?></span>
                                <?php endif; ?>
                                <?php if(isset($plan_drink['deli-drink-plan-menu-desc'])): ?>
                                  <span class="list-txt"><?php echo nl2br($plan_drink['deli-drink-plan-menu-desc']); ?></span>
                                <?php endif; ?>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="p_drink-box__price">
                    <div class="c-view-more bg_img none_arrow deli">
                      <div class="c-price-box">
                        <span class="wrap">
                          <span class="fz1">1セット</span>
                        </span>
                        <span class="wrap">
                          <?php
                          $price = get_field('deli-drink-plan-price-tax');
                          if($price){
                            $price = safe_number_format($price);
                          }
                          ?>
                          <?php if($price):?>
                            <span class="fz3">￥</span><span class="fz4"><?= $price ?></span><span class="fz5">(税込)</span>
                          <?php endif; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="l-kv p_drink-option__kv ptn02">
          <div class="l-kv__img">
            <img src="<?= $template_url; ?>/img/drink/kv2.jpg" alt="">
          </div>
          <div class="l-kv__txt-box">
            <div class="c-mini-en-ttl Allura anm">
              <span class="txt">a la carte</span>
            </div>
            <h2 class="l-kv__ttl anm">
              <span class="big">単品メニュー</span>
              
            </h2>
            <div class="l-kv__cap anm">
              ワイン、焼酎、ウィスキー、ハイボール、<br class="sp">ソフトドリンクなど<br>
              豊富なドリンクを取り揃えております。
            </div>
          </div>
        </div>

        <div class="l-box p_drink__cont p_drink-option__bottom anm-up">
          <div class="inner-block">
            <div class="p_drink-box l-box__cont">
              <h3 class="c-mini-ribon-ttl ttl">
                ドリンク単品メニュー<br class="sp"><span class="small">（税込）</span>
                <span class="c-mini-ribon-ttl__dec">
                      <span class="c-mini-ribon"></span>
                    </span>
              </h3>
              <?php
              $drink_single_args = array(
                'post_type' => array('delivery-drinksingle'),
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'menu_order'
              );
              $drink_single_query = new WP_Query($drink_single_args);
              ?>
              <?php if ($drink_single_query->have_posts()) : ?>
                <ul class="c-list p_drink-option__list">
                  <?php while
                  ($drink_single_query->have_posts()) : $drink_single_query->the_post(); ?>
                    <li class="c-list__item">
                      <h4 class="c-list__ttl"><?php the_title(); ?></h4>
                      <?php
                      $price = get_field('deli-drink-single-price');
                      if($price){
                        $price = safe_number_format($price).'円';
                      }
                      ?>
                      <span class="c-list__price"><?= $price; ?></span>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
              <?php wp_reset_postdata();?>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>




<?php
get_footer();
