<?php
  $product_id = get_query_var('product_id');
  $cart_btn_class = get_query_var('cart_btn_class');
?>
<!-- add to cart -->
<div class="item_detail_info" align="right">
  <!-- デリカート側の商品IDを反映 -->
  <input type="hidden" value="<?php echo $product_id; ?>" class="item_detail_item_id">
  <div class="variations"></div>
  <p class="item_detail_number" style="margin-bottom: 0;">
    数量: <br class="sp"><button data-input-stepper-decrease>-</button>
    <input class="item-num" size="3" type="type" min="1">
    <button data-input-stepper-increase>+</button>
  </p>
  <!-- カートにいれるの画像を出力 -->
<!--  <div class="info_group" id="item_detail_cart">-->
<!--    <a class="add" href="javascript:void(0)" ><img src="//〇〇.png"></a>-->
<!--  </div>-->

  <button id="item_detail_cart" type="button" class="add c-menu-item-cart-button">
    カートに入れる
  </button>

</div>
<!-- //add to cart -->