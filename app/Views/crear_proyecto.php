<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <!-- Formulario de Creación de Proyecto -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Crear un Nuevo Proyecto</h2>
        <form action="<?= base_url('proyectos/save') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del Proyecto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del proyecto" required>
            </div>

            <div class="form-group">
                <label for="plan_recompensas">Plan de Recompensas</label>
                <input type="text" class="form-control" id="plan_recompensas" name="plan_recompensas" placeholder="Describa el plan de recompensas" required>
            </div>

            <div class="form-group">
                <label for="fecha_limite">Fecha Límite</label>
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" required>
            </div>

            <div class="form-group">
                <label for="detalle">Detalle del Proyecto</label>
                <textarea class="form-control" id="detalle" name="detalle" rows="3" placeholder="Detalles del proyecto" required></textarea>
            </div>

            <div class="form-group">
                <label for="impacto_esperado">Impacto Esperado</label>
                <textarea class="form-control" id="impacto_esperado" name="impacto_esperado" rows="3" placeholder="Descripción del impacto esperado" required></textarea>
            </div>

            <div class="form-group">
                <label for="objetivo">Objetivo</label>
                <input type="text" class="form-control" id="objetivo" name="objetivo" placeholder="Objetivo del proyecto" required>
            </div>

            <div class="form-group">
                <label for="presupuesto_requerido">Presupuesto Requerido</label>
                <input type="number" class="form-control" id="presupuesto_requerido" name="presupuesto_requerido" placeholder="Presupuesto en $USD" required>
            </div>

            <div class="form-group">
                <label for="imagen_principal">Imagen del Proyecto</label>
                <input type="file" class="form-control-file" id="imagen_principal" name="imagen_principal" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Crear Proyecto</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>