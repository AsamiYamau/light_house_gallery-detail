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
      <main class="outer-block p_menu-archive bg_img p_budget">
        <section class="l-mv">
          <div class="l-mv__img">
            <img src="<?= $template_url ?>/img/blog/blog-top.jpg" alt="">
          </div>
          <div class="l-mv__txt">
            <div class="inner-block02">
              <h1 class="l-mv__txtbox">
                <p class="en">Budget</p>
                <p class="ja">予算から選ぶ</p>
              </h1>
            </div>
          </div>
        </section>
        <div class="c-bread">
          <div class="inner-block">
            <ul class="c-bread-list">
              <li class="c-bread-list__li">
                <a href="<?= $home_url ?>/" class="c-bread-list__item">トップページ</a>
              </li>
              <li class="c-bread-list__li">
                <sapn class="c-bread-list__txt">予算から選ぶ</sapn>
              </li>
            </ul>
          </div>
        </div>

        <div class="p_scene">
          <?php
          //tax_delivery_priceとtax_cateling_priceを取得
          $terms_cateling = get_terms('tax_cateling_price');
          $terms_delivery = get_terms('tax_delivery_price');

          //オプションページのカスタムフィールド取得
          $budget_catering = get_field('budget_catering', 'option');

          $budget_deli = get_field('budget_deli', 'option');




          //同じ配列に結合
          // $terms = [];
          // foreach ($terms_delivery as $term) {
          //   $terms[] = $term;
          // }
          // foreach ($terms_cateling as $term) {
          //   if (in_array($term->slug, $terms)) {
          //     continue;
          //   }
          //   $terms[] = $term;
          // }
          // //termsのslugの昇順で並び替え
          // usort($terms, function ($a, $b) {
          //   return $a->slug <=> $b->slug;
          // });
          ?>

          <!-- ケータリング　アンカー -->
          <div class="p_scene-anker p_budget-ankor">
            <div class="inner-block">
              <div class="p_budget-ankor__ttl c-l-ttl">ケータリング</div>
              <ul class="p_scene-list p_budget-ankor__list anm-list">
                <?php if(!empty($budget_catering[0])): ?>
                  <?php
                  foreach($budget_catering as $i => $item):
                    $i = $i + 1;
                    ?>
                    <li>
                      <a href="#budget_c<?= $i ?>" class="c-img-btn p_small">
                        <div class="c-img-btn__img-wrap">
                        </div>
                        <div class="c-img-btn__txt p_budget-ankor__txt">
                          <span class="big"><?= $item['budget_catering_price'] ?></span>円〜
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>

          </div>
          <!-- オードブル　アンカー -->
          <div class="p_scene-anker p_budget-ankor">
            <div class="inner-block">
              <div class="p_budget-ankor__ttl deli c-l-ttl">オードブルデリバリー</div>
              <ul class="p_scene-list p_budget-ankor__list anm-list">
                <?php if(!empty($budget_deli[0])): ?>
                  <?php
                  foreach($budget_deli as $i => $item):
                    $i = $i + 1;
                    ?>
                    <li>
                      <a href="#budget_d<?= $i ?>" class="c-img-btn p_small p_budget-ankor__btn deli">
                        <div class="c-img-btn__img-wrap">
                        </div>
                        <div class="c-img-btn__txt p_budget-ankor__txt">
                          <span class="big"><?= $item['budget_deli_price'] ?></span>円〜
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>

          </div>


          <!-- ケータリング  -->
          <?php
          if (!empty($budget_catering[0])) :

            foreach ($budget_catering as $i => $item):
              $price = $item['budget_catering_price'];
              $i = $i + 1;

              $cap = '';
              if ($price == '1,800') {
                $cap = '手軽に楽しめる美味しい料理を取り揃えています。カジュアルな集まりや小規模なパーティーに最適で、コストパフォーマンスに優れたメニューをお楽しみください。';
              } else if ($price == '3,000') {
                $cap = '特別な日を華やかに演出します。ゲストに喜ばれること間違いなしの美味しさを提供します。パーティーやイベントを一層盛り上げます。';
              } else if ($price == '4,000') {
                $cap = '贅沢な料理でパーティーやイベントを一層華やかに演出します。特別な日にふさわしい美味しさをお楽しみいただけます。ゲストにとって忘れられないひとときを提供します。';
              } else if ($price == '5,000') {
                $cap = '最高の料理で特別な日を彩ります。豪華なメニューでゲストを驚かせ、思い出に残るひとときを提供します。特別な日や大切なイベントにふさわしい、贅沢なひとときをお楽しみいただけます。';
              }
              ?>

              <section id="budget_c<?= $i ?>" class="p_menu-archive__cont p_budget__cont">

                <div class="p_scene-archive-kv">
                  <h2 class="p_scene-archive-kv__ttl p_budget__cont-ttl">
                    <span class="big"><?= $price ?></span>円〜<br><span class="category">ケータリング</span><span class="txt">おすすめプラン</span>
                  </h2>
                  <div class="p_scene-archive-kv__cap">
                    <?= $cap ?>
                  </div>
                  <div class="p_scene-archive-kv__bg budget">
                    <img src="<?= $template_url ?>/img/home/mv1.jpg" alt="">
                  </div>
                </div>

                <div class="p_menu-archive-cont">
                  <div class="inner-block">
                    <div class="p_menu-archive-cont__cont">
                      <ul class="c-menu-list ptn_long anm-list">

                        <?php
                        foreach($item['budget_catering_post'] as $i => $post_item):
                          $long = '';
                          if($i == 0){
                            $long = 'long';
                          }
                          $post_id = $post_item->ID;


                          ?>

                          <li class="">
                            <a href="<?= get_the_permalink($post_id) ?>" class="c-menu-list__item <?= $long ?>">
                              <?php

                              $thumb = get_the_post_thumbnail_url($post_id);
                              $thumb_img = '';
                              if ($thumb) {
                                $thumb_img = $thumb;
                              } else {
                                $thumb_img = $template_url . '/img/common/no_img.jpg';
                              }

                              ?>
                              <div class="c-menu-list__img pat-scene">
                                <img src="<?= $thumb_img ?>" alt="" />
                              </div>
                              <div class="c-menu-list__txt-box">
                                <h3 class="c-menu-list__ttl cataling">
                                  <?= get_the_title($post_id); ?>
                                </h3>
                                <?php
                                $cateling_desc01 = get_field('cateling_desc01', $post_id);

                                $cap = '';
                                if ($cateling_desc01) {
                                  $cap = $cateling_desc01;
                                }
                                ?>
                                <p class="c-menu-list__cap">
                                  <?= $cap ?>
                                </p>
                                <div class="c-menu-list__box">
                                  <div class="c-price-box cataling">
                                    <?php
                                    $cateling_num = get_field('cateling_num', $post_id);

                                    $num = '';
                                    if ($cateling_num) {
                                      $num = $cateling_num;
                                    }


                                    ?>
                                    <span class="wrap">
                                    <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                                  </span>
                                    <?php
                                    $cateling_price_tax = get_field('cateling_price_tax', $post_id);

                                    $price_tax = '';
                                    if ($cateling_price_tax) {
                                      $price_tax = $cateling_price_tax;
                                    }

                                    ?>
                                    <span class="wrap">
                                    <span class="fz3">￥</span>
                                    <span class="fz4"><?= safe_number_format($price_tax) ?></span>
                                  </span>
                                    <?php
                                    $cateling_price = get_field('cateling_price', $post_id);

                                    $price = '';
                                    if ($cateling_price) {
                                      $price = $cateling_price;
                                    }

                                    ?>
                                    <span class="wrap">
                                    <span class="fz5">(税抜¥<span class="fz6"><?= safe_number_format($price) ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                                  </span>
                                  </div>
                                  <div class="p_menu-archive-cont__btn">
                                    <div class="c-view-more bg_img cataling">
                                      View More
                                    </div>
                                  </div>
                                </div>
                                <div class="c-menu-list__tag pat-cateling">ケータリング</div>
                              </div>
                            </a>
                          </li>
                        <?php endforeach; ?>

                      </ul>
                    </div>

                  </div>
                </div>
              </section>

            <?php endforeach; ?>
          <?php endif; ?>

          <!-- オードブル  -->
          <?php

          foreach ($budget_deli as $i => $item):

            $price = $item['budget_deli_price'];
            $i = $i + 1;

            $cap = '';
            if ($price == '1,200') {
              $cap = '手軽に楽しめる美味しいオードブルを取り揃えています。カジュアルな集まりや小規模なパーティーに最適で、コストパフォーマンスに優れたメニューをお楽しみください。';
            } else if ($price == '2,000') {
              $cap = 'バラエティ豊かなオードブルでゲストをおもてなしします。特別な日やイベントにぴったりのメニューで、満足度の高い食体験を提供します。';
            } else if ($price == '3,000') {
              $cap = '特別な日を華やかに演出します。ゲストに喜ばれること間違いなしの美味しさを提供します。パーティーやイベントを一層盛り上げます。';
            } else if ($price == '4,000') {
              $cap = '贅沢なオードブルでパーティーやイベントを一層華やかに演出します。高品質な食材を使用し、見た目も味も楽しめるメニューで、ゲストに喜ばれること間違いなしです。特別な日にふさわしい美味しさをお楽しみください。';
            } else if ($price == '5,000') {
              $cap = '豪華なオードブルで特別な日を彩ります。贅沢なメニューでゲストをおもてなしし、思い出に残るひとときを提供します。最高の食体験をお楽しみいただけるよう、細部にまでこだわった料理をお届けします。';
            }
            ?>

            <section id="budget_d<?= $i ?>" class="p_menu-archive__cont p_budget__cont deli bg_img">

              <div class="p_scene-archive-kv">
                <h2 class="p_scene-archive-kv__ttl p_budget__cont-ttl">
                  <span class="big"><?= $price ?></span>円〜<br><span class="category deli">オードブルデリバリー</span><span class="txt">おすすめプラン</span>
                </h2>
                <div class="p_scene-archive-kv__cap">
                  <?= $cap ?>
                </div>
                <div class="p_scene-archive-kv__bg budget">
                  <img src="<?= $template_url ?>/img/home/mv1.jpg" alt="">
                </div>
              </div>
              <?php


              ?>

              <div class="p_menu-archive-cont">
                <div class="inner-block">
                  <div class="p_menu-archive-cont__cont">
                    <ul class="c-menu-list ptn_long anm-list">
                      <?php
                      foreach($item['budget_deli_post'] as $i => $post_item):
                        $long = '';
                        if($i == 0){
                          $long = 'long';
                        }
                        $post_id = $post_item->ID;


                        ?>
                        <li class="">
                          <a href="<?= get_the_permalink($post_id) ?>" class="c-menu-list__item <?= $long ?> deli">
                            <?php

                            $thumb = get_the_post_thumbnail_url($post_id);
                            $thumb_img = '';
                            if ($thumb) {
                              $thumb_img = $thumb;
                            } else {
                              $thumb_img = $template_url . '/img/common/no_img.jpg';
                            }

                            ?>
                            <div class="c-menu-list__img pat-scene">
                              <img src="<?= $thumb_img ?>" alt="" />
                            </div>
                            <div class="c-menu-list__txt-box">
                              <h3 class="c-menu-list__ttl deli">
                                <?= get_the_title($post_id); ?>
                              </h3>
                              <?php

                              $deli_desc01 = get_field('deli_desc01', $post_id);
                              $cap = '';

                              if ($deli_desc01) {
                                $cap = $deli_desc01;
                              }
                              ?>
                              <p class="c-menu-list__cap">
                                <?= $cap ?>
                              </p>
                              <div class="c-menu-list__box">
                                <div class="c-price-box deli">
                                  <?php

                                  $deli_num = get_field('deli_num',$post_id);

                                  $num = '';

                                  if ($deli_num) {
                                    $num = $deli_num;
                                  }

                                  ?>
                                  <span class="wrap">
                                    <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                                  </span>
                                  <?php

                                  $deli_price_tax = get_field('deli_price_tax',$post_id);
                                  $price_tax = '';

                                  if ($deli_price_tax) {
                                    $price_tax = $deli_price_tax;
                                  }
                                  ?>
                                  <span class="wrap">
                                    <span class="fz3">￥</span>
                                    <span class="fz4"><?= safe_number_format($price_tax) ?></span>
                                  </span>
                                  <?php

                                  $deli_price = get_field('deli_price',$post_id);
                                  $price = '';

                                  if ($deli_price) {
                                    $price = $deli_price;
                                  }
                                  ?>
                                  <span class="wrap">
                                    <span class="fz5">(税抜¥<span class="fz6"><?= safe_number_format($price) ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                                  </span>
                                </div>
                                <div class="p_menu-archive-cont__btn">
                                  <div class="c-view-more bg_img deli">
                                    View More
                                  </div>
                                </div>
                              </div>
                              <div class="c-menu-list__tag pat-deli">デリバリー</div>
                            </div>
                          </a>
                        </li>

                      <?php endforeach; ?>
                    </ul>
                  </div>

                </div>
              </div>

            </section>

          <?php endforeach; ?>


        </div>


      </main>
    </div>
  </div>




<?php
get_footer();
