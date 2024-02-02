<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('BIENVENUE AU DASHBOARD, ') }} {{ Auth::user()->lname }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <?php 
                        $users = DB::table('users')->where('etat', '=', 'no')->get();
                ?>
                        <table width="1200px" class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Groupe sanguin</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)

                                <?php $iduser = $user->id; ?>
                                
                                <tr>
                                
                                    <td><a href="{{Route('registerdetail.view', $iduser)}}">{{$user->lname}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->gp}}</td>
                                    <td>{{$user->usertype}}</td>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                                
                               @endforeach 
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 

