<div class="container my-4">
    <h2 class="fw-bold text-primary mb-4">Mis Notificaciones</h2>

    <?php if (empty($notificaciones)): ?>
        <div class="alert alert-info text-center">
            <i class="bi bi-bell-slash fs-3"></i>
            <p class="mt-2">No tienes notificaciones nuevas.</p>
        </div>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($notificaciones as $notificacion): ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold text-dark"> <?= $notificacion->titulo ?> </div>
                        <small class="text-muted"> <?= $notificacion->descripcion ?> </small>
                        <br>
                        <small class="text-muted fst-italic">
                            Recibido el <?= date('d M Y, H:i', strtotime($notificacion->fecha)) ?>
                        </small>
                    </div>
                    <?php if (!$notificacion->leida): ?>
                        <span class="badge bg-primary rounded-pill">Nueva</span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<script>
    // Opcional: Lógica para marcar notificaciones como leídas (AJAX o redirección)
</script>