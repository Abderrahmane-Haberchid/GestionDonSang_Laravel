
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    

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
        {{ __('Consulter tout les rdv !') }} 
        </h2>
    </x-slot>
    <?php
    $data1 = DB::table('apnts')->where('etat', '=', 'Finalisé')->count('id');
    $data2 = DB::table('apnts')->where('etat', '=', 'Annulé')->count('id');
    $data3 = DB::table('apnts')->where('etat', '=', 'En Cours')->count('id');

    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Finalisés',     {{$data1}}],
          ['Annulés',      {{$data2}}],
          ['En Cours',  {{$data3}}]
        ]);

        var options = {
          title: 'Statistique des Rendez-vous',
          pieHole: 0.6,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <style>
        #voir{
            background-color: #0d6efd;
        }
    </style>
 </head>
 <body>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if(session()->get('success') != "")   
                           <div class="alert alert-success d-flex align-items-center" width="500px" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                    {{session()->get('success')}}
                            </div>
                            </div>
                @endif
                    <div id="donutchart" style="width: 900px; height: 500px;"></div>
                </div>
            </div>
    </div>
    <br /><br />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
               
                <?php 
                        $apnts = DB::table('apnts')->where('etat', '=', 'En Cours')->get();
                ?>
                <p class="text text-dark"><b>Rendez-vous En Cours</b></p><br />
                        <table width="1200px" class="table table-striped table-hover">
                          
                            <thead>
                                <tr>
                                    <th>RDV prit par</th>
                                    <th>Date du rdv</th>
                                    <th>Créneau horaire</th>
                                    <th>Prit le</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($apnts as $apnt)

                                <?php 
                                   $users = DB::table('users')->where('id', '=', $apnt->iduser)->get();
                                ?>
                                
                                <tr>
                                   @foreach($users as $user)                                    
                                    <td>{{$apnt->statut}}: <a href="{{Route('registerdetail.view', $user->id)}}" class="link link-danger"><b>{{ $user->lname}}</b></a></td>
                                   @endforeach 
                                    <td> le {{$apnt->jour}} {{$apnt->mois}}</td>
                                    <td>{{$apnt->horaire}}</td>
                                    <td>{{$apnt->created_at}}</td>
                                    <td>
                                    <a href="{{Route('rdvdetail.view', ['idrdv' => $apnt->id, 'from' => 'rdvencours'])}}" class="btn btn-primary">
                                    Détail
                                    </a>
                                    </td>
                                </tr>
                                 </form>
                               @endforeach 
                              
                            </tbody>
                            
                        </table>

                <?php 
                        $apnts = DB::table('apnts')->where('etat', '=', 'Finalisé')->get();
                ?>
                <p class="text text-dark"><b>Rendez-vous Finalisés</b></p><br />
                        <table width="1200px" class="table table-striped table-hover">
                          
                            <thead>
                                <tr>
                                    <th>RDV prit par</th>
                                    <th>Date du rdv</th>
                                    <th>Prit le</th>
                                    <th>Statut</th>
                                    <th>Voir</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($apnts as $apnt)

                                <?php 
                                   $users = DB::table('users')->where('id', '=', $apnt->iduser)->get();

                                   $from = 'rdvdone';
                                ?>
                                
                                <tr>
                                   @foreach($users as $user)                                    
                                    <td>{{$apnt->statut}}: <a href="{{Route('registerdetail.view', $user->id)}}" class="link link-danger"><b>{{ $user->lname}}</b></a></td>
                                   @endforeach 
                                    <td> le {{$apnt->jour}} {{$apnt->mois}}</td>
                                    <td>{{$apnt->created_at}}</td>
                                    <td>{{$apnt->statut}}</td>
                                    <td>
                                    <a href="{{Route('rdvdetail.view', ['idrdv' => $apnt->id, 'from' =>'rdvdone'])}}" class="btn btn-primary">
                                    Voir
                                    </a>
                                    </td>
                                </tr>
                                 </form>
                               @endforeach 
                              
                            </tbody>
                            
                        </table>
                    
                        <?php 
                        $apnts = DB::table('apnts')->where('etat', '=', 'Annulé')->get();
                ?>
                <p class="text text-dark"><b>Rendez-vous Annulés</b></p><br />
                        <table width="1200px" class="table table-striped table-hover">
                          
                            <thead>
                                <tr>
                                    <th>RDV prit par</th>
                                    <th>Date du rdv</th>
                                    <th>Créneau horaire</th>
                                    <th>Prit le</th>
                                    <th>Statut</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($apnts as $apnt)

                                <?php 
                                   $users = DB::table('users')->where('id', '=', $apnt->iduser)->get();
                                ?>
                                
                                <tr>
                                   @foreach($users as $user)                                    
                                    <td>{{$apnt->statut}}: <a href="{{Route('registerdetail.view', $user->id)}}" class="link link-danger"><b>{{ $user->lname}}</b></a></td>
                                   @endforeach 
                                    <td> le {{$apnt->jour}} {{$apnt->mois}}</td>
                                    <td>{{$apnt->horaire}}</td>
                                    <td>{{$apnt->created_at}}</td>
                                    <td>{{$apnt->statut}}                         
                                    </td>
                                </tr>
                                 </form>
                               @endforeach 
                              
                            </tbody>
                            
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 

</body>
 </html>