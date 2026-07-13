<?php
global $home_url;
global $template_url;

get_header();

?>

<main class="outer-block p_detail c-dec">


  <section class="p_detail-mv">
    <div class="inner-block">
      <div class="p_guide-bread">

        <ul class="c-bread">
          <li class="c-bread__item">
            <a href="<?= $home_url ?>/">TOP</a>
          </li>
          <li class="c-bread__item">
            <a href="<?= $home_url ?>/collection/">BONBONNIEREコレクション</a>
          </li>
          <li class="c-bread__item">
            <?php the_title(); ?>
          </li>
        </ul>

      </div>
      <div class="p_detail-mv__box01">
        <!-- サムネイル -->
        <?php
        $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
        if (!$thumbnail_url) {
          $thumbnail_url = $template_url . '/img/common/dummy.jpg';
        }
        ?>
        <div class="p_detail-mv__left">
          <img src="<?= $thumbnail_url ?>" alt="メインビジュアル" class="">
          <img src="<?= $template_url ?>/img/common/crown-dec02.svg" class="mv-dec" alt="">
        </div>
        <!-- /サムネイル -->

        <div class="p_detail-mv__right">
          <!-- ケーキカテゴリー -->
          <?php
          $tax_collection = get_the_terms($post->ID, 'tax_collection');
          ?>
          <?php if (!empty($tax_collection)): ?>
            <ul class="c-category-list">
              <?php foreach ($tax_collection as $cat): ?>
                <?php
                $cat_id = $cat->term_id;
                $cat_name = $cat->name;
                $cat_link = get_term_link($cat);
                ?>
                <li class="c-category-list__item">
                  <a href="<?= esc_url($cat_link) ?>" class="c-category-list__link"><?= $cat_name ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <!-- /ケーキカテゴリー -->

          <div class="c-ttl03 u-mt" style="--mt-pc: 20px;--mt-sp: 10px">
            <h1 class="ja"><?php the_title(); ?></h1>

            <?php $ttl_en = SCF::get('ttl_en'); ?>
            <?php if (!empty($ttl_en)): ?>
              <p class="en poppins"><?= esc_html($ttl_en); ?></p>
            <?php endif; ?>
          </div>

          <?php
          $catch = SCF::get('catch');
          $introduction = SCF::get('introduction');
          $price = SCF::get('semi_order_price');
          ?>

          <?php if (!empty($catch)): ?>
            <p class="p_detail-mv__txt01">
              <?= nl2br(esc_html($catch)); ?>
            </p>
          <?php endif; ?>

          <?php if (!empty($introduction)): ?>
            <div class="p_detail-mv__txt02">
              <?= wp_kses_post($introduction); ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($price)): ?>
            <div class="c-price poppins u-tar">
              ¥<span class="price"><?= esc_html($price); ?></span>（税込）
            </div>
          <?php endif; ?>



          <a href="" class="c-btn01 u-mt" style="--mt-pc: 25px; --mt-sp: 15px;">ご注文はこちら</a>
          <p class="p_detail-mv__txt03">お電話でもご注文いただけます：0120-846-413</p>
        </div>
      </div>
    </div>
  </section>



  <?php
  $product_feature = SCF::get('product_feature');
  ?>

  <?php if (!empty($product_feature)): ?>
    <section class="p_detail-sec01 c-wave01">
      <div class="c-dec__dec01">
        <img src="<?= $template_url ?>/img/common/dec01.svg" alt="">
      </div>
      <div class="c-dec__dec02">
        <img src="<?= $template_url ?>/img/common/dec02.svg" alt="">
      </div>

      <div class="inner-block02">
        <div class="c-ttl02">
          <span class="dec"><img src="<?= $template_url ?>/img/common/kuma-dec02_gray.svg" alt=""></span>
          <p class="en">Product Features</p>
          <h2 class="ja">商品の特徴</h2>
        </div>

        <ul class="p_detail-sec01__list">
          <?php foreach ($product_feature as $feature): ?>
            <li class="p_detail-sec01__item">
              <div class="p_detail-sec01__txtArea">
                <h3 class="p_detail-sec01__ttl">
                  <?= esc_html($feature['product_feature_ttl']); ?>
                </h3>

                <div class="p_detail-sec01__txt">
                  <?= nl2br(esc_html($feature['product_feature_txt'])); ?>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
  <?php endif; ?>



  <!-- オプション　menu_order -->

  <?php get_template_part('./inc/option'); ?>

  <!-- おすすめ　menu_orderもしくは選択順 -->
  <?php $GLOBALS['recommend_taxonomy'] = 'tax_collection'; ?>
  <?php get_template_part('./inc/recommend'); ?>



</main>


<?php get_footer(); ?>