
    <div class="container mt-3">
       
    <?php foreach ($proyectos as $proyecto): ?>
        <div class="item d-flex justify-content-between align-items-center">
            <div><?=$proyecto->nombre?> -- Monto Invertido: <?=$proyecto->monto?> </div>
            <div>
            <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>" 
            class="btn btn-primary">Ver Proyecto</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    

