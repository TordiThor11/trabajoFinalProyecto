<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    protected $usuarioModel;

    public function __construct()
    {
        // Inicializa el modelo `UserModel`
        $this->usuarioModel = new UserModel();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'mail' => 'required|valid_email',
                'contrasenia' => 'required|min_length[5]'
            ];

            if (!$this->validate($rules)) {
                return view('view_login', [
                    'validation' => $this->validator
                ]);
            }

            $mail = $this->request->getPost('mail');
            $contrasenia = $this->request->getPost('contrasenia');
            $usuario = $this->usuarioModel->verificarUsuario($mail, $contrasenia);

            if ($usuario) {
                $sessionData = [
                    'id_usuario' => $usuario['id_usuario'],
                    'nombre' => $usuario['nombre'],
                    'apellido' => $usuario['apellido'],
                    'mail' => $usuario['mail'],
                    'tipo_usuario' => $usuario['tipo_usuario'],
                    'logged_in' => true
                ];
                session()->set($sessionData);

                if ($usuario['tipo_usuario'] === 1) {
                    return redirect()->to('dashboard/admin');
                } else {
                    return redirect()->to('dashboard/usuario');
                }
            }

            session()->setFlashdata('error', 'Email o contraseña incorrectos');
            return redirect()->back();
        }

        return view('view_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/view_login');
    }
}
