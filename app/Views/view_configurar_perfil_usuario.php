<body class="bg-light">
    <main class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-title h4 mb-0 text-center">
                            <i class="bi bi-person-gear me-2"></i>Configurar Perfil
                        </h2>
                    </div>
                    <div class="card-body p-4">
                        <?php if (session()->has('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i><?= session('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i><?= session('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('configuracion_perfil/guardar') ?>" method="post" class="needs-validation" novalidate>
                            <div class="mb-4">
                                <label for="nombre" class="form-label fw-bold">
                                    <i class="bi bi-person me-2"></i>Nombre
                                </label>
                                <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" 
                                       value="<?= esc($usuario['nombre']) ?>" required>
                                <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                            </div>

                            <div class="mb-4">
                                <label for="apellido" class="form-label fw-bold">
                                    <i class="bi bi-person me-2"></i>Apellido
                                </label>
                                <input type="text" class="form-control form-control-lg" id="apellido" name="apellido" 
                                       value="<?= esc($usuario['apellido']) ?>" required>
                                <div class="invalid-feedback">Por favor, ingrese su apellido.</div>
                            </div>

                            <div class="mb-4">
                                <label for="mail" class="form-label fw-bold">
                                    <i class="bi bi-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control form-control-lg" id="mail" name="mail" 
                                       value="<?= esc($usuario['mail']) ?>" required>
                                <div class="invalid-feedback">Por favor, ingrese un email válido.</div>
                            </div>

                            <div class="mb-4">
                                <label for="contrasenia" class="form-label fw-bold">
                                    <i class="bi bi-key me-2"></i>Contraseña
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" id="contrasenia" name="contrasenia" 
                                           placeholder="Dejar en blanco para mantener la actual">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Mínimo 8 caracteres, incluya números y símbolos para mayor seguridad.</small>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-check-circle me-2"></i>Guardar Cambios
                                </button>
                                <a href="<?= base_url() ?>" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Volver
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
