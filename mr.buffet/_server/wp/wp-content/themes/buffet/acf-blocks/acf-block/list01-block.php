
<?php
global $template_url;

//カスタムフィールド名link-card
$list01_group = (get_field( 'block_list01_group' ))?:[];
?>

<!-- p-link-block -->
<?php if($list01_group[0]): ?>
  <ul class="c-block-list01">
    <?php foreach($list01_group as $item): ?>
    <li class="c-block-list01__item">
      <?= $item['block_list01_item'] ?>
    </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
<!-- /p-link-block -->