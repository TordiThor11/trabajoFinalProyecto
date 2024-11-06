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
        color: rgba(255,255,255,0.8);
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
                        <a class="nav-link" href="<?= base_url("crear_proyecto") ?>">Crear Proyecto</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person-circle"></i> Mi Perfil
                    </a>
                </div>
            </div>
        </div>
    </nav>