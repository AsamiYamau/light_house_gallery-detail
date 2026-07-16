<?php
$template_url = get_template_directory_uri();
$home_url = home_url();
$tel = '0120-000-000';
$tel_href = preg_replace('/[^\d+]/', '', $tel);
?>

<section class="p_feature-page-cta">
  <div class="p_feature-page-cta__box">
    <p class="p_feature-page-cta__lead">お電話でのご予約・お問い合わせ</p>
    <a href="tel:<?= esc_attr($tel_href); ?>" class="p_feature-page-cta__tel">
      <img src="<?= esc_url($template_url . '/img/template/icon_tel.svg'); ?>" alt="">
      <span><?= esc_html($tel); ?></span>
    </a>
    <p class="p_feature-page-cta__note">受付時間：平日 9:00〜18:00（土日祝休）</p>
    <div class="p_feature-page-cta__btn">
      <a href="<?= esc_url($home_url . '/contact/'); ?>" class="p_feature-page-cta__mail">メールでお問い合わせ</a>
    </div>
  </div>
</section>
