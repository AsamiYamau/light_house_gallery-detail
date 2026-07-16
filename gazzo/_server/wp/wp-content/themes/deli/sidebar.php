<?php
global $template_url;
global $home_url;
?>

<div class="l-sidebar">
  <div class="l-sidebar__wrap">
    <div class="l-sidebar__logo pc">
      <a class="l-sidebar-logo" href="/">
        <h1 class="l-sidebar-logo__img-wrap">
          <img
            class="l-sidebar-logo__img"
            src="<?php echo $template_url; ?>/img/common/logo.png"
            alt=""
            width="180px"
            height="auto" />
        </h1>
      </a>
    </div>
    <div class="l-sidebar__list">
      <ul class="nav-list01">


        <li class="nav-list01__li js-left-button">
          <div class="nav-list01__item">
            <div class="nav-list01__icon">
              <img
                src="<?= $template_url ?>/img/common/icon_money.svg"
                alt=""
                width="28"
                height="28" />
            </div>
            <a href="<?= $home_url ?>/tax_allbudget/" class="nav-list01__jp">
              セットプラン<span class="small">から選ぶ</span>
            </a>
          </div>
          <?php
          $tax_allbudget_terms = get_terms(array(
            'taxonomy' => 'tax_allbudget',
            'hide_empty' => false,
          ));
          if ($tax_allbudget_terms[0]) :
          ?>
            <div class="nav-sub" style="top:180px;">
              <div class="nav-sub__inner">
                <div class="nav-sub__item">
                  <ul class="nav-sub-list">
                    <?php
                    foreach ($tax_allbudget_terms as $tax_allbudget_term) :
                      $tax_allbudget_term_id = $tax_allbudget_term->term_id;
                      $tax_allbudget_term_name = deli_format_price($tax_allbudget_term->name);
                      $tax_allbudget_term_link = get_term_link($tax_allbudget_term_id);
                    ?>
                      <li>
                        <a class="nav-sub-list__item" href="<?= $tax_allbudget_term_link ?>">
                          <?= $tax_allbudget_term_name ?><span class="yen">円</span>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </li>
        <!--/nav-list01__li-->
        <li class="nav-list01__li js-left-button">
          <div class="nav-list01__item">
            <div class="nav-list01__icon">
              <img
                src="<?= $template_url ?>/img/common/icon_pot.svg"
                alt=""
                width="28"
                height="28" />
            </div>
            <a href="<?= $home_url ?>/tax_single/" class="nav-list01__jp">
              単品メニュー<span class="small">から選ぶ</span>
            </a>
          </div>
          <?php
          $tax_single_terms = get_terms(array(
            'taxonomy' => 'tax_single',
            'hide_empty' => false,
          ));
          if ($tax_single_terms[0]) :
          ?>
            <div class="nav-sub" style="top:270px;">
              <div class="nav-sub__inner">
                <div class="nav-sub__item">
                  <ul class="nav-sub-list">
                    <?php
                    foreach ($tax_single_terms as $tax_single_term) :
                      $tax_single_term_id = $tax_single_term->term_id;
                      $tax_single_term_name = $tax_single_term->name;
                      $tax_single_term_link = get_term_link($tax_single_term_id);
                    ?>
                      <li>
                        <a class="nav-sub-list__item" href="<?= $tax_single_term_link ?>">
                          <span class="ja">
                            <?= $tax_single_term_name ?>
                          </span>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </li>
        <!--/nav-list01__li-->
        <li class="nav-list01__li js-left-button">
          <div class="nav-list01__item">
            <div class="nav-list01__icon">
              <img
                src="<?= $template_url ?>/img/common/icon_book.svg"
                alt=""
                width="28"
                height="28" />
            </div>
            <a href="<?= $home_url ?>/tax_series/" class="nav-list01__jp">
              シリーズ<span class="small">から選ぶ</span>
            </a>
          </div>
          <?php
          $tax_series_terms = get_terms(array(
            'taxonomy' => 'tax_series',
            'hide_empty' => false,
          ));
          if ($tax_series_terms[0]) :
          ?>
            <div class="nav-sub series" style="top : 250px;">
              <div class="nav-sub__inner">
                <div class="nav-sub__item">
                  <ul class="nav-sub-list">
                    <?php
                    foreach ($tax_series_terms as $tax_series_term) :
                      $tax_series_term_id = $tax_series_term->term_id;
                      $tax_series_term_name = $tax_series_term->name;
                      $tax_series_term_link = get_term_link($tax_series_term_id);
                      //termの説明文を取得
                      $tax_series_term_description = $tax_series_term->description;
                      //termの画像を取得
                      $tax_series_term_image = get_term_meta($tax_series_term_id, 'series_img', true);
                      $series_img = '';
                      if ($tax_series_term_image) {
                        $series_img = wp_get_attachment_url($tax_series_term_image);
                      } else {
                        $series_img = $template_url . '/img/common/no_img.jpg';
                      }
                    ?>
                      <li>
                        <a class="nav-sub-list__item" href="<?= $tax_series_term_link ?>">
                          <p class="title">
                            <?= $tax_series_term_name ?>
                          </p>
                          <div class="wrap">
                            <div class="image">
                              <img
                                src="<?= $series_img ?>"
                                alt=""
                                width="80"
                                height="84" />
                            </div>
                            <p class="text">
                              <?= nl2br($tax_series_term_description) ?>
                            </p>
                          </div>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </li>
        <li class="nav-list01__li js-left-button">
          <div class="nav-list01__item">
            <div class="nav-list01__icon">
              <img
                src="<?= $template_url ?>/img/common/icon-drink.svg"
                alt=""
                width="22"
                height="28"
                style="margin-left: 4px;" />
            </div>
            <a href="<?= $home_url ?>/tax_drink/" class="nav-list01__jp">
              ドリンク
            </a>
          </div>
          <?php
          $tax_drink_terms = get_terms(array(
            'taxonomy' => 'tax_drink',
            'hide_empty' => false,
          ));
          if ($tax_drink_terms && $tax_drink_terms[0]) :
          ?>
            <div class="nav-sub" style="top:440px;">
              <div class="nav-sub__inner">
                <div class="nav-sub__item">
                  <ul class="nav-sub-list">
                    <?php
                    foreach ($tax_drink_terms as $tax_drink_term) :
                      $tax_drink_term_id = $tax_drink_term->term_id;
                      $tax_drink_term_name = $tax_drink_term->name;
                      $tax_drink_term_link = get_term_link($tax_drink_term_id);
                    ?>
                      <li>
                        <a class="nav-sub-list__item" href="<?= $tax_drink_term_link ?>">
                          <?= $tax_drink_term_name ?>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </li>
        <li class="nav-list01__li js-left-button">
          <a href="<?php echo $home_url; ?>/what/" class="nav-list01__item">
            <div class="nav-list01__sub">オードブルデリバリーとは？</div>
          </a>
        </li>
      </ul>
      <div class="l-sidebar-buffet-banner" style="display: none;">
         <div class="l-sidebar-buffet-banner__box01">
          <p class="l-sidebar-buffet-banner__cap01">
             東京エリアのケータリング
          </p>
          <a target="_blank" href="https://buffettokyo-catering.com/" class="l-sidebar-buffet-banner__link">
            <img src="<?php echo $template_url; ?>/img/common/bannert03.png" alt="スタッフ・テーブルセッティング付きのケータリングはこちら">
          </a>
        </div>
        <div class="l-sidebar-buffet-banner__box01">
          <p class="l-sidebar-buffet-banner__cap01">
            関西エリアのケータリング
          </p>
          <a target="_blank" href="https://buffet-catering.com/" class="l-sidebar-buffet-banner__link">
            <img src="<?php echo $template_url; ?>/img/common/bannerk03.png" alt="スタッフ・テーブルセッティング付きのケータリングはこちら">
          </a>
        </div>
        <div class="l-sidebar-buffet-banner__box01">
          <p class="l-sidebar-buffet-banner__cap01">
            全国エリアのケータリング
          </p>
          <a target="_blank" href="https://catering-mrbuffet.com/" class="l-sidebar-buffet-banner__link">
            <img src="<?php echo $template_url; ?>/img/common/banner_all.jpg" alt="スタッフ・テーブルセッティング付きのケータリングはこちら">
          </a>
        </div>

      </div>
    </div>

    <div class="l-sidebar__cta pc">
      <div class="l-sidebar-cta">
        <div class="l-sidebar-cta__cap">
          「WEBサイトを見た」と<br />
          お気軽にご相談・お電話ください
        </div>
        <div class="l-sidebar-cta__tel">
          <a href="tel:0120507286" class="l-sidebar-cta__tel-wrap">
            <div class="l-sidebar-cta__tel-icon">
              <img
                src="<?= $template_url ?>/img/common/icon-tel.svg"
                alt=""
                width="22"
                height="22" />
            </div>
            <div class="l-sidebar-cta__tel-num">0120-507-286</div>
          </a>
          <div class="l-sidebar-cta__tel-bottom">営業時間 09:00~18:00</div>
        </div>
        <div class="l-sidebar-cta__button">
          <a class="c-contact-button" href="<?= $home_url ?>/contact/">
            <div class="c-contact-button__mail">
              <img
                src="<?= $template_url ?>/img/common/icon_mail.svg"
                alt=""
                width="20"
                height="16" />
            </div>
            <div class="c-contact-button__text">
              お問い合わせ<br />
              ご注文はこちら
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
