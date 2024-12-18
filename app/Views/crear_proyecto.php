    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <!-- Encabezado del formulario -->
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Crear Nuevo Proyecto</h2>
                            <p class="text-muted">Complete los detalles de su proyecto para comenzar</p>
                        </div>

                        <form action="<?= base_url('proyectos/save') ?>" method="post" enctype="multipart/form-data">
                            <!-- Información básica -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Información Básica</h5>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del Proyecto</label>
                                    <input type="text" class="form-control form-control-lg" id="nombre" name="nombre"
                                        placeholder="Ej: Mi Proyecto Innovador" required>
                                </div>

                                <div class="mb-3">
                                    <label for="objetivo" class="form-label">Objetivo</label>
                                    <input type="text" class="form-control" id="objetivo" name="objetivo"
                                        placeholder="Ej: Desarrollar una solución sostenible..." required>
                                </div>
                            </div>

                            <!-- Detalles del proyecto -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-file-text me-2"></i>Detalles del Proyecto</h5>
                                <div class="mb-3">
                                    <label for="detalle" class="form-label">Descripción Detallada</label>
                                    <textarea class="form-control" id="detalle" name="detalle" rows="4"
                                        placeholder="Describe detalladamente tu proyecto..." required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="impacto_esperado" class="form-label">Impacto Esperado</label>
                                    <textarea class="form-control" id="impacto_esperado" name="impacto_esperado" rows="4"
                                        placeholder="¿Qué cambios positivos generará tu proyecto?" required></textarea>
                                </div>
                            </div>

                            <!-- Financiamiento y fechas -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-currency-dollar me-2"></i>Financiamiento y Plazos</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="presupuesto_requerido" class="form-label">Presupuesto Requerido (USD)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="presupuesto_requerido"
                                                name="presupuesto_requerido" placeholder="0.00" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha_limite" class="form-label">Fecha Límite</label>
                                        <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="plan_recompensas" class="form-label">Plan de Recompensas</label>
                                    <textarea class="form-control" id="plan_recompensas" name="plan_recompensas" rows="3"
                                        placeholder="Describe las recompensas para los patrocinadores..." required></textarea>
                                </div>
                            </div>

                            <!-- Imagen -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-image me-2"></i>Imagen del Proyecto</h5>
                                <div class="mb-3">
                                    <label for="imagen_principal" class="form-label">Imagen Principal</label>
                                    <input type="file" class="form-control" id="imagen_principal" name="imagen_principal"
                                        accept="image/*" required>
                                    <div class="form-text">Sube una imagen representativa de tu proyecto</div>
                                </div>
                            </div>
                            <!-- Avance inicial -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-speedometer2 me-2"></i>Avance Inicial</h5>
                                <div class="mb-3">
                                    <label for="avance_inicial" class="form-label">Avance Inicial (%)</label>
                                    <input type="number" class="form-control" id="avance_total" name="avance_total"
                                        placeholder="Ej: 25" min="0" max="99" required>
                                    <div class="form-text">Introduce un porcentaje entre 0 y 99.</div>
                                </div>
                            </div>


                            <!-- Botón de envío -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-rocket-takeoff me-2"></i>Crear Proyecto
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>