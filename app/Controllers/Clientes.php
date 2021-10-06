<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use CodeIgniter\Controller;

class Clientes extends Controller
{

    private $cliente_model;

    function __construct()
    {

        $this->cliente_model = new ClienteModel();
    }

    public function index()
    {
//        $clientes = $this->cliente_model
 //                        ->findAll();
        $pager = \Config\Services::pager();

        $clientes = $this->cliente_model
                         ->paginate(6);

        $pager = $this->cliente_model
                         ->pager;

        $data = ['clientes' => $clientes,
               'pager' => $pager ];

        echo view('templates/header');
        echo view('clientes/index',$data);
        echo view('templates/footer');


    }

    public function novo()
    {
        echo view('templates/header');
        echo view('clientes/form');
        echo view('templates/footer');
    }

    public function store()
    {
        $dados = $this->request->getVar();

       
        if(isset($dados['id_cliente'])):

            $this->cliente_model
                ->where('id_cliente',$dados['id_cliente'])
                ->set($dados)
                ->update();
            $session = session();
            $session->SetFlashdata('alert','success_update');

            return redirect()->to("/clientes/editar/{$dados['id_cliente']}");
        endif;

        $this->cliente_model->insert($dados);

        $session = session();
        $session->SetFlashdata('alert','success_create');

        return redirect()->to('clientes');
    }

    public function editar($id_cliente)
    {
        $cliente = $this->cliente_model->where('id_cliente', $id_cliente)->first();

        $data['cliente'] = $cliente;

        echo view('templates/header');
        echo view('clientes/form',$data);
        echo view('templates/footer');

    }

    public function excluir()
    {
        $id_cliente = $this->request->getVar('id_cliente');

        $cliente = $this->cliente_model->where('id_cliente', $id_cliente)->delete();

        $session = session();
        $session->SetFlashdata('alert','success_delete');

        return redirect()->to('clientes');


    }


    public function ver($id_cliente)
    {

        $cliente = $this->cliente_model->where('id_cliente', $id_cliente)->first();

        $data['cliente'] = $cliente;

        echo view('templates/header');
        echo view('clientes/ver',$data);
        echo view('templates/footer');

    }



}


?>