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

<main class="outer-block p_policy c-dec">
  <div class="l-mv c-bg-brown01">

    <div class="p_policy-bread">
      <div class="inner-block">
        <ul class="c-bread">
          <li class="c-bread__item">
            <a href="<?= $home_url ?>/">TOP</a>
          </li>
          <li class="c-bread__item">
            404 Not Found
          </li>
        </ul>
      </div>
    </div>

    <div class="c-ttl02 ptn_orange">
      <span class="dec"><img src="/img/common/kuma-dec01.svg" alt=""></span>
      <p class="en">404 Not Found</p>
      <h2 class="ja">お探しのページは見つかりませんでした。</h2>
    </div>

  </div>


  <div class="p_policy-cont c-wave02">
    <div class="inner-block">
      <div class="l-card">
        <div class="l-card__cont">
          <p class="u-tac" style="line-height:3;">
            あなたがアクセスしようとしたページは削除されたかURLが変更された可能性があります。<br>
            お手数ですが、下記のリンクから他のページをご覧ください。
          </p>
          <div class="u-mt u-tac" style="--mt-pc: 65px; --mt-sp: 35px;">
            <a href="<?= $home_url ?>/" class="c-btn-view-more is-brown" style="display: inline;">BONBONNIERE</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php
get_footer();
