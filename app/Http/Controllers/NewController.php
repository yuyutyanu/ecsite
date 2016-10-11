<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Test;

class Newcontroller extends Controller
{
  public function index()
  {
//      $users = DB::select('select * from test');
        $lists = Test::all();
        foreach( $lists as $list){
          $data = $list->data;
        }
    return view("test")->with('name',$data);
  }
}
