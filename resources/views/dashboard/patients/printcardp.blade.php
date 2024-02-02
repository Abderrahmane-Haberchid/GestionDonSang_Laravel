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
  #printbtn{ background-color:#0d6efd;  }
  #cancelrdv{ background-color:#dc3545; }
  #updaterdv{ background-color:#0d6efd;  }
</style>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Imprimer votre carte ! ') }}
        </h2>
    </x-slot>
    <body class="antialiased sans-serif bg-gray-100" width="600px" height="500px">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     <center>     <?php
                          if(Auth::user()->etat == "no"){  
                            $case = "disabled";
                            echo "<p class='text text-danger'>Votre compte est en cours de validation</p>";
                          }
                          else $case = "";
                          
                          ?>
                    <form action="{{Route('patients.pdf')}}">

                       <center>
                         <input type="submit" class="btn btn-primary" id='printbtn' value="J'imprime ma carte" {{$case}}>
                       

                    </form>
                </center>
                </div>                
            </div>
        </div>
    </div>

                </body> 
</html> 
</x-app-layout>                