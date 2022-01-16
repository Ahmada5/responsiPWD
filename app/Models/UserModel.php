<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'user';
    protected $allowedFields = ['username', 'password'];


    function getData($id = false)
    {
        if ($id == false) {

            return $this->table('user')->get()->getResultArray();
        }
        return $this->where(['id' => $id])->first();
    }

    public function login($username, $password)
    {
        return $this->table('user')->where(['username' => $username, 'password' => $password])->get()->getRowArray();
    }
}
