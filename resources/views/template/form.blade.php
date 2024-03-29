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

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="/bien" class="navbar-brand mx-4 mb-3">
                    <h4 class="text-primary"><i class="fa fa-home"></i>BIEN_IMMOBILIER</h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ $user->nom }} {{ $user->prenom }}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/index" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Biens</a>
                    <a href="{{route('user')}}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Users</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Voir tout</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ $user->nom }} {{ $user->prenom }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
        <!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4 text-center">AJOUT D'UN BIEN</h6>
                <form enctype="multipart/form-data" action="{{ route('bien.store') }}" method="POST">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    @csrf 
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control bg-dark" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Categorie</label>
                        <select name="categorie" id="" class="form-control">
                            <option value="">---Veuillez choisir une catégorie---</option>
                            <option value="Luxe">Luxe</option>
                            <option value="Moyen">Moyen</option>
                            <option value="Classique">Classic</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse_localisation">
                    </div>
                    <div class="mb-3">
                        <label for="dimension" class="form-label">Dimension</label>
                        <input type="text" class="form-control" id="dimension" name="dimension">
                    </div>
                    <div class="mb-3">
                        <label for="nbrChambre" class="form-label">Nombre de Chambre</label>
                        <input type="number" class="form-control" id="nbrChambre" name="nbrChambre" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="imageChambre" class="form-label">Vue</label>
                        <input type="file" class="form-control bg-dark" id="imageChambre" multiple name="images[]" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="nbrToilette" class="form-label">Nombre de Toilette</label>
                        <input type="number" class="form-control" id="nbrToilette" name="nbrToilette" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="nbrBalcon" class="form-label">Nombre de Balcon</label>
                        <input type="number" class="form-control" id="nbrBalcon" name="nbrBalcon" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="nbrEspaceVert" class="form-label">Nombre Espace Vert</label>
                        <input type="number" class="form-control" id="nbrEspaceVert" name="nbrEspaceVert" min="1">
                    </div>
                    <fieldset class="row mb-3">Description
                        <textarea name="description" id="" cols="30" rows="10" class="bg-dark text-white"></textarea>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
<!-- Form End -->
<!-- Table Start -->
    <div class="row g-4"> 
        <div class="col-sm-12 ">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">LISTE DES BIENS COMMANDER</h6>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">IMAGE</th>
                            <th scope="col">NOM</th>
                            <th scope="col">DIMENSION</th>
                            <th scope="col">CATEGORIE</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">ADRESSE</th>
                            <th scope="col">NOMBRE DE CHAMBRE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bienUserCommander as $gestionBien)
                            @if($gestionBien->user_id === $user->id)
                                <tr>
                                    <td><img src="{{ url('public/images/'.$gestionBien->bien->image) }}" width="70" height="70" class="img img-responsive" alt=""></td>
                                    <td>{{$gestionBien->bien->nom}}</td>
                                    <td>{{$gestionBien->bien->dimension}}</td>
                                    <td>
                                        @if(strlen($gestionBien->bien->description) > 7)
                                            {{ Illuminate\Support\Str::limit($gestionBien->bien->description, 10, '...') }}
                                        @else
                                            {{ $gestionBien->bien->description }}
                                        @endif
                                    </td>
                                    <td>{{$gestionBien->bien->categorie}}</td>
                                    <td>{{$gestionBien->bien->adresse_localisation}}</td>
                                    <td>{{$gestionBien->bien->nbrChambre}}</td>
                                    <td>{{$gestionBien->bien->status}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('bien.detail', $gestionBien->bien->id) }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#detailSysteme"><i class="fas fa-eye"></i></a>
                                        <form method="POST" action="{{ route('bien.destroy',$gestionBien->bien->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-outline-primary" onclick="return confirmDelete()" title="Supprimer Bien"><i class="fas fa-trash"></i></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
<!-- Form End -->
<!-- Table Start -->
<div class="row g-4"> 
        <div class="col-sm-12 ">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">LISTE DES BIENS NON COMMANDER</h6>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">IMAGE</th>
                            <th scope="col">NOM</th>
                            <th scope="col">DIMENSION</th>
                            <th scope="col">CATEGORIE</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">ADRESSE</th>
                            <th scope="col">NOMBRE DE CHAMBRE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bienUserNonCommander as $gestionBien)
                            @if($gestionBien->user_id === $user->id)
                                <tr>
                                    <td><img src="{{ url('public/images/'.$gestionBien->bien->image) }}" width="70" height="70" class="img img-responsive" alt=""></td>
                                    <td>{{$gestionBien->bien->nom}}</td>
                                    <td>{{$gestionBien->bien->dimension}}</td>
                                    <td>
                                        @if(strlen($gestionBien->bien->description) > 7)
                                            {{ Illuminate\Support\Str::limit($gestionBien->bien->description, 10, '...') }}
                                        @else
                                            {{ $gestionBien->bien->description }}
                                        @endif
                                    </td>
                                    <td>{{$gestionBien->bien->categorie}}</td>
                                    <td>{{$gestionBien->bien->adresse_localisation}}</td>
                                    <td>{{$gestionBien->bien->nbrChambre}}</td>
                                    <td>{{$gestionBien->bien->status}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('bien.show', $gestionBien->bien->id) }}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('bien.detail', $gestionBien->bien->id) }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#detailSysteme"><i class="fas fa-eye"></i></a>
                                        <form method="POST" action="{{ route('bien.destroy',$gestionBien->bien->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-outline-primary" onclick="return confirmDelete()" title="Supprimer Bien"><i class="fas fa-trash"></i></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

<script>
    function confirmDelete() {
        if (!confirm("Etes Vous sûr de vouloir supprimer cette Enregistrement?")) {
            return false;
        }
    }
</script>
<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer End -->
</div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>