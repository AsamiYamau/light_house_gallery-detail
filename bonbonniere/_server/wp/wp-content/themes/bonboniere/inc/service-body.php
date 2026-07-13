      <?php
$usage = $_GET['usage'] ?? '';

      // 現在のタームIDを取得（タクソノミーページの場合はID、それ以外は0）
      $current_term_id = is_tax('tax_cake_cat') ? get_queried_object_id() : 0;
      ?>
      <div class="p_service-sec01__tabs-content">
        <!-- タブ1: FOR COMPANY -->
        <?php
        $tax_query = [
          'relation' => 'AND',
          [
            'taxonomy' => 'tax_usage_type',
            'field'    => 'slug',
            'terms'    => 'for-company',
          ],
        ];

        // タームがある場合のみ追加
        if ($current_term_id) {
          $tax_query[] = [
            'taxonomy' => 'tax_cake_cat',
            'field'    => 'term_id',
            'terms'    => $current_term_id,
          ];
        }

        $query_company = new WP_Query([
          'post_type'      => 'service',
          'posts_per_page' => -1,
          'tax_query'      => $tax_query,
        ]);
        ?>
        <div class="js-tab-content <?= $usage !== 'foryou' ? 'is-active' : ''; ?> " data-tab="tab1">
          <ul class="c-product-list u-mt" style="--mt-pc: 80px; --mt-sp: 40px;">
            <?php
            if ($query_company->have_posts()) :
              while ($query_company->have_posts()) : $query_company->the_post();
                // 共通化: 商品カードの呼び出し
                get_template_part('./inc/service-item');
              endwhile;
            else:
              echo '<li class="c-product-list__item" style="width:100%; text-align:center;"><p>現在、該当する商品はありません。</p></li>';
            endif;
            wp_reset_postdata();
            ?>
          </ul>
        </div>

        <!-- タブ2: FOR YOU -->
        <?php
        $tax_query = [
          'relation' => 'AND',
          [
            'taxonomy' => 'tax_usage_type',
            'field'    => 'slug',
            'terms'    => 'for-you',
          ],
        ];

        // タームがある場合のみ追加
        if ($current_term_id) {
          $tax_query[] = [
            'taxonomy' => 'tax_cake_cat',
            'field'    => 'term_id',
            'terms'    => $current_term_id,
          ];
        }

        $query_you = new WP_Query([
          'post_type'      => 'service',
          'posts_per_page' => -1,
          'tax_query'      => $tax_query,
        ]);
        ?>
        <div class="js-tab-content <?= $usage == 'foryou' ? 'is-active' : ''; ?> " data-tab="tab2">
          <ul class="c-product-list u-mt" style="--mt-pc: 80px; --mt-sp: 40px;">
            <?php
            if ($query_you->have_posts()) :
              while ($query_you->have_posts()) : $query_you->the_post();
                // 共通化: 商品カードの呼び出し
                get_template_part('./inc/service-item');
              endwhile;
            else:
              echo '<li class="c-product-list__item" style="width:100%; text-align:center;"><p>現在、該当する商品はありません。</p></li>';
            endif;
            wp_reset_postdata();
            ?>
          </ul>
        </div>
      </div>