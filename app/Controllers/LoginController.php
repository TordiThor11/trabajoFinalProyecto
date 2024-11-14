<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        // Carga la vista de login
        return view('view_login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $mail = $this->request->getVar('mail');
        $contrasenia = $this->request->getVar('contrasenia');

        $usuario = $userModel->verificarUsuario($mail, $contrasenia);

        if ($usuario) {
            $session->set([
                'id_usuario' => $usuario['id_usuario'],
                'mail' => $usuario['mail'],
                'tipo_usuario' => $usuario['tipo_usuario'],
                'isLoggedIn' => true
            ]);

            // Redirigir al home después de un inicio de sesión exitoso
            return redirect()->to('/');
        } else {
            $session->setFlashdata('error', 'Correo electrónico o contraseña incorrectos.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
