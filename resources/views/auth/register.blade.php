<!DOCTYPE html>
<html lang="fr">

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
<body>
<div class="container pt-4">
    <h1 align = "center" >Bienvenue De Création de Compte</h1><br><hr>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8">
                <div class="bg-secondary rounded p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                       <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="nom" :value="__('Nom')" class="form-label" />
                        <x-text-input id="nom" class="form-control" type="text" name="nom" :value="old('nom', '')" autofocus autocomplete="nom" />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>

                    <!-- Prenom -->
                    <div class="mb-3">
                        <x-input-label for="prenom" :value="__('Prenom')" class="form-label" />
                        <x-text-input id="prenom" class="form-control" type="text" name="prenom" :value="old('prenom', '')" autofocus autocomplete="prenom" />
                        <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                    </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')" class="form-label" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Password')" class="form-label" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Register Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <a class="btn btn-secondary me-3" href="{{ route('login') }}">
                                Connexion
                            </a>

                            <x-primary-button class="ms-3 alert alert-primary"> 
                                S'inscrire
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Footer Start -->
</body>

</html>