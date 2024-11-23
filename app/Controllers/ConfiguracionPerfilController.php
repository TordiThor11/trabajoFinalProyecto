<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ConfiguracionPerfilController extends BaseController
{
    public function index()
    {
        $session = session();
        $userModel = new UserModel();
        $userId = $session->get('id_usuario');

        $usuario = $userModel->find($userId);
        if (!$usuario) {
            return redirect()->to('/')->with('error', 'Usuario no encontrado.');
        }

        $data['usuario'] = $usuario;
        return $this->layout('view_configurar_perfil_usuario', $data);
    }

    public function guardar()
    {
        $session = session();
        $userModel = new UserModel();
        $userId = $session->get('id_usuario');

        $data = $this->request->getPost(['nombre', 'apellido', 'mail']);
        $contrasenia = $this->request->getPost('contrasenia');

        // Verificar si el email ya existe en la base de datos
        $existingUser = $userModel->where('mail', $data['mail'])->first();
        if ($existingUser && $existingUser['id_usuario'] != $userId) {
            return redirect()->back()->with('error', 'El email ya existe en la base de datos.');
        }

        if ($contrasenia) {
            $data['contrasenia'] = $contrasenia;
        }

        if ($userModel->update($userId, $data)) {
            $session->set('mail', $data['mail']);
            return redirect()->to('/configuracion_perfil')->with('success', 'Perfil actualizado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar el perfil.');
        }
    }
}
