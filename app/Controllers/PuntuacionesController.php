<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\ProyectoPuntuacionModel;

class PuntuacionesController extends Controller
{

    public function guardarPuntuacion()
    {
        $idProyecto = $this->request->getPost('id_proyecto');
        $idUsuario = session()->get('id_usuario'); // Obtener el usuario autenticado
        $puntuacion = $this->request->getPost('puntuacion');

        $puntuacionModel = new ProyectoPuntuacionModel();

        // Verificar si el usuario ya puntuó este proyecto
        $existe = $puntuacionModel->where(['id_usuario' => $idUsuario, 'id_proyecto' => $idProyecto])->first();

        if ($existe) {
            // Convertir el objeto a un array usando get_object_vars() y luego actualizar la puntuación
            $existeArray = get_object_vars($existe); // Convertir el objeto en un array
            $puntuacionModel->update($existeArray['id_valoracion'], ['puntuacion' => $puntuacion]);
        } else {
            // Crear una nueva puntuación
            $puntuacionModel->insert([
                'id_usuario' => $idUsuario,
                'id_proyecto' => $idProyecto,
                'puntuacion' => $puntuacion,
            ]);
        }

        return redirect()->back()->with('mensaje', 'Puntuación guardada con éxito.');
    }
}
