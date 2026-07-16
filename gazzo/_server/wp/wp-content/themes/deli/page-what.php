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

      <main class="outer-block p_what">
        <div class="c-mv">
          <h1 class="c-page__title">
            オードブルデリバリーとは？
            <span class="c-page__subtitle Allura">What is delivery</span>
          </h1>
        </div>
        <div class="c-bread">
          <div class="inner-block">
            <ul class="c-bread-list">
              <li class="c-bread-list__li">
                <a href="<?php echo $home_url; ?>/" class="c-bread-list__item">トップページ</a>
              </li>
              <li class="c-bread-list__li">
                <span class="c-bread-list__txt">オードブルデリバリーとは？</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="inner-block">
          <p class="c-cap">
            オードブルデリバリーは、使い捨ての容器に盛り付けられた<br>
            美味しいオードブルをお届けする便利なサービスです。
          </p>
          <div class="p_what-cont01">
            <div class="p_what-cont01__left">
              お忙しい日々の中でも、手軽に本格的な味を楽しむことができます。<br>
              特に、温かい包材に入ったアツアツのオードブルも大人気で、お気軽にご利用いただけます。<br>
              ご自宅やオフィス、パーティー会場など、お好きな場所で美味しいオードブルをお楽しみください。
            </div>
            <div class="p_what-cont01__right">
              <div class="p_what-cont01__img">
                <img src="<?php echo $home_url; ?>/wp/wp-content/uploads/2026/06/バランスプラン6品-1.jpg" alt="">
              </div>
            </div>
          </div>

          <div class="p_what-cont02">
            <div class="p_what-cont02__item">
              <div class="p_what-cont02__img">
                <img src="<?php echo $template_url; ?>/img/what/cont02-1.jpg" alt="">
              </div>
              <div class="p_what-cont02__ttl">
                ホカホカ容器でオードブル！
              </div>
              <div class="p_what-cont02__txt">
                水を注ぐだけでホカホカに！<br>
                電気やガスを使わずに、簡単に温かいオードブルを楽しめる「ホカホカ容器」が大人気です。<br>
                パーティーやイベントで大活躍すること間違いなし。
              </div>
            </div>
            <div class="p_what-cont02__item">
              <div class="p_what-cont02__img">
                <img src="<?php echo $home_url; ?>/wp/wp-content/uploads/2025/02/item01.webp" alt="">
              </div>
              <div class="p_what-cont02__ttl">
                ご一緒にドリンクもお届けします！
              </div>
              <div class="p_what-cont02__txt">
                ワイン、焼酎、ウィスキー、ハイボール、ソフトドリンクなど<br>
                豊富なドリンクを取り揃えております。
              </div>
              <div class="p_what-cont02__btn">
                <a href="<?php echo $home_url; ?>/tax_drink/" class="c-btn01">ドリンク一覧はコチラから</a>
              </div>
            </div>
          </div>

          <div class="p_what-section02">
            <div class="p_what-section02__ttl">
              <h2 class="c-ttl02">
                ケータリングと<br class="sp">オードブルデリバリーの違い
              </h2>
            </div>
            <div class="p_what-section02__cont">
              <table class="c-difference">
                <tbody><tr>
                  <th></th>
                  <th class="deli">
                    <div class="wrap">
                      <div class="txt">オードブル<br class="sp">デリバリー</div>
                    </div>
                    <!-- <div class="logo">
                      <img src="<?php echo $template_url; ?>/img/common/logo_green.svg" alt="">
                    </div> -->
                  </th>
                  <th class="cate">
                    <div class="wrap">
                      <div class="txt">ケータリング<br class="sp">サービス</div>
                    </div>
                    <!-- <div class="logo">
                      <img  src="<?php echo $template_url; ?>/img/common/mrbuffet-logo-brown.svg" alt="">
                    </div> -->
                  </th>
                </tr>
                <tr>
                  <th>
                    <div class="en pc">Overviewa</div>
                    <div class="ja big">概要</div>
                  </th>
                  <td class="deli">
                    使い捨ての容器に盛り付けられたオードブルをデリバリー。温まる包材に入ったアツアツオードブルも大人気のお気軽なサービスです。
                  </td>
                  <td class="cate">
                    料理の調理から提供、テーブルセッティングや後片付けまで、イベントの趣旨に合わせてオーダーメイドで幹事様と共に作り上げます。
                    <a target="_blank" href="https://buffet-catering.com/cateling/" class="c-btn02 bg_img">ケータリング<br class="sp">サービスはコチラ</a>
                  </td>
                </tr>
                <tr>
                  <th>
                    <div class="en pc">Recommend</div>
                    <div class="ja">こんな方におすすめ</div>
                  </th>
                  <td class="deli">
                    シェフが作った彩り豊かで美味しい料理を手軽に届けてほしい。
                  </td>
                  <td class="cate">
                    イベントの食事シーンを準備、演出、後片付けまで全て任せたい。
                  </td>
                </tr>
                <tr>
                  <th>
                    <div class="en pc">Staff</div>
                    <div class="ja big">当日常駐<br>スタッフ</div>
                  </th>
                  <td class="deli">
                    <span class="bold">なし</span>
                    配送担当が丁寧に現場までオードブルを宅配します
                  </td>
                  <td class="cate">
                    <span class="bold">あり</span>
                    事前打ち合わせから会場の設営、イベントの演出、給仕、撤収作業までスタッフが行います。
                  </td>
                </tr>
                <!-- <tr>
                  <th>
                    <div class="en pc">Price</div>
                    <div class="ja big">料金</div>
                  </th>
                  <td class="deli">
                    1,200円（税込）/人　から承っております。
                  </td>
                  <td class="cate">
                    1,980円（税込）/人　から承っております。
                  </td>
                </tr> -->
                <tr>
                  <th>
                    <div class="en pc">Minimum Order</div>
                    <div class="ja">
                      エリア別の<br>
                      最低注文金額
                    </div>
                  </th>
                  <td class="deli">
                                  エリア別に注文金額がございます。詳しくは下記からご確認下さい。
                    <a href="<?php echo $home_url; ?>/area/" class="c-btn02 bg_img deli">エリア一覧はコチラ</a>
                  </td>
                  <td class="cate">
                                   ケータリングサービスも承っております。詳しくはお問い合わせください。
                  </td>
                </tr>
                </tbody></table>
            </div>
          </div>

        </div>

      </main>

    </div>
  </div>



<?php
get_footer();
