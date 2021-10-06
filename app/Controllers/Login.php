<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\ClienteModel;
use App\Models\MenuModel;
use App\Models\UsuariosMenusModel;

use CodeIgniter\Controller;

class Login extends Controller
{

    private $login_model;

    function __construct()
    {

        $this->login_model = new LoginModel();
    }

    public function index()
    {
//        $produtos = $this->produto_model
//                         ->findAll();

//        $data['produtos'] = $produtos;

//        echo view('login/index',$data);
        echo view('login/index');


    }

    public function lista()
    {



        $pager = \Config\Services::pager();

        $logins = $this->login_model
                    ->join('clientes', 'clientes.id_cliente = logins.cliente_id', 'left')
                    ->paginate(6);

        $pager = $this->login_model
                         ->pager;


        $data = ['logins' => $logins,
               'pager' => $pager ];

        //dd($data);       

        echo view('templates/header');
        echo view('login/lista', $data);
        echo view('templates/footer');


    }


    public function autenticar()
    {
        $dados = $this->request->getVar();

        

//        $teste['senha'] = md5($dados['senha']);
//        dd($teste);
        $usuario = $this->login_model
                        ->where('usuario',$dados['email'])
                        ->where('senha',md5($dados['senha']))
                        ->first();

        $session = session();

        if($dados['email']=="joao@solutionbh.com.br" && $dados['senha'] =="123"){
            $session->set('primeiro_nome',"João Bosco");
            $session->set('tipo_login',"Administrador");
            $session->set('cliente_id',0);

            $session->setFlashdata('alert','success_login');

            return redirect()->to('/inicio');

        }


        if(!empty($usuario)):

            $session->set('primeiro_nome',$usuario['usuario_nome']);
            $session->set('tipo_login',$usuario['tipo_login']);
            $session->set('cliente_id',$usuario['cliente_id']);

            $session->setFlashdata('alert','success_login');

            return redirect()->to('/inicio');

        endif;

        $session->setFlashdata('alert','error_login');

        return redirect()->to('/login');
    }


    public function logout()
    {

        $session = session();

        $session->destroy();

        return redirect()->to('/login');

    }

    public function trocarsenha()
    {

        echo view('templates/header');
        echo view('login/trocarsenha');
        echo view('templates/footer');



    }

    public function novo()
    {

        $this->cliente_model = new ClienteModel();
        $clientes = $this->cliente_model
                          ->FindAll();

        $data = ['clientes' => $clientes ];

        echo view('templates/header');
        echo view('login/form',$data);
        echo view('templates/footer');
    }


    public function atualizasenha()
    {
        $dados = $this->request->getVar();
        $usuario = $this->login_model
                        ->where('id_login',1)
                        ->first();

        $session = session();

        if(md5($dados['senha_atual']) == $usuario['senha']):
            
            if($dados['nova_senha'] == $dados['confirmar_nova_senha']):

                $this->login_model
                    ->where('id_login',1)
                    ->set('senha', md5($dados['nova_senha']))
                    ->update();

                 
                 $session->setFlashdata('alert','success_trocar_senha');

                 return redirect()->to('/login/trocarsenha');

            endif;
        endif;           

        $session->setFlashdata('alert','error_trocar_senha');

        return redirect()->to('/login/trocarsenha');


    }   

    public function store()
    {
        $dados = $this->request->getVar();


        $session = session();

        $usuario = $this->login_model
                        ->where('usuario',$dados['usuario'])
                        ->first();

//        if(!empty($usuario)):
//        $session->SetFlashdata('alert','erro_email_existe');
//        return redirect()->to('login/novo');
//        endif;    

        //dd($dados);

        if(isset($dados['id_login'])):

            $dados['senha'] = md5($dados['senha']);

            $this->login_model
                ->where('id_login',$dados['id_login'])
                ->set($dados)
                ->update();
            $session->SetFlashdata('alert','success_update');

            return redirect()->to("/login/editar/{$dados['id_login']}");
        endif;

        if($dados['senha'] != $dados['confirmar_senha']):
            $session->SetFlashdata('alert','erro_conf_senha');
            return redirect()->to('login/novo');
        endif;    

        $dados['senha'] = md5($dados['senha']);
        $this->login_model->insert($dados);

        $session = session();
        $session->SetFlashdata('alert','success_create');

        return redirect()->to('login/lista');
        
    }

    public function editar($id_login)
    {

        $this->cliente_model = new ClienteModel();
        $clientes = $this->cliente_model
                          ->FindAll();

        $login = $this->login_model->where('id_login', $id_login)->first();

        $data = ['login' => $login, 
              'clientes' => $clientes
             ];

        echo view('templates/header');
        echo view('login/form',$data);
        echo view('templates/footer');

    }

    public function excluir()
    {
        $id_login = $this->request->getVar('id_login');

        $login = $this->login_model->where('id_login', $id_login)->delete();

        $session = session();
        $session->SetFlashdata('alert','success_delete');

        return redirect()->to('login/lista');


    }


    public function ver($id_login)
    {

        $login = $this->login_model->where('id_login', $id_login)->first();

        $data['login'] = $login;

        echo view('templates/header');
        echo view('login/ver',$data);
        echo view('templates/footer');



    }

    function check_email($email = null) {
        $resp = "";

        $result = $this->login_model
                        ->where('usuario',$email)
                        ->first();
        if(!empty($result)){
            echo "S";  
        }else{
            echo "N";  
        }   
    }    

    public function menu($id_login)
    {

        $login = $this->login_model->where('id_login', $id_login)->first();

        $session = session();

        if($login['cliente_id'] == 0){
            $session->SetFlashdata('alert','erro_cliente');
            return redirect()->to('login/lista');
        }

        $this->menu_model = new MenuModel();
        $menus = $this->menu_model
                        ->where('cliente_id',$login['cliente_id'])
                        ->FindAll();

        $this->usu_menus_model = new UsuariosMenusModel();
        $usu_menus = $this->usu_menus_model
                        ->where('login_id',$login['id_login'])
                        ->FindAll();

        $u_m_sel=[];
        foreach ($menus as $mn) {
            $where = [
                'login_id' => $login['id_login'],
                'menu_id' => $mn['id_menu']
            ];
            $usu_cad_menus = $this->usu_menus_model
                        ->where($where)
                        ->First();

            if(!Empty($usu_cad_menus)){
                $u_m_sel[] = 1;
            } else {
                $u_m_sel[] = 0;
            }

        }                



        $this->cliente_model = new ClienteModel();
        $clientes = $this->cliente_model
                          ->FindAll();

        $login = $this->login_model->where('id_login', $id_login)->first();

        $data = ['login' => $login, 
              'clientes' => $clientes,
              'menus' => $menus,
              'u_m_sel' => $u_m_sel
             ];

//        dd($data);
        echo view('templates/header');
        echo view('login/menuusu',$data);
        echo view('templates/footer');

    }


    public function storemenu()
    {
        $dados = $this->request->getVar();

//dd($dados);
        $session = session();

        $this->usu_menus_model = new UsuariosMenusModel();
        $usu_menus = $this->usu_menus_model
                        ->where('login_id',$dados['id_login'])
                        ->delete();
        if(isset($menus_id)){
            for ($i=0; $i < sizeof($dados['menus_id']); $i++ ){

                $dadosg = [
                    'login_id' => $dados['id_login'],
                    'menu_id' => $dados['menu_id'][$i]
                ];
    //dd($dadosg);
                $this->usu_menus_model->insert($dadosg);
            }
        }

        $session = session();
        $session->SetFlashdata('alert','success_create');

        return redirect()->to("/login/menu/{$dados['id_login']}");
      
    }




}



?>