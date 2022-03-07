<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demande success!</title>
   <link rel="stylesheet" href="{{ asset('bootstrap.min.css')}}">
 
</head>
<body class="d-flex justify-content-center p-5 pt-5">
    <div class="card">
        <div class="card-header bg-success text-white" style="font-size: 15px"> Demande enregistrée</div>
        <div class="card-body p-6 pt-6">
            <p style="font-size: 15px"> Votre demnade est soumise</p> </br></br>
            <a href="{{route ('admin.admindashboard.index')}}" class="btn btn-sm btn-primary" style="font-size: 14px">Retour au tableau de bord</a>
            <a href="{{route ('admin.Demande.index')}}" class="btn btn-sm btn-primary" style="font-size: 14px">Retour à la nouvelle page de demande</a>
        </div>
    </div>
</body>
</html>