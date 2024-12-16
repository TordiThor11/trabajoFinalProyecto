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
                        <!-- Título y mensaje -->
                        <div class="fw-bold text-dark">
                            <?= $notificacion->titulo ?>
                        </div>
                        <small class="text-muted"><?= $notificacion->mensaje ?></small>
                        <br>
                        <small class="text-muted fst-italic">
                            Recibido el <?= date('d M Y, H:i', strtotime($notificacion->fecha)) ?>
                        </small>
                        <br>

                        <!-- Proyecto -->
                        <?php if ($notificacion->proyecto): ?>
                            <a href="<?= base_url('detalleProyecto/' . $notificacion->proyecto->id_proyecto) ?>"
                                class="text-primary fw-bold text-decoration-none">
                                <?= $notificacion->proyecto->nombre ?>
                            </a>
                            <p class="mt-2 mb-1 text-secondary fw-semibold">Estado actual del proyecto:</p>

                            <!-- Barra de progreso -->
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar 
                                            <?php
                                            if ($notificacion->proyecto->avance_total < 30) echo 'bg-danger';
                                            elseif ($notificacion->proyecto->avance_total < 70) echo 'bg-warning';
                                            else echo 'bg-success';
                                            ?>"
                                    role="progressbar"
                                    style="width: <?= $notificacion->proyecto->avance_total ?>%;"
                                    aria-valuenow="<?= $notificacion->proyecto->avance_total ?>"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                    <?= $notificacion->proyecto->avance_total ?>%
                                </div>
                            </div>
                        <?php else: ?>
                            <span class="text-danger">Proyecto no encontrado</span>
                        <?php endif; ?>
                    </div>

                    <!-- Badge de Nueva Notificación -->
                    <?php if (!$notificacion->leido): ?>
                        <span class="badge bg-primary rounded-pill align-self-center">Nueva</span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>