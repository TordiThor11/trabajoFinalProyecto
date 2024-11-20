<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Proyecto</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Estilos para el header */
        .navbar-custom {
            background-color: #6c5ce7;
            padding: 1rem;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
        }

        .navbar-custom .nav-link:hover {
            color: rgba(255, 255, 255, 0.8);
        }
                /* Estilos para el botón de inicio de sesión y menú desplegable */
        .nav-item.dropdown {
            margin-left: auto;
        }

        .nav-link {
            color: white !important;
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
        }

        .nav-link:hover {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .bi-person-circle {
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }

        /* Estilos para el menú desplegable cuando está logueado */
        .dropdown-menu {
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            right: 0;
            left: auto;
        }

        .dropdown-item {
            color: #333;
            padding: 0.5rem 1rem;
        }

        .dropdown-item:hover {
            background-color: #6c5ce7;
            color: white;
        }

        /* Ajuste para el botón de login cuando no está logueado */
        #loginButton {
            text-decoration: none;
            transition: color 0.2s ease;
        }

        #loginButton:hover {
            color: rgba(255, 255, 255, 0.8) !important;
            cursor: pointer;
        }

        /* Estilos para el contenido principal */
        .carousel-item img {
            max-height: 600px;
            object-fit: contain;
            background-color: #f8f9fa;
        }

        .project-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #333;
        }

        .btn:hover {
            transform: scale(1.05);
            transition: transform 0.2s;
        }

        .btn-primary {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
        }

        .btn-primary:hover {
            background-color: #5b4bc4;
            border-color: #5b4bc4;
        }

                /* Estilos para la barra de búsqueda */
        .search-container {
            background-color: #f8f9fa;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid #dee2e6;
        }

        .search-input {
            max-width: 500px;
            margin: 0 auto;
        }

        .search-input .form-control {
            border-radius: 20px;
            padding-left: 1rem;
            border: 1px solid #ced4da;
        }

        .search-input .form-control:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 0 0.25rem rgba(108, 92, 231, 0.25);
        }

        /* Estilos para las tarjetas de proyecto */
        .card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .card-img-top {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
            border-radius: 20px;
            padding: 0.5rem 1rem;
        }

        .btn-primary:hover {
            background-color: #5b4bc4;
            border-color: #5b4bc4;
            transform: scale(1.05);
            transition: transform 0.2s;
        }

        /* Estilos para el footer */
        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .main-content {
            min-height: calc(100vh - 300px);
        }
    </style>
</head>

<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <?php if (session()->get('isLoggedIn')): ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("misProyectos") ?>">Mis Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("misPatrocinios") ?>">Mis Patrociños</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("crear_proyecto") ?>">Crear Proyecto</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            <?php echo session()->get('mail'); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Configurar Perfil</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="ms-auto">
                <div class="nav-item">
                    <a class="nav-link" href="<?= base_url('login') ?>" id="loginButton">
                        <i class="bi bi-person-circle"></i>
                        Iniciar sesión
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </nav>

    
                            <!-- /* #Esto creo que deberia tratarse con un filter mejor#Esto creo que deberia tratarse con un filter mejor#Esto creo que deberia tratarse con un filter mejor
                        if (session()->get('isLoggedIn')) {
                            #si esta logueado
                            echo session()->get('mail');
                        } else {
                            #si NO esta logueado
                            #Esto creo que deberia tratarse con un filter mejor #Esto creo que deberia tratarse con un filter mejor #Esto creo que deberia tratarse con un filter mejor
                            echo 'Iniciar sesion';
                        }   TORDI GUARDE LOS COMENTARIOS QUE ESTABAN EN ESTA PARTE PORQUE DESPUES ME 
                         */
