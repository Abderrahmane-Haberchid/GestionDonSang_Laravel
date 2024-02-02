<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenu à votre espace ') }} {{ Auth::user()->lname }}
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     <br />
                     <center><p class="text text-primary"><b>Vous pouvez à travers votre espace client prendre un rendez-vous pour faire un don et aussi imprimer votre carte de don !</b></p>
                     <br />   
                     <p class="text text-secondary">Vos infos</p>
                        </center>   
                        <br /><br />
                        <table class="table table-striped table-hover">
        <p class="text text-dark"><b>Détail de votre profile:</b></p>
        
        <br /><br />
                  <tr>
                      <td><b>Prénom: </b>{{Auth::user()->fname}}</td>   
                      <td><b>Nom: </b>{{Auth::user()->lname}}</td>
                   </tr>   
                   <tr>
                      <td><b>Statut: </b>{{Auth::user()->usertype}}</td>
                      <td><b>Groupe Sanguin: </b>{{Auth::user()->gp}}</td>  
                  </tr>   
                  <tr>
                      <td><b>CIN: </b>{{Auth::user()->cin}}</td>
                      <td><b>Adresse: </b>{{Auth::user()->adr}}</td>
                  </tr>
                  <tr>
                      <td><b>email: </b>{{Auth::user()->email}}</td>
                      <td><b>Etat du compte: </b>{{Auth::user()->etat}}</td>
                  </tr>
                  <tr>
                      <td><b>Rendez-vous en cours: </b>{{Auth::user()->rdv}}</td>
                      <td><b>Compte créé le: </b>{{Auth::user()->created_at}}</td>
                  </tr>
             
          </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>