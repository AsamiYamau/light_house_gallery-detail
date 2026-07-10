<?php

global $home_url;
global $template_url;

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
          <img src="<?= $template_url; ?>/img/blog/blog-top.jpg" alt="">
        </div>
        <div class="l-mv__txt">
          <div class="inner-block02">
            <h1 class="l-mv__txtbox">
              <p class="en">Gallery</p>
              <p class="ja">ギャラリー</p>
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
              <sapn class="c-bread-list__txt">ギャラリー</sapn>
            </li>
          </ul>
        </div>
      </div>


      <div class="p_gallery-cont">
        <div class="inner-block">
          <div class="p_guide-body__lead">
            目を引く盛り付け、美しい料理の数々をお楽しみください。
            <span class="c-mini-ribon-ttl__dec">
              <span class="c-mini-ribon"></span>
            </span>
          </div>
          <?php if (have_posts()): ?>
            <ul class="l-gallery-list">
              <?php
              $i = 1;
              while (have_posts()) : the_post();
              ?>
                <li class="l-gallery-list__item js-modal-btn" data-gallery="gallery_<?= $i; ?>">
                  <?php
                  $thumb_img = '';
                  $thumb = get_the_post_thumbnail_url();
                  if ($thumb) {
                    $thumb_img = $thumb;
                  } else {
                    $thumb_img = $template_url . '/img/common/no_img.jpg';
                  }
                  ?>
                  <div class="l-gallery-list__img">
                    <img src="<?= $thumb_img ?>" alt="">
                  </div>
                  <div class="l-gallery-list__txt">
                    <div class="l-gallery-list__txt-box">
                      <div class="ttl">
                        <?php the_title(); ?>
                      </div>
                      <div class="txt">
                        <?php the_excerpt(); ?>
                      </div>
                    </div>
                  </div>

                </li>
              <?php
                $i++;
              endwhile;
              wp_reset_postdata();
              ?>
            </ul>


            <?php
            $i = 1;
            while (have_posts()) : the_post();
            ?>
              <div class="l-gallery-modal js-modal-body" data-gallery="gallery_<?= $i; ?>" style="display: none;">
                <div class="l-gallery-modal__inner modal-cont">
                  <div class="l-gallery-modal__img">
                    <?php
                    $thumb_img = '';
                    $thumb = get_the_post_thumbnail_url();
                    if ($thumb) {
                      $thumb_img = $thumb;
                    } else {
                      $thumb_img = $template_url . '/img/common/no_img.jpg';
                    }
                    ?>
                    <img src="<?= $thumb_img ?>" alt="">
                  </div>
                  <div class="l-gallery-modal__txt">
                    <div class="l-gallery-modal__txt-box">
                      <div class="ttl">
                        <?php the_title(); ?>
                      </div>
                      <div class="txt">
                        <?php the_content(); ?>
                      </div>
                    </div>
                    <?php
                    $gallery_field_ttl_txt = get_field('gallery_field_ttl_txt', $post->ID);
                    $gallery_field_table = get_field('gallery_field_table', $post->ID);
                    $gallery_field_area = get_field('gallery_field_area', $post->ID);
                    $gallery_field_contents = get_field('gallery_field_contents', $post->ID);
                    ?>
                    <?php if (!empty($gallery_field_ttl_txt) || !empty($gallery_field_table[0]) || !empty($gallery_field_area) || !empty($gallery_field_contents[0])): ?>
                      <div class="l-gallery-modal__field">
                        <div class="l-gallery-modal-field">
                          <div class="l-gallery-modal-field__ttl-area">
                            <div class="l-gallery-modal-field__txt">
                              <div class="ttl">お客様からのご要望</div>
                              <?php if (!empty($gallery_field_ttl_txt)) : ?>
                                <p class="txt">
                                  <?= nl2br($gallery_field_ttl_txt); ?>
                                </p>
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="l-gallery-modal-field__cont-wrap">
                            <?php if (!empty($gallery_field_table[0])) : ?>
                              <table class="c-table02">
                                <?php foreach ($gallery_field_table as $table) : ?>
                                  <tr>
                                    <?php if (!empty($table['gallery_field_table_ttl'])) : ?>
                                      <th>
                                        <?= $table['gallery_field_table_ttl'] ?>
                                      </th>
                                    <?php endif; ?>
                                    <?php if (!empty($table['gallery_field_table_txt'])) : ?>
                                      <td>
                                        <?= $table['gallery_field_table_txt'] ?>
                                      </td>
                                    <?php endif; ?>
                                  </tr>
                                <?php endforeach; ?>
                              </table>
                            <?php endif; ?>
                            <?php if (!empty($gallery_field_area)) : ?>
                              <div class="l-gallery-modal-field__area">会場：<?= $gallery_field_area ?></div>
                            <?php endif; ?>
                            <?php if (!empty($gallery_field_contents[0])) : ?>
                              <div class="l-gallery-modal-field__content">
                                <?php foreach ($gallery_field_contents as $content) : ?>
                                  <div class="l-gallery-modal-field__content-box">
                                    <?php if (!empty($content['gallery_field_contents_ttl'])) : ?>
                                      <div class="ttl">
                                        <?= $content['gallery_field_contents_ttl'] ?>
                                      </div>
                                    <?php endif; ?>
                                    <?php if (!empty($content['gallery_field_contents_txt'])) : ?>
                                      <p class="txt">
                                        <?= nl2br($content['gallery_field_contents_txt']) ?>
                                      </p>
                                    <?php endif; ?>
                                    <?php if (!empty($content['gallery_field_contents_img'])) : ?>
                                      <?php
                                      $img_url = $content['gallery_field_contents_img']['url'];
                                      ?>
                                      <div class="img">
                                        <img src="<?= $img_url ?>" alt="">
                                      </div>
                                    <?php endif; ?>
                                  </div>
                                <?php endforeach; ?>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="l-gallery-modal__close js-modal-close">
                    <span class="close">CLOSE</span>
                  </div>
                </div>

              </div>
            <?php
              $i++;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
      <?php endif; ?>
      <div class="c-article__page">
        <?php
        set_query_var('paging_query', $wp_query);
        get_template_part('paging');
        ?>
      </div>
      </div>

    </main>
  </div>
</div>
<?php
get_footer();
