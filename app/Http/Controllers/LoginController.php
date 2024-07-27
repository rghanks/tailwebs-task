<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){ 
        return view('login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->passes()){
            if(Auth::attempt(['username' => $request->username,'password' => $request->password])){
                return redirect()->route('account.dashboard');
            }else{
                return redirect()->route('account.login')->with('error','Either username or password is incorrect.');
            }
        }else{
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }

    }
 
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
