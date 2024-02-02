<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Faire une action !') }} 
        </h2>
    </x-slot>

    <style>
        #finaliser{
            background-color: #198754;
        }
        #annuler{
            background-color: #dc3545;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <?php 
                        $apnts = DB::table('apnts')->where('id', '=', $idrdv)->get();
                ?>
                        <table class="table">   
                           
                                @foreach($apnts as $apnt)

                                <?php 
                                   $idrdv = $apnt->id;
                                   $users = DB::table('users')->where('id', '=', $apnt->iduser)->get();

                                   foreach($users as $user){
                                       $usergp = $user->gp;     
                                   }

                                   $gps = DB::table('banque_sangs')->where('gp', '=', $usergp)->where('etat', '=', 'Disponible')->count();
                                  if($from == "rdvencours" && $apnt->statut == "Patient") 
                                  { 
                                   if ($gps > 0) { ?>
                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                         <div>
                                          Sang du groupe sanguin <b>{{$usergp;}}</b> est <b>Disponible</b>
                                         </div>
                                    </div>
                                  <?php }
                                   else{ ?>
                                     <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <div>
                                                Sang du groupe sanguin <b>{{$usergp}}</b> est éventuellement <b>Indispnible</b>
                                            </div>
                                    </div>

                                  <?php } 
                                  }
                                  elseif($from == "rdvdone"){
                                    echo "<h2 class='text text-success'><b>Finalisé le</b> " . $apnt->updated_at . "</h2>";
                                  }
                                ?>
                                  
                                <tr>
                                    <td><b>rdv numéro:</b> {{$apnt->id}}</td>                                  
                                    <td><b>Rdv Fixé le</b> {{$apnt->jour}} {{$apnt->mois}}</td>
                                </tr>   
                                <tr> 
                                    <td><b>Créneau horaire:</b> {{$apnt->horaire}}</td>
                                    <td><b>Date:</b> {{$apnt->created_at}}</td>
                                </tr> 
                                <tr> 
                                    <td><b>Dérniere modification:</b> {{$apnt->updated_at}}</td>
                                    @foreach($users as $user) 
                                    <?php $gp = $user->gp;
                                         $iduser = $user->id; ?>                                   
                                    <td><b>{{$apnt->statut}}:</b> <a href="{{Route('registerdetail.view', $user->id)}}" class=""><b>{{ $user->lname}}</b></a></td>
                                   @endforeach 
                                </tr>
                                @if($from == "rdvencours")
                                <tr>
                                  <td>
                                  <a href="{{Route('confirmrdv.view', ['idrdv' => $idrdv, 'gp' => $gp])}}" class="btn btn-success">
                                  Finaliser
                                  </a>
                                  <a href="{{Route('cancelrdvadmin.post', ['idrdv' => $idrdv, 'iduser' => $iduser])}}" class="btn btn-danger" id="annuler">
                                    Annuler RDV
                                </a>
                                </td>                                
                                </tr>
                               @endif
                               @endforeach 
                            
                          
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 

