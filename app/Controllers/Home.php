<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProyectoModel;

class Home extends BaseController
{
    public function index(): string
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Obtener datos del modelo de proyectos
        $model = new ProyectoModel();
        $data['proyectos'] = $model->findAll();

        return $this->layout('view_home.php', $data);
    }

    

    
}
