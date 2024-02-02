<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:15'],
            'nname' => ['string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'msg' => ['required', 'string'],
        ]);

        Contact::create([

        'name' => $request->name,
        'nickname' => $request->nname,
        'email' => $request->email,
        'msg' => $request->msg
        
        ]);
        
        return back()->with('status', 'Votre message est envoyé, Merci !');

    }
}
