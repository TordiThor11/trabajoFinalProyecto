<div class="container mt-3">
    <ul class="list-group">
        <?php foreach ($proyectos as $proyecto): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div><?=$proyecto->nombre?></div>
                <div>
                    <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>" class="btn btn-primary">Ver Proyecto</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


   
