<?php

namespace App\Controllers;

use App\Models\ProyectoModel;   #Marco que voy a utilizar el modelo ProyectoModel

class Home extends BaseController
{
    public function index(): string
    {
        #Obtengo los datos usando el model
        $model = new ProyectoModel();
        $data['proyectos'] = $model->findAll();
        return view('Home.php', $data);
    }
}
