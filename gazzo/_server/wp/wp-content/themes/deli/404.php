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

    <!-- メインコンテンツ -->
    <div class="c-page__wrapper">
      <h1 class="c-page__title p_privacy-policy__title">
        ページが見つかりませんでした。
        <span
          class="c-page__subtitle p_privacy-policy__subtitle Allura"
        >404 not found</span
        >
      </h1>
      <div class="c-page__content p_privacy-policy__content">
        <!-- パンくずリスト -->
        <ul class="c-breadcrumb">
          <li class="c-breadcrumb__item">
            <a class="c-breadcrumb__link" href="<?php echo $home_url; ?>/"
            >トップページ</a
            >
          </li>
          <li class="c-breadcrumb__item">
            <span class="c-breadcrumb__link c-breadcrumb__link--current">404 not found</span>
          </li>
        </ul>

        <!-- サブタイトルと説明 -->
        <p class="p_privacy-policy__intro" style="text-align: center">
          あなたがアクセスしようとしたページは削除されたかURLが変更された可能性があります。<br>
          お手数ですが、下記のリンクから他のページをご覧ください。
          <br>
          <br>
        </p>

        <div style="width:300px;margin-right:auto;margin-left:auto;">
          <a href="<?php echo $home_url; ?>" class="c-btn02">TOPへ戻る</a>
        </div>

      </div>
    </div>
  </div>

<?php
get_footer();
