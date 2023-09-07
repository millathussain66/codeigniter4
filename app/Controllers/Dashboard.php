<?php

namespace App\Controllers;
use App\Models\Dashboard_model;


class Dashboard extends BaseController
{
    public function view()
    {
        $data = array(
            'pages' => 'dashboard/pages/grid'

        );
        echo view('grid_layout',$data);

    }

 
    
  
}
