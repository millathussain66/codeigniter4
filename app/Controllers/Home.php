<?php

namespace App\Controllers;
use App\Models\Home_model;


class Home extends BaseController
{
    public function index(): string
    {
        $Home_model = new Home_model();
        $data['users'] = $Home_model->orderBy('id', 'DESC')->findAll();

        return view('welcome_message',$data);
    }

    public function store(){
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ];

        if($this->validate($rules)){
            $userModel = new Home_model();
            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
            ];
            $userModel->insert($data); 

            return $this->response->redirect(base_url('/'));
      
        }else{
            $data['validation'] = $this->validator;
            echo view('welcome_message', $data);
        }

    }

    function edit($id){

        $Home_model = new Home_model();
        $data['user_obj'] = $Home_model->where('id', $id)->first();
        return view('user_edit', $data);

    }

    function update(){

        helper(['form']);
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ];

        if($this->validate($rules)){
            $userModel = new Home_model();
            $id = $this->request->getVar('id');

            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
            ];

            $userModel->update($id, $data);

            return $this->response->redirect(base_url('/'));
      
        }else{
            $data['validation'] = $this->validator;
            echo view('welcome_message', $data);
        }



    }





    function delete($id = NULL){

        $Home_model = new Home_model();
        $data['user'] = $Home_model->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('/'));

    }
    
  
}
