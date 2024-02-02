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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
<!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile ') }}
        </h2>
    </x-slot>

    <style>
        #activate{ background-color: #dc3545; }
        #cancelmodal{background-color:#565e64;}
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
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous sûr de vouloir activer ce compte ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelmodal">Annuler</button>
        <a href="{{Route('activate_user.post', $iduser)}}" class="btn btn-primary">Activer</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal 2 to suspend account -->

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous sur de vouloir suspendre ce compte ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelmodal">Annuler</button>
        <a href="{{Route('suspend.post', $iduser)}}" class="btn btn-primary">Suspendre le compte !</a>
      </div>
    </div>
  </div>
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <center>
                @if(session()->get('success') != "")   
                           <div class="alert alert-success d-flex align-items-center" width="500px" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                    {{session()->get('success')}}
                            </div>
                            </div>
                    @endif               

                <?php                 
                 $users = DB::table('users')->where('id', '=', $iduser)->get();
                ?>
                        
        <table class="table">
        <p class="text text-dark"><b>Consulter les détails </b></p>
        
        <br />
        @foreach($users as $user)
                  <tr>
                      <td><b>Prénom: </b>{{$user->fname}}</td>   
                      <td><b>Nom: </b>{{$user->lname}}</td>
                   </tr>   
                   <tr>
                      <td><b>Statut: </b>{{$user->usertype}}</td>
                      <td><b>Groupe Sanguin: </b>{{$user->gp}}</td>  
                  </tr>   
                  <tr>
                      <td><b>CIN: </b>{{$user->cin}}</td>
                      <td><b>Adresse: </b>{{$user->adr}}</td>
                  </tr>
                  <tr>
                      <td><b>email: </b>{{$user->email}}</td>
                      <td><b>Etat du compte: </b>{{$user->etat}}</td>
                  </tr>
                  <tr>
                      <td><b>Rendez-vous en cours: </b>{{$user->rdv}}</td>
                      <td><b>Compte créé le: </b>{{$user->created_at}}</td>
                  </tr>
                  @if($user->etat == "no")
                  <tr>  
                  <td><a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" id="activate">
                  Activer ce compte
                        </a>
                      <a href="{{ Route('dashboard') }}" class="btn btn-primary">Retour</a>      
                  </td>
                  </tr>
                 @elseif($user->etat == "yes") 
                 <tr>  
                  <td>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn btn-danger">Suspendre ce compte !</a>
                      <a href="{{ Route('allrdv.view') }}" class="btn btn-primary">Retour</a>      
                  </td>
                  </tr>
                 @endif
            @endforeach 

          </table>
          </center>        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    
</body>
</html>