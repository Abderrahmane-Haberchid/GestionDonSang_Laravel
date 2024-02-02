<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Inscription</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
  </head>

  <style>

  </style>  

<body>
@extends('navbar')


<div class="card" style="width:700px;">
@if($errors->any())
    @foreach($errors->all() as $error)
      <center><div class="alert alert-danger" style="width:auto; padding:10px; font-size:15px;">{{ $error }}</div></center>
    @endforeach
  @endif
    <div class="card-header">
        <center><label class="form-label"><h4>Inscription</h4></label></center>
    </div>  

      <div class="card-body">
          <form action="{{ Route('register') }}" method="POST" class="row g-3">
          @csrf
             <div class="col-md-6">
               <label for="nom" class="form-label">Nom*</label>
               <input type="text" class="form-control" id="nom" name="lname" required>
             </div>

             <div class="col-md-6">
               <label for="namee" class="form-label">Prénom*</label>
               <input type="text" class="form-control" id="namee" name="fname" required>
             </div>

             <div class="col-md-6">
                <br />
              <label for="inputEmail4" class="form-label">Email*</label>
              <input type="email" class="form-control" id="inputEmail4" name="email" required>
             </div>

             <div class="col-md-6">
             <br />
              <label for="inputPassword4" class="form-label">Mot de passe*</label>
              <input type="password" class="form-control" id="inputPassword4" name="password" required>
             </div>

             <div class="col-12">
             <br />
               <label for="inputAddress" class="form-label">Addresse*</label>
               <input type="text" class="form-control" id="inputAddress" placeholder="1234 Rue Principale" name="adr" required>
             </div>

             <div class="col-md-6">
             <br />
               <label for="inputAddress2" class="form-label">CIN*</label>
               <input type="text" class="form-control" id="inputAddress2" placeholder="V111 999" name="cin" required>
             </div>
  
             <div class="col-md-6">
             <br />
               <label for="inputState" class="form-label">Groupe Sanguine*</label> <br />
                 <select id="inputState" class="form-control" name="gsang" required>
                    <option selected>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>B+</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>O+</option>
                    <option>O-</option>
                 </select>
             </div>

             <div class="col-md-6">
             <br />
               <label for="inputState" class="form-label">Vous êtes:*</label>
                 <select id="inputState" class="form-control" name="usertype" required>
                    <option selected>Donneur</option>
                    <option>Patient</option>
                 </select>
             </div>


             <div class="col-12">
             <br />
                  <button type="submit" class="btn btn-primary">Valider</button>
                  <a href="{{ Route('login'); }}" class="link-primary">Déjà Inscrit !</a>
             </div>
          </form>
     </div>
  </div>

  @extends('footer')

</body>
</html>