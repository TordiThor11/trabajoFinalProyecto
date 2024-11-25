<div class="container mt-3">
    <?php if (empty($proyectos)): ?>
        <div class="alert alert-info text-center p-4">
            <i class="fas fa-folder-open mb-3" style="font-size: 3rem;"></i>
            <h4>Aún no tienes proyectos creados</h4>
            <p class="mb-0">Comienza creando tu primer proyecto</p>
        </div>
    <?php else: ?>
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0">Mis Proyectos</h5>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($proyectos as $proyecto): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-project-diagram me-2"></i>
                            <span class="fw-medium"><?= htmlspecialchars($proyecto->nombre) ?></span>
                        </div>
                        <div>
                        <a href="<?= base_url() ?>preModificarProyecto/<?= $proyecto->id_proyecto; ?>" 
                               class="btn btn-primary btn-sm">
                                <i class="fas fa-eye me-1"></i>
                                Modificar
                            </a>
                            <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>" 
                               class="btn btn-primary btn-sm">
                                <i class="fas fa-eye me-1"></i>
                                Ver Proyecto
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>