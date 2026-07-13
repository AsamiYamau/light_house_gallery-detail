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
    <main class="outer-block p_menu-archive bg_img">
      <section class="l-mv">
        <div class="l-mv__img">
          <img src="<?= $template_url ?>/img/blog/blog-top.jpg" alt="">
        </div>
        <div class="l-mv__txt">
          <div class="inner-block02">
            <h1 class="l-mv__txtbox">
              <p class="en">Scene</p>
              <p class="ja">シーンから選ぶ</p>
            </h1>
          </div>
        </div>
      </section>
      <div class="c-bread">
        <div class="inner-block">
          <ul class="c-bread-list">
            <li class="c-bread-list__li">
              <a href="/" class="c-bread-list__item">トップページ</a>
            </li>
            <li class="c-bread-list__li">
              <sapn class="c-bread-list__txt">シーンから選ぶ</sapn>
            </li>
          </ul>
        </div>
      </div>

      <div class="p_scene">

        <div class="p_scene-anker">
          <div class="inner-block">
            <ul class="p_scene-list anm-list">
              <li>
                <a href="#seminer" class="c-img-btn">
                  <div class="c-img-btn__img-wrap">
                    <div class="c-img-btn__img">
                      <img src="<?= $template_url ?>/img/home/home_scene_list01.jpg" alt="">
                    </div>
                  </div>
                  <div class="c-img-btn__txt">
                    会議やセミナーのあとに
                  </div>
                </a>
              </li>
              <li>
                <a href="#kangei" class="c-img-btn">
                  <div class="c-img-btn__img-wrap">
                    <div class="c-img-btn__img">
                      <img src="<?= $template_url ?>/img/home/home_scene_list02.jpg" alt="">
                    </div>
                  </div>
                  <div class="c-img-btn__txt">
                    歓送迎会や新年会
                  </div>
                </a>
              </li>
              <li>
                <a href="#gakkou" class="c-img-btn">
                  <div class="c-img-btn__img-wrap">
                    <div class="c-img-btn__img">
                      <img src="<?= $template_url ?>/img/home/home_scene_list03.jpg" alt="">
                    </div>
                  </div>
                  <div class="c-img-btn__txt">
                    学校のお集まりに
                  </div>
                </a>
              </li>
              <li>
                <a href="#bridal" class="c-img-btn">
                  <div class="c-img-btn__img-wrap">
                    <div class="c-img-btn__img">
                      <img src="<?= $template_url ?>/img/home/home_scene_list04.jpg" alt="">
                    </div>
                  </div>
                  <div class="c-img-btn__txt">
                    ブライダル関連に
                  </div>
                </a>
              </li>
              <li>
                <a href="#kojin" class="c-img-btn">
                  <div class="c-img-btn__img-wrap">
                    <div class="c-img-btn__img">
                      <img src="<?= $template_url ?>/img/home/home_scene_list05.jpg" alt="">
                    </div>
                  </div>
                  <div class="c-img-btn__txt">
                    個人のお集まりに
                  </div>
                </a>
              </li>
              <!-- <li>
                <a href="#yagai" class="c-img-btn">
                  <div class="c-img-btn__img-wrap">
                    <div class="c-img-btn__img">
                      <img src="<?= $template_url ?>/img/home/home_scene_list06.jpg" alt="">
                    </div>
                  </div>
                  <div class="c-img-btn__txt">
                    野外のお集まりに
                  </div>
                </a>
              </li> -->
            </ul>
          </div>

        </div>


        <section id="seminer" class="p_menu-archive__cont">


          <div class="p_scene-archive-kv">
            <h2 class="p_scene-archive-kv__ttl">
              会議やセミナーのあとに
            </h2>
            <div class="p_scene-archive-kv__cap">
              スマートな会議やセミナーの後に、心地よいひとときを。<br>クリエイティブなフィンガーフードから、温かいメインディッシュ、<br class="pc">スイーツまで、おすすめプランで皆様の満足をお約束します。
            </div>
            <div class="p_scene-archive-kv__bg">
              <img src="<?= $template_url ?>/img/scene/scene_bg01.jpg" alt="">
            </div>
          </div>

          <div class="p_menu-archive-cont">
            <div class="inner-block">
              <div class="p_menu-archive-cont__cont">
              <?php
              $scene_section01 = get_field('scene_section01', 'option');
              if (isset($scene_section01)) :
              ?>
                <ul class="c-menu-list ptn_long anm-list">
                <?php foreach ($scene_section01 as $i => $item) :
                    $long = ($i == 0) ? 'long' : '';
                    $post_type = '';
                    $post_type_name = '';
                    if($item->post_type == 'cateling') {
                      $post_type = 'cateling';
                      $post_type_name = 'ケータリング';
                    }else if($item->post_type == 'delivery') {
                      $post_type = 'deli';
                      $post_type_name = 'デリバリー';
                    }
                  ?>
                  <li class="num_ico">
                    <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                      <div class="c-menu-list__img pat-scene">
                      <?php
                          $img_id = get_post_thumbnail_id($item->ID);
                          $img_src = '';
                          if ($img_id) {
                            $img_src = wp_get_attachment_url($img_id);
                          } ?>
                        <img src="<?= $img_src ?>" alt="" />
                      </div>
                      <div class="c-menu-list__txt-box">
                        <h3 class="c-menu-list__ttl cataling">
                        <?= $item->post_title ?>
                        </h3>
                        <?php
                          $desc01 = get_field(''.$post_type.'_desc01', $item->ID);
                          if (isset($desc01)) :
                          ?>
                        <p class="c-menu-list__cap">
                        <?= $desc01 ?>  
                        </p>
                        <?php endif; ?>
                        <div class="c-menu-list__box">
                          <div class="c-price-box cataling">
                          <?php
                              $num = get_field(''.$post_type.'_num', $item->ID);
                              if (isset($num)) :
                              ?>
                            <span class="wrap">
                              <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price_tax = get_field(''.$post_type.'_price_tax', $item->ID);
                              if ($price_tax) {
                                $price_tax = safe_number_format($price_tax);
                              }
                              if (isset($price_tax)) :
                              ?>
                            <span class="wrap">
                              <span class="fz3">￥</span>
                              <span class="fz4"><?= $price_tax ?></span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price = get_field(''.$post_type.'_price', $item->ID);
                              if ($price) {
                                $price = safe_number_format($price);
                              }
                              if (isset($price)) :
                              ?>
                            <span class="wrap">
                              <span class="fz5">(税抜¥<span class="fz6"><?= $price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                            </span>
                            <?php endif; ?>
                          </div>
                          <div class="p_menu-archive-cont__btn">
                            <div class="c-view-more bg_img cataling">
                              View More
                            </div>
                          </div>
                        </div>
                        <div class="c-menu-list__tag pat-<?= $post_type ?>"><?= $post_type_name ?></div>
                      </div>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </section>

        <section id="kangei" class="p_menu-archive__cont">


          <div class="p_scene-archive-kv">
            <h2 class="p_scene-archive-kv__ttl">
              歓送迎会や新年会
            </h2>
            <div class="p_scene-archive-kv__cap">
              新たな始まりを華やかに彩るなら、当プランで決まり。<br>歓送迎会や新年会にピッタリな、おいしい料理と笑顔が溢れる<br class="pc">素敵な時間をお届けします
            </div>
            <div class="p_scene-archive-kv__bg">
              <img src="<?= $template_url ?>/img/scene/scene_bg02.jpg" alt="">
            </div>
          </div>

          <div class="p_menu-archive-cont">
            <div class="inner-block">
              <div class="p_menu-archive-cont__cont">
              <?php
              $scene_section02 = get_field('scene_section02', 'option');
              if (isset($scene_section02)) :
              ?>
                <ul class="c-menu-list ptn_long anm-list">
                <?php foreach ($scene_section02 as $i => $item) :
                    $long = ($i == 0) ? 'long' : '';
                    $post_type = '';
                    $post_type_name = '';
                    if($item->post_type == 'cateling') {
                      $post_type = 'cateling';
                      $post_type_name = 'ケータリング';
                    }else if($item->post_type == 'delivery') {
                      $post_type = 'deli';
                      $post_type_name = 'デリバリー';
                    }
                  ?>
                  <li class="num_ico">
                    <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                      <div class="c-menu-list__img pat-scene">
                      <?php
                          $img_id = get_post_thumbnail_id($item->ID);
                          $img_src = '';
                          if ($img_id) {
                            $img_src = wp_get_attachment_url($img_id);
                          } ?>
                        <img src="<?= $img_src ?>" alt="" />
                      </div>
                      <div class="c-menu-list__txt-box">
                        <h3 class="c-menu-list__ttl cataling">
                        <?= $item->post_title ?>
                        </h3>
                        <?php
                          $desc01 = get_field(''.$post_type.'_desc01', $item->ID);
                          if (isset($desc01)) :
                          ?>
                        <p class="c-menu-list__cap">
                        <?= $desc01 ?>  
                        </p>
                        <?php endif; ?>
                        <div class="c-menu-list__box">
                          <div class="c-price-box cataling">
                          <?php
                              $num = get_field(''.$post_type.'_num', $item->ID);
                              if (isset($num)) :
                              ?>
                            <span class="wrap">
                              <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price_tax = get_field(''.$post_type.'_price_tax', $item->ID);
                              if ($price_tax) {
                                $price_tax = safe_number_format($price_tax);
                              }
                              if (isset($price_tax)) :
                              ?>
                            <span class="wrap">
                              <span class="fz3">￥</span>
                              <span class="fz4"><?= $price_tax ?></span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price = get_field(''.$post_type.'_price', $item->ID);
                              if ($price) {
                                $price = safe_number_format($price);
                              }
                              if (isset($price)) :
                              ?>
                            <span class="wrap">
                              <span class="fz5">(税抜¥<span class="fz6"><?= $price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                            </span>
                            <?php endif; ?>
                          </div>
                          <div class="p_menu-archive-cont__btn">
                            <div class="c-view-more bg_img cataling">
                              View More
                            </div>
                          </div>
                        </div>
                        <div class="c-menu-list__tag pat-<?= $post_type ?>"><?= $post_type_name ?></div>
                      </div>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </section>

        <section id="gakkou" class="p_menu-archive__cont">


          <div class="p_scene-archive-kv">
            <h2 class="p_scene-archive-kv__ttl">
              学校のお集まりに
            </h2>
            <div class="p_scene-archive-kv__cap">
              豊富なメニューで選ぶ楽しさ！ <br>学校イベントに最適なフードデリバリー＆ケータリング。<br>皆様の好みに合わせた美味しい料理をお届けします。
            </div>
            <div class="p_scene-archive-kv__bg">
              <img src="<?= $template_url ?>/img/scene/scene_bg03.jpg" alt="">
            </div>
          </div>

          <div class="p_menu-archive-cont">
            <div class="inner-block">
              <div class="p_menu-archive-cont__cont">
              <?php
              $scene_section03 = get_field('scene_section03', 'option');
              if (isset($scene_section03)) :
              ?>
                <ul class="c-menu-list ptn_long anm-list">
                <?php foreach ($scene_section03 as $i => $item) :
                    $long = ($i == 0) ? 'long' : '';
                    $post_type = '';
                    $post_type_name = '';
                    if($item->post_type == 'cateling') {
                      $post_type = 'cateling';
                      $post_type_name = 'ケータリング';
                    }else if($item->post_type == 'delivery') {
                      $post_type = 'deli';
                      $post_type_name = 'デリバリー';
                    }
                  ?>
                  <li class="num_ico">
                    <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                      <div class="c-menu-list__img pat-scene">
                      <?php
                          $img_id = get_post_thumbnail_id($item->ID);
                          $img_src = '';
                          if ($img_id) {
                            $img_src = wp_get_attachment_url($img_id);
                          } ?>
                        <img src="<?= $img_src ?>" alt="" />
                      </div>
                      <div class="c-menu-list__txt-box">
                        <h3 class="c-menu-list__ttl cataling">
                        <?= $item->post_title ?>
                        </h3>
                        <?php
                          $desc01 = get_field(''.$post_type.'_desc01', $item->ID);
                          if (isset($desc01)) :
                          ?>
                        <p class="c-menu-list__cap">
                        <?= $desc01 ?>  
                        </p>
                        <?php endif; ?>
                        <div class="c-menu-list__box">
                          <div class="c-price-box cataling">
                          <?php
                              $num = get_field(''.$post_type.'_num', $item->ID);
                              if (isset($num)) :
                              ?>
                            <span class="wrap">
                              <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price_tax = get_field(''.$post_type.'_price_tax', $item->ID);
                              if ($price_tax) {
                                $price_tax = safe_number_format($price_tax);
                              }
                              if (isset($price_tax)) :
                              ?>
                            <span class="wrap">
                              <span class="fz3">￥</span>
                              <span class="fz4"><?= $price_tax ?></span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price = get_field(''.$post_type.'_price', $item->ID);
                              if ($price) {
                                $price = safe_number_format($price);
                              }
                              if (isset($price)) :
                              ?>
                            <span class="wrap">
                              <span class="fz5">(税抜¥<span class="fz6"><?= $price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                            </span>
                            <?php endif; ?>
                          </div>
                          <div class="p_menu-archive-cont__btn">
                            <div class="c-view-more bg_img cataling">
                              View More
                            </div>
                          </div>
                        </div>
                        <div class="c-menu-list__tag pat-<?= $post_type ?>"><?= $post_type_name ?></div>
                      </div>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </section>

        <section id="bridal" class="p_menu-archive__cont">


          <div class="p_scene-archive-kv">
            <h2 class="p_scene-archive-kv__ttl">
              ブライダル関連に
            </h2>
            <div class="p_scene-archive-kv__cap">
              特別な日に特別な料理を！ <br>ブライダルに最適なフードデリバリー＆ケータリングサービス。<br>心に残る美味しさを提供します。
            </div>
            <div class="p_scene-archive-kv__bg">
              <img src="<?= $template_url ?>/img/scene/scene_bg04.jpg" alt="">
            </div>
          </div>

          <div class="p_menu-archive-cont">
            <div class="inner-block">
              <div class="p_menu-archive-cont__cont">
              <?php
              $scene_section04 = get_field('scene_section04', 'option');
              if (isset($scene_section04)) :
              ?>
                <ul class="c-menu-list ptn_long anm-list">
                <?php foreach ($scene_section04 as $i => $item) :
                    $long = ($i == 0) ? 'long' : '';
                    $post_type = '';
                    $post_type_name = '';
                    if($item->post_type == 'cateling') {
                      $post_type = 'cateling';
                      $post_type_name = 'ケータリング';
                    }else if($item->post_type == 'delivery') {
                      $post_type = 'deli';
                      $post_type_name = 'デリバリー';
                    }
                  ?>
                  <li class="num_ico">
                    <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                      <div class="c-menu-list__img pat-scene">
                      <?php
                          $img_id = get_post_thumbnail_id($item->ID);
                          $img_src = '';
                          if ($img_id) {
                            $img_src = wp_get_attachment_url($img_id);
                          } ?>
                        <img src="<?= $img_src ?>" alt="" />
                      </div>
                      <div class="c-menu-list__txt-box">
                        <h3 class="c-menu-list__ttl cataling">
                        <?= $item->post_title ?>
                        </h3>
                        <?php
                          $desc01 = get_field(''.$post_type.'_desc01', $item->ID);
                          if (isset($desc01)) :
                          ?>
                        <p class="c-menu-list__cap">
                        <?= $desc01 ?>  
                        </p>
                        <?php endif; ?>
                        <div class="c-menu-list__box">
                          <div class="c-price-box cataling">
                          <?php
                              $num = get_field(''.$post_type.'_num', $item->ID);
                              if (isset($num)) :
                              ?>
                            <span class="wrap">
                              <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price_tax = get_field(''.$post_type.'_price_tax', $item->ID);
                              if ($price_tax) {
                                $price_tax = safe_number_format($price_tax);
                              }
                              if (isset($price_tax)) :
                              ?>
                            <span class="wrap">
                              <span class="fz3">￥</span>
                              <span class="fz4"><?= $price_tax ?></span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price = get_field(''.$post_type.'_price', $item->ID);
                              if ($price) {
                                $price = safe_number_format($price);
                              }
                              if (isset($price)) :
                              ?>
                            <span class="wrap">
                              <span class="fz5">(税抜¥<span class="fz6"><?= $price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                            </span>
                            <?php endif; ?>
                          </div>
                          <div class="p_menu-archive-cont__btn">
                            <div class="c-view-more bg_img cataling">
                              View More
                            </div>
                          </div>
                        </div>
                        <div class="c-menu-list__tag pat-<?= $post_type ?>"><?= $post_type_name ?></div>
                      </div>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </section>

        <section id="kojin" class="p_menu-archive__cont">


          <div class="p_scene-archive-kv">
            <h2 class="p_scene-archive-kv__ttl">
              個人のお集まりに
            </h2>
            <div class="p_scene-archive-kv__cap">
              手軽に本格料理を楽しむ！<br>家族や友人との集まりに最適なフードデリバリー。<br>プロの味を自宅で楽しめます。
            </div>
            <div class="p_scene-archive-kv__bg">
              <img src="<?= $template_url ?>/img/scene/scene_bg05.jpg" alt="">
            </div>
          </div>

          <div class="p_menu-archive-cont">
            <div class="inner-block">
              <div class="p_menu-archive-cont__cont">
              <?php
              $scene_section05 = get_field('scene_section05', 'option');
              if (isset($scene_section05)) :
              ?>
                <ul class="c-menu-list ptn_long anm-list">
                <?php foreach ($scene_section05 as $i => $item) :
                    $long = ($i == 0) ? 'long' : '';
                    $post_type = '';
                    $post_type_name = '';
                    if($item->post_type == 'cateling') {
                      $post_type = 'cateling';
                      $post_type_name = 'ケータリング';
                    }else if($item->post_type == 'delivery') {
                      $post_type = 'deli';
                      $post_type_name = 'デリバリー';
                    }
                  ?>
                  <li class="num_ico">
                    <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                      <div class="c-menu-list__img pat-scene">
                      <?php
                          $img_id = get_post_thumbnail_id($item->ID);
                          $img_src = '';
                          if ($img_id) {
                            $img_src = wp_get_attachment_url($img_id);
                          } ?>
                        <img src="<?= $img_src ?>" alt="" />
                      </div>
                      <div class="c-menu-list__txt-box">
                        <h3 class="c-menu-list__ttl cataling">
                        <?= $item->post_title ?>
                        </h3>
                        <?php
                          $desc01 = get_field(''.$post_type.'_desc01', $item->ID);
                          if (isset($desc01)) :
                          ?>
                        <p class="c-menu-list__cap">
                        <?= $desc01 ?>  
                        </p>
                        <?php endif; ?>
                        <div class="c-menu-list__box">
                          <div class="c-price-box cataling">
                          <?php
                              $num = get_field(''.$post_type.'_num', $item->ID);
                              if (isset($num)) :
                              ?>
                            <span class="wrap">
                              <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price_tax = get_field(''.$post_type.'_price_tax', $item->ID);
                              if ($price_tax) {
                                $price_tax = safe_number_format($price_tax);
                              }
                              if (isset($price_tax)) :
                              ?>
                            <span class="wrap">
                              <span class="fz3">￥</span>
                              <span class="fz4"><?= $price_tax ?></span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price = get_field(''.$post_type.'_price', $item->ID);
                              if ($price) {
                                $price = safe_number_format($price);
                              }
                              if (isset($price)) :
                              ?>
                            <span class="wrap">
                              <span class="fz5">(税抜¥<span class="fz6"><?= $price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                            </span>
                            <?php endif; ?>
                          </div>
                          <div class="p_menu-archive-cont__btn">
                            <div class="c-view-more bg_img cataling">
                              View More
                            </div>
                          </div>
                        </div>
                        <div class="c-menu-list__tag pat-<?= $post_type ?>"><?= $post_type_name ?></div>
                      </div>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </section>

        <!-- <section id="yagai" class="p_menu-archive__cont">


          <div class="p_scene-archive-kv">
            <h2 class="p_scene-archive-kv__ttl">
              野外のお集まりに
            </h2>
            <div class="p_scene-archive-kv__cap">
              アウトドアの楽しさを倍増！<br>野外イベントに最適なフードデリバリー＆ケータリング。<br>手間いらずで美味しい食事をお届けします。
            </div>
            <div class="p_scene-archive-kv__bg">
              <img src="<?= $template_url ?>/img/scene/scene_bg06.jpg" alt="">
            </div>
          </div>

          <div class="p_menu-archive-cont">
            <div class="inner-block">
              <div class="p_menu-archive-cont__cont">
              <?php
              $scene_section06 = get_field('scene_section06', 'option');
              if (isset($scene_section06)) :
              ?>
                <ul class="c-menu-list ptn_long anm-list">
                <?php foreach ($scene_section06 as $i => $item) :
                    $long = ($i == 0) ? 'long' : '';
                    $post_type = '';
                    $post_type_name = '';
                    if($item->post_type == 'cateling') {
                      $post_type = 'cateling';
                      $post_type_name = 'ケータリング';
                    }else if($item->post_type == 'delivery') {
                      $post_type = 'deli';
                      $post_type_name = 'デリバリー';
                    }
                  ?>
                  <li class="num_ico">
                    <a href="<?= get_the_permalink($item->ID) ?>" class="c-menu-list__item <?= $long ?>">
                      <div class="c-menu-list__img pat-scene">
                      <?php
                          $img_id = get_post_thumbnail_id($item->ID);
                          $img_src = '';
                          if ($img_id) {
                            $img_src = wp_get_attachment_url($img_id);
                          } ?>
                        <img src="<?= $img_src ?>" alt="" />
                      </div>
                      <div class="c-menu-list__txt-box">
                        <h3 class="c-menu-list__ttl cataling">
                        <?= $item->post_title ?>
                        </h3>
                        <?php
                          $desc01 = get_field(''.$post_type.'_desc01', $item->ID);
                          if (isset($desc01)) :
                          ?>
                        <p class="c-menu-list__cap">
                        <?= $desc01 ?>  
                        </p>
                        <?php endif; ?>
                        <div class="c-menu-list__box">
                          <div class="c-price-box cataling">
                          <?php
                              $num = get_field(''.$post_type.'_num', $item->ID);
                              if (isset($num)) :
                              ?>
                            <span class="wrap">
                              <span class="fz1">全</span><span class="fz2"><?= $num ?></span><span class="fz1">品</span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price_tax = get_field(''.$post_type.'_price_tax', $item->ID);
                              if ($price_tax) {
                                $price_tax = safe_number_format($price_tax);
                              }
                              if (isset($price_tax)) :
                              ?>
                            <span class="wrap">
                              <span class="fz3">￥</span>
                              <span class="fz4"><?= $price_tax ?></span>
                            </span>
                            <?php endif; ?>
                            <?php
                              $price = get_field(''.$post_type.'_price', $item->ID);
                              if ($price) {
                                $price = safe_number_format($price);
                              }
                              if (isset($price)) :
                              ?>
                            <span class="wrap">
                              <span class="fz5">(税抜¥<span class="fz6"><?= $price ?></span>)/</span><span class="fz6">1</span><span class="fz5">名あたり</span>
                            </span>
                            <?php endif; ?>
                          </div>
                          <div class="p_menu-archive-cont__btn">
                            <div class="c-view-more bg_img cataling">
                              View More
                            </div>
                          </div>
                        </div>
                        <div class="c-menu-list__tag pat-<?= $post_type ?>"><?= $post_type_name ?></div>
                      </div>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </section> -->

      </div>


    </main>
  </div>
</div>
<?php
get_footer();
