<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">


                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Modificar Proyecto</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('modificarProyecto/' . $proyecto->id_proyecto) ?>" method="POST">
                        <div class="form-group">
                            <label for="proyectoNombre">Nombre del Proyecto</label>
                            <textarea class="form-control" id="proyectoNombre" name="proyectoNombre"
                                rows="3"><?= $proyecto->nombre; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proyectoDetalle">Detalle del Proyecto</label>
                            <textarea class="form-control" id="proyectoDetalle" name="proyectoDetalle"
                                rows="3"><?= $proyecto->detalle; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proyectoFecha" class="form-label">Fecha Límite</label>
                            <input type="date" class="form-control" id="proyectoFecha" name="proyectoFecha" value="<?php echo htmlspecialchars($proyecto->fecha_limite); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="proyectoFecha">Presupuesto Requerido</label>
                            <textarea class="form-control" id="presupuestoRequerido" name="presupuestoRequerido"
                                rows="3"><?= $proyecto->presupuesto_requerido; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proyectoImpacto">Objetivo</label>
                            <textarea class="form-control" id="objetivo" name="objetivo"
                                rows="3"><?= $proyecto->objetivo; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proyectoImpacto">Impacto Esperado</label>
                            <textarea class="form-control" id="impactoEsperado" name="impactoEsperado"
                                rows="3"><?= $proyecto->impacto_esperado; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proyectoFecha">Plan de Reconpensas</label>
                            <textarea class="form-control" id="planRecompensas" name="planRecompensas"
                                rows="3"><?= $proyecto->plan_recompensas; ?></textarea>
                        </div>

                        <!-- Nuevo campo: Avance inicial -->
                        <div class="form-group">
                            <label for="avance_total">Avance Inicial (%)</label>
                            <input type="number" class="form-control" id="avance_total" name="avance_total"
                                value="<?= htmlspecialchars($proyecto->avance_total ?? 0); ?>"
                                min="0" max="99" step="1" required>
                            <small class="form-text text-muted">El avance inicial debe estar entre 0 y 99.</small>
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