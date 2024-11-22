<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Crowdfunding</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                </ul>
                <div class="d-flex">
                    <a class="btn btn-outline-light" href="<?= base_url('login') ?>">
                        <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container flex-grow-1 d-flex justify-content-center align-items-center py-5">
        <div class="card shadow-sm rounded-3" style="max-width: 450px; width: 100%;">
            <div class="card-body p-4">
                <!-- User Icon -->
                <div class="text-center mb-4">
                    <div class="bg-primary rounded-circle d-inline-flex justify-content-center align-items-center mb-2" 
                         style="width: 64px; height: 64px;">
                        <i class="bi bi-person-plus-fill text-white fs-1"></i>
                    </div>
                    <h4 class="card-title text-primary">Crear Cuenta</h4>
                </div>

                <!-- Validation Errors -->
                <?php if (session()->has('validation')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session('validation')->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Registration Form -->
                <form action="<?= base_url('registrar/guardar') ?>" method="post">
                    <!-- Nombre Field -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">
                            <i class="bi bi-person-fill text-primary me-1"></i>
                            Nombre
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="nombre" 
                               name="nombre" 
                               required
                               autocomplete="given-name"
                               placeholder="Ingresa tu nombre">
                    </div>

                    <!-- Apellido Field -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">
                            <i class="bi bi-person-fill text-primary me-1"></i>
                            Apellido
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="apellido" 
                               name="apellido" 
                               required
                               autocomplete="family-name"
                               placeholder="Ingresa tu apellido">
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="mail" class="form-label">
                            <i class="bi bi-envelope-fill text-primary me-1"></i>
                            Correo electrónico
                        </label>
                        <input type="email" 
                               class="form-control" 
                               id="mail" 
                               name="mail" 
                               required
                               autocomplete="email"
                               placeholder="ejemplo@correo.com">
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="contrasenia" class="form-label">
                            <i class="bi bi-lock-fill text-primary me-1"></i>
                            Contraseña
                        </label>
                        <input type="password" 
                               class="form-control" 
                               id="contrasenia" 
                               name="contrasenia" 
                               required
                               autocomplete="new-password"
                               placeholder="Crea una contraseña segura">
                    </div>

                    <!-- Submit Buttons -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-person-plus me-1"></i>
                        Crear cuenta
                    </button>

                    <!-- Login Link -->
                    <div class="text-center mt-3">
                        <span class="text-muted">¿Ya tienes una cuenta?</span>
                        <a href="<?= base_url('login') ?>" class="text-primary text-decoration-none ms-1">
                            Inicia sesión aquí
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 border-top">
        <div class="container">
            <p class="mb-0 text-muted">&copy; <?= date('Y') ?> Crowdfunding. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>