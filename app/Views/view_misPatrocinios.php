<!-- application/views/items_view.php -->
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .item {
            padding: 10px;
            margin: 5px 0;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>