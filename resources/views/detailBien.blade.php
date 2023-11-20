<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BIEN_IMMOBILIER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>            <!-- Navbar End -->
            <div class="container mt-2">
    @if(session('success'))
        <div class="alert alert-success">
            return {{session('success')}}
        </div>
    @endif
<div class="row">
    <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;"><h2> Détail concernant le bien {{$bien->nom}}</h2></div>
        <div class="row col-md-8">
            <div class="col-md-6 mt-5">               

               <h4> Nom : {{$bien->nom}} </h4> 
               <h4> description : {{$bien->description}} </h4> 
               <h4> categorie : {{$bien->categorie}} </h4> 
               <h4> adresse_localisation : {{$bien->adresse_localisation}} </h4> 
               <h4> status : {{$bien->status}} </h4> 
 
        </div>
        <div class="col-md-3 mt-5">   
            <table>
                <tr><td><img src="{{ url('public/images/'.$bien->image) }}" width="200" height="200" class="img img-responsive" alt=""></td></tr>
            </table>
        </div>
        </div>

        <div class="col-md-3"> 
                <h5 style="text-align: center;" class="mt-2">Commentaires</h5>
                <form enctype="multipart/form-data" action="{{ route('commentaire.store') }}"  method="POST">
                    @csrf
                    
                    <input type="hidden" name="id_bien" value="{{$bien->id}}">
                    @foreach($users as $user)
                    <input type="hidden" name="id_user" value="{{$user->id}}">
                    @endforeach
                    <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
                    <button type="submit" class="">Commenter</button>
                </form>
                </div>

            </div>
             @foreach($comments as $comment)
             <p>{{$comment->user->prenom}} {{$comment->user->nom}}</p>
             <p>{{$comment->contenu}}</p>
             @endforeach
           

</body>

</html>