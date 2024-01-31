<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>

<body>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">SE DECONNECTER</button>
            </form>
                <div class="block-heading">
                    <h2 class="text-info">Bienvenue {{ $user->nom }} {{$user->prenom}}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>

                <div class="row justify-content-center">
    @foreach($biens as $bien)
        <div class="col-sm-6 col-lg-4">
            <div class="card text-center clean-card position-relative">
                <img class="card-img-top w-100 d-block" src="{{url('public/images/'.$bien->bien->image) }}">
                <a href="{{ route('detailBien', ['id' => $bien->bien->id]) }}" class="btn btn-success position-absolute top-50 start-50 translate-middle" style="opacity: 0.8;">Voir plus</a>
            </div>
        </div>
    @endforeach
</div>

            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>