<?php
global $template_url;
global $home_url;
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>


<?php wp_footer(); ?>
<section class="c-cta c-wave04">
  <div class="c-dec__dec05">
    <img src="<?= $template_url ?>/img/common/dec05.svg" alt="">
  </div>
  <div class="c-dec__dec06">
    <img src="<?= $template_url ?>/img/common/dec06.svg" alt="">
  </div>
  <div class="c-cta__bg02" aria-hidden="true"></div>
  <div class="c-cta__grad" aria-hidden="true">
    <img src="<?= $template_url ?>/img/common/bg-pink.svg" alt="">
  </div>
  <div class="c-cta__ico">
    <img src="<?= $template_url ?>/img/common/crown-dec_brown.svg" alt="">
  </div>
  <div class="inner-block02">

    <p class="c-cta__txt">ボンボン王子は驚かせたり、<br>
      喜ばせたりするのが大好き<br><br>

      今日もこっそり<br>
      街のケーキ屋に忍び込んで<br>
      せっせとケーキ作り。<br><br>

      ボンボン王子の特別な魔法で<br>
      一点ずつ仕立てるオーダーケーキは、<br><br>

      まるで、人生の佳き日を<br>
      輝かせる芸術品。<br><br>

      あなたの想いを、<br>
      忘れられない感動へと変えて。</p>



    <div class="c-cta__bonbon">
      <img src="<?= $template_url ?>/img/common/bonbon.svg" alt="">
    </div>
    <div class="c-cta__curve" aria-hidden="true">
      <img src="<?= $template_url ?>/img/common/curve02.svg" class="pc" alt="">
      <img src="<?= $template_url ?>/img/common/curve02_sp.svg" class="sp" alt="">
    </div>
  </div>

  <div class="c-cta__content">
    <p class="c-cta__ctaTxt">
      フルオーダーのご相談、セミオーダーのご注文<br>
      どんなことでもお気軽にお問い合わせください。
    </p>

    <div class="c-cta__btns">
      <a href="<?= $home_url ?>/consultation/" class="c-cta__btn u-hover">
        フルオーダー<br>
        <span class="en poppins">FULL ORDER</span>
      </a>
      <a href="<?= $home_url ?>/contact/" class="c-cta__btn u-hover">
        お問い合わせ<br>
        <span class="en poppins">CONTACT</span>
      </a>
    </div>
  </div>
  <div class="c-cta__cta">

    <!-- <div class="c-cta__bg02">
            <img src="<?= $template_url ?>/img/common/cta-bg.svg" alt="">
          </div> -->
    <div class="c-cta__telArea">
      <p class="c-cta__tel poppins">0120-846-413</p>
      <p class="c-cta__note">夜間のお急ぎのご注文も柔軟に承ります</p>
    </div>


  </div>
  <div class="c-cta__bear" aria-hidden="true">
    <img src="<?= $template_url ?>/img/common/kuma.png" alt="">
  </div>
</section>

<footer>
  <div id="footer" class="outer-block footer">
    <div class="inner-block">
      <div class="footer__wrap">
        <div class="footer__logo">
          <a href="<?= $home_url ?>/">
            <img src="<?= $template_url ?>/img/common/logo.svg" alt="BON BON NIÉRE">
          </a>
        </div>

        <div class="footer__box u-mt" style="--mt-pc: 0; --mt-sp: 15px">

          <nav class="footer__nav">
            <ul class="footer-nav">
              <li class="footer-nav__item">

                <div class="footer-nav__ttl">
                  MENU
                </div>
                <div class="footer-nav__list u-mt" style="--mt-pc:10px;  --mt-sp: 15px;">
                  <ul class="footer-nav02">
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/collection/" class="footer-nav02__link u-hover">
                        名物商品
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/description/" class="footer-nav02__link u-hover">
                        フルオーダーケーキ
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/service/" class="footer-nav02__link u-hover">
                        セミオーダー
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/s_gallery/" class="footer-nav02__link u-hover">
                        制作事例
                      </a>
                    </li>
                  </ul>
                </div>


              </li>
              <li class="footer-nav__item">

                <div class="footer-nav__ttl">
                  INFO
                </div>
                <div class="footer-nav__list u-mt" style="--mt-pc:10px; --mt-sp: 15px;">
                  <ul class="footer-nav02">
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/guide/" class="footer-nav02__link u-hover">
                        ご利用ガイド
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/column/" class="footer-nav02__link u-hover">
                        コラム
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/faq/" class="footer-nav02__link u-hover">
                        よくある質問
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/contact/" class="footer-nav02__link u-hover">
                        お問い合わせ
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/company/" class="footer-nav02__link u-hover">
                        会社概要
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/privacy-policy/" class="footer-nav02__link u-hover">
                        プライバシーポリシー
                      </a>
                    </li>
                    <li class="footer-nav02__li">
                      <a href="<?= $home_url ?>/legal/" class="footer-nav02__link u-hover">
                        特定商取引法に基づく表記
                      </a>
                    </li>
                  </ul>
                </div>


              </li>

            </ul>

          </nav>

        </div>

      </div>
      <small class="footer__copy">
        © 2026 BONBONNIERE. All Rights Reserved.
      </small>
    </div><!-- /inner-block -->
  </div><!-- /footer -->
</footer>

<!--    <div id="pagetop"><a href="<?= $home_url ?>#wrapper"><img src="img/common/pagetop.png" alt="↑"></a></div>-->

</div><!-- /wrapper -->

<script src="<?php echo $template_url; ?>/js/lib/jquery-3.7.1.min.js"></script>
<script src="<?php echo $template_url; ?>/js/lib/swiper-bundle.min.js"></script>
<script src="<?php echo $template_url; ?>/js/common.js"></script>
</body>

</html>