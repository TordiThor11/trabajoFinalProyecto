<?php

namespace App\Controllers;

use App\Models\ProyectoModel;
use App\Models\UserModel;
use App\Models\UsuarioPatrocinaProyectoModel;
use App\Models\VersionModel;
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
        //Obtengo el id del usuario logueado
        $session = session();
        $id_usuario_creador = $session->get('id_usuario');
        $data = ['id_usuario_creador' => $id_usuario_creador];

        //Obtengo los datos del formulario
        $formData = $this->request->getPost(['nombre', 'plan_recompensas', 'fecha_limite', 'detalle', 'impacto_esperado', 'estado', 'objetivo', 'presupuesto_requerido']);




        // Verifico si hay un archivo cargado
        $imagen = $this->request->getFile('imagen_principal');
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            // Genero un nombre único para la imagen
            $nuevoNombre = $imagen->getRandomName();
            // Muevo la imagen al directorio público (puedes ajustarlo según tus necesidades)
            $imagen->move(ROOTPATH . 'public/uploads/proyectos', $nuevoNombre);
            // Guardo el nombre del archivo en los datos del proyecto
            $formData['imagen_principal'] = $nuevoNombre;
        } else {
            // Manejar errores de carga de archivos
            return redirect()->back()->with('error', 'Error al cargar la imagen.');
        }




        //Unimos los arreglos
        $data = array_merge($data, $formData, ['activo' => 1]); //unimos los arreglos 

        //Guardo los datos en la db
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

        // dd($query->getRow());
        if ($query->getRow() == null) {
            $proyecto->montoTotal = 0;
        } else {
            $proyecto->montoTotal = $query->getRow()->monto; //cualquier cosa dejar solo esta linea y borrar todo que esta entre comentarios.
        }

        //Paso el usuario. UserModel trabaja como ARRAY, NO como objeto.
        $userModel = new UserModel();
        $usuario = $userModel->find($proyecto->id_usuario_creador);

        //Obtengo las actuqalizacioens del proyecto
        $versionModel = new VersionModel();
        $versiones = $versionModel->where('id_proyecto', $id)->findAll();


        //Creo el array con 'mail_usuario' y 'proyecto'.
        $data = array('mail_usuario' => $usuario['mail'], 'proyecto' => $proyecto, 'versiones' => $versiones);

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
        $proyectos = new ProyectoModel();
        $db = db_connect();
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $sql = 'SELECT * FROM `proyectos` p WHERE p.id_usuario_creador = ?;';
        $query = $db->query($sql, $id_usuario);


        $proyectos = $query->getResult();
        $data = array('proyectos' => $proyectos);

        return $this->layout('view_misProyectos', $data);
    }

    public function misPatrocinios()
    /*{
        $proyectos = new ProyectoModel();

        //obtengo el id del usuario
        $session = session();
        $idUsuario = $session->get('id_usuario');

        //Creo el modelo y llamo a la funcion para recuperar los patrocinios (esta creada dentro del model)
        $usuarioPatrocinaModel = new UsuarioPatrocinaProyectoModel();
        $proyectos = $usuarioPatrocinaModel->obtenerProyectosConMontoPorUsuario($idUsuario);

        // Pasamos los datos a la vista
        return $this->layout('view_misPatrocinios', ['proyectos' => $proyectos]);
    }*/

    #Antes del refactoring misPatrocinios:  Antes del refactoring misPatrocinios:  Antes del refactoring misPatrocinios:  Antes del refactoring misPatrocinios:
    {
        $proyectos = new ProyectoModel();
        $db = db_connect();
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $sql = 'SELECT p.*, u.monto FROM `usuario_patrocina_proyecto` u JOIN `proyectos` p ON p.id_proyecto = u.id_proyecto WHERE u.id_usuario = ?;';
        $query = $db->query($sql, [$id_usuario]); // Usa un array para pasar el valor del marcador de posición

        $proyectos = $query->getResult();
        $data = array('proyectos' => $proyectos);


        return $this->layout('view_misPatrocinios', $data);
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
        // Verificar que el monto sea mayor a 0
        if ($montoInversion <= 0) {
            return redirect()->back()->with('error', 'El monto debe ser mayor a 0.');
        }

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

    public function darBajaProyecto($idProyecto)
    {
        $db = db_connect();

        $sql = 'UPDATE `proyectos` SET `activo` = 0 WHERE `proyectos`.`id_proyecto` = ?;';
        $query = $db->query($sql, [$idProyecto]); // Usa un array para pasar el valor del marcador de posición

        $data = array();
        return redirect()->to(base_url('/detalleProyecto/' . $idProyecto));
    }

    public function buscarProyectoModificar($idProyecto)
    {
        $db = db_connect();
        #Obtengo los datos usando el model
        $model = new ProyectoModel();
        $proyecto = $model->find($idProyecto);

        $data = array('proyecto' => $proyecto);
        return $this->layout('view_modificar_proyecto', $data);
    }

    public function proyectoModificar($idProyecto)
    {
        $db = db_connect();
        #Obtengo los datos usando el model

        $detalle = $this->request->getPost(['proyectoDetalle']);

        $sql = 'UPDATE `proyectos` SET `detalle` = ? WHERE `proyectos`.`id_proyecto` = ?;';
        $query = $db->query($sql, [$detalle, $idProyecto]);

        return redirect()->to(base_url('/detalleProyecto/' . $idProyecto));
    }
    public function cargarDatosActualizacionProyecto($idProyecto)
    {
        $db = db_connect();
        #Obtengo los datos usando el model
        $model = new ProyectoModel();
        $proyecto = $model->find($idProyecto);

        $data = array('proyecto' => $proyecto);
        return $this->layout('view_actualizar_proyecto', $data);
    }

    public function actualizarProyecto($idProyecto) //deberia validar que exista nombre en backend
    {
        // helper('date'); // Helper de fechas, se usa en: 'now()'

        $db = db_connect();
        #creo el objeto version del proyecto
        $model = new VersionModel();

        //Obtengo los datos del formulario
        $formData = $this->request->getPost(['actualizacionNombre', 'actualizacionDetalle']);

        // Combino los arreglos y añado la fecha actual
        $data = array('id_proyecto' => $idProyecto, 'nombre' => $formData['actualizacionNombre'], 'descripcion' => $formData['actualizacionDetalle'], 'fecha' => date('Y-m-d H:i:s')); // Formato compatible con datetime

        // dd($data);
        $version = $model->save($data);
        return redirect()->to(base_url('/'));
    }
}
