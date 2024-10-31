<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar (opcional, reutilizado de la vista principal) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Crowdfunding</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Formulario de Creación de Proyecto -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Crear un Nuevo Proyecto</h2>
        <form action="<?= base_url('proyectos/save') ?>" method="post">
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
                <label for="activo">Activo</label>
                <select class="form-control" id="activo" name="activo" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
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
                <label for="id_usuario_creador">ID del Usuario Creador</label>
                <input type="number" class="form-control" id="id_usuario_creador" name="id_usuario_creador" placeholder="ID del usuario creador" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Crear Proyecto</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>