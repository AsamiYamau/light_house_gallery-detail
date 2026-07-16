<?php
global $template_url;
global $home_url;
get_header();
?>

<div class="l-main">
  <div class="l-main__side pc">
    <?php get_sidebar(); ?>
  </div>
  <div class="l-main__main">
    <main class="outer-block p_guide">
      <div class="c-mv">
        <h1 class="c-page__title">
          ご利用ガイド・よくあるご質問
          <span class="c-page__subtitle Allura">Guide/Faq</span>
        </h1>
      </div>
      <div class="c-bread">
        <div class="inner-block">
          <ul class="c-bread-list">
            <li class="c-bread-list__li">
              <a href="<?= $home_url; ?>/" class="c-bread-list__item">トップページ</a>
            </li>
            <li class="c-bread-list__li">
              <span class="c-bread-list__txt">ご利用ガイド・よくあるご質問</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="inner-block">
        <p class="c-cap">
          注文からお届けまでの疑問を解決。<br class="sp">安心して美味しいオードブルを<br class="sp">お楽しみください。
        </p>
      </div>
      <div class="l-ankor p_guide__ankor">
        <ul class="l-ankor-list">
          <li class="l-ankor-list__item">
            <a href="#guide" class="l-ankor-list__link">
              <span class="txt">ご利用ガイド</span>
              <span class="ico">
            <img src="<?= $template_url; ?>/img/ico/ico_ankor.svg" alt="" />
          </span>
            </a>
          </li>
          <li class="l-ankor-list__item">
            <a href="#faq" class="l-ankor-list__link">
              <span class="txt">よくあるご質問</span>
              <span class="ico">
            <img src="<?= $template_url; ?>/img/ico/ico_ankor.svg" alt="" />
          </span>
            </a>
          </li>
        </ul>
      </div>

      <section class="p_guide-sec01" id="guide">
        <div class="inner-block">
          <h2 class="c-ttl">ご利用ガイド</h2>
          <ol class="p_guide-sec01-list">
            <li class="p_guide-sec01-list__item">
              <h3 class="p_guide-sec01-list__ttl">
            <span class="p_guide-sec01-list__ttl-ico">
              <span class="step Allura">Step</span>
              <span class="num Allura">1</span>
            </span>
                <span class="p_guide-sec01-list__ttl-txt">
              <span class="ttl">商品を選んでカートに入れる</span>
              <span class="txt">一覧ページ・詳細ページの「カートに入れる」ボタンよりカートに追加ください。</span>
            </span>
              </h3>
              <div class="p_guide-sec01-list__cont">
                <div class="img">
                  <img src="<?= $template_url; ?>/img/guide/step01.png" alt="" />
                </div>
              </div>
              <div class="p_guide-sec01-list__list">
                <div class="p_guide-box">
                  <div class="ttl c-ribon-ttl">
                    下記よりお好みのメニューをお探しいただけます。
                  </div>
                  <ul class="p_guide-btn-list">
                    <li>
                      <a href="<?= $home_url; ?>/tax_allbudget/" class="p_guide-btn-list__link c-btn-green">
                        <div class="txt">セットプランから選ぶ</div>
                        <div class="ico">
                          <img src="<?= $template_url; ?>/img/common/arrow-green.svg" alt="">
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="<?= $home_url; ?>/tax_single/" class="p_guide-btn-list__link c-btn-green">
                        <div class="txt">単品メニューから選ぶ</div>
                        <div class="ico">
                          <img src="<?= $template_url; ?>/img/common/arrow-green.svg" alt="">
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="p_guide-sec01-list__item">
              <h3 class="p_guide-sec01-list__ttl">
            <span class="p_guide-sec01-list__ttl-ico">
              <span class="step Allura">Step</span>
              <span class="num Allura">2</span>
            </span>
                <span class="p_guide-sec01-list__ttl-txt">
              <span class="ttl">レジに進み、詳細情報を入力し注文を確定</span>
              <span class="txt">「カートを見る」ボタンより、レジに進みます。<br>
                画面の流れに沿って、配達エリア・お届け先・お受け取り希望日などをご入力ください。</span>
            </span>
              </h3>
              <div class="p_guide-sec01-list__cont">
                <div class="img">
                  <img src="<?= $template_url; ?>/img/guide/step02.png" alt="" />
                </div>
                <p class="kome">※各種クレジットカードをご利用いただけます。</p>
              </div>
              <div class="p_guide-sec01-list__list">
                <div class="p_guide-box">
                  <div class="ttl c-ribon-ttl">
                    配達可能エリアは<br class="sp">こちらからご確認ください
                  </div>
                  <ul class="p_guide-btn-list">
                    <li>
                      <a href="<?= $home_url; ?>/area/" class="p_guide-btn-list__link c-btn-green">
                        <div class="txt">配達エリア一覧</div>
                        <div class="ico">
                          <img src="<?= $template_url; ?>/img/common/arrow-green.svg" alt="">
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ol>
        </div>
      </section>

      <section class="p_guide-sec02" id="faq">
        <div class="inner-block">
          <h2 class="c-ttl">よくあるご質問</h2>

          <?php
          // tax_faq のタームごとに FAQ を出力
          $faq_terms = get_terms(array(
            'taxonomy'   => 'tax_faq',
            'hide_empty' => false,
            'orderby'    => 'name',
            'order'      => 'ASC',
          ));

          if (!is_wp_error($faq_terms) && $faq_terms) :
            foreach ($faq_terms as $faq_term) :

              $faq_query = new WP_Query(array(
                'post_type'      => 'faq',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'tax_query'      => array(
                  array(
                    'taxonomy' => 'tax_faq',
                    'field'    => 'term_id',
                    'terms'    => $faq_term->term_id,
                  ),
                ),
                'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
                'no_found_rows'  => true,
              ));

              if ($faq_query->have_posts()) :
                ?>
                <div class="p_guide-sec02__cont mt">
                  <h3 class="p_guide-sec02__ttl"><?php echo esc_html($faq_term->name); ?></h3>

                  <?php while ($faq_query->have_posts()) : $faq_query->the_post();
                    $answer = class_exists('SCF') ? SCF::get('faq_a', get_the_ID()) : get_post_meta(get_the_ID(), 'faq_a', true);
                    if (!is_string($answer)) { $answer = ''; }
                    ?>
                    <div class="p_guide-sec02__aco c-aco">
                      <div class="c-aco__ttl js-aco-btn">
                        <span class="question Allura">Q.</span>
                        <span class="txt"><?php the_title(); ?></span>
                      </div>
                      <div class="c-aco__txt js-aco-body">
                        <span class="answer Allura">A.</span>
                        <span class="txt"><?php echo nl2br(esc_html($answer)); ?></span>
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php
              endif;
              wp_reset_postdata();
            endforeach;
          endif;
          ?>

        </div>


        </section>

        <div class="p_guide-table">
          <div class="inner-block">
            <table class="c-table">
              <tr>
                <th>お届け日時</th>
                <td>
                  お届け日時については、カード内で注文時に選択をしてください。<br>
                  ご利用日5日前12:00迄にご予約をお願いいたします。
                </td>
              </tr>
              <tr>
                <th>ご注文キャンセルについて</th>
                <td>
                  ・5日前17時までのキャンセルは無料<br>
                  ・3日前の12時までのキャンセルは代金の50％<br>
                  ・それ以降、当日を含むキャンセルは代金の100％<br>
                  を頂戴いたします。尚、数のご変更は可能な限り対応致します。
                </td>
              </tr>
              <tr>
                <th>返品について</th>
                <td>
                  商品の性質上、返品はお受けできませんので、予めご了承くださいませ。<br>
                  100個を超えるご注文の場合、注文確認書に記載していただき、キャンセルポリシーの確認欄を承認ください。<br>
                
                </td>
              </tr>
            </table>
          </div>
      </div>
    </main>

  </div>
</div>



<?php
get_footer();
