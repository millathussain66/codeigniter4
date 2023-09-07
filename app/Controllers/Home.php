<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function store(){
        helper(['form']);

        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ];

        if($this->validate($rules)){

            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
            ];
    
            echo "<pre>";
            print_r($data);
        }else{

            $data['validation'] = $this->validator;
            echo view('welcome_message', $data);


        }








      

    }
    
  
}
