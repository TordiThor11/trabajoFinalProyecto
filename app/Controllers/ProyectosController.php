<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProyectosController extends BaseController
{
    public function index(): string
    {
        return view('crear_proyecto');
    }


    public function save()
    {
        $data = $this->request->getPost(['nombre', 'plan_recompensas', 'fecha_limite', 'detalle', 'impacto_esperado', 'activo', 'objetivo', 'presupuesto_requerido', 'id_usuario_creador']);
        $proyectoModel = new \App\Models\ProyectoModel();
        $proyecto = $proyectoModel->save($data);
        return redirect()->to(base_url('/'));
    }




    public function delete($id)
    {

        $userModel = new UserModel();

        $user = $userModel->delete($id);

        return redirect()->to(base_url('usuarios'));
    }


    public function list()
    {

        $userModel = new UserModel();
        $usuarios = $userModel->findAll();

        $data = [
            'titulo' => 'Mi lista de usuarios',
            'titulo2' => 'Esta es la lista de usuarios',
            'usuarios' => $usuarios
        ];

        return $this->layout('users/list', $data);
    }
}