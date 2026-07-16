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


<footer id="footer" class="c-footer">
  <div class="outer-block c-footer-contact">
    <div class="inner-block">
      <h2 class="c-footer-contact-title">
        <span class="ja">お問い合わせ</span>
        <span class="en">Contact</span>
      </h2>
      <div class="c-footer-contact-wrap">
        <div class="info">
          <h3 class="title">WEBから</h3>
          <a href="<?php echo $home_url ?>/contact/" class="button mail">
            <span class="icon">
              <img
                src="<?= $template_url ?>/img/common/icon_mail.svg"
                alt=""
                width="36"
                height="28" />
            </span>
            メールフォームはコチラ</a>
          <p class="text">24時間受付中</p>
        </div>
        <div class="info">
          <h3 class="title">お電話から</h3>
          <a href="tel:0120507286" class="button tel">
            <span class="icon">
              <img
                src="<?= $template_url ?>/img/common/icon_tel02.svg"
                alt=""
                width="34"
                height="32" />
            </span>
            0120-507-286</a>
          <p class="text">営業時間：9:00〜18:00</p>
        </div>
      </div>
    </div>
    <!-- /inner-block -->
  </div>
  <!-- /outer-block -->
  <div class="outer-block c-footer-links">
    <div class="inner-block">
      <div class="c-footer-links-wrap">
        <a href="/about/">私たちについて </a>
        <a href="/area/">対応エリア</a>
        <a href="/column/">コラム</a>
        <a href="/guide/">ご利用ガイド・<wbr />よくある質問</a>
        <a href="/company/">会社概要</a>
        <a href="/business/">特定商取引法</a>
        <a href="/privacy-policy/">プライバシーポリシー</a>
      </div>

      <div class="c-footer-cap">- ケータリングサイトはこちら</div> 

      <div class="c-footer-banner">
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            大阪、神戸、京都のケータリングはこちらから
          </p>
          <a href="https://buffet-catering.com/" target="_blank" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="<?= $template_url; ?>/img/common/bannerk01.png" alt="大阪 神戸 京都のケータリングはこちらから">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            東京エリアのケータリングはこちらから
          </p>
          <a href="https://buffettokyo-catering.com/" target="_blank" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="https://buffet-catering.com/wp/wp-content/themes/buffet/img/common/bannert01.png" alt="大阪 神戸 京都のケータリングはこちらから">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            東海のケータリンングはこちらから
          </p>
          <a href="https://nagoya-catering.com/" target="_blank" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="https://buffet-catering.com/wp/wp-content/themes/buffet/img/common/banner_tokai.png" alt="東海のケータリンング">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            福岡エリアのケータリングはこちらから
          </p>
          <a target="_blank" href="https://catering-mrbuffet.com/place/fukuoka/" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="https://buffet-catering.com/wp/wp-content/themes/buffet/img/common/banner_fukuoka.png" alt="福岡エリアのケータリングはこちらから">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            山口エリアのケータリングはこちらから
          </p>
          <a target="_blank" href="https://catering-mrbuffet.com/place/yamaguchi/" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="https://buffet-catering.com/wp/wp-content/themes/buffet/img/common/banner_yamaguchi.png" alt="山口エリアのケータリングはこちらから">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            愛媛エリアのケータリングはこちらから
          </p>
          <a target="_blank" href="https://catering-mrbuffet.com/place/ehime/" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="https://buffet-catering.com/wp/wp-content/themes/buffet/img/common/banner_ehime.png" alt="愛媛エリアのケータリングはこちらから">
            </div>
          </a>
        </div>
      </div>

      <div class="c-footer-links-info">
        <div class="profile">
          <p class="company">株式会社LightHouse</p>
          <p class="address">
            東京セントラルキッチン：足立区千住橋戸町４９-１F<br>
            大阪セントラルキッチン：大阪市東成区玉津２丁目５−２９<br>
            愛知セントラルキッチン：知多市大興寺長根８４
          </p>
          <p class="tel">TEL：<a href="tel:0120507286">0120-507-286</a></p>
        </div>
        <p class="copyright">
          © Light House Co.,Ltd. All Rights Reserved.
        </p>
      </div>
    </div>
    <!-- /inner-block -->
  </div>
  <!-- /outer-block -->
</footer>



<!--    <div id="pagetop"><a href="<?= $home_url ?>#wrapper"><img src="<?= $template_url ?>img/common/pagetop.png" alt="↑"></a></div>-->

</div><!-- /wrapper -->

<script src="<?php echo $template_url; ?>/js/lib/jquery-3.7.1.min.js"></script>
<script src="<?php echo $template_url; ?>/js/lib/slick.min.js"></script>
<script src="<?php echo $template_url; ?>/js/common.js?20250220"></script>
</body>

</html>