    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-4">
                    <h2 class="fw-bold"><i class="bi bi-credit-card me-2"></i>Completar Pago</h2>
                    <p class="text-muted">Complete los detalles para realizar su patrocinio</p>
                </div>

                <?php if (session()->get('error')): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div><?= session()->get('error') ?></div>
                    </div>
                <?php endif; ?>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="<?= base_url('proyectos/patrocinar/' . $id_proyecto) ?>" method="POST" id="paymentForm">
                            <!-- Monto de Inversión -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-currency-dollar me-2"></i>Monto de Inversión</h5>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control form-control-lg" id="montoInversion" 
                                           name="montoInversion" placeholder="Monto" min="1" required>
                                    <label for="montoInversion">Monto en USD</label>
                                    <div class="invalid-feedback">
                                        El monto debe ser mayor a 0
                                    </div>
                                </div>
                            </div>

                            <!-- Detalles de la Tarjeta -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-credit-card-2-front me-2"></i>Detalles de la Tarjeta</h5>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="cardName" name="cardName" 
                                           placeholder="Nombre" required>
                                    <label for="cardName">Nombre en la Tarjeta</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" 
                                           placeholder="Número" maxlength="19" required>
                                    <label for="cardNumber">Número de Tarjeta</label>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="expiryDate" name="expiryDate" 
                                                   placeholder="MM/AA" maxlength="5" required>
                                            <label for="expiryDate">Fecha de Expiración</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="cvv" name="cvv" 
                                                   placeholder="CVV" maxlength="4" required>
                                            <label for="cvv">CVV</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botones -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-lock-fill me-2"></i>Pagar Ahora
                                </button>
                                <button type="button" onclick="window.history.back()" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Formateo del número de tarjeta
        document.getElementById('cardNumber').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(.{4})/g, '$1 ').trim();
            e.target.value = value;
        });

        // Formateo de la fecha de expiración
        document.getElementById('expiryDate').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });

        // Validación del formulario
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            const monto = document.getElementById('montoInversion');
            if (monto.value <= 0) {
                event.preventDefault();
                monto.classList.add('is-invalid');
                monto.focus();
            } else {
                monto.classList.remove('is-invalid');
            }
        });
    </script>
