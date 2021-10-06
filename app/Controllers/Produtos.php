<?php

namespace App\Controllers;

use App\Models\ProdutoModel;
use CodeIgniter\Controller;

class Produtos extends Controller
{

    private $produto_model;

    function __construct()
    {

        $this->produto_model = new ProdutoModel();
    }

    public function index()
    {
        $produtos = $this->produto_model
                         ->findAll();

        $data['produtos'] = $produtos;

        echo view('templates/header');
        echo view('produtos/index',$data);
        echo view('templates/footer');


    }

    public function novo()
    {
        echo view('templates/header');
        echo view('produtos/form');
        echo view('templates/footer');
    }

    public function store()
    {
        $dados = $this->request->getVar();


        if(isset($dados['id_produto'])):

            $this->produto_model
                ->where('id_produto',$dados['id_produto'])
                ->set($dados)
                ->update();
            $session = session();
            $session->SetFlashdata('alert','success_update');

            return redirect()->to("/produtos/editar/{$dados['id_produto']}");
        endif;

        $this->produto_model->insert($dados);

        $session = session();
        $session->SetFlashdata('alert','success_create');

        return redirect()->to('produtos');
    }

    public function editar($id_produto)
    {
        $produto = $this->produto_model->where('id_produto', $id_produto)->first();

        $data['produto'] = $produto;

        echo view('templates/header');
        echo view('produtos/form',$data);
        echo view('templates/footer');

    }

    public function excluir()
    {
        $id_produto = $this->request->getVar('id_produto');

        $produto = $this->produto_model->where('id_produto', $id_produto)->delete();

        $session = session();
        $session->SetFlashdata('alert','success_delete');

        return redirect()->to('produtos');


    }


    public function ver($id_produto)
    {

        $produto = $this->produto_model->where('id_produto', $id_produto)->first();

        $data['produto'] = $produto;

        echo view('templates/header');
        echo view('produtos/ver',$data);
        echo view('templates/footer');



    }


}


?>