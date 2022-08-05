<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }


    public function authendticate(Request $request){
        $request->flush();

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect(route('service.list'));
        }else{
            return back()->with('error','hatalı kullanıcı');
        }

    }




    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'))->with('success','Güvenli çıkış yapıldı');
    }
}
