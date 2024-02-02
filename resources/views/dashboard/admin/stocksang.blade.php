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
        {{ __('Faire une action !') }} 
        </h2>
    </x-slot>

    <style>
        ul{
            display:inline;
        }
        ul li{
            display:inline;
        }
       
    </style>
    <?php
    $data1 = DB::table('apnts')->where('statut', '=', 'Donneur')->where('etat', '=', 'Finalisé')->count('id');
    $data2= DB::table('banque_sangs')->where('etat', '=', 'Non Disponible')->count('id');

    $result = ['Dons' => $data1, 'Transfusions' => $data2];
    ?>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Dons',     {{$data1}}],
          ['Transfusions',      {{$data2}}]
        ]);

        var options = {
          title: 'Don/Transfusion',
          pieHole: 0.6,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <p class="text text-dark"><b>Statistiques Cénerales:</b></p>
                <?php 
                        $sangs = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->sum('qte');
                        $dons = DB::table('apnts')->where('statut', '=', 'Donneur')->where('etat', '=', 'Finalisé')->count('id');
                        $transfusion = DB::table('banque_sangs')->where('etat', '=', 'Non Disponible')->count('id');
                ?>
                <center>
                    <table>      
                    <tr>
                    <td><div id="donutchart" style="width: 800px; height: 500px;"></div></td>
               
                        <td  style="font-size:45px; background-color:#fe3f40; border-raduis:50px; color:white;margin:20px;"><p>{{$sangs}}ml</p> <br /> de Sang Disponible
                    </td> 
                    </tr> 
                
                </table>
                </center>    
                </div>
            </div>
        </div>
    </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <?php 
                       $aplus = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'A+')->sum('qte');
                       $amoins = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'A-')->sum('qte');
                       $bplus = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'B+')->sum('qte');
                       $bmoins = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'B-')->sum('qte');
                       $abplus = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'AB+')->sum('qte');
                       $abmoins = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'AB-')->sum('qte');
                       $oplus = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'O+')->sum('qte');
                       $omoins = DB::table('banque_sangs')->where('etat', '=', 'Disponible')->where('gp', '=', 'O-')->sum('qte');
                ?>
                        <p class="text text-dark"><b>Groupe Sanguins Disponible:</b></p>
                        <br /><br />
                        <table class="table table-stripped" width="900px">
                            <thead>
                                <tr>
                                    <th>A+</th>
                                    <th>A-</th>
                                    <th>B+</th>
                                    <th>B-</th>
                                    <th>AB+</th>
                                    <th>AB-</th>
                                    <th>O+</th>
                                    <th>O-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$aplus}}ml</td>
                                    <td>{{$amoins}}ml</td>
                                    <td>{{$bplus}}ml</td>
                                    <td>{{$bmoins}}ml</td>
                                    <td>{{$abmoins}}ml</td>
                                    <td>{{$abplus}}ml</td>
                                    <td>{{$oplus}}ml</td>
                                    <td>{{$omoins}}ml</td>
                                </tr>    
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
</x-app-layout> 

</body>
</html>