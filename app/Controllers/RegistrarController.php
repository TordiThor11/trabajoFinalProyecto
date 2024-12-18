<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class RegistrarController extends Controller
{
    public function index()
    {
        // Carga la vista de registro
        return view('view_registrar');
    }

    public function guardar()
    {
        // Valida los datos del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre'      => 'required|min_length[3]|max_length[50]',
            'apellido'    => 'required|min_length[3]|max_length[50]',
            'mail'        => 'required|valid_email|is_unique[usuarios.mail]',
            'contrasenia' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Si hay errores de validación, vuelve a la vista de registro con los errores
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Crea una instancia del modelo de usuario
        $usuarioModel = new UserModel();

        // Datos del formulario
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'apellido'    => $this->request->getPost('apellido'),
            'mail'        => $this->request->getPost('mail'),
            'contrasenia' => $this->request->getPost('contrasenia'), // Sin hashear la contraseña
            'tipo_usuario' => '0' // Ajusta según el valor predeterminado deseado
        ];

        // Guarda en la base de datos
        if ($usuarioModel->insert($data)) {
            // Iniciar sesión automáticamente después del registro
            $session = session();
            $session->set([
                'id_usuario' => $usuarioModel->insertID(), // Obtener el ID del usuario insertado
                'mail' => $data['mail'],
                'tipo_usuario' => $data['tipo_usuario'],
                'isLoggedIn' => true
            ]);

            // Redirigir al home
            return redirect()->to('/');
        } else {
            // Redirige con un mensaje de error si la inserción falla
            return redirect()->back()->with('error', 'Error al registrar el usuario.');
        }
    }
}
