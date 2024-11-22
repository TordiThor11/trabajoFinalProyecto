<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Crowdfunding</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <a class="btn btn-outline-light" href="<?= base_url('registrar') ?>">
                        <i class="bi bi-pencil-square"></i> Registrarse
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container flex-grow-1 d-flex justify-content-center align-items-center py-5">
        <div class="card shadow-sm rounded-3" style="max-width: 400px; width: 100%;">
            <!-- Card Header -->
            <div class="card-body p-4">
                <!-- User Icon -->
                <div class="text-center mb-4">
                    <div class="bg-primary rounded-circle d-inline-flex justify-content-center align-items-center mb-2" 
                         style="width: 64px; height: 64px;">
                        <i class="bi bi-person-fill text-white fs-1"></i>
                    </div>
                    <h4 class="card-title text-primary">Iniciar Sesión</h4>
                </div>

                <!-- Error Messages -->
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form action="<?= base_url('login') ?>" method="post">
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
                               autocomplete="current-password"
                               placeholder="Ingresa tu contraseña">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Iniciar sesión
                    </button>

                    <!-- Registration Link -->
                    <div class="text-center">
                        <span class="text-muted">¿No tienes una cuenta?</span>
                        <a href="<?= base_url('registrar') ?>" class="text-primary text-decoration-none ms-1">
                            Regístrate aquí
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>