<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">


                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Modificar Proyecto</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('modificarProyecto/'. $proyecto->id_proyecto) ?>" method="POST">
                        <div class="form-group">
                            <label for="proyectoNombre">Nombre del Proyecto</label>
                            <input type="text" class="form-control" id="proyectoNombre" name="proyectoNombre"
                                value="<?= $proyecto->nombre; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="proyectoDetalle">Detalle del Proyecto</label>
                            <textarea class="form-control" id="proyectoDetalle" name="proyectoDetalle"
                                rows="3"><?= $proyecto->detalle; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proyectoFecha">Fecha Límite</label>
                            <input type="text" class="form-control" id="proyectoFecha"
                                value="<?= $proyecto->fecha_limite; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="proyectoImpacto">Objetivo</label>
                            <textarea class="form-control" id="proyectoImpacto" rows="3"
                                disabled><?= $proyecto->objetivo; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proyectoImpacto">Impacto Esperado</label>
                            <textarea class="form-control" id="proyectoImpacto" rows="3"
                                disabled><?= $proyecto->impacto_esperado; ?></textarea>
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