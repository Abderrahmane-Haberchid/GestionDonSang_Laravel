

<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Mot de passe oublié</title>

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


<div class="card">
@if($errors->any())
    @foreach($errors->all() as $error)
      <center><div class="alert alert-danger" style="width:auto; padding:10px; font-size:15px;">{{ $error }}</div></center>
    @endforeach
  @endif


    <div class="card-header">
        <center><label class="form-label"><h4>Renseigner votre e-mail</h4></label></center>
    </div>  

    <div style="12px; margin:20px;">Vous avez oublié votre mot de passe ? Pas de soucis. Faîtes juste renseigner votre adresse e-mail et vous allez recevoir un lien pour le réinitialiser.</div>

      <div class="card-body">
          <form action="{{ Route('login') }}" method="POST" class="row g-3">
          @csrf
             <div class="col-md-12">
               <input type="mail" class="form-control" id="email" name="email" placeholder="Email..." required>
               <br />
             </div>
            <div class="col-12">
                  <button type="submit" class="btn btn-primary">Vérifier mon e-mail</button>
            </div>
          </form>
     </div>
  </div>

  @extends('footer')

</body>
</html>
