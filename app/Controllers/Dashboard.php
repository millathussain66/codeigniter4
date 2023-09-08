<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Users_info_model;

use App\Models\Dashboard_model;


class Dashboard extends BaseController
{
    public function __construct()
    {

        $this->Users_info_model = new \App\Models\Users_info_model();
    }
    public function view()
    {

        $req_type = $this->Users_info_model->get_parameter_data('ref_req_type', 'id', 'data_status = 1');

        $approver_list = $this->Users_info_model->get_parameter_data('ref_approver_list', 'id', 'data_status = 1');

        $data = array(
            'req_type' =>  $req_type,
            'approver_list' =>  $approver_list,
            'pages' => 'dashboard/pages/grid',

        );
        echo view('grid_layout', $data);
    }
}
