<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>kanrisya</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <input type="type" name="name" value="">
      <input id="submit" type="button" name="name" value="検索">
    </form>

    <select class="" name="">
      <option>現在掲載している</option>
      <option>現在掲載していない</option>
    </select>
    <main>
      <table border="1">
        <th>
          商品名
        </th>
        <th>
          在庫数
        </th>
        <th>
          etc..
        </th>
        <th>
          etc..
        </th>
        <tr>
          <td>
            吾輩は猫である
          </td>
          <td>
            10個
          </td>
        </tr>
        <tr>
          <td>
            はらぺこあおむし
          </td>
          <td>
            ２０個
          </td>
        </tr>
        <tr>
          <td>
            模倣犯
          </td>
          <td>
            ３０個
          </td>
        </tr>
      </table>
    </main>
    <div class="sidebar">
      <li>売上情報</li>
      <li id="zaiko">在庫情報</li>
      <li>入金待ち</li>
      <li>入金済み</li>
      <li>入荷待ち</li>
      <li>削除</li>
      <li>従業員ID登録</li>
    </div>

<script type="text/javascript">
  $('#zaiko').click(function(){
    $('main').fadeIn();
  });
  $('#zaiko').click(function(){
    $('#zaiko').css("background-color","gray");
  });
</script>

 <style media="screen">
 * {
    margin: 0;
    padding: 0;
}
 html,body{
   height:100%;
 }
 .sidebar{
   width:15%;
   border-right:solid 1px;
   height:100%;
 }
.sidebar li{
     list-style: none;
     padding: 10px;
     border-bottom:solid 1px;
     text-align: center;
   }
   li:hover{
     background-color: gray;
   }
   form{
     position: absolute;
     margin-left:75%;
     margin-top:10px;
   }
   select{
     margin-left:63%;
     position: absolute;
     margin-top:10px;
   }
   table{
     position: absolute;
     margin-left:25%;
     margin-top:5%;
     border:solid 1px;
     width:800px;
     height:600px;
   }
   main{
     display: none;
     text-align: center;
   }
 </style>
  </body>
</html>
