<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProyectoModel;

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


    public function mostrarDetalle()
    { //project_id pasar por parametro

        #Obtengo los datos usando el model
        $model = new ProyectoModel();
        $data['proyectos'] = $model->find(1);

        
        return $this->layout('view_detalle_proyecto.php', $data);
    }
}
