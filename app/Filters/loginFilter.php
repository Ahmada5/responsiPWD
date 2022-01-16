<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class loginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (!session()->get('login')) {
            return redirect()->to(base_url('/auth/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $this->userModel = new \App\Models\UserModel();
        // Do something here
        if (session()->get('login')) {
            return redirect()->to(base_url('/komik'));
        }
    }
}
