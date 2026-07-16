<?php

$home_url = get_bloginfo('url');
$template_url = get_bloginfo('template_directory');



if (!function_exists('deli_format_price')) {
  function deli_format_price($value)
  {
    if ($value === null || $value === '') {
      return $value;
    }

    return preg_replace_callback('/(?<![\d,])(?:\d{1,3}(?:,\d{3})+|\d+)(?![\d,])/', function ($matches) {
      $number = str_replace(',', '', $matches[0]);
      if ($number === '' || !ctype_digit($number)) {
        return $matches[0];
      }
      return number_format((int) $number);
    }, (string) $value);
  }
}

// DNSプリフェッチ削除
add_filter('wp_calculate_image_srcset_meta', '__return_null');
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}

// head 内不要タグ削除
remove_action('wp_head', 'rest_output_link_wp_head'); //Embed除去
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //Embed除去
remove_action('wp_head', 'wp_oembed_add_host_js'); //Embed除去
remove_action('wp_head', 'feed_links', 2); //feed除去
remove_action('wp_head', 'feed_links_extra', 3); //feed除去
remove_action('wp_head', 'rsd_link'); //RSD除去
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Writer
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); //ページ先読み除去
remove_action('wp_head', 'wp_generator'); //WPバージョン除去
remove_action('wp_head', 'wp_shortlink_wp_head'); // 短縮URL除去

// 絵文字コード削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


//ショートコード

//home_url
function home_urlFunc()
{
  return get_bloginfo('url');
}
add_shortcode('home_url', 'home_urlFunc');

//template_url
function template_urlFunc()
{
  return get_bloginfo('template_directory');
}
add_shortcode('template_url', 'template_urlFunc');

//サムネイル
add_theme_support('post-thumbnails');

// ショートコードの展開を有効化
function my_kses_allowed_html($tags, $context)
{
  if ($context == 'post') {
    $tags['use']['xlink:href'] = true;
  }
  return $tags;
}
add_filter('wp_kses_allowed_html', 'my_kses_allowed_html', 10, 2);


/*【管理画面】投稿メニューを非表示 */
function remove_menus()
{
  global $menu;
  remove_menu_page('edit.php'); // 投稿を非表示
}
add_action('admin_menu', 'remove_menus');


//MW WP FORMで自動改行を無効
function my_wpform_autop_filter()
{
  if (class_exists('MW_WP_Form_Admin')) {
    $mw_wp_form_admin = new MW_WP_Form_Admin();
    $forms = $mw_wp_form_admin->get_forms();
    foreach ($forms as $form) {
      add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
    }
  }
}
my_wpform_autop_filter();


/*---------------------------------------------------------------*/
//ここからカスタマイズ
/*---------------------------------------------------------------*/
// カスタム投稿
add_action('init', 'custom_posttype');
function custom_posttype()
{
  register_post_type('menu', array(
    'labels' => array(
      'name' => 'メニュー',
      'singular_name' => 'メニュー',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_budget', array('menu'), array(
    'hierarchical' => true,
    'label' => '一人当たりの予算',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true,
  ));
  register_taxonomy('tax_allbudget', array('menu'), array(
    'hierarchical' => true,
    'label' => '総予算',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true
  ));
  register_taxonomy('tax_single', array('menu'), array(
    'hierarchical' => true,
    'label' => '単品メニュー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true
  ));
  register_taxonomy('tax_series', array('menu'), array(
    'hierarchical' => true,
    'label' => 'シリーズ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true
  ));
  register_taxonomy('tax_drink', array('menu'), array(
    'hierarchical' => true,
    'label' => 'ドリンク',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true
  ));
  register_post_type('column', array(
    'labels' => array(
      'name' => 'コラム',
      'singular_name' => 'コラム',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array('title', 'editor', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_post_type('area', array(
    'labels' => array(
      'name' => '対応エリア',
      'singular_name' => '対応エリア',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_column', array('column'), array(
    'hierarchical' => true,
    'label' => 'カテゴリー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true,
  ));
  register_post_type('faq', array(
    'labels' => array(
      'name' => 'よくある質問',
      'singular_name' => 'よくある質問',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => false,
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_faq', array('faq'), array(
    'hierarchical' => true,
    'label' => 'よくある質問カテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false,
  ));

  //  register_taxonomy('tax_tag',array('blog'), array(
  //    'hierarchical' => false,
  //    'label' => 'タグ',
  //    'show_ui' => true,
  //    'show_in_rest' => true,
  //    'public' => true
  //  ));
}
// リライトルールの追加
//function add_tax_budget_rewrite_rules()
//{
//  // /tax_budget/ の場合
//  add_rewrite_rule('^tax_budget/?$', 'index.php?taxonomy=tax_budget', 'top');
//}
//add_action('init', 'add_tax_budget_rewrite_rules');

function modify_tax_budget_query($query)
{
  //管理画面の並び順
  if( is_admin() ) {
    $post_type = $query->query['post_type'];
    if($post_type == 'column') {
      $query->set('orderby','date'); //並べ替えの基準(日付)
      $query->set('order','DESC'); //新しい順。古い順にしたい場合はASCを指定
    }
  }

  // 管理画面やメインクエリでない場合は何もしない
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  // メインクエリの条件を変更 タクソノミーアーカイブ関係
  $menu_per_page = 9;

  if ($query->is_tax(array(
    'tax_budget',
    'tax_series',
    'tax_allbudget',
    'tax_single',
    'tax_drink'
  ))) {
    $query->set('post_type', 'menu');
    $query->set('posts_per_page', $menu_per_page);
    $query->set('orderby', 'menu_order');
    $query->set('order', 'ASC');
    return;
  }

  $target_term_name = 'tax_budget';
  // tax_budget タクソノミーアーカイブページの場合 all
  if (get_query_var('taxonomy') == $target_term_name) {
    add_menu_my_tax_query($query, $target_term_name, $menu_per_page);
  }
  $target_term_name = 'tax_series';
  // tax_series タクソノミーアーカイブページの場合 all
  if (get_query_var('taxonomy') == $target_term_name) {
    add_menu_my_tax_query($query, $target_term_name, $menu_per_page);
  }
  $target_term_name = 'tax_allbudget';
  // tax_allbudget タクソノミーアーカイブページの場合 all
  if (get_query_var('taxonomy') == $target_term_name) {
    add_menu_my_tax_query($query, $target_term_name, $menu_per_page);
  }
  $target_term_name = 'tax_single';
  // tax_single タクソノミーアーカイブページの場合 all
  if (get_query_var('taxonomy') == $target_term_name) {
    add_menu_my_tax_query($query, $target_term_name, $menu_per_page);
  }
  $target_term_name = 'tax_drink';
  // tax_single タクソノミーアーカイブページの場合 all
  if (get_query_var('taxonomy') == $target_term_name) {
    add_menu_my_tax_query($query, $target_term_name, $menu_per_page);
  }
}
add_action('pre_get_posts', 'modify_tax_budget_query', 99);

function add_menu_my_tax_query($query,$tax_slug,$menu_per_page){
  // メインクエリの条件を変更
  $query->set('orderby', 'menu_order');
  $query->set('order', 'ASC');

  $query->set('post_type', 'menu');
  $query->set('posts_per_page', $menu_per_page);

  if ($query->get('term')) {
    return;
  }

  $all_terms = get_terms($tax_slug, array('hide_empty' => false,));
  $search_terms = array();
  foreach ($all_terms as $tmp_term) {
    $search_terms[] = $tmp_term->slug;
  }
  // 新しい条件を追加
  $tmp_tax_query[] = array(
    'taxonomy' => $tax_slug,
    'field' => 'slug',
    'terms' => $search_terms
  );
  $query->set('tax_query', $tmp_tax_query);
}


//add_filter('posts_request', 'modify_sql_query', 10, 2);

//お問い合わせのバナーのショートコード
//function shortcode_contact_banner($atts){
//  ob_start();
//  get_template_part('inc/contact-banner');
//  return ob_get_clean();
//}
//add_shortcode('contact_banner','shortcode_contact_banner');


// パーマリンクルールの追加
function myRewriteRule()
{
  //post
  //  add_rewrite_rule('blog/?$' ,'index.php?post_type=post', 'top');
}
add_action('init', 'myRewriteRule');



//カスタム投稿タイプの投稿一覧にカスタムタクソノミーの絞込をつける
add_action('restrict_manage_posts', 'add_custom_taxonomies_term_filter');
function add_custom_taxonomies_term_filter()
{
  global $post_type;
  //  if ( $post_type == 'blog' ) {
  //    $taxonomy = 'tax_blog';
  //    wp_dropdown_categories( array(
  //      'show_option_all' => 'すべてのカテゴリー',
  //      'orderby' => 'name',
  //      'selected' => get_query_var( $taxonomy ),
  //      'hide_empty' => 0,
  //      'name' => $taxonomy,
  //      'taxonomy' => $taxonomy,
  //      'value_field' => 'slug',
  //    ) );
  //    $taxonomy = 'tax_tag';
  //    wp_dropdown_categories( array(
  //      'show_option_all' => 'すべてのタグ',
  //      'orderby' => 'name',
  //      'selected' => get_query_var( $taxonomy ),
  //      'hide_empty' => 0,
  //      'name' => $taxonomy,
  //      'taxonomy' => $taxonomy,
  //      'value_field' => 'slug',
  //    ) );
  //  }
}



function my_manage_posts_columns_menu($columns) {
  $columns['tax_series'] = "シリーズ";
  $columns['tax_budget'] = "一人当たりの予算";
  $columns['tax_allbudget'] = "総予算";
  $columns['tax_single'] = "単品メニュー";
  $columns['tax_drink'] = "ドリンク";

  return $columns;
}
function my_add_column_menu($column_name, $post_id) {
  if( $column_name == 'tax_series' ) {
    $tax = wp_get_object_terms($post_id, 'tax_series');
    $tax_names = wp_list_pluck($tax, 'name');
    $stitle = implode(', ', $tax_names);
  }
  if( $column_name == 'tax_budget' ) {
    $tax = wp_get_object_terms($post_id, 'tax_budget');
    $tax_names = wp_list_pluck($tax, 'name');
    $stitle = implode(', ', $tax_names);
  }
  if( $column_name == 'tax_allbudget' ) {
    $tax = wp_get_object_terms($post_id, 'tax_allbudget');
    $tax_names = wp_list_pluck($tax, 'name');
    $stitle = implode(', ', $tax_names);
  }
  if( $column_name == 'tax_single' ) {
    $tax = wp_get_object_terms($post_id, 'tax_single');
    $tax_names = wp_list_pluck($tax, 'name');
    $stitle = implode(', ', $tax_names);
  }
  if( $column_name == 'tax_drink' ) {
    $tax = wp_get_object_terms($post_id, 'tax_drink');
    $tax_names = wp_list_pluck($tax, 'name');
    $stitle = implode(', ', $tax_names);
  }
  if ( isset($stitle) && $stitle ) {
    echo esc_attr($stitle);
  }
}

function my_manage_posts_columns_faq($columns) {
  $columns['faq_a'] = "回答";
  $columns['tax_faq'] = "よくある質問カテゴリ";
  return $columns;
}
function my_add_column_faq($column_name, $post_id) {
  if( $column_name == 'faq_a' ) {
    $faq_a = SCF::get('faq_a', $post_id);
    if ( isset($faq_a) && $faq_a ) {
      echo nl2br(esc_html($faq_a));
    }
  }
  if( $column_name == 'tax_faq' ) {
    $tax = wp_get_object_terms($post_id, 'tax_faq');
    $tax_names = wp_list_pluck($tax, 'name');
    $stitle = implode(', ', $tax_names);
  }
  if ( isset($stitle) && $stitle ) {
    echo esc_attr($stitle);
  }
}

function my_add_post_taxonomy_restrict_filter() {
  global $post_type;
  if ( 'menu' == $post_type ) {
    ?>
    <select name="tax_series">
      <option value="">シリーズ</option>
      <option value="all" <?php if ( isset($_GET['tax_series']) && $_GET['tax_series'] == 'all' ) { print 'selected'; } ?>>
        シリーズすべて</option>
      <?php
      $terms = get_terms('tax_series');
      foreach ($terms as $term) { ?>
        <option value="<?php echo $term->slug; ?>" <?php if ( isset($_GET['tax_series']) && $_GET['tax_series'] == $term->slug ) { print 'selected'; } ?>>
          <?php echo $term->name; ?></option>
        <?php
      }
      ?>
    </select>
    <select name="tax_budget">
      <option value="">一人当たりの予算</option>
      <option value="all" <?php if ( isset($_GET['tax_budget']) && $_GET['tax_budget'] == 'all' ) { print 'selected'; } ?>>
        一人当たりの予算すべて</option>
      <?php
      $terms = get_terms('tax_budget');
      foreach ($terms as $term) { ?>
        <option value="<?php echo $term->slug; ?>" <?php if (isset($_GET['tax_budget']) && $_GET['tax_budget'] == $term->slug ) { print 'selected'; } ?>>
          <?php echo $term->name; ?></option>
        <?php
      }
      ?>
    </select>
    <select name="tax_allbudget">
      <option value="">総予算</option>
      <option value="all" <?php if ( isset($_GET['tax_allbudget']) && $_GET['tax_allbudget'] == 'all' ) { print 'selected'; } ?>>
        総予算すべて</option>
      <?php
      $terms = get_terms('tax_allbudget');
      foreach ($terms as $term) { ?>
        <option value="<?php echo $term->slug; ?>" <?php if (isset($_GET['tax_allbudget']) && $_GET['tax_allbudget'] == $term->slug ) { print 'selected'; } ?>>
          <?php echo $term->name; ?></option>
        <?php
      }
      ?>
    </select>
    <select name="tax_single">
      <option value="">単品メニュー</option>
      <option value="all" <?php if ( isset($_GET['tax_single']) && $_GET['tax_single'] == 'all' ) { print 'selected'; } ?>>
        単品メニューすべて</option>
      <?php
      $terms = get_terms('tax_single');
      foreach ($terms as $term) { ?>
        <option value="<?php echo $term->slug; ?>" <?php if (isset($_GET['tax_single']) && $_GET['tax_single'] == $term->slug ) { print 'selected'; } ?>>
          <?php echo $term->name; ?></option>
        <?php
      }
      ?>
    </select>
    <?php
  }
  if ( 'faq' == $post_type ) {
    ?>
    <select name="tax_faq">
      <option value="">よくある質問カテゴリ</option>
      <option value="all" <?php if ( isset($_GET['tax_faq']) && $_GET['tax_faq'] == 'all' ) { print 'selected'; } ?>>
        よくある質問カテゴリすべて</option>
      <?php
      $terms = get_terms('tax_faq');
      foreach ($terms as $term) { ?>
        <option value="<?php echo $term->slug; ?>" <?php if ( isset($_GET['tax_faq']) && $_GET['tax_faq'] == $term->slug ) { print 'selected'; } ?>>
          <?php echo $term->name; ?></option>
        <?php
      }
      ?>
    </select>
    <?php
  }
}
add_filter( 'manage_edit-menu_columns', 'my_manage_posts_columns_menu' );
add_action( 'manage_menu_posts_custom_column', 'my_add_column_menu', 10, 2 );
add_action( 'restrict_manage_posts', 'my_add_post_taxonomy_restrict_filter' );
add_filter( 'manage_edit-faq_columns', 'my_manage_posts_columns_faq' );
add_action( 'manage_faq_posts_custom_column', 'my_add_column_faq', 10, 2 );


//抜粋出力用関数
function my_excerpt($length = 60)
{
  global $post;
  $cont = $post->post_content;
  //タグ除去
  $cont = strip_tags($cont);
  //ショートコード除去
  $cont = preg_replace('#\[[^\]]+\]#', '', $cont);
  //改行除去
  $cont = str_replace(array("\r\n", "\n", "\r"), "", $cont);
  if (mb_strlen($cont, 'UTF-8') > $length) {
    $cont = mb_substr($cont, 0, $length, 'UTF-8');
    echo $cont . '…';
  } else {
    echo $cont;
  }
  return;
}
function custom_excerpt_more($more)
{
  return '…';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// yubinbango 
wp_enqueue_script('yubinbango', 'https://yubinbango.github.io/yubinbango/yubinbango.js', array(), false, true);

// オプションページ
//SCF::add_options_page('人気プラン', '人気プラン設定', 'manage_options', 'popular-options');
//SCF::add_options_page('TOP単品メニュー', 'TOP単品メニュー設定', 'manage_options', 'single-options');
SCF::add_options_page('寿司設定', '寿司設定', 'manage_options', 'sushi-options');

// リライトルールカスタマイズ
function add_my_rewrite_rules() {
  // /tax_budget/ の場合
  add_rewrite_rule('^tax_budget/?$', 'index.php?taxonomy=tax_budget&post_type=menu', 'top');
  // /tax_budget/ページのリライトルールを追加
  add_rewrite_rule('^tax_budget/page/([0-9]+)/?$', 'index.php?taxonomy=tax_budget&post_type=menu&paged=$matches[1]', 'top');
  // tax_series タクソノミーアーカイブページの場合
  add_rewrite_rule('^tax_series/?$', 'index.php?taxonomy=tax_series&post_type=menu', 'top');
  // /tax_series/ページのリライトルールを追加
  add_rewrite_rule('^tax_series/page/([0-9]+)/?$', 'index.php?taxonomy=tax_series&post_type=menu&paged=$matches[1]', 'top');
  // tax_allbudget タクソノミーアーカイブページの場合
  add_rewrite_rule('^tax_allbudget/?$', 'index.php?taxonomy=tax_allbudget&post_type=menu', 'top');
  // /tax_allbudget/ページのリライトルールを追加
  add_rewrite_rule('^tax_allbudget/page/([0-9]+)/?$', 'index.php?taxonomy=tax_allbudget&post_type=menu&paged=$matches[1]', 'top');
  // tax_single タクソノミーアーカイブページの場合
  add_rewrite_rule('^tax_single/?$', 'index.php?taxonomy=tax_single&post_type=menu', 'top');
  // /tax_single/ページのリライトルールを追加
  add_rewrite_rule('^tax_single/page/([0-9]+)/?$', 'index.php?taxonomy=tax_single&post_type=menu&paged=$matches[1]', 'top');
  // tax_drink タクソノミーアーカイブページの場合
  add_rewrite_rule('^tax_drink/?$', 'index.php?taxonomy=tax_drink&post_type=menu', 'top');
  // /tax_drink/ページのリライトルールを追加
  add_rewrite_rule('^tax_drink/page/([0-9]+)/?$', 'index.php?taxonomy=tax_drink&post_type=menu&paged=$matches[1]', 'top');
}
add_action('init', 'add_my_rewrite_rules');

add_theme_support('title-tag');

/* --------------------------------------------
* ACFブロックカテゴリーの登録
* -------------------------------------------- */
require_once get_template_directory() . '/inc/acf-feature-page-blocks.php';