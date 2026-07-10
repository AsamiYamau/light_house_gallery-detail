<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
global $home_url;
global $template_url;
get_header();
?>
<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>
  
  <div class="l-main__main">
    <main class="outer-block p_contact bg_img">
      <section class="l-mv">
        <div class="l-mv__img">
          <img src="<?= $template_url ?>/img/contact/mv.jpg" alt="" />
        </div>
        <div class="l-mv__txt">
          <div class="inner-block02">
            <h2 class="l-mv__txtbox anm-right">
              <p class="en">404</p>
              <p class="ja">404 NOT FOUND</p>
            </h2>
          </div>
        </div>
      </section>
    
      <div class="p_contact__wrap">
        <div class="inner-block">
          <div class="p_contact__ttl">
            お探しのページは<br class="sp">見つかりませんでした
            <span class="c-mini-ribon-dec">
              <span class="c-mini-ribon deli"></span>
            </span>
          </div>
          <div class="p_contact__finish not-found">
            あなたがアクセスしようとしたページは削除されたかURLが変更された可能性があります。<br>
            お手数ですが、下記のリンクから他のページをご覧ください。
          </div>
    
          <div class="p_contact-bottom__btn finish">
            <a href="<?= $home_url ?>/" class="c-btn03 back">TOPへ戻る</a>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>


<?php
get_footer();
