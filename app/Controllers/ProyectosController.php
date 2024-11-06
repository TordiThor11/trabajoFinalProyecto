<?php

namespace App\Controllers;

use App\Models\ProyectoModel;
use CodeIgniter\Database\Database;

class ProyectosController extends BaseController
{
    public function index(): string
    {
        return view('crear_proyecto');
    }


    public function save()
    {
        $data = $this->request->getPost(['nombre', 'plan_recompensas', 'fecha_limite', 'detalle', 'impacto_esperado', 'activo', 'objetivo', 'presupuesto_requerido', 'id_usuario_creador']);
        $proyectoModel = new ProyectoModel();
        $proyecto = $proyectoModel->save($data);
        return redirect()->to(base_url('/'));
    }



    public function mostrarDetalle($id)
    { //project_id pasar por parametro
        
        $db = db_connect();
        #Obtengo los datos usando el model
        $model = new ProyectoModel();
        $proyecto = $model->find($id);

        $sql = 'SELECT SUM(p.monto) as monto FROM usuario_patrocina_proyecto p WHERE p.id_proyecto = ?  GROUP BY p.id_proyecto';
        $query = $db->query($sql, $id);
       
        $proyecto->montoTotal = $query->getRow()->monto;
       
        $data = array('proyecto' => $proyecto);
        return $this->layout('view_detalle_proyecto', $data);
    }


    public function delete($id) ##no se si anda
    {
        ##no se si anda
        $proyectoModel = new ProyectoModel();
        $proyecto = $proyectoModel->save($id);
        return redirect()->to(base_url(''));
    }
    
    public function misProyectos()
    {
        $data = array();
        return $this->layout('view_misProyectos', $data);
    }
}
