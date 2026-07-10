<?php
global $template_url;
global $home_url;
?>

<div class="p_about-sec05 anm-up">
  <div class="inner-block">
    <div class="p_about-sec05__ribon">
      <div class="c-mini-ribon"></div>
    </div>
    <div class="p_about-sec05__ttl">
      <h2 class="p_about-ttl">
        会社概要
      </h2>
    </div>
    <?php
      $pdf_img_group = get_field('pdf_img_group','option');
      if($pdf_img_group[0]):
    ?>
    <div class="p_about-sec05__slide swiper swiper-profile c-slider02">
      <ul class="swiper-wrapper">
        <?php
          foreach($pdf_img_group as $item):
        ?>
        <li class="c-slider02__item swiper-slide">
          <img src="<?= $item['pdf_img'] ?>" alt="" />
        </li>
        <?php endforeach; ?>
      </ul>
      <div class="c-slider02__nav">
        <div class="c-slider02__pagination">
          <div class="swiper-profile-prev">＜</div>
          <div class="swiper-pagination"></div>
          <div class="swiper-profile-next">＞</div>
        </div>
        <?php
          $pdf_file = get_field('pdf_file','option');
          if($pdf_file):
        ?>
        <div class="c-slider02__pdf">
          <div class="c-slider02__down">
            <a href="<?= $pdf_file ?>" download="">
              <img src="<?= $template_url ?>/img/about/icon-download.svg" alt="" />
            </a>
          </div>
          <div class="c-slider02__look">
            <a href="<?= $pdf_file ?>" target="_blank">
              <img src="<?= $template_url ?>/img/about/icon-expansion.svg" alt="" />
            </a>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>
    <?php
    $profile_group = get_field('profile_group','option');
    if($profile_group[0]):
    ?>
    <div class="p_about-sec05__prof">
      <table class="c-simple-table">
        <?php 
          foreach($profile_group as $item):

        ?>
        <tr>
          <?php if($item['profile_ttl']): ?>
          <th><?= $item['profile_ttl'] ?></th>
          <?php endif; ?>

          <?php if($item['profile_txt']): ?>
          <td><?= nl2br($item['profile_txt']) ?></td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <?php endif; ?>
  </div>
</div>