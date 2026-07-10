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
      <main class="outer-block">

        <section class="l-mv">
          <div class="l-mv__img">
            <img src="<?= $template_url; ?>/img/faq/faq-top.png" alt="">
          </div>
          <div class="l-mv__txt">
            <div class="inner-block02">
              <h1 class="l-mv__txtbox">
                <p class="en">FAQ</p>
                <p class="ja">よくある質問</p>
              </h1>
            </div>
          </div>
        </section>
        <div class="c-bread">
          <div class="inner-block">
            <ul class="c-bread-list">
              <li class="c-bread-list__li">
                <a href="<?= $home_url; ?>/" class="c-bread-list__item">トップページ</a>
              </li>
              <li class="c-bread-list__li">
                <sapn class="c-bread-list__txt">よくある質問</sapn>
              </li>
            </ul>
          </div>
        </div>

        <section class="p_faq-body c-bg bg_img">

          <?php
            //カテゴリのtermを取得
            $terms = get_terms('tax_qa');
          ?>

          <?php foreach ($terms as $i => $term): ?>
            <div class="p_faq-body__box <?php if ($i > 0) {echo 'top';} ?>">
              <div class="inner-block03">
                <div class="p_faq-body__ttl anm">
                  <h2 class="c-l-ttl">
                    <?= $term->name; ?>
                  </h2>
                </div>
                <div class="p_faq-body__cont">
                  <?php
                    // $term->term_idに紐づく投稿オブジェクトの取得 wp_query orderは管理画面の表示順
                    $args = array(
                      'post_type' => 'qa',
                      'orderby' => 'menu_order',
                      'order' => 'ASC',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'tax_qa',
                          'field' => 'term_id',
                          'terms' => $term->term_id
                        )
                      ),
                    );
                    $faq_query = new WP_Query($args);
                  ?>
                  <ul class="c-faq-list anm-list">
                    <?php while ($faq_query->have_posts()): $faq_query->the_post(); ?>
                      <li>
                      <div class="c-faq-list__item">
                        <div class="c-faq-list__q">
                          <span class="c-faq-list__dec01">Q</span>
                          <div class="c-faq-list__txtbox">
                            <p class="c-faq-list__txt01">
                              <?php the_title(); ?>
                            </p>
                            <div class="c-faq-list__btn">
                              <span></span>
                              <span></span>
                            </div>
                          </div>
                        </div>
                        <div class="c-faq-list__a" style="display: none;">
                          <span class="c-faq-list__dec02">A</span>
                          <p class="c-faq-list__txt02">
                            <?php
                              echo nl2br(get_field('faq_a'));
                            ?>
                          </p>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </section>

      </main>
    </div>
  </div>




<?php
get_footer();
