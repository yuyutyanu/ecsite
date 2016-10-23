<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /**
     * 認証を処理する
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
    $email =  $request->email;
    $password =  $request->password;// value
        if (Auth::attempt(['email' => $email, 'password' => $password,'employee' => 1])) {
            // 認証に成功した
            return redirect()->intended('/kannrisya');
        }
    }
}
