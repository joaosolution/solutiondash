<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosMenusModel extends Model
{

    protected $table = 'usuariosmenus';
    protected $primarykey = 'id_login_menu';
    protected $allowedFields = [
        'id_login_menu',
        'login_id',
        'menu_id'
    ];

    protected $usertimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField  = 'deleted_at';


}

?>