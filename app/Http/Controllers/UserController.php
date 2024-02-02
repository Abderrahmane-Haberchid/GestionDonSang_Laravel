<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showdetails($iduser){
        return view('dashboard/admin/registerdetail')->with('iduser', $iduser);
    }

    public function activate_user($iduser){
        
        User::where('id', '=', $iduser)->update([ 
            'etat' => 'yes'
        ]);
        return back()->with('success', 'Ce compte a bien été activé !');
    }
}
