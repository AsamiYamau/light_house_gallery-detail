<!-- 埋め込みタグ①-->
<link rel="stylesheet" href="//www.deli-cart.net/public/external/css/jquery.insertCart.css">
<link rel="stylesheet" href="//www.deli-cart.net/public/external/css/jquery.obentoCart.css">
<script type="text/javascript" src="//www.deli-cart.net/public/external/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//www.deli-cart.net/public/external/js/jquery.insertVariations.js"></script>
<script type="text/javascript" src="//www.deli-cart.net/public/thirdparty/js/jquery.input-stepper.js"></script>
<script type="text/javascript" src="//www.deli-cart.net/public/external/jquery.externalObentoCartJsonp.js"></script>
<script type="text/javascript" src="//www.deli-cart.net/public/external/checkUserAgentJsonp.js"></script>
<style type="text/css">
  #open {
    /*position: fixed;*/
    /*cursor: pointer;*/
    /*text-align: center;*/
    /*right: 0;*/
    /*top:50px;*/
    /*z-index: 99;*/
    /*display: none;*/
  }
  @media screen and (max-width: 480px) {
    /*#open {*/
    /*  position: fixed;*/
    /*  text-align: center;*/
    /*  right: 0;*/
    /*  top:20px;*/
    /*  z-index: 99;*/
    /*  display: none;*/
    /*}*/
  }
  #cartbtn_close_box{border-radius: 30px;border-width:1px}
  #cartbtn_close{height:55px}
</style>
<script type="text/javascript">

  var delcart_global_cuser = 'C0016318';//店舗ID

  var $j203 = $.noConflict(true);
  (function($) {

    $(function(){
      var ua = window.navigator.userAgent;
      var sp = 0;

      if(ua.indexOf('iPhone') >= 0 || ua.indexOf('Android') >= 0) {
        // $('#open').html('<img src="//s-plat.info/cartdemo/_userdata/btn-cart.png" id="cart-btn">');//スマホ用のカートを見るボタン画像パス
        sp=1;
      }

      if (checkUserAgent(ua)) {
        $('#open').show();

        var cart = $( '#open' ).externalObentoCart({
          host:'https://www.deli-cart.net' ,//固定
          color: '#EA7100', //カートエリア展開時の枠線の色を変更できます。
          cuser: delcart_global_cuser,
          buttonhtml:
            '<div><span style="background-image: url(\'//s-plat.info/cartdemo/_userdata/btn-cart-susumu.png\');"></span></div>'
        });
        //
        $('#open #cart-btn, #cartbtn_close').on('click', function() {
          cart.toggle();
          if(sp == 0){
            // $('#cart-btn').toggleClass('cart-on');
          }
        });
        $('.add').click(function (event) {
          var click_index = $('.add').index(this);
          var item_id = $('.item_detail_info .item_detail_item_id').eq(click_index).val();
          var item_num = $('.item_detail_info .item_detail_number input').eq(click_index).val();
          var parent = $(this).parents('.item_detail_info');

          var variation_select = parent.find('.variations').children('.variation');
          var variation = '';
          variation_select.each(function(i, element) {
            if (i != 0) {
              variation += '/';
            }
            variation += $(element).val();
          });
          if(sp == 0){
            $('#open #cart-btn').addClass('cart-on');
          }
          cart.addItem(item_id, variation, item_num).show();
        });
      } else {
        $('.add').click(function (event) {
          var click_index = $('.add').index(this);
          var item_id = $('.item_detail_info .item_detail_item_id').eq(click_index).val();
          var item_num = $('.item_detail_info .item_detail_number input').eq(click_index).val();
          var url = '//www.deli-cart.net/api/cart/add?cuser='+ delcart_global_cuser + '&item=' + item_id + '&num=' + item_num;
          var parent = $(this).parents('.item_detail_info');

          var variation_select = parent.find('.variations').children('.variation');
          var variation = '';
          variation_select.each(function(i, element) {
            if (i != 0) {
              variation += '/';
            }
            variation += $(element).val();
          });
          if (variation) {
            url += '&variation=' + variation;
          }
          location.href = url;
        });
      }
    });
  })($j203);
</script>