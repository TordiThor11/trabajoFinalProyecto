<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">


                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Actualizar Proyecto</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('actualizarProyecto/' . $proyecto->id_proyecto) ?>" method="POST">

                        <div class="form-group">
                            <label for="proyectoNombre">Nombre del Proyecto</label>
                            <input type="text" class="form-control" id="proyectoNombre" name="proyectoNombre"
                                value="<?= $proyecto->nombre; ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="actualizacionNombre">Nombre de la actualizacion</label>
                            <input type="text" class="form-control" id="actualizacionNombre" name="actualizacionNombre">
                        </div>

                        <div class="form-group">
                            <label for="actualizacionDetalle">Detalle de la actualizacion</label>
                            <textarea class="form-control" id="actualizacionDetalle" name="actualizacionDetalle" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="avanceAgregado">Avance agregado en la actualizacion (en porcentaje)</label>
                            <input type="number" class="form-control" id="avanceAgregado" name="avanceAgregado"></textarea>
                        </div>

                        <div>
                            <a href="<?= base_url() ?>" class="btn btn-danger">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-primary">Confirmar</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>