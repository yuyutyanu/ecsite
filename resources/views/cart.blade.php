<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>カート</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/cart.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <header>
      <h1>カート</h1>
      <div class="top">
        <a href="/" >TOP</a>
      </div>
    </header>


    <div class="address">
      <p>都道府県<p><input type="type" name="name" value="">
      <p>市区町村<p><input type="type" name="name" value="">
      <p>郵便番号<p><input type="type" name="name" value="">-<input type="type" name="name" value="">
      <p>電話番号<p><input type="type" name="name" value="">
    </div>

    <?php
    $sum=0;
          if($cart_info != "[]"){
          foreach ($cart_info as $cart_product):
              $product_id = $cart_product["product_id"];
              $product_pass = $cart_product['product']['pass'];
              $product_name = $cart_product["product"]["name"];
              $product_price = $cart_product["product"]["price"];
              $quantity = $cart_product["quantity"];
    ?>
              <div class="recode">
                  <img src='/img/<?=$product_pass?>' />
                  <p class="productname"><?=$product_name?></p>
                  <input class="quantity" type='number' min='1' max='99' value='<?=$quantity?>'>匹

                  <div class='update_delete'>
                  <!-- 更新処理 /update?product_id=<?=$product_id?>&quantity=入力値'-->
                      <a href='/delete?product_id=<?=$product_id?>'>削除</a>
                  </div>
              </div>


                <?php  $sum = $sum + $product_price*$quantity; ?>

    <?php
           endforeach;
          }
    ?>

    <a href='/buy'id="buy" >合計<?=$sum?>円購入</a>
  </body>
</html>
