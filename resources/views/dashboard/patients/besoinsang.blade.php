<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<style>
  ul li{
    display:inline;
    margin-left:25px;
  }
  #liveToastBtn{background-color:#0d6efd;}
  #printbtn{ background-color:#0d6efd;  }
  #cancelrdv{ background-color:#dc3545; }
  #updaterdv{ background-color:#0d6efd;  }
</style>

<script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prendre Rendez-vous pour une transfusion ! ') }}
        </h2>
    </x-slot>
    <body class="antialiased sans-serif bg-gray-100" width="600px" height="500px">

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous sûr de vouloir annuler ce rendez-vous ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelmodal">Retour</button>
        <a href="{{ Route('cancelrdvp.post') }}" class="btn btn-primary">Annuler rdv</a>
      </div>
    </div>
  </div>
</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              
                <div class="p-6 bg-white border-b border-gray-200">
                  <center>     
                         <?php
                          if(Auth::user()->etat == "no"){  
                            $case = "disabled";
                            echo "<p class='text text-danger'>Votre compte est en cours de validation</p>";
                          }
                          else $case = "";                          
                          ?>
                    
                    @if(Auth::user()->rdv != "0")
                  <?php $rdvs = DB::table('apnts')->where('iduser', '=', Auth::user()->id)->where('etat', '=', 'En Cours')->get(); ?>

                    <p class="text text-primary"><b>Vous avez un rendez-vous en cours...</b></p><br /><br />
                    <h1 class="text text-danger"> {{ session()->get('success') }}</h1>

                    <table class="table table-success table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Numero de contact</td>
                          <th>Date du rendez-vous</td>
                          <th>Créneau horaire</td>
                          <th>Etat</td>
                          <th>Modifier</td>
                          <th>Annuler</td>
                        </tr>
                      </thead>
                      <tbody>
                      
                      @foreach($rdvs as $rdv)
                          <tr>
                            <td>{{ $rdv->phone }}</td>
                            <td> le {{ $rdv->jour }} {{ $rdv->mois }}</td>
                            <td>{{ $rdv->horaire }}</td>
                            <td>{{ $rdv->etat }}</td>
                          @if($rdv->etat == "En Cours")  
                            <td><a class="btn btn-primary" href="{{Route('updaterdvp.view');}}"><i class="fa fa-trash"></i> Modifier</a></td>
                            <td><a href="#" class="btn btn-danger" id="cancelrdv" data-bs-toggle="modal" data-bs-target="#exampleModal">Annuler</a></td>
                          @endif  
                          </tr>
                      @endforeach  
                      </tbody>
                    </table>
                  
                  @endif
                      

                @if(Auth::user()->rdv == "0" AND Auth::user()->etat == "yes")
                   <b>Je choisi une date qui me convient ! avec le créneau horaire</b> <br /><br />

                   <form action="{{ Route('validerdv') }}">
                    @csrf
                    <br />
                    <ul>
                      <li>
                        <select name="rdvday" id="" required>
                          <option selected>Jour</option>
                        @for($i = 1; $i <= 31; $i++)
                          <option>{{$i}}</option>';
                        @endfor
                        </select>
                      </li>
                      <li>
                        <select name="rdvmonth" id="" required>
                           <option>Mois</option>
                           <option>Janvier</option>
                           <option>Fevrier</option>
                           <option>Mars</option>
                           <option>Avril</option>
                           <option>Mai</option>
                           <option>Juin</option>
                           <option>Juillet</option>
                           <option>Août</option>
                           <option>Septembre</option>
                           <option>Octobre</option>
                           <option>Novembre</option>
                           <option>Décembre</option> 
                        </select>
                      </li>
                      <li>
                        <select name="horaire" id="" required>
                          <option selected>Créneau horaire</option>
                          <option value="Matin entre 9h-11h">Matin 9H - 11h</option>
                          <option value="Midi entre 11h-14h">Midi 11H - 14h</option>
                          <option value="Après-Midi entre 14h-17h">Après-midi 14H - 17h</option>
                        </select>
                      </li>
                      
                      <li>
                          <input type="text" placeholder="Numéro de contact" name="phone" required>
                      </li>
                    </ul>
                    <br />
                    <br />  
                    <button type="submit" class="btn btn-primary" {{$case}} id="liveToastBtn">Je valide mon RDV </button>          
                </form>
                    </center>
                  @endif  
               <br /><br />
                  </div>            
            </div>
        </div>
                         
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              
                <div class="p-6 bg-white border-b border-gray-200">
                <?php  
                    $apnts = DB::table('apnts')->where('iduser', '=', Auth::user()->id)->where('etat', '!=', 'En Cours')->get();
                ?>             
                <p class="text text-danger"><b>Historique Rendez-vous</b></p>
                <br /><br />
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Numero de contact</td>
                          <th>Date du rendez-vous</td>
                          <th>Créneau horaire</td>
                          <th>Etat</td>
                        </tr>
                      </thead>
                      <tbody>
                      
                      @foreach($apnts as $apnt)
                          <tr>
                            <td>{{ $apnt->phone }}</td>
                            <td> le {{ $apnt->jour }} {{ $apnt->mois }}</td>
                            <td>{{ $apnt->horaire }}</td>
                            <td>{{ $apnt->etat }}</td> 
                          </tr>
                      @endforeach  
                      </tbody>
                    </table>

                </div>
            </div>
          </div>
    </div>

                </body> 
</html> 
</x-app-layout>                