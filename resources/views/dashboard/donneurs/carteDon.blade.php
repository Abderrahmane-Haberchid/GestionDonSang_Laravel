<html>
    <head>
        <title>Laravel PDF</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table{
            width:400px;
            height:350px;
            float:center;
        }
    </style>
    </head>
    <body>
       <center>
        <table class="table">
        <p>Carte d'adhésion au Banque de Sang</p>
        <body>
              @foreach ($data as $row)
                  <tr>
                      <td><b>Prénom: </b>{{$row->fname}}</td>   
                      <td><b>Nom: </b>{{$row->lname}}</td>
                   </tr>   
                   <tr>
                      <td><b>Adresse: </b>{{$row->adr}}</td>
                      <td><b>Groupe Sanguin: </b>{{$row->gp}}</td>  
                  </tr>   
                  <tr>
                      <td><b>CIN: </b>{{$row->cin}}</td>
                  </tr>
              @endforeach
            </body>
          </table>
    </center>
    </body>
</html>