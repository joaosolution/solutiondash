
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= (isset($menu)) ? "Atualizar" : "Novo" ?> Usuário</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="/menus" class="btn btn-success" style="margin-right:15px"><i class="fas fa-undo-alt"></i> Voltar</a>
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item"><a href="/menus">Menus</a></li>
              <li class="breadcrumb-item active">Novo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <?php
          $session = session();
          $alert = $session->get('alert');
        ?>
        <?php if(isset($alert) ): ?>
          <?php if($alert == 'success_update'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Menu atualizado com sucesso.
                    </div>
              </div>
          <?php endif; ?>
        <?php endif; ?>

        <!-- /.card-header
            <div id="resultado" class="alert alert-danger alert-dismissible" style="visibility: hidden">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            E-mail já existe.
            </div>
        -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dados dos Menus</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="frmmenu" action="/menus/store" method="POST"  enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">

                            <!-- Linha 1 -->
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="">Clientes</label>
                                        <select class="custom-select" id="cliente_id" onchange="limpa('msg-cliente')" name="cliente_id" value="<?= (isset($menu)) ? $menu['cliente_id'] : "" ?>">
                                            <option value="0" <?php if(isset($menu) && $menu['cliente_id'] == 0) echo ' selected="selected"' ?>> </option>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <option value="<?= $cliente['id_cliente'] ?>" <?php if(isset($menu) && $menu['cliente_id'] == $cliente['id_cliente']) echo ' selected="selected"' ?>> <?= $cliente['nome'] ?> </option>
                                            <?php endforeach; ?>
                                        </select> 
                                        <span class='msg-erro msg-cliente'></span>
                                    </div>
                                </div>


                            <!-- Linha 2 -->
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Menu</label>
                                    <input type="text" id="nome_menu" onkeyup="limpa('msg-nome-menu')" class="form-control" name="nome_menu" value="<?= (isset($menu)) ? $menu['nome_menu'] : "" ?>" >
                                    <span class='msg-erro msg-nome-menu'></span>
                                </div>
                            </div>

                            <!-- Linha 3 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Link DashBoard</label>
                                    <input type="text" onkeyup="limpa('msg-link')" class="form-control" id="link_menu" name="link_menu" value="<?= (isset($menu)) ? $menu['link_menu'] : "" ?>">
                                    <span class='msg-erro msg-link'></span>
                                </div>
                            </div>


                            <?php if(isset($menu)): ?>
                                <input type="hidden" name="id_menu" value="<?= $menu['id_menu'] ?>">
                            <?php endif; ?>


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button id="envia" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= (isset($menu)) ? "Atualizar" : "Cadastrar" ?></button>
                    </div>
                </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<script type="text/javascript" src="<?= base_url('assets/js/validamenu.js')?>"></script>

<?php if(isset($menu)): ?>

<script>
    if (frmmenu.addEventListener) {                   
        frmmenu.addEventListener("submit", validaCadastro);
    } else if (frmmenu.attachEvent) {                  
        frmmenu.attachEvent("onsubmit", validaCadastro);
    }
    
    function validaCadastro(evt){
        var nomemenu = document.getElementById('nome_menu');
        var cliente = document.getElementById('cliente_id');
        var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var contErro = 0;
        var b_menu=0;
    
    
        /* Pesquisa no controller/menu no método check_menu se o Menu já existe no BD
           Se Sim retorna S se não retorna N */
//        alert("<?= base_url('menus/check_menu')?>/"+cliente.value+"/"+nomemenu.value);
        $.ajax({
            async: false,
            type: "GET",
            url: "<?= base_url('menus/check_menu')?>/"+cliente.value+"/"+nomemenu.value,
            data: $(this).serialize(),
            success: function(mensagem){
//                alert(mensagem);
                if(mensagem == "S") {
                    b_menu = 1;
                } else{
                    b_menu = 0;
                }
            }
        });

    //    if(b_menu == 1){
   //         caixa_menu = document.querySelector('.msg-nome-menu');
   //         caixa_menu.innerHTML = "Menu já cadastrado!";
  //          caixa_menu.style.display = 'block';
  //          contErro += 1;
   //     }

        if(contErro > 0 ){
            evt.preventDefault();
        }
    }
    function limpa(msg){
       caixa = document.querySelector('.'+msg);
       caixa.innerHTML = "";
       caixa.style.display = 'none';
         
    }
    

</script>

<?php else: ?>
  
<script>
    if (frmmenu.addEventListener) {                   
        frmmenu.addEventListener("submit", validaCadastro);
    } else if (frmmenu.attachEvent) {                  
        frmmenu.attachEvent("onsubmit", validaCadastro);
    }
    
    function validaCadastro(evt){
        var nomemenu = document.getElementById('nome_menu');
        var cliente = document.getElementById('cliente_id');
        var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var contErro = 0;
        var b_menu=0;
    
    
        /* Pesquisa no controller/menu no método check_menu se o Menu já existe no BD
           Se Sim retorna S se não retorna N */
//        alert("<?= base_url('menus/check_menu')?>/"+cliente.value+"/"+nomemenu.value);
        $.ajax({
            async: false,
            type: "GET",
            url: "<?= base_url('menus/check_menu')?>/"+cliente.value+"/"+nomemenu.value,
            data: $(this).serialize(),
            success: function(mensagem){
//                alert(mensagem);
                if(mensagem == "S") {
                    b_menu = 1;
                } else{
                    b_menu = 0;
                }
            }
        });

        if(b_menu == 1){
            caixa_menu = document.querySelector('.msg-nome-menu');
            caixa_menu.innerHTML = "Menu já cadastrado!";
            caixa_menu.style.display = 'block';
            contErro += 1;
        }

        if(contErro > 0 ){
            evt.preventDefault();
        }
    }
    function limpa(msg){
       caixa = document.querySelector('.'+msg);
       caixa.innerHTML = "";
       caixa.style.display = 'none';
         
    }
    

</script>

<?php endif; ?>
   

                                            
