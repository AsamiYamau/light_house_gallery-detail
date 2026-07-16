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
    <main class="p_about">
      <!-- fv -->
      <section class="p_about-fv">
        <!-- ロゴ -->
        <div class="p_about-fv__logo">
          <img
            src="<?php echo $template_url; ?>/img/common/logo.png"
            alt=""
            class="p_about-fv__logo-image" />
        </div>

        <!-- メインテキスト -->
        <h1 class="p_about-fv__title">
          私たちのプライド。<br />
          <br />
          私たちは、ただ料理を提供する業者ではありません。ご注文を頂いた瞬間からパーティの成功を考え、「楽しいパーティだった！」と思っていただけるよう、味・盛り付けに妥協せず、丁寧に配送させていただきます。<br />
          <br />
          「またガッツォに頼みたい」<br />
          その言葉を頂けるよう、従業員一同プライドを持って毎日の仕事に励んでいます。
        </h1>
      </section>

      <!-- promise -->
      <section class="p_about-promise">
        <div class="p_about__inner">

          <div class="p_about__title">
            <h2 class="c-title anm">
                <span class="circle">
                  <span class="logo"><img
                      src="<?= $template_url ?>/img/common/icon-three01.svg"
                      alt=""
                      width=""
                      height="" /></span>
                  <span class="quadra">
                    PROMISE
                  </span>
                  <span class="ja">約束</span>
                </span>
            </h2>
          </div>
          <p class="p_about__description">
            美味しくて、オシャレなのは当たり前。<br />
            ガッツォは、お客様のパーティを素晴らしいものにするために、お客様との「約束」を守り抜きます。
          </p>
          <ul class="p_about-promise__list">
            <li class="p_about__item p_about-promise-item">
              <p class="p_about__promise-title-wrapper">
                <span class="p_about__promise-title">PROMISE</span>
                <span class="p_about__number">01</span>
              </p>
              <div class="p_about__image-wrapper">
                <img
                  src="<?php echo $template_url; ?>/img/about/about-promise-img01.jpg"
                  alt="盛り付けたオードブル"
                  class="p_about__image" />
              </div>
              <h3 class="p_about__subtitle">
                面倒なご準備は不要！<br />
                おしゃれで便利な使い捨て容器に、プロのシェフが綺麗に盛り付けたオードブルをお届けします。
              </h3>
              <div class="p_about__text-wrapper">
                <p class="p_about__text">
                  食器の準備や後片付けの手間も必要ありません。
                </p>
                <p class="p_about__text">
                  届いたらすぐにテーブルへ並べるだけで、華やかなパーティや会食が簡単にスタート！
                </p>
              </div>
            </li>
            <li class="p_about__item p_about-problem__item">
              <p class="p_about__promise-title-wrapper">
                <span class="p_about__promise-title">PROMISE</span>
                <span class="p_about__number">02</span>
              </p>
              <div class="p_about__image-wrapper">
                <img
                  src="<?php echo $template_url; ?>/img/about/about-promise-img02.jpg"
                  alt="アツアツのオードブル"
                  class="p_about__image" />
              </div>
              <h3 class="p_about__subtitle">
                あなたのパーティーへ丁寧に配送！<br />
                アツアツのオードブルで素敵なひと時を演出させていただきます。
              </h3>
              <div class="p_about__text-wrapper">
                <p class="p_about__text">
                  ガッツォのオードブルデリバリーサービスで、パーティをもっと温かく、もっと楽しく！
                </p>
                <p class="p_about__text">
                  彩り豊かで美味しい料理を、シェフが心を込めて調理し、温かさを保つ包材に入れてお届けします。
                </p>
                <p class="p_about__text">
                  熱々の料理がテーブルを彩り、ゲストとの素敵なひとときを演出します。
                </p>
              </div>
            </li>
          </ul>
          <div class="p_about-promise__button-wrapper">
            <a href="<?php echo $home_url; ?>/area/" class="p_about-promise__button">配送可能エリア一覧はコチラ</a>
          </div>
          <p class="p_about-promise__note">
            ※<span class="p_about-promise__note-highlight">配送対象エリアおよびエリアごとの最低注文金額（税込）</span>がございます。<br />
            詳細をご確認の上、お気軽にご注文ください。
          </p>
        </div>
      </section>

      <!-- style -->
      <section class="p_about-style">
        <div class="p_about__inner">
          <div class="p_about__title">
            <h2 class="c-title anm">
                <span class="circle">
                  <span class="logo"><img
                      src="<?= $template_url ?>/img/common/icon-three01.svg"
                      alt=""
                      width=""
                      height="" /></span>
                  <span class="quadra">
                    STYLE
                  </span>
                  <span class="ja">こだわり</span>
                </span>
            </h2>

          </div>
          <p class="p_about__description">
            ガッツォは料理・見た目にとことんこだわります。
            見栄え、味、温度、そして安全。美味しく華やかなメニューでパーティを彩ります。
          </p>
          <ul class="p_about-style__list">
            <li class="p_about__item p_about-style__item">
              <div class="p_about__image-wrapper">
                <img
                  src="<?php echo $template_url; ?>/img/about/about-style-img01.jpg"
                  alt="盛り付けたオードブル"
                  class="p_about__image" />
              </div>
              <h3 class="p_about__subtitle">
                徹底的に安全な食事の提供にこだわります。
              </h3>
              <div class="p_about__text-wrapper">
                <p class="p_about__text">
                  とにもかくにもオードブルデリバリーは安全が第一です。ガッツォでは、調理師免許を持つプロのシェフが徹底的な衛生管理の下、お客様の料理をすべてお作りします。
                </p>
                <p class="p_about__text">
                  格安のフードデリバリーでありがちな、見た目だけはオシャレだけど実は素人・アルバイトが冷凍食品だけで作っているというものでなく、「美味しい・オシャレ・安全」の三拍子そろった料理をお届けします。
                </p>
              </div>
            </li>
            <li class="p_about__item p_about-style__item">
              <div class="p_about__image-wrapper">
                <img
                  src="<?php echo $template_url; ?>/img/about/about-style-img02.jpg"
                  alt="アツアツのオードブル"
                  class="p_about__image" />
              </div>
              <h3 class="p_about__subtitle">
                アツアツの料理を提供します。
              </h3>
              <div class="p_about__text-wrapper">
                <p class="p_about__text">
                  ガッツォでは、「アツアツ料理の提供」にとことんこだわっています。
                </p>
                <p class="p_about__text">
                  ほぼ全てのプランにアツアツメニューを投入し、これまでのオードブルデリバリーとは一線を画した本物の料理を提供します。熱々の料理がテーブルを彩り、ゲストとの素敵なひとときを演出します。
                </p>
              </div>
            </li>
            <li class="p_about__item p_about-style__item">
              <div class="p_about__image-wrapper">
                <img
                  src="<?php echo $template_url; ?>/img/about/about-style-img03.jpg"
                  alt="アツアツのオードブル"
                  class="p_about__image" />
              </div>
              <h3 class="p_about__subtitle">
                思わず写真に撮りたくなる食事にこだわります。
              </h3>
              <div class="p_about__text-wrapper">
                <p class="p_about__text">
                  私たちはお客様がお料理を開けた瞬間の「うわー綺麗！！」と輝く表情が大好きです。その表情を見るために、味はもちろんのこと、盛り付けまで含めて徹底的にこだわります。
                </p>
                <p class="p_about__text">
                  美味しいは当たり前、美しく心に残り、皆が写真に撮りたくなるオードブルデリバリーを目指します。
                </p>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <!-- achievement -->
      <section class="p_about-achievement">
        <div class="p_about__inner">
          <div class="p_about-achievement__content">
            <div class="p_about-achievement__info">
              <img
                class="p_about-achievement__icon"
                src="<?php echo $template_url; ?>/img/about/about-crown-icon.svg"
                alt="王冠" />
              <p class="p_about-achievement__text">
                パーティ運営実績
                <span
                  class="p_about-achievement__number">
                  3<span
                    class="p_about-achievement__separator">,</span>000
                  <span
                    class="p_about-achievement__unit">件</span>
                </span>
                <span class="p_about-achievement__sup">突破！</span>
              </p>
            </div>
            <p class="p_about-achievement__description">
              企業様の歓送迎会や来賓招待客を招くレセプションパーティーを中心に、ウェディング、映画・芸能・音楽関係のロケ、スポーツ・アウトドア関係、飲食店様など、様々な場面でご利用いただいております。<br />
              どの業種の方からも「ガッツォに依頼してよかった！またお願いします」とリピートいただくことがほとんどです。大切な社員、お客様のために、ぜひ一度ご利用ください。
            </p>
          </div>
          <div class="p_about-achievement__industries">
            <h2
              class="p_about-achievement__industries-title">
              クライアント様の業種例
            </h2>
            <p class="p_about-achievement__industries-list">
              旅行代理店、各種IT企業、アパレル、外資系保険代理店、高級自動車販売、芸能関連、ブライダル、郵便局、ホテル、屋形船、空港、商工会議所、高級時計販売、ジュエリーショップ、不動産賃貸、不動産売買、民泊、建設業、部品メーカー、飲食店、BAR、レンタルスペース、イベント会社、総合保険代理店、美容室、美容商品メーカー、ボディメイキングスタジオ、ダイビングショップ、ドライビングスクール、ゴルフスタジオ、社交ダンススタジオ、IR事業、老人施設、弁護士事務所、歯科医師団体、病院、ほか多数。
            </p>
          </div>
          <div class="p_about-achievement__image-wrapper">
            <img
              class="p_about-achievement__image"
              src="<?php echo $template_url; ?>/img/about/about-achievement-img01.png"
              alt="パーティー準備の画像" />
          </div>
        </div>
      </section>

      <!-- company -->
      <section class="p_about-company">
        <div class="p_about__inner">
          <h2 class="p_about-company__title">会社概要</h2>
          <div class="p_about_company-banner" style="margin-top:2em;margin-bottom:2em;">
            <a href="https://lit-house.jp/" target="_blank" style="display:block;margin:auto;width:100%;max-width:540px;">
              <img src="<?php echo $template_url; ?>/img/about/company-banner.png" alt="">
            </a>
          </div>

          <ul class="c-info-list">
            <li class="c-info-list__item">
              <h2 class="c-info-list__title">会社名</h2>
              <p class="c-info-list__description">
                株式会社 Light House
              </p>
            </li>
            <li class="c-info-list__item">
              <h2 class="c-info-list__title">
                代表取締役
              </h2>
              <p class="c-info-list__description">
                春日大輝
              </p>
            </li>
            <li class="c-info-list__item">
              <h2 class="c-info-list__title">オフィス</h2>
              <p class="c-info-list__description">
                本社：足立区千住橋戸町４９-１F<br>
                東京セントラルキッチン：足立区千住橋戸町４９-１F<br>
                大阪セントラルキッチン：大阪市東成区玉津２丁目５−２９<br>
              </p>
            </li>
            <li class="c-info-list__item">
              <h2 class="c-info-list__title">事業内容</h2>
              <ul class="c-info-list__payment">
                <li class="c-info-list__payment-item">
                  観光地スイーツ店舗事業
                </li>
                <li class="c-info-list__payment-item">
                  パーティケータリング事業
                </li>
                <li class="c-info-list__payment-item">
                  フードデリバリーボランタリーチェーン「HAREグループ」の運営
                </li>
                <li class="c-info-list__payment-item">
                  経営コンサルティング事業
                </li>
              </ul>
            </li>
            <li class="c-info-list__item">
              <h2 class="c-info-list__title">営業時間</h2>
              <p
                class="c-info-list__description c-info-list__indent">
                9:00~18:00
              </p>
            </li>
          </ul>
        </div>
      </section>
    </main>

  </div>
</div>



<?php
get_footer();
