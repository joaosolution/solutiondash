<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\MenuModel;


use CodeIgniter\Controller;

class Inicio extends Controller
{

    private $cliente_model;

    function __construct()
    {

        $this->cliente_model = new ClienteModel();
        $this->menu_model = new MenuModel();
    }
    public function index()
    {

        $total_de_clientes = count($this->cliente_model->findAll());

        $session = session();
        $cliente_id = $session->get('cliente_id');       

        //pega menus do cliente selecionado do usuário
        $menu_cli = $this->menu_model->where('cliente_id',$cliente_id)->findAll();

        //pega nome do cliente selecionado
        $cliente_sel = $this->cliente_model->where('id_cliente',$cliente_id)->First();

        if($cliente_id == 0){
            $nome_cli = "SOLUTION";
        } else {
            $nome_cli = substr($cliente_sel['nome'], 0,strpos($cliente_sel['nome'], ' ') );
        }    
        $session->set('nome_cli',$nome_cli);       


        $data = ['total_de_clientes' => $total_de_clientes ,
                 'nome_cli' => $nome_cli];
//                 'menu_cli' => $menu_cli ];

         $session->set('menu_cli',$menu_cli);               


        echo view('templates/header',$data);
        echo view('inicio/index',$data);
        echo view('templates/footer');
    }
}


?>