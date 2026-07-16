

<aside class="c-sidebar c-menu-sidebar">

<?php
  $tax_budget_terms = get_terms(array(
    'taxonomy' => 'tax_budget',
    'hide_empty' => false,
  ));
  if ($tax_budget_terms[0]) :
?>
  <section class="c-menu-sidebar__budget-per-person">
    <h2 class="c-menu-sidebar__heading">
      1人あたりの予算
      <span class="c-menu-sidebar__heading-sub">から選ぶ</span>
    </h2>
    <ul class="c-menu-sidebar__list">
      <?php
        foreach ($tax_budget_terms as $tax_budget_term) :
          $tax_budget_term_id = $tax_budget_term->term_id;
          $tax_budget_term_name = deli_format_price($tax_budget_term->name);
          $tax_budget_term_link = get_term_link($tax_budget_term_id);
      ?>
      <li class="c-menu-sidebar__item">
        <a href="<?= $tax_budget_term_link ?>" class="c-menu-sidebar__link">
          <div class="c-menu-sidebar__price-wrapper">
            <span class="c-menu-sidebar__price-range">
              <?php echo $tax_budget_term_name; ?>
            </span>
            <span class="c-menu-sidebar__unit">円</span>
          </div>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>

<?php
  $tax_allbudget_terms = get_terms(array(
    'taxonomy' => 'tax_allbudget',
    'hide_empty' => false,
  ));
  if ($tax_allbudget_terms[0]) :
?>

  <section class="c-menu-sidebar__total-budget">
    <h2 class="c-menu-sidebar__heading">
      総額予算
      <span class="c-menu-sidebar__heading-sub">から選ぶ</span>
    </h2>
    <ul class="c-menu-sidebar__list">
      <?php
        foreach ($tax_allbudget_terms as $tax_allbudget_term) :
          $tax_allbudget_term_id = $tax_allbudget_term->term_id;
          $tax_allbudget_term_name = deli_format_price($tax_allbudget_term->name);
          $tax_allbudget_term_link = get_term_link($tax_allbudget_term_id);
      ?>
      <li class="c-menu-sidebar__item">
        <a href="<?= $tax_allbudget_term_link ?>" class="c-menu-sidebar__link">
          <div class="c-menu-sidebar__price-wrapper">
            <span class="c-menu-sidebar__price-range">
              <?php echo $tax_allbudget_term_name; ?>
            </span>
            <span class="c-menu-sidebar__unit">円</span>
          </div>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>

<?php
$tax_single_terms = get_terms(array(
  'taxonomy' => 'tax_single',
  'hide_empty' => false,
));
if ($tax_single_terms[0]) :
?>
  <section class="c-menu-sidebar__single-menu">
    <h2 class="c-menu-sidebar__heading">
      単品メニュー
      <span class="c-menu-sidebar__heading-sub">から選ぶ</span>
    </h2>
    <ul class="c-menu-sidebar__list">
      <?php
        foreach ($tax_single_terms as $tax_single_term) :
          $tax_single_term_id = $tax_single_term->term_id;
          $tax_single_term_name = $tax_single_term->name;
          $tax_single_term_link = get_term_link($tax_single_term_id);
      ?>
      <li class="c-menu-sidebar__item">
        <a href="<?= $tax_single_term_link ?>" class="c-menu-sidebar__link">
            <?php echo $tax_single_term_name; ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>

<?php
  $tax_series_terms = get_terms(array(
    'taxonomy' => 'tax_series',
    'hide_empty' => false,
  ));
  if ($tax_series_terms[0]) :
?>
  <section class="c-menu-sidebar__series">
    <h2 class="c-menu-sidebar__heading">
      シリーズ
      <span class="c-menu-sidebar__heading-sub">から選ぶ</span>
    </h2>
    <ul class="c-menu-sidebar__list">
      <?php
        foreach ($tax_series_terms as $tax_series_term) :
          $tax_series_term_id = $tax_series_term->term_id;
          $tax_series_term_name = $tax_series_term->name;
          $tax_series_term_link = get_term_link($tax_series_term_id);
      ?>
      <li class="c-menu-sidebar__item">
        <a href="<?= $tax_series_term_link ?>" class="c-menu-sidebar__link">
            <?php echo $tax_series_term_name; ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>


  <?php
  $tax_drink_terms = get_terms(array(
    'taxonomy' => 'tax_drink',
    'hide_empty' => false,
  ));
  if (isset($tax_drink_terms[0])) :
    ?>
    <section class="c-menu-sidebar__single-menu">
      <h2 class="c-menu-sidebar__heading">
        ドリンク
        <span class="c-menu-sidebar__heading-sub">から選ぶ</span>
      </h2>
      <ul class="c-menu-sidebar__list">
        <?php
        foreach ($tax_drink_terms as $tax_drink_term) :
          $tax_drink_term_id = $tax_drink_term->term_id;
          $tax_drink_term_name = $tax_drink_term->name;
          $tax_drink_term_link = get_term_link($tax_drink_term_id);
          ?>
          <li class="c-menu-sidebar__item">
            <a href="<?= $tax_drink_term_link ?>" class="c-menu-sidebar__link">
              <?php echo $tax_drink_term_name; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
  <?php endif; ?>
</aside>
