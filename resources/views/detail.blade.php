<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>syousai</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/detail.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <header>
    </header>

    <?php
    $detail = mb_convert_encoding($product_info[0]->detail, "utf-8", "auto");
    echo "<p class='detail'>".$detail."</p>";
    ?>
    <img src="/img/{{$product_info[0]->pass}}" alt="" />


    <button type="button" name="button" id="button_cart">カートに入れる</button>
    <input type="number" name="name" value="1"  min="1" max="99" id="select_number">匹


    <footer>
    </footer>

    <script type="text/javascript">
    $('button').click(function(){
      var quantity = $('#select_number').val();
      location.href = '/add?id={{$product_info[0]->id}}&quantity='+quantity;
    });
    </script>
  </body>
</html>
