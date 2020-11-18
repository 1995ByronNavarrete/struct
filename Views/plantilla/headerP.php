<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelApp Nic</title>
    <!-- Complementos Css -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css" />

    <!-- Estilos Propios -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/style.css">

</head>

<body>
    <!--Idiomas-->
    <div class="container-fluid" id="c-nav-1">
        <div class="container">
            <ul class="nav justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Idiomas</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fa fa-flag mr-2"></i>Español</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-flag mr-2"></i>Inglés</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-flag mr-2"></i>Frances</a>
                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item"><a class="nav-link text-white" href="login.php">Iniciar Sesión</a></li>
            </ul>
        </div>
    </div>

    <!--Barra de navegacion principal-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="index">
                <img src="<?= BASE_URL ?>assets/img/logo1.png" width="120" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end font-weight-bold" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>hoteles">HOTELES</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>tours">TOURS</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>restaurantes">RESTAURANTES</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>interpretes">INTERPRETES</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>nosotros">NOSOTROS</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>Registrar">Registrar</a></li>
                </ul>
            </div>
        </div>
    </nav>