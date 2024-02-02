<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email'    =>'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

      
            if(auth::attempt($credentials)){
                return redirect('dashbard');
            }
            else {
                dd('new error');
            }
       

       return back()->with('statut', 'Email ou mot de passe incorrect');
    }
    public function checkUserType(){
        $usertype = Input::get('usertype');
    }
}

?>