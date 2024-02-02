<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apnt;
use App\Models\BanqueSang;
use App\Models\User;
use App\Models\Equip;

class AdminController extends Controller
{
   public function rdvdetail($idrdv, $from){

        return view('dashboard/admin/rdvdetails')->with('from', $from)->with('idrdv', $idrdv);

   }

   public function confirmrdv($idrdv){

    return view('dashboard/admin/confirmrdv')->with('idrdv', $idrdv);

   }

   public function addblood($idrdv, $gp){

    $apnts = Apnt::where('id', '=', $idrdv)->get();

    foreach($apnts as $apnt){
          $usertype = $apnt->statut;
          $iduser = $apnt->iduser;
    }
    if($usertype == 'Donneur'){ 

    BanqueSang::create([
        'qte' => '250',
        'gp' => $gp,
        'iduser' => $iduser,
        'etat' => 'Disponible',
        'idrdv' => $idrdv
    ]);
    Apnt::where('id', '=', $idrdv)->update([
        'etat' => 'Finalisé',
    ]);
    User::where('id', '=', $iduser)->update([
        'rdv' => 0,
    ]);
    User::where('id', '=', $iduser)->increment('checked', 1);
    Equip::where('nom', '=', 'Seringue')->decrement('qte', 1);
    Equip::where('nom', '=', 'Pansement')->decrement('qte', 1);
    Equip::where('nom', '=', 'Sac de Sang')->decrement('qte', 1);

  
   return redirect('dashboard/admin/allrdv')->with('success', 'Un don de 250ml a bien été ajouté à la banque !');
   }
   $users = User::where('id', '=', $iduser)->get();

    foreach($users as $user){
          $gp = $user->gp;
          //$iduser = $apnt->iduser;
    }
   if($usertype == 'Patient'){ 

    BanqueSang::where('gp', '=', $gp)->where('etat', '=', 'Disponible')->limit(1)->update([
        'etat' => 'Non disponible'
    ]);
    Apnt::where('id', '=', $idrdv)->update([
        'etat' => 'Finalisé',
    ]);
    User::where('id', '=', $iduser)->update([
        'rdv' => 0,
    ]);

    User::where('id', '=', $iduser)->increment('checked', 1);
    Equip::where('nom', '=', 'Seringue')->decrement('qte', 1);
    Equip::where('nom', '=', 'Pansement')->decrement('qte', 1);
    Equip::where('nom', '=', 'Sac de Sang')->decrement('qte', 1);
  
   return redirect('dashboard/admin/allrdv')->with('success', 'Une quantité de 250ml a bien été prélevé de la banque !');
   }
 }

   public function cancelrdv($idrdv, $iduser){
        Apnt::where('id', '=', $idrdv)->update([
            'etat' => 'Annulé'
        ]);
        User::where('id', '=', $iduser)->update([
            'rdv' => '0'
        ]);

        return redirect('dashboard/admin/allrdv')->with('success', 'Rendez-vous annulé !');
   }

  public function suspend_account($id){
    User::where('id', '=', $id)->update([
        'etat' => 'no'
    ]);
    return back()->with('success', 'Ce compte a bien été suspendu');
  }

  public function reactivate_account($id){
    User::where('id', '=', $id)->update([
        'etat' => 'yes'
    ]);
    return back()->with('success', 'Ce compte a bien été réactivé');
  }
  public function activate_user($id){
    User::where('id', '=', $id)->update([
        'etat' => 'yes'
    ]);
    return back()->with('success', 'Ce compte a bien été activé !');
  }

  public function add_equip(Request $request){

    $request->validate([
        'name' => ['required'],
        'qte' => ['required']
    ]);

    Equip::where('nom', '=', $request->name)->increment('qte', $request->qte);

    return back()->with('success', 'Equipement ajouté avec succes !');
  }
    
}
