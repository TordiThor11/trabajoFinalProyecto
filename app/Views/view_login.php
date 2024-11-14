<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <style>
    /* Estilos generales */
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #dfe6e9, #b2bec3);
      font-family: Arial, sans-serif;
      color: #333;
    }

    /* Header */
    header {
      background-color: #6C5CE7;
      color: white;
      padding: 1rem;
      text-align: center;
      font-size: 1.5rem;
      font-weight: bold;
    }

    /* Contenedor principal del login */
    .login-container {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: -5vh;
      min-height: 80vh;
    }

    /* Caja de login */
    .login-box {
      width: 90%;
      max-width: 400px;
      background-color: #FFFFFF;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    /* Icono de perfil */
    .icon-container {
      background-color: #6C5CE7;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin: 0 auto 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: white;
    }

    /* Estilos del formulario */
    form label {
      color: #6C5CE7;
      font-size: 14px;
      margin-bottom: 0.5rem;
      display: block;
      font-weight: 600;
      text-align: left;
    }

    form input[type="email"],
    form input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 0.5rem 0 1rem;
      border: 1px solid #D1C4E9;
      border-radius: 8px;
      font-size: 16px;
    }

    form button {
      width: 100%;
      padding: 12px;
      background-color: #6C5CE7;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    /* Enlaces y mensaje de error */
    .links {
      margin-top: 1rem;
      font-size: 14px;
    }

    .links a {
      color: #6C5CE7;
      text-decoration: none;
    }

    .alert {
      color: #721c24;
      background-color: #f8d7da;
      padding: 10px;
      margin-top: 1rem;
      border-radius: 5px;
    }

    /* Footer */
    footer {
      background-color: #f1f1f1;
      padding: 1rem;
      text-align: center;
      font-size: 0.9rem;
      color: #666;
      margin-top: auto;
    }

    footer a {
      color: #6C5CE7;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
   Crowdfunding
  </header>

  <!-- Contenedor del formulario de inicio de sesión -->
  <div class="login-container">
    <div class="login-box">
      <div class="icon-container">
        <span class="icon">👤</span>
      </div>

      <!-- Mensaje de error, si la autenticación falla -->
      <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert">
              <?= session()->getFlashdata('error') ?>
          </div>
      <?php endif; ?>

      <form action="<?= base_url('login') ?>" method="post">
        <label for="mail">Correo electrónico</label>
        <input type="email" id="mail" name="mail" required>

        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" required>

        <button type="submit">Iniciar sesión</button>
      </form>

      <div class="links">
        <a href="<?= base_url('registrar') ?>">¿No tienes una cuenta?</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Crowdfunding. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
