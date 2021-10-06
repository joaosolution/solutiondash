<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{

    protected $table = 'menus';
    protected $primarykey = 'id_menu';
    protected $allowedFields = [
        'id_menu',
        'nome_menu',
        'link_menu',
        'cliente_id'
    ];

    protected $usertimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField  = 'deleted_at';


}

?>