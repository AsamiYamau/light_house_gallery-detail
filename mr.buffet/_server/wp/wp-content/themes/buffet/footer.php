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

<div class="c-menu-banner-wrap js-banner">
  <?php
  if (is_post_type_archive('cateling') || is_page(array('cateling-drink', 'cateling-options'))):
  ?>
    <div class="c-menu-banner cate">
      <div class="c-menu-banner__logo">
        <img src="<?= $template_url; ?>/img/cateling/mv_txt.png" alt="">
      </div>
      <div class="c-menu-banner__txt">
        こちらは<span class="bold catering">ケータリング</span>のページです
      </div>
    </div>
  <?php elseif (is_post_type_archive('delivery') || is_page(array('delivery-drink', 'delivery-options'))): ?>
    <div class="c-menu-banner deli">
      <div class="c-menu-banner__logo">
        <img src="<?= $template_url; ?>/img/delivery/mv_txt.png" alt="">
      </div>
      <div class="c-menu-banner__txt">
        こちらは<span class="bold deli">オードブルデリバリー</span>のページです
      </div>
    </div>
  <?php endif; ?>
</div>


<footer>
  <div id="footer" class="outer-block c-footer">
    <div class="inner-block">
      <div class="c-footer__wrap">
        <div class="c-footer__logo">
          <img src="<?= $template_url; ?>/img/common/tokyo-logo-white.png" alt="">
        </div>

        <div class="c-footer__list">
          <ul class="c-footer-list">
            <li>
              <a href="<?= $home_url; ?>/about/" class="c-footer-list__item">
                私たちについて
              </a>
            </li>
            <li>
              <a href="<?= $home_url; ?>/area/" class="c-footer-list__item">
                対応エリア
              </a>
            </li>
            <li>
              <a href="<?= $home_url; ?>/blog/" class="c-footer-list__item">
                ブログ
              </a>
            </li>
            <li>
              <a href="<?= $home_url; ?>/guide/" class="c-footer-list__item">
                ご利用ガイド
              </a>
            </li>
            <li>
              <a href="<?= $home_url; ?>/faq/" class="c-footer-list__item">
                よくある質問
              </a>
            </li>
          </ul>
          <div class="c-footer__privacy">
            <a href="<?= $home_url; ?>/privacy/" class="link">個人情報保護方針・特定商取引 </a>
          </div>
        </div>
      </div>
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
            東海のケータリンングはこちらから
          </p>
          <a href="https://nagoya-catering.com/" target="_blank" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="<?= $template_url; ?>/img/common/banner_tokai.png" alt="東海のケータリンング">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            福岡エリアのケータリングはこちらから
          </p>
          <a target="_blank" href="https://catering-mrbuffet.com/place/fukuoka/" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="<?= $template_url; ?>/img/common/banner_fukuoka.png" alt="福岡エリアのケータリングはこちらから">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            山口エリアのケータリングはこちらから
          </p>
          <a target="_blank" href="https://catering-mrbuffet.com/place/yamaguchi/" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="<?= $template_url; ?>/img/common/banner_yamaguchi.png" alt="山口エリアのケータリングはこちらから">
            </div>
          </a>
        </div>
        <div class="c-footer-banner__box">
          <p class="c-footer-banner__cap01">
            愛媛エリアのケータリングはこちらから
          </p>
          <a target="_blank" href="https://catering-mrbuffet.com/place/ehime/" class="c-footer-banner__link">
            <div class="c-footer-banner__img01">
              <img src="<?= $template_url; ?>/img/common/banner_ehime.png" alt="愛媛エリアのケータリングはこちらから">
            </div>
          </a>
        </div>
      </div>
      <div class="c-footer__bottom">
        <div class="c-footer__insta">
          <a href="https://www.instagram.com/mr.buffet_catering/" target="_blank">
            <img src="<?= $template_url ?>/img/common/insta.png" alt="">
          </a>
        </div>
        <div class="c-footer__ttl"> 株式会社 LightHouse</div>
        <div class="c-footer__text-area">
          <div class="c-footer__add">
            東京セントラルキッチン：足立区千住橋戸町４９-１F<br>
            大阪セントラルキッチン：大阪市東成区玉津２丁目５−２９<br>
            愛知セントラルキッチン：知多市大興寺長根８４
          </div>
          <div class="c-footer__copy">
            © Light House Co.,Ltd. All Rights Reserved.
          </div>
        </div>
      </div>
    </div><!-- /inner-block -->
  </div><!-- /footer -->
</footer>


</div><!-- /wrapper -->
<?php wp_footer(); ?>

<script src="<?php echo $template_url; ?>/js/lib/jquery-3.7.1.min.js"></script>
<script src="<?php echo $template_url; ?>/js/lib/slick.min.js"></script>
<script src="<?php echo $template_url; ?>/js/lib/swiper-bundle.min.js"></script>
<script src="<?php echo $template_url; ?>/js/common.js?20240826"></script>
</body>

</html>