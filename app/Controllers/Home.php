<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

    public function loginSuperAdmin()
    {
        $data = [
            'title' => 'PT. PAL Indonesia (Persero) | Login',
            'formtitle' => 'Super Admin'
        ];

        return view('superadmin/login_page', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'SI-REKAP | LOGIN',
        ];

        return view('login_page', $data);
    }
}
