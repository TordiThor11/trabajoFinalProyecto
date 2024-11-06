  <!-- Project Cards Section -->
    <div class="container mt-5">
        <div class="row">
            <!-- Ejemplo de carta de proyecto -->
            <?php foreach ($proyectos as $proyecto): ?>
                <div class="col-md-4">

                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="<?= $proyecto['nombre']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $proyecto['nombre']; ?></h5>
                            <p class="card-text"><?= $proyecto['fecha_limite']; ?></p>
                            <a href="http://localhost/ProyectoFinal/public/detalleProyecto/<?= $proyecto['id_proyecto']; ?>" 
                            class="btn btn-primary">Ver más</a>
                        </div> 
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
