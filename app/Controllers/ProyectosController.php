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
        return redirect()->to(base_url('Home::index'));
    }




    public function delete($id) ##no se si anda
    {
        ##no se si anda
        $proyectoModel = new \App\Models\ProyectoModel();
        $proyecto = $proyectoModel->save($id);
        return redirect()->to(base_url(''));
    }
}
