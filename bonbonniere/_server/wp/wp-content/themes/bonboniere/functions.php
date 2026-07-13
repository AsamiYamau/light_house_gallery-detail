<?php

$home_url = get_bloginfo('url');
$template_url = get_bloginfo('template_directory');

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
  //  register_post_type('blog', array(
  //    'labels' => array(
  //      'name' => 'ブログ',
  //      'singular_name' => 'ブログ',
  //    ),
  //    'public' => true,
  //    'show_ui' => true,
  //    'rewrite' => true,
  //    'has_archive' => true,
  //    'hierarchical' => true,
  //    'menu_position' => 5,
  //    'supports' => array('title','editor','thumbnail'),
  //    'show_in_rest' => true,
  //  ));
  //  register_taxonomy('tax_blog',array('blog'), array(
  //    'hierarchical' => true,
  //    'label' => 'カテゴリー',
  //    'show_ui' => true,
  //    'show_in_rest' => true,
  //    'public' => true
  //  ));
  //  register_taxonomy('tax_tag',array('blog'), array(
  //    'hierarchical' => false,
  //    'label' => 'タグ',
  //    'show_ui' => true,
  //    'show_in_rest' => true,
  //    'public' => true
  //  ));
  register_post_type('service', array(
    'labels' => array(
      'name' => 'セミオーダーサービス',
      'singular_name' => 'セミオーダーサービス',
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
  register_taxonomy('tax_cake_cat', array('service'), array(
    'hierarchical' => true,
    'label' => 'ケーキカテゴリー',
    'show_ui' => true,
    'show_in_rest' => true, 
    'public' => true,
    'show_admin_column' => true
  ));
  register_taxonomy('tax_usage_type', array('service'), array(
    'hierarchical' => true,
    'label' => '顧客種別',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true,
    'show_admin_column' => true
  ));

  register_post_type('collection', array(
    'labels' => array(
      'name' => 'BONBONNIEREコレクション',
      'singular_name' => 'BONBONNIEREコレクション',
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
  register_taxonomy('tax_collection', array('collection'), array(
    'hierarchical' => true,
    'label' => 'コレクションカテゴリー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true,
    'show_admin_column' => true
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
  register_taxonomy('tax_column', array('column'), array(
    'hierarchical' => true,
    'label' => 'コラムカテゴリー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true,
    'show_admin_column' => true
  ));


  register_post_type('s_gallery', array(
    'labels' => array(
      'name' => 'セミオーダーギャラリー',
      'singular_name' => 'セミオーダーギャラリー',
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
  register_taxonomy('tax_s_gallery_cake_cat', array('s_gallery'), array(
    'hierarchical' => true,
    'label' => 'セミオーダーギャラリーケーキカテゴリー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false,
    'show_admin_column' => true
  ));
  register_taxonomy('tax_s_gallery_usage_type', array('s_gallery'), array(
    'hierarchical' => true,
    'label' => 'セミオーダーギャラリー顧客種別',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false,
    'show_admin_column' => true
  ));

  register_post_type('f_gallery', array(
    'labels' => array(
      'name' => 'フルオーダーギャラリー',
      'singular_name' => 'フルオーダーギャラリー',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array('title', 'editor', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_f_gallery_cake_cat', array('f_gallery'), array(
    'hierarchical' => true,
    'label' => 'フルオーダーギャラリーカテゴリー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false,
    'show_admin_column' => true
  ));

  register_post_type('faq', array(
    'labels' => array(
      'name' => 'よくある質問',
      'singular_name' => 'よくある質問',
    ),
    'public' => true,
    'show_ui' => true,
    'has_archive' => true,
    'rewrite' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
  ));
  register_taxonomy('tax_faq', array('faq'), array(
    'hierarchical' => true,
    'label' => 'よくある質問カテゴリー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false,
    'show_admin_column' => true
  ));

  register_post_type('option', array(
    'labels' => array(
      'name' => 'オプション投稿',
      'singular_name' => 'オプション投稿',
    ),
    'public' => false,
    'show_ui' => true,
    'has_archive' => true,
    'rewrite' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
  ));
  register_taxonomy('tax_option', array('option'), array(
    'hierarchical' => true,
    'label' => 'オプションカテゴリー',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false,
    'show_admin_column' => true,
  ));
}


/*---リダイレクト-----------------------------------------------*/
// FAQ投稿の個別ページにアクセスされた場合、FAQアーカイブページにリダイレクトする
add_action('template_redirect', function () {
  if (is_singular('faq')) {
    wp_redirect(get_post_type_archive_link('faq'), 301);
    exit;
  }
});

/*---------------------------------------------------------------*/

/*---ショートコード-----------------------------------------------*/

function shortcode_full_order_gallery($atts){
 ob_start();
 get_template_part('inc/full-order-gallery');
 return ob_get_clean();
}
add_shortcode('full_order_gallery','shortcode_full_order_gallery');

/*---------------------------------------------------------------*/

/*---form -----------------------------------------------*/

//ご注文・お問い合わせ　エラーメッセージ
add_filter( 'mwform_error_message_mw-wp-form-22', function( $error, $key, $rule ) {

    if ( $rule === 'noempty' ) {
        return '必須項目です。';
    }

    return $error;
}, 10, 3 );

//フルオーダー相談　エラーメッセージ
add_filter( 'mwform_error_message_mw-wp-form-6', function( $error, $key, $rule ) {

    if ( $rule === 'noempty' ) {
        return '必須項目です。';
    }
 
    return $error;
}, 10, 3 );

//日付ピッカーの読み込み
function my_enqueue_datepicker() {
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_style(
    'jquery-ui',
    'https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css'
  );
}
add_action('wp_enqueue_scripts', 'my_enqueue_datepicker');


//その他にテキスト入力があった場合のラジオボタンの値の非表示
function my_hide_normal_or_other_fields_in_mail( $Mail, $values, $Data ) {

  $rules = [
    [
      'section_label' => 'スポンジ',
      'normal_name'   => 'sponge',
      'other_name'    => 'other_sponge',
    ],
    [
      'section_label' => 'クリーム',
      'normal_name'   => 'cream',
      'other_name'    => 'other_cream',
    ],
    [
      'section_label' => 'ケーキの形',
      'normal_name'   => 'cake_shape',
      'other_name'    => 'other_shape',
    ],
  ];

  foreach ( $rules as $rule ) {
    $section_label = preg_quote( $rule['section_label'], '/' );

    $normal_value = trim( (string) $Data->get( $rule['normal_name'] ) );
    $other_value  = trim( (string) $Data->get( $rule['other_name'] ) );

    // その他に入力がある場合：通常選択の値を削除
    if ( $other_value !== '') {
      $normal_value_quoted = preg_quote( $normal_value, '/' );

      $Mail->body = preg_replace(
        '/(【' . $section_label . '】\R)' . $normal_value_quoted . '\R?/u',
        '$1',
        $Mail->body
      );
    }

    // その他が空の場合：その他の空行を削除
    if ( $other_value === '' ) {
      $Mail->body = preg_replace(
        '/(【' . $section_label . '】\R' . preg_quote( $normal_value, '/' ) . '\R)\s*\R?/u',
        '$1',
        $Mail->body
      );
    }
  }

  // 空行が増えすぎた場合の調整
  $Mail->body = preg_replace( "/\n{3,}/", "\n\n", $Mail->body );

    // 【項目名】の前に空行がなければ追加
  $Mail->body = preg_replace(
    '/([^\n])\n(?=【)/u',
    "$1\n\n",
    $Mail->body
  );

  return $Mail;
}

// 管理者宛メール
add_filter(
  'mwform_admin_mail_mw-wp-form-6',
  'my_hide_normal_or_other_fields_in_mail',
  10,
  3
);

// 自動返信メール
add_filter(
  'mwform_auto_mail_mw-wp-form-6',
  'my_hide_normal_or_other_fields_in_mail',
  10,
  3
);
/*---------------------------------------------------------------*/

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


/*---//カスタム投稿タイプの投稿一覧にカスタムタクソノミーの絞込をつける ----------------------*/

add_action('restrict_manage_posts', 'add_custom_taxonomies_term_filter');
function add_custom_taxonomies_term_filter()
{
  global $post_type;
   if ( $post_type == 'service' ) {
     $taxonomy = 'tax_cake_cat';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべてのケーキカテゴリー',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
     $taxonomy = 'tax_usage_type';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべての顧客種別',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
   }

   if ( $post_type == 'collection' ) {
     $taxonomy = 'tax_collection';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべてのコレクションカテゴリー',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
   }

   if ( $post_type == 'column' ) {
     $taxonomy = 'tax_column';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべてのコラムカテゴリー',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
   }

   if ( $post_type == 's_gallery' ) {
     $taxonomy = 'tax_s_gallery_cake_cat';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべてのケーキカテゴリー',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
     $taxonomy = 'tax_s_gallery_usage_type';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべての顧客種別',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
   }

   if ( $post_type == 'f_gallery' ) {
     $taxonomy = 'tax_s_gallery_cake_cat';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべてのケーキカテゴリー',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
     $taxonomy = 'tax_s_gallery_usage_type';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべての顧客種別',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
   }

   if ( $post_type == 'faq' ) {
     $taxonomy = 'tax_faq';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべてのよくある質問カテゴリー',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
   }

   if ( $post_type == 'option' ) {
     $taxonomy = 'tax_option';
     wp_dropdown_categories( array(
       'show_option_all' => 'すべてのオプションカテゴリー',
       'orderby' => 'name',
       'selected' => get_query_var( $taxonomy ),
       'hide_empty' => 0,
       'name' => $taxonomy,
       'taxonomy' => $taxonomy,
       'value_field' => 'slug',
     ) );
   }
}
/*---------------------------------------------------------------*/




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




/* --------------------------------------------
* ACFブロックカテゴリーの登録
* -------------------------------------------- */
require_once get_template_directory() . '/inc/acf-feature-page-blocks.php';
