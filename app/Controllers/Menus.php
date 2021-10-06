<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\ClienteModel;
use CodeIgniter\Controller;

class Menus extends Controller
{

    private $menu_model;

    function __construct()
    {

        $this->menu_model = new MenuModel();
    }

    public function index()
    {
//        $clientes = $this->cliente_model
 //                        ->findAll();
        $pager = \Config\Services::pager();

        $menus = $this->menu_model
                        ->join('clientes', 'clientes.id_cliente = menus.cliente_id', 'left')
                        ->paginate(6);

        $pager = $this->menu_model
                         ->pager;

        $data = ['menus' => $menus,
               'pager' => $pager ];

        echo view('templates/header');
        echo view('menus/index',$data);
        echo view('templates/footer');


    }

    public function novo()
    {

        $this->cliente_model = new ClienteModel();
        $clientes = $this->cliente_model
                          ->FindAll();

        $data = ['clientes' => $clientes ];

        echo view('templates/header');
        echo view('menus/form',$data);
        echo view('templates/footer');
    }

    public function store()
    {
        $dados = $this->request->getVar();

       
        if(isset($dados['id_menu'])):

            $where = array('id_menu' => $dados['id_menu'] );
            $this->menu_model
                ->where($where)
                ->set($dados)
                ->update();
            $session = session();
            $session->SetFlashdata('alert','success_update');

            return redirect()->to("/menus/editar/{$dados['id_menu']}");
        endif;

        $this->menu_model->insert($dados);

        $session = session();
        $session->SetFlashdata('alert','success_create');

        return redirect()->to('menus');
    }

    public function editar($id_menu)
    {

        $this->cliente_model = new ClienteModel();
        $clientes = $this->cliente_model
                          ->FindAll();

        $menu = $this->menu_model->where('id_menu', $id_menu)->first();

        $data = ['menu' => $menu, 
              'clientes' => $clientes
             ];

        echo view('templates/header');
        echo view('menus/form',$data);
        echo view('templates/footer');

    }

    public function excluir()
    {
        $id_menu = $this->request->getVar('id_menu');

        $menu = $this->menu_model->where('id_menu', $id_menu)->delete();

        $session = session();
        $session->SetFlashdata('alert','success_delete');

        return redirect()->to('menus');


    }


    public function ver($id_menu)
    {

        $menu = $this->menu_model->where('id_menu', $id_menu)->first();

        $data['cliente'] = $cliente;

        echo view('templates/header');
        echo view('menus/ver',$data);
        echo view('templates/footer');

    }

    function check_menu($id=null,$menu = null) {
        $resp = "";

        $where = array('cliente_id' => $id, 'nome_menu' => $menu );

//        dd($where);
        $result = $this->menu_model
                        ->where($where)
                        ->first();
        if(!empty($result)){
            echo "S";  
        }else{
            echo "N";  
        }   
    }    

    public function menudashboard($id_menu)
    {

        $session = session();
        $cliente_id = $session->get('cliente_id');       
        $menus = $this->menu_model->where('cliente_id',$cliente_id)->findAll();

//dd($id_menu);

        $menu_link = $this->menu_model->where('id_menu', $id_menu)->first();
        

        $mostra_link=$menu_link['link_menu'];
//        dd($mostra_link);

  //      if(empty($menu_link['link_menu'])) {
  //            $motra_link = ""; 
  //       } else {
  //            $motra_link = $menu_link['link_menu'];
  //       }

//dd($mostra_link);

        $data = ['link_menu' => $mostra_link,
                 'menus' => $menus    ];

        echo view('templates/header',$data);
        echo view('templates/dashboard',$data);
        echo view('templates/footer');

    }



}


?>