<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      background-color: #E0D8F0;
      font-family: Arial, sans-serif;
    }

    .login-container {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      /* Agregamos margin-top negativo para compensar el espacio del footer */
      margin-top: -5vh;
      /* Agregamos min-height para asegurar que ocupe suficiente espacio */
      min-height: 80vh;
    }

    .login-box {
      width: 90%;
      max-width: 400px;
      background-color: #FFFFFF;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
      /* Agregamos margin para separarlo del footer */
      margin-bottom: 2rem;
    }

    /* El resto de los estilos permanecen igual */
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

    form label {
      color: #6C5CE7;
      font-size: 14px;
      margin-bottom: 0.5rem;
      display: block;
    }

    form input[type="email"],
    form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 0.5rem 0 1rem;
      border: 1px solid #D1C4E9;
      border-radius: 8px;
      font-size: 16px;
    }

    form button {
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

    form button:hover {
      background-color: #574B9F;
    }

    .links {
      margin-top: 1rem;
      font-size: 14px;
    }

    .links a {
      color: #6C5CE7;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    }

    footer {
      background-color: #f8f9fa;
      padding: 2rem 0;
      margin-top: auto;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <div class="icon-container">
        <span class="icon">👤</span>
      </div>
      <form action="<?= base_url('login') ?>" method="post">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Iniciar sesión</button>
      </form>
      <div class="links">
        <a href="<?= base_url('registrar') ?>">¿No tienes una cuenta?</a>
      </div>
    </div>
  </div>

  <?php include('templates/footer_login.php'); ?>
</body>
</html>