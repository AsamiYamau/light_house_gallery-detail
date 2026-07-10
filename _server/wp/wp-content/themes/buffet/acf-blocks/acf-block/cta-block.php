<?php
global $template_url;
global $home_url;

//カスタムフィールド名link-card
$cta_btn = (get_field('block_cta_btn')) ?: [];
?>

<!-- p-link-block -->
<?php
if ($cta_btn == 'cta_btn01') :
?>
  <div class="l-sidebar-cta__btn block-item">
    <a class="c-contact-btn" href="<?= $home_url; ?>/contact/">
      <div class="c-contact-btn__mail">
        <img src="<?= $template_url; ?>/img/common/icon-mail.svg" alt="" class="cate">
      </div>
      <div class="c-contact-btn__txt">
        お問い合わせ<br>
        ご注文はこちら
      </div>
    </a>
  </div>
<?php endif; ?>
<?php
if ($cta_btn == 'cta_btn02') :

?>
  <div class="p_home-sec06__btn">
    <a href="<?= $home_url ?>/contact/?type=cta" class="c-dec-btn pat-contact">
      <span class="jp">問い合わせはこちら</span>
      <span class="en Allura">Contact</span>
      <span class="dec">View More</span>
    </a>
  </div>
<?php endif; ?>
<?php
if ($cta_btn == 'cta_btn03') :
?>
  <div class="p_home-sec06__btn">
    <a href="<?= $home_url ?>/contact/" class="c-dec-btn pat-estimate">
      <span class="jp">簡単見積りはこちら</span>
      <span class="en Allura">Estimate</span>
      <span class="dec">View More</span>
    </a>
  </div>
<?php endif; ?>
<?php
if ($cta_btn == 'cta_btn04') :
?>
  <div class="p_contact__tel-box block-item">
    <a href="tel:0120507286" class="p_contact-tel">
      <div class="p_contact-tel__tel">
        <div class="ico">
          <img src="<?= $template_url ?>/img/common/icon-tel-white.svg" alt="">
        </div>
        <div class="num">0120-507-286</div>
      </div>
      <div class="p_contact-tel__txt">
        営業時間<br>
        09:00~19:00
      </div>
    </a>
  </div>
<?php endif; ?>
<!-- /p-link-block -->