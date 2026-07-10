<?php

/**
 * Template Name: 特集テンプレート
 */
global $template_url;
global $home_url;
get_header();
?>

<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>

  <div class="l-main__main bg_img">
    <main class="outer-block p_template">
      <div class="p_template-mv bg_img">
        <div class="p_template-mv__txt">
          <?php
          $temp_mv_ttl01 = get_field('temp_mv_ttl01');
          $temp_mv_ttl02 = get_field('temp_mv_ttl02');
          $temp_mv_ttl03 = get_field('temp_mv_ttl03');


          ?>
          <div class="inner-block">
            <?php if ($temp_mv_ttl01): ?>
              <div class="p_template-mv__cap">
                <?= nl2br($temp_mv_ttl01) ?>
              </div>
            <?php endif; ?>
            <?php if ($temp_mv_ttl02): ?>
              <h1 class="p_template-mv__ttl">
                <?= nl2br($temp_mv_ttl02) ?>
              </h1>
            <?php endif; ?>
            <?php if ($temp_mv_ttl03): ?>
              <div class="p_template-mv__en Allura">
                <?= nl2br($temp_mv_ttl03) ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="p_template-mv__img">

          <?php
          $temp_mv_img01 = get_field('temp_mv_img01');
          $temp_mv_img02 = get_field('temp_mv_img02');
          $temp_mv_img03 = get_field('temp_mv_img03');

          $mv_img01 = '';
          $mv_img02 = '';
          $mv_img03 = '';

          if (!$temp_mv_img01) {
            $mv_img01 = $template_url . '/img/common/no_img.jpg';
          } else {
            $mv_img01 = $temp_mv_img01;
          }
          if (!$temp_mv_img02) {
            $mv_img02 = $template_url . '/img/common/no_img.jpg';
          } else {
            $mv_img02 = $temp_mv_img02;
          }
          if (!$temp_mv_img03) {
            $mv_img03 = $template_url . '/img/common/no_img.jpg';
          } else {
            $mv_img03 = $temp_mv_img03;
          }


          ?>
          <div class="img01 img">
            <img src="<?= $mv_img01 ?>" alt="">
          </div>
          <div class="img02 img">
            <img src="<?= $mv_img02 ?>" alt="">
          </div>
          <div class="img03 img">
            <img src="<?= $mv_img03 ?>" alt="">
          </div>

        </div>
      </div>

      <section class="p_template-top bg_img">
        <h2 class="p_template-top__ttl">
          <?php
          $temp_ribon_ttl = get_field('temp_ribon_ttl');
          $temp_ribon_txt = get_field('temp_ribon_txt');
          if(!empty($temp_ribon_ttl)):
          ?>
          <div class="txt">
            <?= nl2br($temp_ribon_ttl) ?>
            <div class="c-ttl-ribon02 ptn03 Allura">
              <span class="ribon"></span>
            </div>
          </div>
          <?php endif; ?>
        </h2>
        <div class="p_template-top__cap">
          <div class="p_template-top__ico01">
            <img src="<?= $template_url ?>/img/home/home_dec-pizza02.svg" alt="">
          </div>
          <?php if(!empty($temp_ribon_txt)): ?>
          <p class="p_template-top__cap-cont">
            <?= nl2br($temp_ribon_txt) ?>
          </p>
          <?php endif; ?>
          <div class="p_template-top__ico02">
            <img src="<?= $template_url ?>/img/home/home_dec-drink03.svg" alt="">
          </div>
        </div>
      </section>

      <section class="p_template-sec01 bg_img">
        <div class="inner-block">
          <?php
          $temp_white_box_ttl = get_field('temp_white_box_ttl');
          if(!empty($temp_white_box_ttl)):
          ?>
          <div class="p_template-sec01__top-ttl"><?= $temp_white_box_ttl ?></div>
          <?php endif; ?>
          <!-- <div class="c-ttl-ribon02 ptn02 Allura p_template-sec01__ribon">
                <span class="ribon"></span>
              </div> -->

              <?php
              $temp_white_box = get_field('temp_white_box');
              if(!empty($temp_white_box[0])):
                foreach($temp_white_box as $value):
              ?>
          <div class="p_template-sec01__box c-stripe">
            <div class="c-stripe__cont p_template-sec01__wrap">
              <div class="p_template-sec01__txt-area">
                <h2 class="p_template-sec01__ttl">
                  <?php
                    if(!empty($value['temp_white_box_ttl'])):
                  ?>
                  <div class="ttl"><?= $value['temp_white_box_ttl'] ?></div>
                  <?php endif; ?>
                  <div class="ico">
                    <img src="<?= $template_url ?>/img/home/home_car.svg" alt="">
                  </div>
                </h2>
                <?php
                  if(!empty($value['temp_white_box_txt'])):
                ?>
                <p class="p_template-sec01__txt">
                  <?= nl2br($value['temp_white_box_txt']) ?>
                </p>
                <?php endif; ?>
              </div>
              <?php
                if(!empty($value['temp_white_box_img'])):
              ?>
              <div class="p_template-sec01__img">
                <img src="<?= $value['temp_white_box_img'] ?>" alt="">
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </section>


      <?php
      $temp_slider = get_field('temp_slider');
      if(!empty($temp_slider[0])):
      ?>
      <div class="p_template__slider bg_img">
        <ul class="c-slider-top">
          <?php
            foreach($temp_slider as $value):
          ?>
          <li class="c-slider-top__item">
            <div class="c-slider-top__link">
              <?php
                if(!empty($value['temp_slider_img'])):
              ?>
              <div class="c-slider-top__img">
                <img src="<?= $value['temp_slider_img'] ?>" alt="" />
              </div>
              <?php endif; ?>
              <?php
                if(!empty($value['temp_slider_txt'])):
              ?>
              <div class="c-slider-top__txt">
                <?= $value['temp_slider_txt'] ?>
              </div>
              <?php endif; ?>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <div class="c-article-d__body bg_img">
        <div class="inner-block">
          <?php the_content(); ?>
        </div>
      </div>

      <div class="p_template-banner bg_img">
        <div class="inner-block">
          <div class="p_template-banner__wrap">
            <a href="<?= $home_url ?>/about/" class="p_template-banner__link">
              <div class="p_template-banner__txt">選ばれる理由</div>
              <div class="p_template-banner__img">
                <img src="<?= $template_url ?>/img/home/home_reason.png" alt="">
              </div>
            </a>
          </div>
        </div>
      </div>


      <section class="p_template-sec03 bg_img">

        <div class="p_template-sec03__img">
          <img src="<?= $template_url ?>/img/template/ttl_bg.jpg" alt="">
          <h2 class="p_template-sec03__ttl Allura">
            Order Flow
          </h2>
        </div>
        <div class="p_template-sec03__cont">
          <div class="inner-block">
            <div class="p_template-sec03__list">
              <?php
              $order_flow = get_field('order_flow');
              if(!empty($order_flow[0])):
              ?>
              <ul class="p_template-sec03-list">
                <?php
                  foreach($order_flow as $i => $value):
                    // $iを01 02のように変換
                    $i = sprintf('%02d', $i + 1);
                ?>
                <li class="p_template-sec03-list__item c-stripe">
                  <div class="p_template-sec03-list__wrap">
                    <div class="num Allura"><?= $i ?></div>
                    <h3 class="ttl">
                      <?= $value['flow_ttl'] ?>
                    </h3>
                    <p class="txt">
                      <?= nl2br($value['flow_txt']) ?>
                    </p>
                  </div>
                </li>
                  <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </div>
            <div class="p_template-sec03__cta">
              <div class="p_guide-list__case01 flex top">
                <div class="p_guide-list__tel">
                  <div class="tel">
                    <a href="tel:0120507286" class="tel-link">
                      0120-507-286
                    </a>
                  </div>
                  <p class="note">営業時間 09:00~19:00</p>
                </div>
                <div class="p_guide-list__btn">
                  <a href="https://132.mh-test-4932.com/contact/" class="c-btn02 bg_img gude">WEBでのご注文はこちら</a>
                </div>
              </div>
            </div>

            <div class="p_template-sec03__guide">
              <div class="inner-block">
                <div class="p_guide-body__lead">
                  より良いサービスをご提供するため、以下のとおり基準を設けております。<br>
                  ご利用前にご一読くださいませ。ご不明な点やご相談がございましたらお気軽にお問い合わせください。
                  <span class="c-mini-ribon-ttl__dec">
                    <span class="c-mini-ribon"></span>
                  </span>
                </div>
                <div class="p_guide-body__list">
                  <ul class="p_guide-list">
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          ご注文方法
                        </div>
                        <div class="p_guide-list__box">
                          <p class="p_guide-list__ttl02">
                            ご注文・お見積もりは<br class="sp">お電話・WEBにて承ります。
                            <span class="p_guide-list__ttl02-line"></span>
                          </p>
                          <div class="p_guide-list__case01 flex top">
                            <div class="p_guide-list__tel">
                              <div class="tel">
                                <a href="tel:0120507286" class="tel-link">
                                  0120-507-286
                                </a>
                              </div>
                              <p class="note">営業時間 10:00~21:00</p>
                            </div>
                            <div class="p_guide-list__btn">
                              <a href="/contact/" class="c-btn02 bg_img gude">WEBでのご注文はこちら</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          ご予約期限
                        </div>
                        <div class="p_guide-list__box top">
                          <div class="p_guide-list__case01">
                            <ul class="c-tag-list">
                              <li class="c-tag-list__li brown">
                                <p class="c-tag-list__tag">ケータリング</p>
                                <p class="c-tag-list__txt">
                                  実施日の5日前
                                </p>
                              </li>
                              <li class="c-tag-list__li green">
                                <p class="c-tag-list__tag">オードブルデリバリー</p>
                                <p class="c-tag-list__txt">
                                  実施日の2日前
                                </p>
                              </li>
                            </ul>
                            <p class="p_guide-list__note">
                              締め切り日を過ぎても対応できる場合もございますのでお気軽にお問い合わせください
                            </p>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          出張可能<br>
                          エリア
                        </div>
                        <div class="p_guide-list__box">
                          <div class="p_guide-list__case01">
                            <ul class="c-tag-list">
                              <li class="c-tag-list__li brown p01">
                                <p class="c-tag-list__tag">ケータリング</p>
                                <div class="c-tag-list__btn">
                                  <a href="/area/" class="c-btn02 bg_img guide">対応エリアは<br class="sp">こちら</a>
                                </div>
                              </li>
                              <li class="c-tag-list__li green p01">
                                <p class="c-tag-list__tag">オードブルデリバリー</p>
                                <div class="c-tag-list__btn">
                                  <a href="/area/" class="c-btn02 bg_img green guide">対応エリアは<br class="sp">こちら</a>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="p_guide-list__li">
                      <div class="p_guide-list__wrap">
                        <div class="p_guide-list__ttl">
                          お支払い方法
                        </div>
                        <div class="p_guide-list__box">
                          <p class="p_guide-list__txt">
                            お支払い方法はご注文時にご指定ください。
                          </p>
                          <div class="p_guide-list__case01">
                            <ul class="p_guide-tag top">
                              <li class="p_guide-tag__li">
                                実施当日現金払い
                              </li>
                              <li class="p_guide-tag__li">
                                実施当時<br class="sp">クレジット払い
                              </li>
                              <li class="p_guide-tag__li">
                                請求書発行後振り込み
                              </li>
                            </ul>
                            <p class="p_guide-list__txt02">
                              ・請求書でのお支払いは、会社・法人のお客様に限らせて頂きます。個人でご利用の場合はお取り扱いできません。<br>
                              ・請求書払いで受け付けましてもお断りのご連絡をさせて頂く場合がございます。<br>
                              ・ご請求書でのお振込み期日は実施日の翌月末日までとさせて頂きます。ただし支払期日についてご要望がございます場合は柔軟に対応いたしますのでご相談くださいませ。<br>
                              ・お振込み手数料はお客様のご負担とさせて頂きます。予めご了承下さい。<br>
                              ・現金支払いの場合は領収書と納品書・お振込の場合は請求書と納品書を発行いたします。<br>
                              ・必要書類の発行なども柔軟に対応いたしますのでお気軽にお申し付けくださいませ。
                            </p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>


    </main>
  </div>
</div>




<?php
get_footer();
