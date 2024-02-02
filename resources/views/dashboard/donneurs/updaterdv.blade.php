<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
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
<style>
  ul li{
    display:inline;
    margin-left:25px;
  }
  #liveToastBtn{ background-color:#0d6efd;  }
  #updatebtn{background-color:#198754;}
</style>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BIENVENUE AU DASHBOARD, ') }} {{ Auth::user()->lname }}
        </h2>
    </x-slot>
    <body class="antialiased sans-serif bg-gray-100" width="600px" height="500px">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <?php $rdvs = DB::table('apnts')->where('iduser', '=', Auth::user()->id)->where('etat', '=', 'En Cours')->get(); ?>
                    <center>
                    @if(session()->get('success') != "")   
                           <div class="alert alert-success d-flex align-items-center" width="500px" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                    {{session()->get('success')}}
                            </div>
                            </div>
                    @endif
                    <form action="{{ Route('updaterdv.post') }}" method="POST">
                        @csrf
                        @foreach($rdvs as $rdv)
                        <ul class="list-group list-group-horizontal">
                        <li><input type="text" value="{{ $rdv->phone }}" name="phone"></li>
                        <br /><br />
                        <li><select name="rdvmonth" id="" required>
                           <option selected>{{ $rdv->mois }}</option>
                           <option value="Janvier">Janvier</option>
                           <option value="Fevrier">Fevrier</option>
                           <option value="Mars">Mars</option>
                           <option value="Avril">Avril</option>
                           <option value="Mai">Mai</option>
                           <option value="Juin">Juin</option>
                           <option value="Juillet">Juillet</option>
                           <option value="Août">Août</option>
                           <option value="Septembre">Septembre</option>
                           <option value="Octobre">Octobre</option>
                           <option value="Novembre">Novembre</option>
                           <option value="Décembre">Décembre</option> 
                        </select></li>
                        <br /><br />
                        <li><select name="rdvday" id="" required>
                          <option selected>{{ $rdv->jour }}</option>
                        @for($i = 1; $i <= 31; $i++)
                          <option value="{{$i}}">{{$i}}</option>';
                        @endfor
                        </select></lli>
                        <br /><br />
                        <li><select name="horaire" id="" required>
                          <option selected>{{ $rdv->horaire }}</option>
                          <option value="Matin entre 9h-11h">Matin 9H - 11h</option>
                          <option value="Midi entre 11h-14h">Midi 11H - 14h</option>
                          <option value="Après-Midi entre 14h-17h">Après-midi 14H - 17h</option>
                        </select></li>
                        <br /><br />
                        @endforeach
                        </ul>

                        <input type="submit" class="btn btn-success" id="updatebtn" value="Modifier">
                        <a href="{{Route('fairedon');}}" class="btn btn-primary">Retour</a>

                       
                    </form>
                    <center>
                </div>
            </div>
        </div>    
    </div>


</body> 
</html> 
</x-app-layout>

