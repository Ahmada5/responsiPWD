<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Manga Desu | Login',
            'validation' => \Config\Services::validation(),
        ];
        return View('Login/index', $data);
    }

    public function login_validation()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'alpha_dash' => '{field} diisi hanya huruf & tanpa spasi',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'panjang {field} minimal 8',
                ]
            ],
        ])) {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/auth/login'))->withInput()->with('validation', $validation);
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $check = $this->userModel->login($username, $password);

        // dd($check);
        if ($check) {
            session()->set('login', true);
            session()->set('id', $check['id']);
            session()->set('username', $check['username']);
            return redirect()->to('/komik');
        } else {
            session()->setFlashdata('pesan', 'Username atau Password Salah');
            return redirect()->to(base_url('/auth/login'));
        }
    }
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/auth/login');
    }
}
