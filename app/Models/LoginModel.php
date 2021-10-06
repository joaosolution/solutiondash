<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{

    protected $table = 'logins';
    protected $primarykey = 'id_login';
    protected $allowedFields = [
        'id_login',
        'usuario',
        'senha',
        'usuario_nome',
        'tipo_login',
        'menu_login',
        'cliente_id'
    ];

    protected $usertimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField  = 'deleted_at';


}

?>