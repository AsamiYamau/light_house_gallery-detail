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
            <a href="<?= $home_url ?>/service/">セミオーダーサービス</a>
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
          $tax_cake_cat = get_the_terms($post->ID, 'tax_cake_cat');
          ?>
          <?php if (!empty($tax_cake_cat)): ?>
            <ul class="c-category-list">
              <?php foreach ($tax_cake_cat as $cat): ?>
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



          <a href="<?= $home_url ?>/contact/" class="c-btn01 u-mt" style="--mt-pc: 25px; --mt-sp: 15px;">ご注文はこちら</a>
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

  <?php
  $customize = SCF::get('customize');

  $icon_map = [
    'ico01' => 'custom01.svg',
    'ico02' => 'custom02.svg',
    'ico03' => 'custom03.svg',
    'ico04' => 'custom04.svg',
  ];
  ?>
  <?php if (!empty($customize)): ?>
    <section class="p_detail-sec02 c-wave02">
      <div class="inner-block">

        <div class="c-ttl02">
          <span class="dec">
            <img src="<?= $template_url ?>/img/common/kuma-dec02_gray.svg" alt="">
          </span>
          <p class="en">Customize</p>
          <h2 class="ja">カスタマイズ項目</h2>
        </div>

        <p class="p_detail-sec02__txt">
          ご注文時にお選びいただけるオプションです。
        </p>

        <ul class="p_detail-sec02__list">

          <?php foreach ($customize as $item): ?>

            <?php
            $icon_key = $item['customize_ico'];
            $icon_file = $icon_map[$icon_key] ?? '';
            ?>

            <li class="p_detail-sec02__item">

              <?php if ($icon_file): ?>
                <div class="p_detail-sec02__ico">
                  <img
                    src="<?= $template_url ?>/img/detail/<?= $icon_file ?>"
                    class="<?= esc_attr($icon_key) ?>"
                    alt="">
                </div>
              <?php endif; ?>

              <?php if (!empty($item['customize_ttl'])): ?>
                <h3 class="p_detail-sec02__ttl">
                  <?= esc_html($item['customize_ttl']); ?>
                </h3>
              <?php endif; ?>

              <?php if (!empty($item['customize_txt'])): ?>
                <p class="p_detail-sec02__txt02">
                  <?= nl2br(esc_html($item['customize_txt'])); ?>
                </p>
              <?php endif; ?>

            </li>

          <?php endforeach; ?>

        </ul>

        <div class="p_detail-sec02__btnWrap">
          <a href="<?= $home_url ?>/contact/" class="c-btn01">ご注文はこちら</a>
        </div>

      </div>
    </section>
  <?php endif; ?>


  <!-- オプション　menu_order -->

  <?php get_template_part('./inc/option'); ?>

  <!-- おすすめ　menu_orderもしくは選択順 -->
  <?php $GLOBALS['recommend_taxonomy'] = 'tax_cake_cat'; ?>
  <?php get_template_part('./inc/recommend'); ?>


</main>


<?php get_footer(); ?>