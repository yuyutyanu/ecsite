<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;
use App\Product;

//ルート
Route::get('/', function (Request $request) {
    $recode = Product::all();
    return view('ecsite',["recode" => $recode]);
});

//商品詳細画面
Route::get('/detail', function (Request $request) {
    $id = $request->get("id");
    $pass = $request->get("pass");
    $product_info = App\Product::where('id', $id)
               ->get();
    return view("detail",[
        "product_info" => $product_info
    ]);
});

//ajax api
Route::get('/data',function(){
$data = Product::all();
  return $data;
});

Route::get('/search',function(Request $request){
  $value = $request->get('value');
  $value =  Product::where('name', 'like', '%'.$value.'%')->get();
  return $value;
});

//マイページからカート画面にアクセスしたとき
Route::get('/cart',function(Request $request){
  if (Auth::check()) {   //ユーザがログインしていたら
    $user = $request->user();
    $cart_info = App\Cart::where('user_id', $user["id"])
    ->with('product')
    ->get();
    return view('cart',["cart_info" => $cart_info]);
  }
  else{
    $session_cart = $request->session()->all();
    return view('cart',["session_cart" => $session_cart]);
  }
});

//追加処理
Route::get('/add',function(Request $request){
  if (Auth::check()) {   //ユーザがログインしていたら

    $product_id = $request->get("id");
    $user = $request->user();
    $quantity = $request->get("quantity");

        $already = App\Cart::where('product_id',$product_id)  //
                              ->where('user_id',$user["id"])  //  選択した商品がカートにまだなかったら
                              ->get();                        //
        if($product_id != NULL && $already == "[]"){          //
          DB::table('cart')->insert(['user_id' => $user["id"],//
                                  'product_id' => $product_id,//  追加する
                                    'quantity' => $quantity]);//
        }                                                     //
        elseif($already[0]["quantity"]!=$quantity){//
          DB::table('cart')                        //
              ->where('user_id', $user["id"])      //   数量だけ変更して追加
              ->where('product_id',$product_id)    //
              ->update(['quantity' => $quantity]); //
        }                                          //
        $cart_info = App\Cart::where('user_id', $user["id"])
        ->with('product')
        ->get();

       return view('cart',["cart_info" => $cart_info,"session_cart"=>"[]"]); //carttable内容を追加
  }
  else{
    //sessioncart 追加
    $product_id = $request->get("id");
    $quantity = $request->get("quantity");
    $session_product = App\Product::where('id', $product_id)
               ->get();
    session(['product_id' => $session_product[0]["id"],
             'pass' => $session_product[0]["pass"],
             'name'=>$session_product[0]["name"],
             'comment'=>$session_product[0]["comment"],
             'price'=>$session_product[0]["price"],
             'detail',$session_product[0]["detail"],
             'quantity'=>$quantity]);
    $session_cart = $request->session()->all();
      return view('cart',["session_cart" => $session_cart]);
  }
});

//更新処理
Route::get('/update',function(Request $request){

  $product_id = $request->get("product_id");
  $user = $request->user();
  $quantity = $request->get("quantity");

  DB::table('cart')                      //
    ->where('user_id', $user["id"])      //   数量更新処理
    ->where('product_id',$product_id)    //
    ->update(['quantity' => $quantity]); //

   $cart_info = App\Cart::where('user_id', $user["id"])->get();

   return view('cart',["cart_info" => $cart_info]);
});

//削除処理
Route::get('/delete',function(Request $request){
  if (Auth::check()) {
      $user = $request->user();
      $product_id = $request->get("product_id");

      App\Cart::where('user_id', $user["id"])
                ->where('product_id',$product_id)
                ->delete();
      $cart_info = App\Cart::where('user_id', $user["id"])
                            ->get();

      return view('cart',["cart_info"=>$cart_info]);
  }else{
    $session_cart = $request->session()->flush();
    return view('cart',["session_cart"=>$session_cart]);
  }
});

//購入画面
Route::get('/buy',function(Request $request){
  return view('buy');
});

Auth::routes();
Route::get('/home', 'HomeController@index');


Route::post('/employee','AuthController@authenticate');

Route::get('/employee',function(){
  return view('employee');
});

Route::get('/kannrisya',function(){
  if (Auth::check()) {
      $user = Auth::user();
      if ($user["employee"]) {
        return view('kannrisya');
      }
      else{
        return view('/ecsite');
      }
  }else{
    return view('/ecsite');
  }
});
