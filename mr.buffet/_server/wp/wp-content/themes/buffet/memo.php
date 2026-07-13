  <!-- tab切り替え・form -->
  <div class="p_contact__form">
    <!-- tabボタン -->
    <div class="p_contact-tab">
      <div class="p_contact-tab__btn js-tab-btn active bg_img" data-tab="cta">お問い合わせ・<br class="sp">ご質問</div>
      <div class="p_contact-tab__btn js-tab-btn" data-tab="mitsumori">お見積り</div>
    </div>
    <!-- /tabボタン -->
    [mwform_hidden name="type" value="cta"]
    <div class="p_contact-message">
      ※商品内容など詳細が決まっていない場合はお気軽にお問い合わせからご連絡ください。
    </div>

    <div class="p_contact-deli-link">
      <a href="https://buffet-delivery.com/" class="p_contact-deli-link__box" target="_blank">
        <img src="[template_url]/img/delivery/mv_txt.png" alt="">
        <span class="p_contact-deli-link__txt">オードブルのご注文はこちら</span>
      </a>
    </div>
    <!-- tab body -->
    <div class="p_contact-body js-tab-body" data-tab="mitsumori">

      <table class="c-form-table">
        <tbody class="">
          <tr>
            <th><span class="inner">企業名</span></th>
            <td class="validate-box">
              [mwform_text name="mitsumori-company" class="c-input" size="60" placeholder="Mr.buffet"]
              　　　　　　　</td>
          </tr>
          <tr>
            <th><span class="inner">名前<span>必須</span></span></th>
            <td class="validate-box">
              [mwform_text name="mitsumori-name" class="c-input" size="60" placeholder="山田　太郎"]
            </td>
          </tr>
          <tr>
            <th><span class="inner">ふりがな<span>必須</span></span></th>
            <td class="validate-box">
              [mwform_text name="mitsumori-kana" class="c-input" size="60" placeholder="やまだ　たろう"]
              　　　　　　　</td>
          </tr>
          <tr>
            <th><span class="inner">住所<span>必須</span></span></th>
            <td class="validate-box">
              <div class="h-adr add-box mitsumori-h-adr">
                <span class="p-country-name" style="display:none;">Japan</span>
                <div class="yubin">
                  <span class="yubin-ico">〒</span>
                  [mwform_text name="mitsumori-yubin" class="p-postal-code c-input small" size="60" placeholder="1230000"]
                  <div class="add-search-btn postal-search bg_img">住所検索</div>
                </div>

                <div class="add01 flex sp_block">
                  <span class="form-txt">市区町村・番地</span>
                  [mwform_text name="mitsumori-add01" class="p-region p-locality p-street-address p-extended-address c-input" size="60"]
                </div>
                <div class="add02 flex sp_block">
                  <span class="form-txt">建物名・部屋番号</span>
                  [mwform_text name="mitsumori-add02" class="c-input" size="60"]
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th><span class="inner">メールアドレス<span>必須</span></span></th>
            <td class="validate-box notice">
              [mwform_email name="mitsumori-email" size="60" class="c-input" data-conv-half-alphanumeric="true" placeholder="example@gmail.com"]
              <div class="mw_wp_form_confirm-none">
                [mwform_email name="mitsumori-email2" size="60" class="c-input email2" data-conv-half-alphanumeric="true" placeholder="確認のためもう一度メールアドレスを入力してください。"]
              </div>

            </td>
          </tr>
          <tr>
            <th><span class="inner">電話番号<span>必須</span></span></th>
            <td class="validate-box notice">
              [mwform_text name="mitsumori-tel" size="60" class="c-input" placeholder="00000000"]
            </td>
          </tr>
          <tr>
            <th><span class="inner">実施日</span></th>
            <td class="validate-box notice flex sp_block">
              <div class="date-pick flex">
                <div class="ico">
                  <img src="[template_url]/img/contact/date.png" alt="">
                </div>
                [mwform_datepicker name="mitsumori-date" size="30" class="c-input mini" placeholder="0000/00/00"]
              </div>
              <div class="time flex">
                <div class="ico">
                  <img src="[template_url]/img/contact/time.png" alt="">
                </div>
                [mwform_text name="mitsumori-time" class="c-input mini" size="60" placeholder="10:00"]
                <span class="form-txt">時から開始予定</span>
              </div>

            </td>
          </tr>
          <tr>
            <th class="top"><span class="inner">予定人数</span></th>
            <td class="validate-box notice flex">
              [mwform_text name="mitsumori-num" class="c-input small mr" size="60"]
              <span class="form-txt">人</span>
            </td>
          </tr>
          <tr>
            <th class="top"><span class="inner">ご希望のプラン<span>必須</span></span></th>
            <td class="validate-box notice">

              <span class="mwform-radio-field horizontal-item">
                <label>
                  [mwform_radio name="mitsumori-radio" children="ケータリング" class="check-btn js-radio" value="ケータリング"]

                </label>
              </span>
              <div class="p_contact-deli-link">
                <a href="https://buffet-delivery.com/" class="p_contact-deli-link__box" target="_blank">
                  <img src="[template_url]/img/delivery/mv_txt.png" alt="">
                  <span class="p_contact-deli-link__txt">オードブルのご注文はこちら</span>
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- cateling deliだしわけ -->
      <div class="p_contact-plan">
        <div class="p_contact-plan__ttl js-radio-change">ケータリングご利用メニュー</div>

        <!-- ケータリングフォーム -->
        <div class="p_contact-plan__cateling js-form" data-plan="cateling" id="cateling">
          <div class="c-form-plan-box">
            <div class="c-form-plan-box__ttl" data-aco="cate_aco01">
              <div class="ttl no_aco">プラン・ドリンクプラン</div>
            </div>
            <div class="c-form-plan-box__body" data-aco="cate_aco01">
              <table class="c-form-table">
                <tr>
                  <th><span class="inner">プラン<span>必須</span></span></th>
                  <td>
                    <div class="c-select">

                      [mwform_select name="mitsumori-plan-plan" children=""]
                    </div>
                  </td>
                </tr>
                <tr>
                  <th><span class="inner">ドリンク</span></th>
                  <td>
                    <div class="c-select">
                      [mwform_select name="mitsumori-plan-drink" children=""]
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="c-form-plan-box">
            <div class="c-form-plan-box__ttl js-aco-btn" data-aco="cate_aco02">
              <div class="ttl">オプションプラン</div>
            </div>
            <div class="c-form-plan-box__body js-aco-body" data-aco="cate_aco02" style="display: none;">
              [my_cateling_option]
            </div>
          </div>
          <div class="c-form-plan-box">
            <div class="c-form-plan-box__ttl js-aco-btn" data-aco="cate_aco03">
              <div class="ttl">単品ドリンク</div>
            </div>
            <div class="c-form-plan-box__body js-aco-body" data-aco="cate_aco03" style="display: none;">
              [my_cateling_drink]
            </div>
          </div>
          <div class="c-form-plan-box">
            <div class="c-form-plan-box__ttl js-aco-btn" data-aco="cate_aco04">
              <div class="ttl">什器・備品</div>
            </div>
            <div class="c-form-plan-box__body js-aco-body" data-aco="cate_aco04" style="display: none;">
              [my_cateling_other]
            </div>
          </div>
          <div class="c-form-plan-box">
            <table class="c-form-table">
              <tr>
                <th>ご要望</th>
                <td>
                  [mwform_textarea name="mitsumori-plan-cont" class="c-textarea" cols="50" rows="5"]
                </td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /ケータリングフォーム -->


      </div>
      <!-- /cateling deliだしわけ -->
    </div>

    <div class="p_contact-body js-tab-body" data-tab="cta" style="display: none;">

      <table class="c-form-table">
        <tbody>
          <tr>
            <th><span class="inner">企業名</span></th>
            <td class="validate-box">
              [mwform_text name="cta-company" class="c-input" size="60" placeholder="Mr.buffet"]
            </td>
          </tr>
          <tr>
            <th><span class="inner">名前<span>必須</span></span></th>
            <td class="validate-box">
              [mwform_text name="cta-name" class="c-input" size="60" placeholder="山田　太郎"]

            </td>
          </tr>
          <tr>
            <th><span class="inner">ふりがな<span>必須</span></span></th>
            <td class="validate-box">
              [mwform_text name="cta-kana" class="c-input" size="60" placeholder="やまだ　たろう"]

            </td>
          </tr>
          <tr>
            <th><span class="inner">住所<span>必須</span></span></th>
            <td class="validate-box">
              <div class="h-adr add-box cta-h-adr">
                <span class="p-country-name" style="display:none;">Japan</span>
                <div class="yubin">
                  <span class="yubin-ico">〒</span>
                  [mwform_text name="cta-yubin" class="p-postal-code c-input small" size="60" placeholder="1230000"]
                  <div class="add-search-btn postal-search bg_img">住所検索</div>
                </div>

                <div class="add01 flex sp_block">
                  <span class="form-txt">市区町村・番地</span>
                  [mwform_text name="cta-add01" class="p-region p-locality p-street-address p-extended-address c-input" size="60"]
                </div>
                <div class="add02 flex sp_block">
                  <span class="form-txt">建物名・部屋番号</span>
                  [mwform_text name="cta-add02" class="c-input" size="60"]
                </div>
              </div>
            </td>

          </tr>
          <tr>
            <th><span class="inner">メールアドレス<span>必須</span></span></th>
            <td class="validate-box notice">
              [mwform_email name="cta-email" size="60" class="c-input" data-conv-half-alphanumeric="true" placeholder="example@gmail.com"]
              <div class="mw_wp_form_confirm-none">
                [mwform_email name="cta-email2" size="60" class="c-input email2" data-conv-half-alphanumeric="true" placeholder="確認のためもう一度メールアドレスを入力してください。"]
              </div>

            </td>
          </tr>
          <tr>
            <th><span class="inner">電話番号<span>必須</span></span></th>
            <td class="validate-box notice">
              [mwform_text name="cta-tel" size="60" class="c-input" placeholder="00000000"]

            </td>
          </tr>
          <tr>
            <th><span class="inner">お問い合わせ内容<span>必須</span></span></th>
            <td class="validate-box notice">
              [mwform_radio name="cta-radio" children="ケータリングについて,オードブルについて,どちらか迷っている,その他" value="ケータリングについて"]

            </td>
          </tr>
          <tr>
            <th class="top"><span class="inner">お問い合わせ・ご質問内容</span></th>
            <td class="validate-box notice">
              [mwform_textarea name="cta-cont" class="c-textarea" cols="50" rows="5"]
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /tab body -->

    <!-- 同意・送信 -->
    <div class="p_contact-bottom">
      <div class="inner-block">
        <div class="p_contact-bottom__txt mw_wp_form_confirm-none">
          お客様にご入力いただいた個人情報は、弊社プライバシーポリシーに基づき厳重に管理します。下記の「個人情報の利用目的」をご一読いただき、了承の上、送信してください。
        </div>
        <div class="p_contact-bottom__policy mw_wp_form_confirm-none">
          <div class="ttl">個人情報の利用目的</div>
          <ul class="p_contact-policy-list">
            <li class="p_contact-policy-list__item">
              ・お客様のご要望に合わせたサービスをご提供するための各種ご連絡
            </li>
            <li class="p_contact-policy-list__item">
              ・お問い合わせいただいたご質問への回答のご連絡。
            </li>
            <li class="p_contact-policy-list__item">
              ・取得した個人情報は、ご本人の同意なしに目的以外では利用しません。
            </li>
            <li class="p_contact-policy-list__item">
              ・情報が漏洩しないよう対策を講じ、スタッフを監督します。
            </li>
            <li class="p_contact-policy-list__item">
              ・ご本人の同意を得ずに第三者に情報を提供しません。
            </li>
            <li class="p_contact-policy-list__item">
              ・ご本人からの求めに応じ情報を開示します。
            </li>
            <li class="p_contact-policy-list__item">
              ・個人情報が事実と異なる場合、訂正や削除に応じます。
            </li>
            <li class="p_contact-policy-list__item">
              ・個人情報の取り扱いに関する苦情に対し、適切・迅速に対処します。
            </li>

          </ul>
        </div>
        <div class="p_contact-privacy">
          <span class="mwform-checkbox-field horizontal-item">
            <label>
              <span class="inner"><span class="privacy-tag">必須</span></span>
              [mwform_checkbox name="cta-privacy" children="「個人情報の利用目的」に同意します。" separator=","]
            </label>
          </span>
        </div>
        <div class="p_contact-bottom__btn">
          [mwform_bback class="c-btn03 back" value="back"]戻る[/mwform_bback]
          [mwform_bconfirm class="c-btn03 confirm" value="confirm"]内容を確認する[/mwform_bconfirm]
          [mwform_bsubmit class="c-btn03 submit" value="send"]送信する[/mwform_bsubmit]
        </div>
      </div>
    </div>
    [mwform_hidden name="recaptcha-v3"]
    [mwform_error keys="recaptcha-v3"]

  </div>
  <!-- /tab切り替え・form -->