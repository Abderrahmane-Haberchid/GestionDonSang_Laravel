<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'fname'   => ['required', 'string'],
            'lname'   => ['required', 'string'],    
            'email'   => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'adr'     => ['required', 'string'],
            'cin'     => ['required', 'string', 'unique:users'],
            'gsang'   => ['required', 'string'],
            'usertype'=> ['required', 'string'],
        ]);

        User::create([
            'fname'   =>$request->fname,
            'lname'   =>$request->lname,
            'email'   =>$request->email,
            'password' => Hash::make($request->password),
            'adr'     =>$request->adr,
            'cin'     =>$request->cin,
            'gp'      =>$request->gsang,
            'usertype'=>$request->usertype
        ]);

        return redirect('login')->with('success', 'Compte crée avec succes, connectez-vous !');
    }
}
