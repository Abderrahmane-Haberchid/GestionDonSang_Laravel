<?php

namespace App\Http\Controllers;

use App\Models\Apnt;
use App\Http\Requests\StoreApntRequest;
use App\Http\Requests\UpdateApntRequest;
use PDF;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function generatepdf(){
        $data = User::where('id', '=', Auth::user()->id)->get();

        $pdf = PDF::loadView('dashboard/donneurs/carteDon', [ 'data' => $data]);

        return $pdf->download('CarteDonneur.pdf');
    }
    public function generatepdfp(){

        $data = User::where('id', '=', Auth::user()->id)->get();

        $pdf = PDF::loadView('dashboard/patients/cartemembre', [ 'data' => $data]);

        return $pdf->download('CarteMembre.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApntRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApntRequest $request)
    {
        $request->validate([  
            'rdvday'   => ['required'],
            'rdvmonth' => ['required'],
            'horaire' => ['required'],
            'phone'   => ['required']
        ]);

        Apnt::create([
            'iduser'   =>Auth::user()->id,
            'statut'   =>Auth::user()->usertype,
            'phone'   =>$request->phone,
            'horaire'   =>$request->horaire,
            'jour'     =>$request->rdvday,
            'mois'     =>$request->rdvmonth,
            'etat'     =>"En Cours"
        ]);
        //event(new Registered($rdv));

        $updaterdv = User::find(Auth::user()->id);
        $updaterdv->rdv = "1";
        $updaterdv->save();

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apnt  $apnt
     * @return \Illuminate\Http\Response
     */
    public function show(Apnt $apnt)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apnt  $apnt
     * @return \Illuminate\Http\Response
     */
    public function edit(Apnt $apnt)
    {
        Apnt::where('iduser', '=', Auth::user()->id)->update([
            'etat' => 'Annulé'
        ]);
        User::where('id', '=', Auth::user()->id)->update([
            'rdv' => '0'
        ]);

        return back()->with('success', 'Votre Rendez-vous a bien été annulé');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApntRequest  $request
     * @param  \App\Models\Apnt  $apnt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApntRequest $request, Apnt $apnt)
    {
        $request->validate([  
            'phone'   => ['required'],
            'rdvday' => ['required'],
            'rdvmonth' => ['required'],
            'horaire'   => ['required']
        ]);
        Apnt::where('iduser', '=', Auth::user()->id)->where('etat', '=', 'En Cours')->update([
            'phone' => $request->phone,
            'horaire' => $request->horaire,
            'jour' => $request->rdvday,
            'mois' => $request->rdvmonth            
        ]);
        
        return back()->with('success', 'Votre Rendez-vous a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apnt  $apnt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apnt $apnt)
    {
        //
    }
}
