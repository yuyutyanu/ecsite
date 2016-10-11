<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
protected $table = 'cart';

  public function scopeProductname($query,$name){

    // if(!empty($name)){
    //   $query = $query->where("",$name);
    // }
    return $query;
  }

  public function product(){
    return $this->hasOne('App\Product','id','product_id');
  }
}
