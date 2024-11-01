<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Crowdfunding</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: transparent;
            border-bottom: none;
            text-align: center;
        }
        .form-control {
            background-color: #f8f9fa;
            color: #333;
            border: 1px solid #ccc;
        }
        .form-control:focus {
            background-color: #f8f9fa;
            color: #333;
            border-color: #1a73e8;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #1a73e8;
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #155bb5;
        }
        .card-footer {
            text-align: center;
            color: #666;
        }
        .card-footer a {
            color: #1a73e8;
            text-decoration: none;
        }
        .card-footer a:hover {
            text-decoration: underline;
        }
        .checkbox-label {
            display: flex;
            align-items: center;
        }
        .checkbox-label input {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-dark">INICIAR SESION</h3>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form id="loginForm" action="<?= base_url('login') ?>" method="post">
                        <div class="mb-3">
                            <label for="mail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasenia" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                        </div>
                        
                        <button type="button" class="btn btn-primary w-100" onclick="showAlert()">INICIAR</button>
                    </form>
                </div>
                <div class="card-footer">
                    <span>No eres miembro? <a href="#">Registrate</a></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAlert() {
            alert("localhost: funcionalidad en proceso");
        }
    </script>
</body>
</html>
