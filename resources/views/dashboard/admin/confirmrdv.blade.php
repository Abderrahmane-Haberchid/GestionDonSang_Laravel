
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    </head>
<body>


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
                    foreach($apnts as $apnt){
                         $iduser = $apnt->iduser;   
                    }
                    $users = DB::table('users')->where('id', '=', $iduser)->get();
                    foreach($users as $user){
                        $usertype = $user->usertype;   
                        $gp = $user->gp;
                   }
                ?>
                  
                     @if($usertype == "Donneur")
                       <p class="text text-danger"><b>En choisissant de finaliser ce Rendez-vous, vous confirmez bien l'attribution d'une quantité de sang à la banque !</b></p>
                       <br /> 
                       <a href="{{Route('confirmrdv.post', ['idrdv' => $idrdv, 'gp'=>$gp])}}" class="btn btn-success" id="finaliser">
                       J'attribue le don à la banque
                        </a>
                     @elseif($usertype == "Patient")   
                     <p class="text text-danger"><b>En choisissant de finaliser ce Rendez-vous, vous confirmez bien le prélevement d'une quantité de 250ml de la banque !</b></p>
                        <br />
                        <a href="{{Route('confirmrdv.post', ['idrdv' => $idrdv, 'gp'=>$gp])}}" class="btn btn-success" id="finaliser">
                        Je confirme la transfusion
                         </a>
                     @endif
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 

    
</body>
</html>

