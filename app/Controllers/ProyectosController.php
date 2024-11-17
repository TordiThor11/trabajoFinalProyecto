<?php

namespace App\Controllers;

use App\Models\ProyectoModel;
use CodeIgniter\Database\Database;

class ProyectosController extends BaseController
{
    public function index(): string
    {
        $data = []; //Creo un array vacio para completar el parametro $data
        return $this->layout('crear_proyecto', $data);
    }


    public function save()
    {
        $data = $this->request->getPost(['nombre', 'plan_recompensas', 'fecha_limite', 'detalle', 'impacto_esperado', '1', 'objetivo', 'presupuesto_requerido', 'id_usuario_creador']);
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



        //INTENTO DE CORRECION: ERROR AL MOSTRAR EL MONTO TOTAL DE UN PROYECTO SI NO TIENE PATROCINADORES
        // dd($query->getRow());
        if ($query->getRow() == null) {
            $proyecto->montoTotal = 0;
        } else {
            $proyecto->montoTotal = $query->getRow()->monto; //cualquier cosa dejar solo esta linea y borrar todo que esta entre comentarios.
        }
        //FIN INTENTO DE CORRECION, solo se modifico lo que esta entre comentarios

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
        $data = array();    //Esto crea un array vacio. Es lo mismo que: "$data = [];"
        return $this->layout('view_misProyectos', $data);
    }

    public function patrocinar($idProyecto)
    {
        //Creo la session para obtener el id del usuario
        $session = session();
        $idUsuario = $session->get('id_usuario');
        if (!$idUsuario) {
            dd("No hay usuario logueado, esto deberia ser tratado con un filter");
        }

        //Guardo los el monto enviado desde el formulario en una variable
        $montoInversion = $this->request->getPost(['montoInversion']);    //Tambien se pueden pedir los demas datos del formulario de pago, no lo considero necesario

        //Guardo los datos en la db
        $db = db_connect(); // $proyectoModel = new ProyectoModel();
        $sql = "INSERT INTO usuario_patrocina_proyecto (id_usuario, id_proyecto, fecha, monto) VALUES (?, ?, ?, ?)";
        $db->query($sql, [$idUsuario, $idProyecto, date('Y-m-d H:i:s'), $montoInversion]);
        return redirect()->to(base_url('/detalleProyecto/' . $idProyecto));
    }
    public function ventanaDePago($idProyecto)
    {
        $data = array('id_proyecto' => $idProyecto);; //recibo el id pasado via get/parametros y lo envio al formulario de pago
        return $this->layout('view_patrocinar_proyecto', $data);
    }
}
