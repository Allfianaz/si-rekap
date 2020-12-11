<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\SuperAdmin;

class Administrator extends BaseController
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->UserModel = new UserModel();
        $this->SuperAdmin = new SuperAdmin();
        helper('url', 'form');
    }

    public function dashboardSuper()
    {
        $data = [
            'title' => 'Super Admin | Dashboard',
            'admin' => $this->AdminModel->findAll(),
            'user' => $this->UserModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('superadmin/dashboard', $data);
    }

    public function manageAcc()
    {
        $data = [
            'title' => 'Super Admin | Manage Accounts',
            'admin' => $this->AdminModel->findAll(),
            'user' => $this->UserModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('superadmin/manage', $data);
    }

    public function dashboardAdmin()
    {

        $data = [
            'title' => 'Administrator | Dashboard',
        ];
        return view('admin/dashboard', $data);
    }


    public function saveAdmin()
    {
        if (!$this->validate([
            'NIP' => [
                'rules' => 'required|is_unique[admin.nip_admin]|min_length[10]',
                'errors' => [
                    'required' => 'Please Insert Your NIP',
                    'is_unique' => 'This NIP Already Registered'
                ]
            ],
            'Name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Your Fullname'
                ]
            ],
            'Password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Please Insert Your Password',
                    'min_length' => 'Password Too Short *atleast 8 characters'
                ]
            ],
            'RepeatPassword' => [
                'rules' => 'required|matches[Password]',
                'errors' => [
                    'required' => 'Please Repeat Your Password',
                    'matches' => 'Password Didnt Match'
                ]
            ],
            'Image' => [
                'rules' => 'max_size[Image,4000]|is_image[Image]|mime_in[Image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image file too big *max size 4mb',
                    'is_image' => 'Profile image only can be set with image file',
                    'mime_in' => 'Profile image only can be set with image file'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/administrator/addAdmin')->withInput()->with('validation', $validation);
            return redirect()->to('/administrator/addAdmin')->withInput();
        }

        $uploadedImage = $this->request->getFile('Image');
        if ($uploadedImage->getError() == 4) {
            $imageName = 'default.jpg';
        } else {
            $imageName = $uploadedImage->getRandomName();
            $uploadedImage->move('img', $imageName);
        }

        $data = array(
            'id_admin' => 'Adm' . date('dmY') . rand(111, 999),
            'nip_admin' => $this->request->getPost('NIP'),
            'name_admin' => $this->request->getPost('Name'),
            'password_admin' => $this->request->getPost('Password'),
            'date_created_adm' => date('d F, Y'),
            'date_updated_adm' => '-',
            'img_admin' => $imageName
        );

        session()->setFlashData('message', 'Data Successfully added to Administrator');

        $this->AdminModel->saveAdmin($data);
        return redirect()->to('/superadmin/addAdmin');
    }

    public function saveUser()
    {
        if (!$this->validate([
            'NIP' => [
                'rules' => 'required|is_unique[user.nip_user]|min_length[10]',
                'errors' => [
                    'required' => 'Please insert your NIP',
                    'is_unique' => 'This NIP already registered',
                    'min_length' => 'NIP field must be at least 10 characters in length'
                ]
            ],
            'Name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please insert your fullname'
                ]
            ],
            'Password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Please set your password',
                    'min_length' => 'Password too short *atleast 8 characters'
                ]
            ],
            'RepeatPassword' => [
                'rules' => 'required|matches[Password]',
                'errors' => [
                    'required' => 'Please repeat your password',
                    'matches' => 'Password didnt match'
                ]
            ],
            'Image' => [
                'rules' => 'max_size[Image,4000]|is_image[Image]|mime_in[Image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image file too big *max size 4mb',
                    'is_image' => 'Profile image only can be set with image file',
                    'mime_in' => 'Profile image only can be set with image file'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/administrator/addUser')->withInput();
        }


        $uploadedImage = $this->request->getFile('Image');
        if ($uploadedImage->getError() == 4) {
            $imageName = 'default.jpg';
        } else {
            $imageName = $uploadedImage->getRandomName();
            $uploadedImage->move('img', $imageName);
        }

        $data = array(
            'id_user' => 'Usr' . date('dmY') . rand(111, 999),
            'nip_user' => $this->request->getPost('NIP'),
            'name_user' => $this->request->getPost('Name'),
            'password_user' => $this->request->getPost('Password'),
            'date_created_usr' => date('d F, Y'),
            'date_updated_usr' => '-',
            'img_user' => $imageName
        );

        session()->setFlashData('message', 'Data Successfully added to User');

        $this->UserModel->saveUser($data);
        return redirect()->to('/superadmin/addUser');
    }

    public function addAdmin()
    {
        $data = [
            'title' => 'Administrator | Add Admin',
            'validation' => \Config\Services::validation()
        ];
        return view('superadmin/add_admin', $data);
    }

    public function tableAdmin()
    {
        $data = [
            'title' => 'Administrator | Admin Tables',
            'admin' => $this->AdminModel->findAll()

        ];
        return view('superadmin/table_admin', $data);
    }

    public function addUser()
    {
        $data = [
            'title' => 'Administrator | Add User',
            'validation' => \Config\Services::validation()
        ];
        return view('superadmin/add_user', $data);
    }

    public function tableUser()
    {
        $data = [
            'title' => 'Administrator | User Tables',
            'user' => $this->UserModel->findAll()

        ];
        return view('superadmin/table_user', $data);
    }

    public function deleteAdmin($id)
    {
        $admin = $this->AdminModel->find($id);
        if ($admin['img_admin'] != 'default.jpg') {
            unlink('img/' . $admin['img_admin']);
        }

        $this->AdminModel->delete($id);

        session()->setFlashData('message', 'Data Succesfully deleted');
        return redirect()->to('/superadmin/manage');
    }

    public function deleteUser($id)
    {
        $user = $this->UserModel->find($id);
        if ($user['img_user'] != 'default.jpg') {
            unlink('img/' . $user['img_user']);
        }

        $this->UserModel->delete($id);

        session()->setFlashData('message', 'Data Succesfully deleted');
        return redirect()->to('/superadmin/manage');
    }

    public function editAdmin($id)
    {
        $data = [
            'title' => 'Administrator | Edit Admin',
            'validation' => \Config\Services::validation(),
            'admin' => $this->AdminModel->getAdmin($id)
        ];
        // dd($data);
        return view('superadmin/edit_admin', $data);
    }

    public function editUser($id)
    {
        $data = [
            'title' => 'Administrator | Edit User',
            'validation' => \Config\Services::validation(),
            'user' => $this->UserModel->getUser($id)
        ];
        // dd($data);
        return view('superadmin/edit_user', $data);
    }

    public function updateAdmin($id)

    {
        $oldNIP = $this->AdminModel->getAdmin($id);
        // $oldPassword = $this->AdminModel->getAdmin($id);
        if ($oldNIP['nip_admin'] == $this->request->getVar('NIP')) {
            $rule_nip = 'required';
            // $rule_password = '';
            // $rule_repeat = '';
        } else {
            $rule_nip = 'required|is_unique[admin.nip_admin]';
            // $rule_password = 'required|min_length[8]';
            // $rule_repeat = 'required|matches[Password]';
        }

        if (!$this->validate([
            'NIP' => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => 'Please Insert Your NIP',
                    'is_unique' => 'This NIP Already Registered'
                ]
            ],
            'Name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Your Fullname'
                ]
            ],
            'Image' => [
                'rules' => 'max_size[Image,4000]|is_image[Image]|mime_in[Image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image file too big *max size 4mb',
                    'is_image' => 'Profile image only can be set with image file',
                    'mime_in' => 'Profile image only can be set with image file'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/administrator/editAdmin/' . $id)->withInput();
        }
        $imageFile = $this->request->getFile('Image');
        $oldImageFile = $this->request->getVar('oldImage');
        $admin = $this->AdminModel->find($id);

        if ($imageFile->getError() == 4) {
            $imageName = $this->request->getVar('oldImage');
        } else {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('img', $imageName);
            if ($admin['img_admin'] != 'default.jpg') {
                unlink('img/' . $oldImageFile);
            }
        }

        // $admin = $this->AdminModel->find($id);
        // if ($admin['img_admin'] != 'default.jpg') {
        //     unlink('img/' . $admin['img_admin']);
        // }

        $data = array(
            // 'id_admin' => $id,
            'nip_admin' => $this->request->getPost('NIP'),
            'name_admin' => $this->request->getPost('Name'),
            // 'password_admin' => $this->request->getPost('Password'),
            // 'date_created_adm' => date('d-F-Y')
            'date_updated_adm' => date('d F, Y'),
            'img_admin' => $imageName
        );
        // dd($data);
        session()->setFlashData('message', 'Data Successfully Changed');

        // $this->AdminModel->saveAdmin($data);
        $this->AdminModel->updateAdmin($data, $id);
        return redirect()->to('/superadmin/manage');
    }

    public function updateUser($id)

    {
        $oldNIP = $this->UserModel->getUser($id);
        // $oldPassword = $this->UserModel->getUser($id);
        if ($oldNIP['nip_user'] == $this->request->getVar('NIP')) {
            $rule_nip = 'required';
            // $rule_password = '';
            // $rule_repeat = '';
        } else {
            $rule_nip = 'required|is_unique[user.nip_user]';
            // $rule_password = 'required|min_length[8]';
            // $rule_repeat = 'required|matches[Password]';
        }

        if (!$this->validate([
            'NIP' => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => 'Please Insert Your NIP',
                    'is_unique' => 'This NIP Already Registered'
                ]
            ],
            'Name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Your Fullname'
                ]
            ],
            'Image' => [
                'rules' => 'max_size[Image,4000]|is_image[Image]|mime_in[Image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image file too big *max size 4mb',
                    'is_image' => 'Profile image only can be set with image file',
                    'mime_in' => 'Profile image only can be set with image file'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/administrator/editUser/' . $id)->withInput();
        }

        $imageFile = $this->request->getFile('Image');
        $oldImageFile = $this->request->getVar('oldImage');
        $user = $this->UserModel->getUser($id);

        if ($imageFile->getError() == 4) {
            $imageName = 'default.jpg';
        } else {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('img', $imageName);
            if ($user['img_user'] != 'default.jpg') {
                unlink('img/' . $oldImageFile);
            }
        }

        $data = array(
            // 'id_user' => $id,
            'nip_user' => $this->request->getPost('NIP'),
            'name_user' => $this->request->getPost('Name'),
            // 'password_user' => $this->request->getPost('Password'),
            // 'date_created_adm' => date('d-F-Y')
            'date_updated_usr' => date('d F, Y'),
            'img_user' => $imageName
        );
        // dd($data);
        session()->setFlashData('message', 'Data Successfully Changed');

        $this->UserModel->updateUser($data, $id);
        return redirect()->to('/superadmin/manage');
    }

    public function changePasswordAdmin($id)
    {
        $oldPassword = $this->AdminModel->getAdmin($id);
        $inputPassword = $this->request->getVar('inputPassword');
        if($oldPassword['password_admin'] == $inputPassword){
            $rule_pass = 'required';
        } else {
            $rule_pass = 'required|matches[admin.password_admin]';
        }

        if (!$this->validate([
            'inputPassword' => [
                'rules' => $rule_pass,
                'errors' => [
                    'required' => 'Please Insert Your Old Password',
                    'matches' => 'Incorrect Password!'
                ]
            ],
            'Password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Please Insert Your New Password',
                    'min_length' => 'Password Too Short *atleast 8 characters'
                ]
            ],
            'RepeatPassword' => [
                'rules' => 'required|matches[Password]',
                'errors' => [
                    'required' => 'Please Repeat Your Password',
                    'matches' => 'Password Didnt Match'
                ]
            ]
        ])) {
            return redirect()->to('/administrator/editAdmin/' . $this->request->getVar('id_admin'))->withInput();
        }

        $data = array(
            'password_admin' => $this->request->getPost('Password'),
            'date_updated_adm' => date('d F, Y')
        );

        session()->setFlashData('message', 'Password Successfully Changed');

        $this->AdminModel->updateAdmin($data, $id);
        return redirect()->to('/superadmin/manage');
    }

    public function changePasswordUser($id)
    {
        $oldPassword = $this->UserModel->getUser($id);
        $inputPassword = $this->request->getVar('inputPassword');
        if($oldPassword['password_user'] == $inputPassword){
            $rule_pass = 'required';
        } else {
            $rule_pass = 'required|matches[user.password_user]';
        }

        if (!$this->validate([
            'inputPassword' => [
                'rules' => $rule_pass,
                'errors' => [
                    'required' => 'Please Insert Your Old Password',
                    'matches' => 'Incorrect Password!'
                ]
            ],
            'Password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Please Insert Your New Password',
                    'min_length' => 'Password Too Short *atleast 8 characters'
                ]
            ],
            'RepeatPassword' => [
                'rules' => 'required|matches[Password]',
                'errors' => [
                    'required' => 'Please Repeat Your Password',
                    'matches' => 'Password Didnt Match'
                ]
            ]
        ])) {
            return redirect()->to('/administrator/editUser/' . $this->request->getVar('id_user'))->withInput();
        }

        $data = array(
            'password_user' => $this->request->getPost('Password'),
            'date_updated_usr' => date('d F, Y')
        );

        session()->setFlashData('message', 'Password Successfully Changed');

        $this->UserModel->updateUser($data, $id);
        return redirect()->to('/superadmin/manage');
    }

}
