<?php
namespace App\Controllers;

use App\Models\SuperAdmin;
use App\Models\AdminModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('login_page');
    }

    public function loginSuperAdmin()
    {
        $session = session();
        $SuperAdmin = new SuperAdmin();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $SuperAdmin->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            if($password == $pass){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'namesuper' => $data['name'],
                    'password' => $data['password'],
                    'level' => $data['level'],
                    // 'message' => 'Welcome Back!',
                    'super_logged_in' => TRUE
                ];
                
                $session->set($ses_data);
                $session->setFlashData('notif', 'Login Success');

                return redirect()->to('/superadmin/dashboard');
            } else {
                $session->setFlashData('message', 'Wrong Password!');
                return redirect()->to('/superadmin');
            }
        } else {
            $session->setFlashdata('message', 'Username not found');
            return redirect()->to('/superadmin');
        }
        
    }

    public function loginAdministrator()
    {
        $session = session();
        $Admin = new AdminModel();

        $nip = $this->request->getVar('NIP');
        $password = $this->request->getVar('password');

        $data = $Admin->where('nip_admin', $nip)->first();

        if($data){
            $pass = $data['password_admin'];
            if($password == $pass){
                $ses_data = [
                    'id' => $data['id_admin'],
                    'nip' => $data['nip_admin'],
                    'name' => $data['name_admin'],
                    'img' => $data['img_admin'],
                    'level' => $data['level'],
                    'password' => $data['password_admin'],
                    'admin_logged_in' => TRUE
                ];

                $session->set($ses_data);
                $session->setFlashData('notif', 'Login Success');

                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashData('message', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashData('message', 'Usernae not found!');
            return redirect()->to('/login');
        }
    }

    public function loginUser()
    {
        $session = session();
        $User = new UserModel();

        $nip = $this->request->getVar('NIP');
        $password = $this->request->getVar('password');

        $data = $User->where('nip_user', $nip)->first();

        if($data){
            $pass = $data['password_user'];
            if($password == $pass){
                $ses_data = [
                    'id' => $data['id_user'],
                    'nip' => $data['nip_user'],
                    'name' => $data['name_user'],
                    'img' => $data['img_user'],
                    'level' => $data['level'],
                    'password' => $data['password_user'],
                    'user_logged_in' => TRUE
                ];

                $session->set($ses_data);
                $session->setFlashData('notif', 'Login Success');

                return redirect()->to('/user/dashboard');
            } else {
                $session->setFlashData('message', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashData('message', 'Usernae not found!');
            return redirect()->to('/login');
        }
    }

    public function logoutSuper()
    {
        $session = session();
        
        $session->destroy();
        return redirect()->to('/superadmin');
    }

    public function logout()
    {
        $session = session();

        $session->destroy();
        return redirect()->to('/login');
    }
}