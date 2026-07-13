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
      <main class="outer-block">
        <section class="l-mv">
          <div class="l-mv__img">
            <img src="<?= $template_url; ?>/img/faq/faq-top.png" alt="">
          </div>
          <div class="l-mv__txt">
            <div class="inner-block02">
              <h1 class="l-mv__txtbox">
                <p class="en">Areas</p>
                <p class="ja">対応エリア</p>
              </h1>
            </div>
          </div>
        </section>
        <div class="c-bread">
          <div class="inner-block">
            <ul class="c-bread-list">
              <li class="c-bread-list__li">
                <a href="<?= $home_url; ?>" class="c-bread-list__item">トップページ</a>
              </li>
              <li class="c-bread-list__li">
                <span class="c-bread-list__txt">対応エリア</span>
              </li>
            </ul>
          </div>
        </div>


        <div class="p_area-sec01 bg_img">
          <div class="inner-block anm-up">

            <div class="p_area-sec01__box">

              <?php get_template_part('inc/area-item'); ?>


            </div>

          </div>
        </div>

        <div class="p_area-sec02 bg_img">
          <div class="inner-block anm-up">
            <div class="p_home-cont02">
              <div class="p_home-cont02__ttl Allura">
                Flow
              </div>
              <div class="p_home-cont02__wrap">

                <div class="p_home-cont02__box">
                  <ul class="p_home-list pat01 anm-list">
                    <li>
                      <div class="p_home-list__item">
                        <div class="p_home-list__scene">
                          <span class="en Allura">Step</span>
                          <span class="num Allura">01</span>
                        </div>
                        <div class="p_home-list__img">
                          <img src="<?= $template_url; ?>/img/common/flow_mail.png" alt="">
                        </div>
                        <div class="p_home-list__ttl">
                          お問い合わせ
                        </div>
                        <div class="p_home-list__cap">
                          コンタクトフォームまたはお電話にてお気軽にお問い合わせください。ご相談のみでも結構です。
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="p_home-list__item">
                        <div class="p_home-list__scene">
                          <span class="en Allura">Step</span>
                          <span class="num Allura">02</span>
                        </div>
                        <div class="p_home-list__img">
                          <img src="<?= $template_url; ?>/img/common/flow_hearing.png" alt="">
                        </div>
                        <div class="p_home-list__ttl">
                          ヒアリング
                        </div>
                        <div class="p_home-list__cap">
                          お客様の希望をより実現するだめにご要望・会の趣旨などをお伺いいたします。
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="p_home-list__item">
                        <div class="p_home-list__scene">
                          <span class="en Allura">Step</span>
                          <span class="num Allura">03</span>
                        </div>
                        <div class="p_home-list__img">
                          <img src="<?= $template_url; ?>/img/common/flow_mitumori.png" alt="">
                        </div>
                        <div class="p_home-list__ttl">
                          お見積もり<br class="pc">プランの提出
                        </div>
                        <div class="p_home-list__cap">
                          お客様の希望をより実現するだめにご要望・会の趣旨などをお伺いいたします。
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="p_home-list__item">
                        <div class="p_home-list__scene">
                          <span class="en Allura">Step</span>
                          <span class="num Allura">04</span>
                        </div>
                        <div class="p_home-list__img">
                          <img src="<?= $template_url; ?>/img/common/flow_siharai.png" alt="">
                        </div>
                        <div class="p_home-list__ttl">
                          お支払い・本番
                        </div>
                        <div class="p_home-list__cap">
                          事前のご入金、当日現金支払い、両方に対応しております。楽しい料理をお楽しみください。
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>
              </div>

              <div class="p_home-cont02__stripe c-stripe"></div>

            </div>
            <div class="p_area-sec02__btn">
              <a href="<?= $home_url; ?>/guide/" class="c-dec-btn pat-guide">
                <span class="jp">ご利用ガイド</span>
                <span class="en Allura">Guide</span>
                <span class="dec">View More</span>
              </a>
            </div>
          </div>
        </div>


      </main>
    </div>
  </div>




<?php
get_footer();
