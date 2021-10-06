<?php

namespace App\Controllers;

use App\Models\FuncionarioModel;
use CodeIgniter\Controller;

class Funcionarios extends Controller
{

    private $funcionario_model;

    function __construct()
    {

        $this->funcionario_model = new FuncionarioModel();
    }

    public function index()
    {
        $funcionarios = $this->funcionario_model
                         ->findAll();

        $data['funcionarios'] = $funcionarios;

        echo view('templates/header');
        echo view('funcionarios/index',$data);
        echo view('templates/footer');


    }

    public function novo()
    {
        echo view('templates/header');
        echo view('funcionarios/form');
        echo view('templates/footer');
    }

    public function store()
    {
        $dados = $this->request->getVar();


        if(isset($dados['id_funcionario'])):

            $this->funcionario_model
                ->where('id_funcionario',$dados['id_funcionario'])
                ->set($dados)
                ->update();
            $session = session();
            $session->SetFlashdata('alert','success_update');

            return redirect()->to("/funcionarios/editar/{$dados['id_funcionario']}");
        endif;

        $this->funcionario_model->insert($dados);

        $session = session();
        $session->SetFlashdata('alert','success_create');

        return redirect()->to('funcionarios');
    }

    public function editar($id_funcionario)
    {
        $funcionario = $this->funcionario_model->where('id_funcionario', $id_funcionario)->first();

        $data['funcionario'] = $funcionario;

        echo view('templates/header');
        echo view('funcionarios/form',$data);
        echo view('templates/footer');

    }

    public function excluir()
    {
        $id_funcionario = $this->request->getVar('id_funcionario');

        $funcionario = $this->funcionario_model->where('id_funcionario', $id_funcionario)->delete();

        $session = session();
        $session->SetFlashdata('alert','success_delete');

        return redirect()->to('funcionarios');


    }


    public function ver($id_funcionario)
    {

        $funcionario = $this->funcionario_model->where('id_funcionario', $id_funcionario)->first();

        $data['funcionario'] = $funcionario;

        echo view('templates/header');
        echo view('funcionarios/ver',$data);
        echo view('templates/footer');



    }


}


?>