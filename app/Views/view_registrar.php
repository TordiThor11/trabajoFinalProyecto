<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        /* Estilos básicos para el contenedor y el formulario */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #E0D8F0;
            font-family: Arial, sans-serif;
        }
        header {
            width: 100%;
            background-color: #6C5CE7;
            color: white;
            padding: 1rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }
        footer {
            width: 100%;
            background-color: #FFFFFF;
            color: #6C5CE7;
            padding: 1rem;
            text-align: center;
            font-size: 1rem;
            margin-top: 2rem; /* Espacio entre el formulario y el footer */
        }
        .container {
            width: 90%;
            max-width: 400px;
            background-color: #FFFFFF;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-top: 2rem;
        }
        .container h3 {
            color: #6C5CE7;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #6C5CE7;
            font-size: 14px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 0.5rem;
            border: 1px solid #D1C4E9;
            border-radius: 8px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #6C5CE7;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #574B9F;
        }
        .back-button {
            margin-top: 1rem;
            background-color: #ccc;
            color: black;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #aaa;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<header>
    Bienvenido a la Plataforma de Registro
</header>

<div class="container">
    <h3>Registrarse</h3>
    <form action="<?= base_url('registrar/guardar') ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" id="mail" name="mail" required>
        </div>
        <div class="form-group">
            <label for="contrasenia">Contraseña</label>
            <input type="password" id="contrasenia" name="contrasenia" required>
        </div>
        <button type="submit">Registrar</button>
    </form>
    <button class="back-button" onclick="window.history.back()">Volver</button>
</div>

<?php if (session()->has('validation')): ?>
    <div class="alert alert-danger">
        <?= session('validation')->listErrors() ?>
    </div>
<?php endif; ?>

<footer>
    © 2024 Tu Empresa. Todos los derechos reservados.
</footer>

</body>
</html>
