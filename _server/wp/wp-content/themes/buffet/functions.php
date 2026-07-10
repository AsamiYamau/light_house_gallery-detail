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
  remove_menu_page('edit-comments.php'); // コメントを非表示
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
  register_post_type('blog', array(
    'labels' => array(
      'name' => 'ブログ',
      'singular_name' => 'ブログ',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title', 'editor', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_blog', array('blog'), array(
    'hierarchical' => true,
    'label' => 'ブログカテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => true
  ));
  //  register_taxonomy('tax_tag',array('blog'), array(
  //    'hierarchical' => false,
  //    'label' => 'タグ',
  //    'show_ui' => true,
  //    'show_in_rest' => true,
  //    'public' => true
  //  ));

      register_post_type('blog-author', array(
    'labels' => array(
      'name' => 'ブログ執筆者',
      'singular_name' => 'ブログ執筆者',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => false,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));

  register_post_type('cateling', array(
    'labels' => array(
      'name' => 'ケータリング',
      'singular_name' => 'ケータリング',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_cateling', array('cateling'), array(
    'hierarchical' => true,
    'label' => 'ケータリングカテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false
  ));
  register_taxonomy('tax_cateling_price', array('cateling'), array(
    'hierarchical' => true,
    'label' => 'ケータリング予算カテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false
  ));
  register_post_type('cateling-drinkplan', array(
    'labels' => array(
      'name' => 'ケータリングドリンクプラン',
      'singular_name' => 'ケータリングドリンクプラン',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_post_type('cateling-drinksingle', array(
    'labels' => array(
      'name' => 'ケータリングドリンク単品',
      'singular_name' => 'ケータリングドリンク単品',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));
  register_post_type('cateling-option', array(
    'labels' => array(
      'name' => 'ケータリングオプション',
      'singular_name' => 'ケータリングオプション',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true,
  ));
    register_taxonomy('tax_option', array('cateling-option'), array(
    'hierarchical' => true,
    'label' => 'オプションカテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false
  ));
  register_post_type('cateling-equip', array(
    'labels' => array(
      'name' => 'ケータリング備品',
      'singular_name' => 'ケータリング備品',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));

  register_post_type('delivery', array(
    'labels' => array(
      'name' => 'オードブルデリバリー',
      'singular_name' => 'オードブルデリバリー',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_delivery', array('delivery'), array(
    'hierarchical' => true,
    'label' => 'オードブルデリバリーカテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false
  ));
  register_taxonomy('tax_delivery_price', array('delivery'), array(
    'hierarchical' => true,
    'label' => 'オードブルデリバリー予算カテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false
  ));
  register_post_type('delivery-drinkplan', array(
    'labels' => array(
      'name' => 'オードブルドリンクプラン',
      'singular_name' => 'オードブルドリンクプラン',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true,
  ));
  register_post_type('delivery-drinksingle', array(
    'labels' => array(
      'name' => 'オードブルドリンク単品',
      'singular_name' => 'オードブルドリンク単品',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));
  register_post_type('delivery-option', array(
    'labels' => array(
      'name' => 'オードブルオプション',
      'singular_name' => 'オードブルオプション',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true,
  ));


  register_post_type('qa', array(
    'labels' => array(
      'name' => 'よくある質問',
      'singular_name' => 'よくある質問',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_qa', array('qa'), array(
    'hierarchical' => true,
    'label' => 'よくある質問カテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false
  ));
  register_post_type('region', array(
    'labels' => array(
      'name' => '対応エリア',
      'singular_name' => '対応エリア',
    ),
    'public' => false,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title'),
    'show_in_rest' => true,
  ));
  register_taxonomy('tax_region', array('region'), array(
    'hierarchical' => true,
    'label' => '都道府県カテゴリ',
    'show_ui' => true,
    'show_in_rest' => true,
    'public' => false
  ));

  register_post_type('gallery', array(
    'labels' => array(
      'name' => 'ギャラリー',
      'singular_name' => 'ギャラリー',
    ),
    'public' => true,
    'show_ui' => true,
    'rewrite' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 2,
    'supports' => array('title','editor', 'thumbnail'),
    'show_in_rest' => true,
  ));
}


//お問い合わせのバナーのショートコード
//function shortcode_contact_banner($atts){
//  ob_start();
//  get_template_part('inc/contact-banner');
//  return ob_get_clean();
//}
//add_shortcode('contact_banner','shortcode_contact_banner');

// オードブルデリバリーとケータリングの違い ショートコード
function shortcode_difference($atts)
{
  ob_start();
  get_template_part('inc/difference');
  return ob_get_clean();
}
add_shortcode('difference', 'shortcode_difference');

// 会社概要 ショートコード
function shortcode_prof($atts)
{
  ob_start();
  get_template_part('inc/about-prof');
  return ob_get_clean();
}
add_shortcode('profile', 'shortcode_prof');


// パーマリンクルールの追加
function myRewriteRule()
{
  //post
  //  add_rewrite_rule('blog/?$' ,'index.php?post_type=post', 'top');
}
add_action('init', 'myRewriteRule');

//管理画面の列　ブログ
function my_manage_posts_columns_blog($columns)
{
  $columns['tax_blog'] = "カテゴリ";
  $columns['thumb'] = "サムネイル";
  unset($columns['date']); //日付非表示
  return $columns;
}
function my_add_column_blog($column_name, $post_id)
{
  if ($column_name == 'tax_blog') {
    $terms = get_the_terms($post_id, 'tax_blog');
    if ($terms) {
      $stitle = '';
      foreach ($terms as $i => $term) {
        if ($i != 0) {
          $stitle .= '、';
        }
        $stitle .= $term->name;
      }
    }
  }
  if ($column_name == 'thumb') {
    $img = get_the_post_thumbnail_url($post_id, 'thumbnail');
    if ($img) {
      echo '<img src="' . $img . '" >';
    }
  }
  if (isset($stitle) && $stitle) {
    echo esc_attr($stitle);
  }
}
add_filter('manage_edit-blog_columns', 'my_manage_posts_columns_blog');
add_action('manage_blog_posts_custom_column', 'my_add_column_blog', 10, 2);

//管理画面の列　ケータリング
function my_manage_posts_columns_cateling($columns)
{
  $columns['tax_cateling'] = "カテゴリ";
  $columns['thumb'] = "サムネイル";
  unset($columns['date']); //日付非表示
  return $columns;
}
function my_add_column_cateling($column_name, $post_id)
{
  if ($column_name == 'tax_cateling') {
    $terms = get_the_terms($post_id, 'tax_cateling');
    if ($terms) {
      $stitle = '';
      foreach ($terms as $i => $term) {
        if ($i != 0) {
          $stitle .= '、';
        }
        $stitle .= $term->name;
      }
    }
  }
  if ($column_name == 'thumb') {
    $img = get_the_post_thumbnail_url($post_id, 'thumbnail');
    if ($img) {
      echo '<img src="' . $img . '" >';
    }
  }
  if (isset($stitle) && $stitle) {
    echo esc_attr($stitle);
  }
}
add_filter('manage_edit-cateling_columns', 'my_manage_posts_columns_cateling');
add_action('manage_cateling_posts_custom_column', 'my_add_column_cateling', 10, 2);


//管理画面の列　オードブルデリバリー
function my_manage_posts_columns_delivery($columns)
{
  $columns['tax_delivery'] = "カテゴリ";
  $columns['thumb'] = "サムネイル";
  unset($columns['date']); //日付非表示
  return $columns;
}
function my_add_column_delivery($column_name, $post_id)
{
  if ($column_name == 'tax_delivery') {
    $terms = get_the_terms($post_id, 'tax_delivery');
    if ($terms) {
      $stitle = '';
      foreach ($terms as $i => $term) {
        if ($i != 0) {
          $stitle .= '、';
        }
        $stitle .= $term->name;
      }
    }
  }
  if ($column_name == 'thumb') {
    $img = get_the_post_thumbnail_url($post_id, 'thumbnail');
    if ($img) {
      echo '<img src="' . $img . '" >';
    }
  }
  if (isset($stitle) && $stitle) {
    echo esc_attr($stitle);
  }
}
add_filter('manage_edit-delivery_columns', 'my_manage_posts_columns_delivery');
add_action('manage_delivery_posts_custom_column', 'my_add_column_delivery', 10, 2);



//管理画面の列　ドリンク単品
function my_manage_posts_columns_catelingdrinksingle($columns)
{
  $columns['price'] = "金額";
  unset($columns['date']); //日付非表示
  return $columns;
}
function my_add_column_catelingdrinksingle($column_name, $post_id)
{
  if ($column_name == 'price') {
    $item = get_field('cateling-drink-single-price', $post_id);
    if ($item) {
      $item = safe_number_format($item) . '円';
    }
    $stitle = $item;
  }
  if (isset($stitle) && $stitle) {
    echo esc_attr($stitle);
  }
}
add_filter('manage_edit-cateling-drinksingle_columns', 'my_manage_posts_columns_catelingdrinksingle');
add_action('manage_cateling-drinksingle_posts_custom_column', 'my_add_column_catelingdrinksingle', 10, 2);

//管理画面の列　よくある質問
function my_manage_posts_columns_faq($columns)
{
  $columns['tax_qa'] = "カテゴリ";
  $columns['faq_a'] = "回答";
  unset($columns['date']); //日付非表示
  return $columns;
}
function my_add_column_faq($column_name, $post_id)
{
  if ($column_name == 'tax_qa') {
    $terms = get_the_terms($post_id, 'tax_qa');
    if ($terms) {
      $stitle = '';
      foreach ($terms as $i => $term) {
        if ($i != 0) {
          $stitle .= '、';
        }
        $stitle .= $term->name;
      }
    }
  }
  if ($column_name == 'faq_a') {
    $item = get_field('faq_a', $post_id);
    $stitle = $item;
  }
  if (isset($stitle) && $stitle) {
    echo esc_attr($stitle);
  }
}
add_filter('manage_edit-qa_columns', 'my_manage_posts_columns_faq');
add_action('manage_qa_posts_custom_column', 'my_add_column_faq', 10, 2);

//管理画面の列　オプション
function my_manage_posts_columns_option($columns)
{
  $columns['tax_option'] = "カテゴリ";
  // $columns['thumb'] = "サムネイル";
  unset($columns['date']); //日付非表示
  return $columns;
}
function my_add_column_option($column_name, $post_id)
{
  if ($column_name == 'tax_option') {
    $terms = get_the_terms($post_id, 'tax_option');
    if ($terms) {
      $stitle = '';
      foreach ($terms as $i => $term) {
        if ($i != 0) {
          $stitle .= '、';
        }
        $stitle .= $term->name;
      }
    }
  }

  if (isset($stitle) && $stitle) {
    echo esc_attr($stitle);
  }
}
add_filter('manage_edit-cateling-option_columns', 'my_manage_posts_columns_option');
add_action('manage_cateling-option_posts_custom_column', 'my_add_column_option', 10, 2);

//カスタム投稿タイプの投稿一覧にカスタムタクソノミーの絞込をつける
add_action('restrict_manage_posts', 'add_custom_taxonomies_term_filter');
function add_custom_taxonomies_term_filter()
{
  global $post_type;
  if ($post_type == 'blog') {
    $taxonomy = 'tax_blog';
    wp_dropdown_categories(array(
      'show_option_all' => 'すべてのカテゴリー',
      'orderby' => 'name',
      'selected' => get_query_var($taxonomy),
      'hide_empty' => 0,
      'name' => $taxonomy,
      'taxonomy' => $taxonomy,
      'value_field' => 'slug',
    ));
  }
  if ($post_type == 'cateling') {
    $taxonomy = 'tax_cateling';
    wp_dropdown_categories(array(
      'show_option_all' => 'すべてのカテゴリー',
      'orderby' => 'name',
      'selected' => get_query_var($taxonomy),
      'hide_empty' => 0,
      'name' => $taxonomy,
      'taxonomy' => $taxonomy,
      'value_field' => 'slug',
    ));
  }
  if ($post_type == 'delivery') {
    $taxonomy = 'tax_delivery';
    wp_dropdown_categories(array(
      'show_option_all' => 'すべてのカテゴリー',
      'orderby' => 'name',
      'selected' => get_query_var($taxonomy),
      'hide_empty' => 0,
      'name' => $taxonomy,
      'taxonomy' => $taxonomy,
      'value_field' => 'slug',
    ));
  }
  if ($post_type == 'cateling-option') {
    $taxonomy = 'tax_option';
    wp_dropdown_categories(array(
      'show_option_all' => 'すべてのカテゴリー',
      'orderby' => 'name',
      'selected' => get_query_var($taxonomy),
      'hide_empty' => 0,
      'name' => $taxonomy,
      'taxonomy' => $taxonomy,
      'value_field' => 'slug',
    ));
  }
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'TOPページ',
    'menu_title' => 'TOPページ',
    'menu_slug'  => 'top-option-settings',
    'capability' => 'edit_posts',
    'position' => 20,
    'redirect'   => false
  ));
  acf_add_options_page(array(
    'page_title' => '人気メニュー',
    'menu_title' => '人気メニュー',
    'menu_slug'  => 'ranking-option-settings',
    'capability' => 'edit_posts',
    'position' => 20,
    'redirect'   => false
  ));
  acf_add_options_page(array(
    'page_title' => 'シーンから選ぶ',
    'menu_title' => 'シーンから選ぶ',
    'menu_slug'  => 'scene-option-settings',
    'capability' => 'edit_posts',
    'position' => 20,
    'redirect'   => false
  ));
  acf_add_options_page(array(
    'page_title' => '会社概要',
    'menu_title' => '会社概要',
    'menu_slug'  => 'profile-option-settings',
    'capability' => 'edit_posts',
    'position' => 20,
    'redirect'   => false
  ));
  acf_add_options_page(array(
    'page_title' => '予算から選ぶ',
    'menu_title' => '予算から選ぶ',
    'menu_slug'  => 'budget-option-settings',
    'capability' => 'edit_posts',
    'position' => 20,
    'redirect'   => false
  ));
}

//デリバリー関係ページの判定
function isDelivery()
{
  $delivery_flg = false;

  if (
    is_post_type_archive('delivery')
    || is_singular('delivery')
    || is_page('delivery-drink')
    || is_page('delivery-options')
  ) {
    $delivery_flg = true;
  }
  return $delivery_flg;
}

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

function my_pre_get_posts($query)
{
  //管理画面の並び順
  if (is_admin()) {
    $post_type = $query->query['post_type'];
    if ($post_type == 'blog') {
      $query->set('orderby', 'date'); //並べ替えの基準(日付)
      $query->set('order', 'DESC'); //新しい順。古い順にしたい場合はASCを指定
    }
  }
}
add_action('pre_get_posts', 'my_pre_get_posts');

wp_enqueue_script('yubinbango', 'https://yubinbango.github.io/yubinbango/yubinbango.js', array(), false, true);



//form--------------------------------------------------
// file_put_contents("./mail.txt", "HELLO WORLD1", FILE_APPEND);


//form 自動返信メール 
function my_mail01($Mail, $values, $Data)
{

  $which_form = '';
  if ($Data->get('type') == 'mitsumori') {
    $which_form = 'mitsumori';
  } else if ($Data->get('type') == 'cta') {
    $which_form = 'cta';
  }

  // お見積りの場合
  if ($which_form == 'mitsumori') {
    $Mail->to = $Data->get('mitsumori-email');
    // $Mail->to = 'yamauchi@mh-work.com';

    $Mail->subject = '【Mr.BUFFET TOKYO】お見積りいただきありがとうございます。'; // 件名を変更
    $Mail->body = '
    この度は、お見積りいただき感謝致します。
    以下の内容でお問い合わせを承りました。
    担当から改めてご連絡を差し上げます。
    ▶◀MrBuffet▶◀
    ';

    $Mail->body .= '
    
    企業名：' . $Data->get('mitsumori-company') . '
  
    名前：' . $Data->get('mitsumori-name') . '
  
    ふりがな：' . $Data->get('mitsumori-kana') . '
  
    住所：' . $Data->get('mitsumori-yubin') .
      $Data->get('mitsumori-add01') . $Data->get('mitsumori-add02') . '
  
    メールアドレス：' . $Data->get('mitsumori-email') . '
  
    電話番号：' . $Data->get('mitsumori-tel') . '
  
    実施日：' . $Data->get('mitsumori-date') . $Data->get('mitsumori-time') . '時から開始予定' . '
    
    予定人数：' . $Data->get('mitsumori-num') . '
  
    ご希望のプラン：' . $Data->get('mitsumori-radio');

    // ケータリングの場合
    if ($Data->get('mitsumori-radio') == 'ケータリング') {
      $Mail->body .= '


      【プラン・ドリンクプラン】

      プラン：' . $Data->get('mitsumori-plan-plan') . '
  
      ドリンク：' . $Data->get('mitsumori-plan-drink');

      $option = '


      【オプションプラン】
      ';

      // 投稿取得
      $args = array(
        'post_type' => array('cateling-option'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-option' . $id . '')) {
            $option .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-option' . $id . '');
          }
        }
      }
      wp_reset_postdata();



      $Mail->body .= $option;


      $drink = '


      【単品ドリンク】
      ';

      // 投稿取得
      $args = array(
        'post_type' => array('cateling-drinksingle'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-drink' . $id . '')) {
            $drink .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-drink' . $id . '');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $drink;

      $other = '


      【什器・備品】
      ';

      // 投稿取得
      $args = array(
        'post_type' => array('cateling-equip'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-other' . $id . '')) {
            $other .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-other' . $id . '');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $other;

      $Mail->body .= '


      ご要望：
      ' . $Data->get('mitsumori-plan-cont') . "\n\n";
    }
    // オードブルの場合
    if ($Data->get('mitsumori-radio') == 'オードブルデリバリー') {
      $Mail->body .= '


      【プラン・ドリンクプラン】

      プラン：' . $Data->get('mitsumori-plan-plan-deli') . '
  
      ドリンク：' . $Data->get('mitsumori-plan-drink-deli');

      $option = '


      【オプションプラン】';

      // 投稿取得
      $args = array(
        'post_type' => array('delivery-option'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-option' . $id . '-deli')) {
            $option .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-option' . $id . '-deli');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $option;


      $drink = '


      【単品ドリンク】';

      // 投稿取得
      $args = array(
        'post_type' => array('delivery-drinksingle'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-drink' . $id . '-deli')) {
            $drink .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-drink' . $id . '-deli');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $drink;


      $Mail->body .= '
     
      ご要望：
      ' . $Data->get('mitsumori-plan-cont-deli') . "\n\n";
    }
  }

  // お問い合わせの場合
  if ($which_form == 'cta') {
    $Mail->to = $Data->get('cta-email');

    $Mail->subject = '【Mr.BUFFET TOKYO】お問い合わせありがとうございます。'; // 件名を変更

    $Mail->body = '
    この度は、お問い合わせいただき感謝致します。
    以下の内容でお問い合わせを承りました。
    担当から改めてご連絡を差し上げます。
    ▶◀MrBuffet▶◀
    ';

    $Mail->body .= '
    
    企業名：
    ' . $Data->get('cta-company') . '

    名前：
    ' . $Data->get('cta-name') . '

    ふりがな：
    ' . $Data->get('cta-kana') . '

    住所：
    ' . $Data->get('cta-yubin') .
      $Data->get('cta-add01') .
      $Data->get('cta-add02') . '

    メールアドレス：
    ' . $Data->get('cta-email') . '

    電話番号：
    ' . $Data->get('cta-tel') . '

    お問い合わせ内容：
    ' . $Data->get('cta-radio') . '
    
    お問い合わせ・ご質問内容：
    ' . $Data->get('cta-cont') . "\n\n";
  }

  $Mail->body .= '

----------------------------------------------
株式会社 Light House
本社：神戸市北区日の峰３−２８−１８
東京セントラルキッチン：足立区千住橋戸町４９-１F
大阪セントラルキッチン：大阪市東成区玉津２丁目５−２９
URL：https://buffettokyo-catering.com/
----------------------------------------------';

  return $Mail;
}
add_filter('mwform_auto_mail_mw-wp-form-6', 'my_mail01', 10, 3);

//管理者宛メール設定 

function my_mail02($Mail, $values, $Data)
{
  // $Mail->to = 'yamauchi@mh-work.com';

  $which_form = '';
  if ($Data->get('type') == 'mitsumori') {
    $which_form = 'mitsumori';
  } else if ($Data->get('type') == 'cta') {
    $which_form = 'cta';
  }

  // お見積りの場合
  if ($which_form == 'mitsumori') {

    $Mail->subject = '【Mr.BUFFET TOKYO】お見積りがありました。'; // 件名を変更
    $Mail->body = '
    以下の内容でお見積もりがありました。
    ';

    $Mail->body .= '
    
    企業名：' . $Data->get('mitsumori-company') . '
  
    名前：' . $Data->get('mitsumori-name') . '
  
    ふりがな：' . $Data->get('mitsumori-kana') . '
  
    住所：' . $Data->get('mitsumori-yubin') .
      $Data->get('mitsumori-add01') . $Data->get('mitsumori-add02') . '
  
    メールアドレス：' . $Data->get('mitsumori-email') . '
  
    電話番号：' . $Data->get('mitsumori-tel') . '
  
    実施日：' . $Data->get('mitsumori-date') . $Data->get('mitsumori-time') . '時から開始予定' . '
    
    予定人数：' . $Data->get('mitsumori-num') . '
  
    ご希望のプラン：' . $Data->get('mitsumori-radio');

    // ケータリングの場合
    if ($Data->get('mitsumori-radio') == 'ケータリング') {
      $Mail->body .= '


      【プラン・ドリンクプラン】

      プラン：' . $Data->get('mitsumori-plan-plan') . '
  
      ドリンク：' . $Data->get('mitsumori-plan-drink');

      $option = '


      【オプションプラン】
      ';

      // 投稿取得
      $args = array(
        'post_type' => array('cateling-option'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-option' . $id . '')) {
            $option .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-option' . $id . '');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $option;


      $drink = '


      【単品ドリンク】
      ';

      // 投稿取得
      $args = array(
        'post_type' => array('cateling-drinksingle'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-drink' . $id . '')) {
            $drink .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-drink' . $id . '');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $drink;

      $other = '


      【什器・備品】
      ';

      // 投稿取得
      $args = array(
        'post_type' => array('cateling-equip'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-other' . $id . '')) {
            $other .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-other' . $id . '');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $other;

      $Mail->body .= '


      ご要望：
      ' . $Data->get('mitsumori-plan-cont') . "\n\n";
    }
    // オードブルの場合
    if ($Data->get('mitsumori-radio') == 'オードブルデリバリー') {
      $Mail->body .= '


      【プラン・ドリンクプラン】

      プラン：' . $Data->get('mitsumori-plan-plan-deli') . '
  
      ドリンク：' . $Data->get('mitsumori-plan-drink-deli');

      $option = '


      【オプションプラン】';

      // 投稿取得
      $args = array(
        'post_type' => array('delivery-option'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-option' . $id . '-deli')) {
            $option .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-option' . $id . '-deli');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $option;


      $drink = '


      【単品ドリンク】';

      // 投稿取得
      $args = array(
        'post_type' => array('delivery-drinksingle'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
      );
      $new_query = new WP_Query($args);
      if ($new_query->have_posts()) {
        while ($new_query->have_posts()) {
          $new_query->the_post();
          $title = get_the_title();
          $id = get_the_ID();

          if ($Data->get('mitsumori-plan-drink' . $id . '-deli')) {
            $drink .= '
  
            ' . $title . '
            数量：' . $Data->get('mitsumori-plan-drink' . $id . '-deli');
          }
        }
      }
      wp_reset_postdata();

      $Mail->body .= $drink;


      $Mail->body .= '
     
      ご要望：
      ' . $Data->get('mitsumori-plan-cont-deli') . "\n\n";
    }
  }


  // お問い合わせの場合
  if ($which_form == 'cta') {

    $Mail->subject = '【Mr.BUFFET TOKYO】お問い合わせがありました。'; // 件名を変更

    $Mail->body = '
    以下の内容でお問い合わせがありました。
    ';

    $Mail->body .= '
    
    企業名：
    ' . $Data->get('cta-company') . '

    名前：
    ' . $Data->get('cta-name') . '

    ふりがな：
    ' . $Data->get('cta-kana') . '

    住所：
    ' . $Data->get('cta-yubin') .
      $Data->get('cta-add01') .
      $Data->get('cta-add02') . '

    メールアドレス：
    ' . $Data->get('cta-email') . '

    電話番号：
    ' . $Data->get('cta-tel') . '

    お問い合わせ内容：
    ' . $Data->get('cta-radio') . '
    
    お問い合わせ・ご質問内容：
    ' . $Data->get('cta-cont') . "\n\n";
  }

  $Mail->body .= '

----------------------------------------------
株式会社 Light House
本社：神戸市北区日の峰３−２８−１８
東京セントラルキッチン：足立区千住橋戸町４９-１F
大阪セントラルキッチン：大阪市東成区玉津２丁目５−２９
URL：https://buffettokyo-catering.com/
----------------------------------------------';

  return $Mail;
}
add_filter('mwform_admin_mail_mw-wp-form-6', 'my_mail02', 10, 3);


//+++++++++ form項目　動的化 +++++++++++++++++++++++++++++++++++++++++++

//【ケータリング】セレクトボックス
//プラン
function contact_form_my_cateling_plan($children, $atts)
{
  if ($atts['name'] === 'mitsumori-plan-plan') {
    $children = [];
    $args = [
      'post_type' => 'cateling',
      'posts_per_page' => -1
    ];
    $customPosts = get_posts($args);
    foreach ($customPosts as $post) {
      $price_tax = get_post_meta($post->ID, 'cateling_price_tax', true);
      $children[$post->ID] = $post->post_title. ' ¥' . $price_tax;
    }
  }
  return $children;
}
add_filter('mwform_choices_mw-wp-form-6', 'contact_form_my_cateling_plan', 10, 2);

//ドリンク
function contact_form_my_cateling_drink($children, $atts)
{
  if ($atts['name'] === 'mitsumori-plan-drink') {
    $children = [];
    $children[0] = 'なし';
    $args = [
      'post_type' => 'cateling-drinkplan',
      'posts_per_page' => -1
    ];
    $customPosts = get_posts($args);
    foreach ($customPosts as $post) {
      $children[$post->ID] = $post->post_title;
    }
  }
  return $children;
}
add_filter('mwform_choices_mw-wp-form-6', 'contact_form_my_cateling_drink', 10, 3);

//【オードブル】セレクトボックス
//プラン
function contact_form_my_delivery_plan($children, $atts)
{
  if ($atts['name'] === 'mitsumori-plan-plan-deli') {
    $children = [];
    $args = [
      'post_type' => 'delivery',
      'posts_per_page' => -1
    ];
    $customPosts = get_posts($args);
    foreach ($customPosts as $post) {
      $children[$post->ID] = $post->post_title;
    }
  }
  return $children;
}
add_filter('mwform_choices_mw-wp-form-6', 'contact_form_my_delivery_plan', 10, 2);

//ドリンク
function contact_form_my_delivery_drink($children, $atts)
{
  if ($atts['name'] === 'mitsumori-plan-drink-deli') {
    $children = [];
    $children[0] = 'なし';

    $args = [
      'post_type' => 'delivery-drinkplan',
      'posts_per_page' => -1
    ];
    $customPosts = get_posts($args);
    foreach ($customPosts as $post) {
      $children[$post->ID] = $post->post_title;
    }
  }
  return $children;
}
add_filter('mwform_choices_mw-wp-form-6', 'contact_form_my_delivery_drink', 10, 3);


//MW WP Form 本文設定
function my_mwform_post_content($content, $Data)
{
  //+++++ ケータリングオプション ++++++
  if (strpos($content, '[my_cateling_option]') !== false) {
    $table = '
    <table class="c-form-table plan">
      [table_cont]
    </table>
    ';
    $table_tr = '';

    // 投稿取得
    $args = array(
      'post_type' => array('cateling-option'),
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'ASC',
      'orderby' => 'menu_order',
    );
    $new_query = new WP_Query($args);
    if ($new_query->have_posts()) {
      while ($new_query->have_posts()) {
        $new_query->the_post();
        $title = get_the_title();
        $id = get_the_ID();
        $price = get_field('cateling_option_price');
        if ($price) {
          $price = safe_number_format($price);
        }
        $table_tr .= '
        <tr>
          <th><span class="inner">' . $title . '</span></th>
          <td class="amount-box">
            <span class="plan-price">' . $price . '円</span>
            <span class="form-txt">数量：</span>
            [mwform_number name="mitsumori-plan-option' . $id . '" class="c-input" min="0" step="1"]
          </td>
        </tr>
        ';
      }
    }
    wp_reset_postdata();

    $table = str_replace('[table_cont]', $table_tr, $table);

    $content = str_replace('[my_cateling_option]', $table, $content);
  }
  //+++++ ケータリング単品ドリンク ++++++
  if (strpos($content, '[my_cateling_drink]') !== false) {
    $table = '
    <table class="c-form-table plan">
      [table_cont]
    </table>
    ';
    $table_tr = '';

    // 投稿取得
    $args = array(
      'post_type' => array('cateling-drinksingle'),
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'ASC',
      'orderby' => 'menu_order',
    );
    $new_query = new WP_Query($args);
    if ($new_query->have_posts()) {
      while ($new_query->have_posts()) {
        $new_query->the_post();
        $title = get_the_title();
        $id = get_the_ID();
        $price = get_field('cateling-drink-single-price');
        if ($price) {
          $price = safe_number_format($price);
        }
        $table_tr .= '
        <tr>
          <th><span class="inner">' . $title . '</span></th>
          <td class="amount-box">
            <span class="plan-price">' . $price . '円</span>
            <span class="form-txt">数量：</span>
            [mwform_number name="mitsumori-plan-drink' . $id . '" class="c-input" min="0" step="1"]
          </td>
        </tr>
        ';
      }
    }
    wp_reset_postdata();

    $table = str_replace('[table_cont]', $table_tr, $table);

    $content = str_replace('[my_cateling_drink]', $table, $content);
  }
  //+++++ ケータリング備品 ++++++
  if (strpos($content, '[my_cateling_other]') !== false) {
    $table = '
    <table class="c-form-table plan">
      [table_cont]
    </table>
    ';
    $table_tr = '';

    // 投稿取得
    $args = array(
      'post_type' => array('cateling-equip'),
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'ASC',
      'orderby' => 'menu_order',
    );
    $new_query = new WP_Query($args);
    if ($new_query->have_posts()) {
      while ($new_query->have_posts()) {
        $new_query->the_post();
        $title = get_the_title();
        $id = get_the_ID();
        $price = get_field('cateling-equip-price');
        if ($price) {
          $price = safe_number_format($price);
        }
        $table_tr .= '
        <tr>
          <th><span class="inner">' . $title . '</span></th>
          <td class="amount-box">
            <span class="plan-price">' . $price . '円</span>
            <span class="form-txt">数量：</span>
            [mwform_number name="mitsumori-plan-other' . $id . '" class="c-input" min="0" step="1"]
          </td>
        </tr>
        ';
      }
    }
    wp_reset_postdata();

    $table = str_replace('[table_cont]', $table_tr, $table);

    $content = str_replace('[my_cateling_other]', $table, $content);
  }

  //+++++ オードブルオプション ++++++
  if (strpos($content, '[my_deli_option]') !== false) {
    $table = '
    <table class="c-form-table plan">
      [table_cont]
    </table>
    ';
    $table_tr = '';

    // 投稿取得
    $args = array(
      'post_type' => array('delivery-option'),
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'ASC',
      'orderby' => 'menu_order',
    );
    $new_query = new WP_Query($args);
    if ($new_query->have_posts()) {
      while ($new_query->have_posts()) {
        $new_query->the_post();
        $title = get_the_title();
        $id = get_the_ID();
        $price = get_field('deli_option_price');
        if ($price) {
          $price = safe_number_format($price);
        }
        $table_tr .= '
        <tr>
          <th><span class="inner">' . $title . '</span></th>
          <td class="amount-box">
            <span class="plan-price">' . $price . '円</span>
            <span class="form-txt">数量：</span>
            [mwform_number name="mitsumori-plan-option' . $id . '-deli" class="c-input" min="0" step="1"]
          </td>
        </tr>
        ';
      }
    }
    wp_reset_postdata();

    $table = str_replace('[table_cont]', $table_tr, $table);

    $content = str_replace('[my_deli_option]', $table, $content);
  }
  //+++++ オードブル単品ドリンク ++++++
  if (strpos($content, '[my_deli_drink]') !== false) {
    $table = '
      <table class="c-form-table plan">
        [table_cont]
      </table>
      ';
    $table_tr = '';

    // 投稿取得
    $args = array(
      'post_type' => array('delivery-drinksingle'),
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'ASC',
      'orderby' => 'menu_order',
    );
    $new_query = new WP_Query($args);
    if ($new_query->have_posts()) {
      while ($new_query->have_posts()) {
        $new_query->the_post();
        $title = get_the_title();
        $id = get_the_ID();
        $price = get_field('deli-drink-single-price');
        if ($price) {
          $price = safe_number_format($price);
        }
        $table_tr .= '
          <tr>
            <th><span class="inner">' . $title . '</span></th>
            <td class="amount-box">
              <span class="plan-price">' . $price . '円</span>
              <span class="form-txt">数量：</span>
              [mwform_number name="mitsumori-plan-drink' . $id . '-deli" class="c-input" min="0" step="1"]
            </td>
          </tr>
          ';
      }
    }
    wp_reset_postdata();

    $table = str_replace('[table_cont]', $table_tr, $table);

    $content = str_replace('[my_deli_drink]', $table, $content);
  }


  return $content;
}
add_filter('mwform_post_content_mw-wp-form-6', 'my_mwform_post_content', 10, 2);

// formバリデーション

function my_validation_rule($Validation, $data, $Data)
{

  $which_form = '';
  if ($Data->get('type') == 'mitsumori') {
    $which_form = 'mitsumori';
  } else if ($Data->get('type') == 'cta') {
    $which_form = 'cta';
  }

  // お見積りの場合
  if ($which_form == 'mitsumori') {
    $Validation->set_rule('mitsumori-name', 'noempty', array(
      'message' => '入力してください'
    ));
    $Validation->set_rule('mitsumori-kana', 'noempty', array(
      'message' => '入力してください'
    ));
    $Validation->set_rule('mitsumori-yubin', 'noempty', array(
      'message' => '入力してください'
    ));
    $Validation->set_rule('mitsumori-add01', 'noempty', array(
      'message' => '入力してください'
    ));
    // $Validation->set_rule('mitsumori-add02', 'noempty', array(
    //   'message' => '入力してください'
    // ));
    $Validation->set_rule('mitsumori-email', 'noempty', array(
      'message' => 'メールアドレスを入力してください'
    ));
    $Validation->set_rule('mitsumori-email2', 'eq', array(
      'target' => 'mitsumori-email', 'message' => "メールアドレスが一致しません"
    ));

    $Validation->set_rule('mitsumori-tel', 'noempty', array(
      'message' => '入力してください'
    ));

    // ケータリングの場合
    if ($Data->get('mitsumori-radio') == 'ケータリング') {
    }
    // オードブルの場合
    if ($Data->get('mitsumori-radio') == 'オードブルデリバリー') {
    }
  }


  // お問い合わせの場合
  if ($which_form == 'cta') {
    $Validation->set_rule('cta-name', 'noempty', array(
      'message' => '入力してください'
    ));
    $Validation->set_rule('cta-kana', 'noempty', array(
      'message' => '入力してください'
    ));
    $Validation->set_rule('cta-yubin', 'noempty', array(
      'message' => '入力してください'
    ));
    $Validation->set_rule('cta-add01', 'noempty', array(
      'message' => '入力してください'
    ));
    // $Validation->set_rule('cta-add02', 'noempty', array(
    //   'message' => '入力してください'
    // ));
    $Validation->set_rule('cta-tel', 'noempty', array(
      'message' => '入力してください'
    ));
  }
  $Validation->set_rule('cta-privacy', 'required', array(
    'message' => '同意してください'
  ));
  return $Validation;
}
add_filter('mwform_validation_mw-wp-form-6', 'my_validation_rule', 10, 3);

require_once get_template_directory() . '/inc/acf-feature-page-blocks.php';



/* --------------------------------------------
 * ACFブロックカテゴリーの登録
 * -------------------------------------------- */
if (function_exists('acf_custom_block_add')) {
  add_action('acf/init', 'acf_custom_block_add');
}
/**
 * Acf_custom_block_add
 */
function acf_custom_block_add()
{

  if (function_exists('acf_register_block_type')) {

    //枠付きリスト
    acf_register_block_type(
      array(
        'name'            => 'list01', //ブロック名を英数字で入力
        'title'           => __('枠付きリスト'), //ブロックの名前
        'description'     => __('枠付きリスト'), //ブロックの説明
        'render_template' => 'acf-blocks/acf-block/list01-block.php', //今回表示させるブロックの詳細情報が書かれているファイルまでのパス
        'category'        => 'formatting', //ブロックをどのカテゴリーに属させるか
        'icon'            => 'star-empty', //ブロックのアイコンを指定
        'keywords'        => array('リスト'), //ブロックを検索するときのキーワード
        'enqueue_style'   => get_template_directory_uri() . '/acf-blocks/acf-block-style/acf-block.css', //カスタムブロック用のCSSを書くファイルを指定
        'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
      )
    );
    //ケータリングプランリスト
    acf_register_block_type(
      array(
        'name'            => 'catering-plan', //ブロック名を英数字で入力
        'title'           => __('ケータリングプランリスト'), //ブロックの名前
        'description'     => __('ケータリングプランリスト'), //ブロックの説明
        'render_template' => 'acf-blocks/acf-block/catering-plan-block.php', //今回表示させるブロックの詳細情報が書かれているファイルまでのパス
        'category'        => 'formatting', //ブロックをどのカテゴリーに属させるか
        'icon'            => 'star-empty', //ブロックのアイコンを指定
        'keywords'        => array('ケータリングプランリスト'), //ブロックを検索するときのキーワード
        'enqueue_style'   => get_template_directory_uri() . '/acf-blocks/acf-block-style/acf-block.css', //カスタムブロック用のCSSを書くファイルを指定
        'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
      )
    );
    //オードブルプランリスト
    acf_register_block_type(
      array(
        'name'            => 'deli-plan', //ブロック名を英数字で入力
        'title'           => __('オードブルプランリスト'), //ブロックの名前
        'description'     => __('オードブルプランリスト'), //ブロックの説明
        'render_template' => 'acf-blocks/acf-block/deli-plan-block.php', //今回表示させるブロックの詳細情報が書かれているファイルまでのパス
        'category'        => 'formatting', //ブロックをどのカテゴリーに属させるか
        'icon'            => 'star-empty', //ブロックのアイコンを指定
        'keywords'        => array('オードブルプランリスト'), //ブロックを検索するときのキーワード
        'enqueue_style'   => get_template_directory_uri() . '/acf-blocks/acf-block-style/acf-block.css', //カスタムブロック用のCSSを書くファイルを指定
        'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
      )
    );
    //お問い合わせボタン
    acf_register_block_type(
      array(
        'name'            => 'cta-btn', //ブロック名を英数字で入力
        'title'           => __('お問い合わせボタン'), //ブロックの名前
        'description'     => __('お問い合わせボタン'), //ブロックの説明
        'render_template' => 'acf-blocks/acf-block/cta-block.php', //今回表示させるブロックの詳細情報が書かれているファイルまでのパス
        'category'        => 'formatting', //ブロックをどのカテゴリーに属させるか
        'icon'            => 'star-empty', //ブロックのアイコンを指定
        'keywords'        => array('お問い合わせボタン'), //ブロックを検索するときのキーワード
        'enqueue_style'   => get_template_directory_uri() . '/acf-blocks/acf-block-style/acf-block.css', //カスタムブロック用のCSSを書くファイルを指定
        'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
      )
    );
  }
}

/* --------------------------------------------
 * safe_number_format
 * -------------------------------------------- */

if (!function_exists('safe_number_format')) {
  function safe_number_format($value, int $decimals = 0, bool $i18n = false) {
    // 文字列混入（¥, 円, カンマ, 空白など）を除去
    $san = preg_replace('/[^\d\.\-]/u', '', (string)$value);

    if ($san === '' || !is_numeric($san)) {
      return ''; // 非数値は空を返す（要件に応じて '0' 等に変更）
    }

    $num = (float)$san;
    return $i18n ? number_format_i18n($num, $decimals)
      : number_format($num, $decimals);
  }
}

add_theme_support('title-tag');
