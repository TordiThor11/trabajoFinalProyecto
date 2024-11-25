<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Completar Pago</h2>
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Detalles de Pago</h5>

                <form action="<?= base_url('proyectos/patrocinar/' . $id_proyecto) ?>" method="POST">
                    <!-- Monto de Donación -->
                    <div class="mb-3">
                        <label for="montoInversion" class="form-label">Monto de Inversión</label>
                        <input type="number" class="form-control" id="montoInversion" name="montoInversion" placeholder="Ej: 5000" min="1" required>
                    </div>

                    <!-- Nombre en la Tarjeta -->
                    <div class="mb-3">
                        <label for="cardName" class="form-label">Nombre en la Tarjeta</label>
                        <input type="text" class="form-control" id="cardName" name="cardName" placeholder="Nombre completo" required>
                    </div>

                    <!-- Número de Tarjeta -->
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Número de Tarjeta</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="0000 0000 0000 0000" required>
                    </div>

                    <!-- Fecha de Expiración y CVV -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expiryDate" class="form-label">Fecha de Expiración</label>
                            <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/AA" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required>
                        </div>
                    </div>

                    <!-- Botón de Pago -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validación personalizada para el monto
        document.querySelector("form").addEventListener("submit", function(event) {
            const monto = document.getElementById("montoInversion");
            if (monto.value <= 0) {
                event.preventDefault(); // Previene el envío del formulario
                monto.classList.add("is-invalid");
            } else {
                monto.classList.remove("is-invalid");
            }
        });
    </script>
</body>

</html>