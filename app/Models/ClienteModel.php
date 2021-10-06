<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{

    protected $table = 'clientes';
    protected $primarykey = 'id_cliente';
    protected $allowedFields = [
        'id_cliente',
        'nome',
        'cnpj',
        'telefone',
        'rua',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'cidade',
        'uf',
        'email',
        'logo'
    ];

    protected $usertimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField  = 'deleted_at';


}

?>