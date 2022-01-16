<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Manga Desu | Home',
        ];
        return View('Pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Manga Desu | About',
        ];
        return View('Pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Manga Desu | Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Raya NO. 22',
                    'kota' => 'Semarang'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Empati NO. 99',
                    'kota' => 'Solo'
                ]
            ]

        ];
        return View('Pages/contact', $data);
    }
}
