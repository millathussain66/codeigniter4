<?php

namespace App\Controllers;

use App\Models\Users_info_model;


class Users_info extends BaseController
{


    public function __construct()
    {
        helper('url');
    }

    public function index(): string
    {
        
        return view('auth/login');
    }

    public function loginAuth()
    {
        helper(['form']);
        $rules = [
            'email_address' => 'required|valid_email',
            // 'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];
        if($this->validate($rules)){

            $session = session();
            $userModel = new Users_info_model();
            $email = $this->request->getVar('email_address');
            $password = $this->request->getVar('password');
            $data = $userModel->where(
                'email_address', $email,
                'password', $password,
                )->first();


            if ($data) {
                $pass = $data['password'];
                $authenticatePassword = $pass ===  $password ;
                // $authenticatePassword = password_verify($pass, $password);

                if ($authenticatePassword) {
                    $ses_data = [
                        'id' => $data['id'],
                        'user_id' =>  $data['user_id'],
                        'name' => $data['name'],
                        'email_address' => $data['email_address'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/profile');

                }else {
                    $session->setFlashdata('message', 'Password is incorrect.');
                    return redirect()->route('/');
                }


            }else{
                $session->setFlashdata('message', 'Email does not exist.');
                return redirect()->route('/');


            }

        }else{

            $data['validation'] = $this->validator;
            return view('auth/login',$data);
        }


    }

    public function profile(){


        // $session = session();
        // // echo "Hello : ".$session->get('email');

        // echo "<pre>";
        // print_r($session->get('name'));

        return view('auth/profile');
    }
}
