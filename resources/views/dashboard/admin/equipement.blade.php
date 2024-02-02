
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
    
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Etat des équipements') }} 
        </h2>
    </x-slot>

    <style>
        #valider{
            background-color: #198754;
        }
        #cancelmodal{
            background-color: #6c757d;
        }
        img{
            border-raduis:50%;
            width:110px;
            height:110px;
        }
        table{
            width:1300px;
            float:center;
        }
    </style>
    </head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un équipement</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{Route('equip.post')}}">
            @csrf
        <div class="col-md-12">
               <label for="name" class="form-label">Nom de l'équipement</label>
               <select name="name" id="" class="form-control" required>
               <option value="" selected>Nom d'équipement</option>
                <option value="Lit Médical">Lit Médical</option>
                <option value="Seringue">Seringue</option>
                <option value="Sac de Sang">Sac de Sang</option>
                <option value="Pansement">Pansement</option>
                <option value="Machine de Prélevement">Machine de Prélevement</option>
               </select>
        </div>
        <br />
        <div class="col-md-12">
               <label for="qte" class="form-label">Quantité</label>
               <input type="text" class="form-control" id="nom" name="qte" placeholder="10" required>
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelmodal">Annuler</button>
        <input type="submit" value="Valider" class="btn btn-primary" id="valider">
      </div>
      </form>
    </div>
  </div>
</div>

  
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
                    <table>
                        <?php
                        $seringe = DB::table('equips')->where('nom', '=', 'Seringue')->sum('qte');
                        $lit = DB::table('equips')->where('nom', '=', 'Lit Médical')->sum('qte');
                        $pan = DB::table('equips')->where('nom', '=', 'Pansement')->sum('qte');
                        $machine = DB::table('equips')->where('nom', '=', 'Machine de Prélevement')->sum('qte');
                        $bag = DB::table('equips')->where('nom', '=', 'Sac de Sang')->sum('qte');
                        ?>
                        <tr>
                            <td><img src="/assets/images/bed.png" alt="">
                                <p class="text text-dark"><b>{{$lit}}</b></p>
                                <p class="text text-dark">Lit Médical</p>
                            </td>
                            <td><img src="/assets/images/seringe.png" alt="">
                                <p class="text text-dark"><b>{{$seringe}}</b></p>
                                <p class="text text-dark">Seringue</p>
                            </td>
                            <td><img src="/assets/images/bag.png" alt="">
                                <p class="text text-dark"><b>{{$bag}}</b></p>
                                <p class="text text-dark">Sac de Sang</p>
                            </td>
                            <td><img src="/assets/images/pan.png" alt="">
                                <p class="text text-dark"><b>{{$pan}}</b></p>
                                <p class="text text-dark">Pansement</p>
                            </td>
                            <td><img src="/assets/images/transfusion.png" alt="">
                                <p class="text text-dark"><b>{{$machine}}</b></p>
                                <p class="text text-dark">Machine de prélevement</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <center><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Ajouter un équipement</a></center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 

    
</body>
</html>

