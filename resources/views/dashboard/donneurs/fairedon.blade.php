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
  #liveToastBtn{ background-color:#0d6efd;  }
  #cancelrdv{ background-color:#dc3545; }
  #updaterdv{ background-color:#0d6efd;  }
</style>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier mon RDV, ') }}
        </h2>
    </x-slot>
    <body class="antialiased sans-serif bg-gray-100" width="600px" height="500px">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @if(Auth::user()->etat == "no")
                    <p class="text text-danger"><b>Votre compte est toujours en cours de validation...</b></p>
                  @endif

                  @if(Auth::user()->rdv != "0")
                  <?php $rdvs = DB::table('apnts')->where('iduser', '=', Auth::user()->id)->where('etat', '=', 'En Cours')->get(); ?>

                    <b class="text text-primary">Vous avez un rendez-vous en cours...</b><br /><br />
                    <h1> {{ session()->get('success') }}</h1>

                    <form action="{{ Route('cancelrdv.post') }}" method="post">
                    @csrf
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
                            <td><a class="btn btn-primary" href="{{Route('updaterdv.view');}}">Modifier</a></td>
                            <td><input type="submit" class="btn btn-danger" id="cancelrdv" value="Annuler"></td>
                          @endif  
                          </tr>
                      @endforeach  
                      </tbody>
                    </table>
                  </form>
                  @endif
                   
                  @if(Auth::user()->rdv == "0" AND Auth::user()->etat == "yes")
                    <center><b>Je choisi une date qui me convient ! avec le créneau horaire</b> <br /><br />

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
                    <button type="submit" class="btn btn-primary" id="liveToastBtn">Je valide mon RDV </button>          
                </form>
                    </center>
                  @endif  

                  <br /> <br />
                <?php  
                    $apnts = DB::table('apnts')->where('iduser', '=', Auth::user()->id)->where('etat', '=', 'Annulé')->get();
                ?>             
                <p class="text text-danger"><b>Vos Rendez-vous annulés</b></p>
                <br /><br />
                    <table class="table table-dark table-striped table-hover">
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

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Banque de Sang</strong>
      <small>depuis 1 min</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Votre rendez-vous est bien validé !
    </div>
  </div>
</div>
<script type="text/javascript">

  const toastTrigger = document.getElementById('liveToastBtn')
  const toastLiveExample = document.getElementById('liveToast')
  if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
  }
</script>
</body> 
</html> 
</x-app-layout>

