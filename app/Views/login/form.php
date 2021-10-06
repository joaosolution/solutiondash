
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= (isset($login)) ? "Atualizar" : "Novo" ?> Usuário</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="/login/lista" class="btn btn-success" style="margin-right:15px"><i class="fas fa-undo-alt"></i> Voltar</a>
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item"><a href="/login/lista">Usuários</a></li>
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
                      Usuário atualizado com sucesso.
                    </div>
              </div>
            </div>  
          <?php elseif($alert == 'erro_conf_senha'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Senha não confere. Insira os campos senha e confirmação de senha novamente.
                    </div>
              </div>
            </div>  
          <?php elseif($alert == 'erro_email_existe'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      E-mail já cadastro no Sistema.
                    </div>
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
                    <h3 class="card-title">Dados do Usuário</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="frmlogin" action="/login/store" method="POST"  enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">

                            <!-- Linha 1 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" id="nome" onkeyup="limpa('msg-nome')" class="form-control" name="usuario_nome" value="<?= (isset($login)) ? $login['usuario_nome'] : "" ?>" >
                                    <span class='msg-erro msg-nome'></span>
                                </div>
                            </div>

                            <!-- Linha 2 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" onkeyup="limpa('msg-email')" class="form-control" id="usuario" name="usuario" value="<?= (isset($login)) ? $login['usuario'] : "" ?>">
                                    <span class='msg-erro msg-email'></span>
                                </div>
                            </div>

                            <!-- Linha 3 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Senha</label>
                                    <input type="password" id="senha" onkeyup="limpa('msg-senha')" class="form-control" name="senha" value="<?= (isset($login)) ? $login['senha'] : "" ?>">
                                    <span class='msg-erro msg-senha'></span>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Confirmar Senha</label>
                                    <input type="password" id="confirmar_senha" onkeyup="limpa('msg-confirmar_senha')" class="form-control" name="confirmar_senha" value="<?= (isset($login)) ? $login['senha'] : "" ?>">
                                    <span class='msg-erro msg-confirmar_senha'></span>
                                </div>
                            </div>


                            <!-- Linha 4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tipo Acesso</label>
                                    <select class="custom-select" id="tipo_login" onkeyup="limpa('msg-tipo')" name="tipo_login" value="<?= (isset($login)) ? $login['tipo_login'] : "" ?>">
                                        <option value="Administrador" <?php if(isset($login) && $login['tipo_login'] == 'Administrador') echo ' selected="selected"' ?>>Administrador</option>
                                        <option value="Administrador Cliente" <?php if(isset($login) && $login['tipo_login'] == 'Administrador Cliente') echo ' selected="selected"' ?>>Administrador Cliente</option>
                                        <option value="Usuário Cliente" <?php if(isset($login) && $login['tipo_login'] == 'Usuário Cliente') echo ' selected="selected"' ?>>Usuário Cliente</option>
                                    </select> 
                                    <span class='msg-erro msg-tipo'></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Menu de Usuário</label>
                                    <select class="custom-select" name="menu_login" value="<?= (isset($login)) ? $login['menu_login'] : "" ?>">
                                        <option value="Sim" <?php if(isset($login) && $login['menu_login'] == 'Sim') echo ' selected="selected"' ?>>Sim</option>
                                        <option value="Não" <?php if(isset($login) && $login['menu_login'] == 'Não') echo ' selected="selected"' ?>>Não</option>
                                    </select> 
                                </div>
                            </div>

                            <?php if(isset($clientes)): ?>     
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Clientes</label>
                                        <select class="custom-select" name="cliente_id" value="<?= (isset($login)) ? $login['cliente_id'] : "" ?>">
                                            <option value="0" <?php if(isset($login) && $login['cliente_id'] == 0) echo ' selected="selected"' ?>> </option>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <option value="<?= $cliente['id_cliente'] ?>" <?php if(isset($login) && $login['cliente_id'] == $cliente['id_cliente']) echo ' selected="selected"' ?>> <?= $cliente['nome'] ?> </option>
                                            <?php endforeach; ?>
                                        </select> 
                                    </div>
                                </div>
                            <?php endif; ?>     


                            <!-- Linha 5 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Logomarca</label>
                                    <input type="file"  class="form-control" name="logo" value="<?= (isset($cliente)) ? $cliente['logo'] : "" ?>">
                                </div>
                            </div>
                            -->

                            <?php if(isset($login)): ?>
                                <input type="hidden" name="id_login" value="<?= $login['id_login'] ?>">
                            <?php endif; ?>


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button id="envia" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= (isset($login)) ? "Atualizar" : "Cadastrar" ?></button>
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

  
<script type="text/javascript" src="<?= base_url('assets/js/validalogin.js')?>"></script>

<?php if(isset($login) == null ): ?>

    <script>
        if (frmlogin.addEventListener) {                   
            frmlogin.addEventListener("submit", validaCadastro);
        } else if (frmlogin.attachEvent) {                  
            frmlogin.attachEvent("onsubmit", validaCadastro);
        }
        
        function validaCadastro(evt){
            var nome = document.getElementById('nome');
            var email = document.getElementById('usuario');
            var senha = document.getElementById('senha');
            var senha2 = document.getElementById('confirmar_senha');
            var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            var contErro = 0;
            var b_email = 0;
        
        
            /* Pesquisa no controller/login no método check_email se o e-mail já existe no BD
              Se Sim retorna S se não retorna N */
            //alert("<?= base_url('login/check_email')?>/"+email.value);
            $.ajax({
                async: false,
                type: "GET",
                url: "<?= base_url('login/check_email')?>/"+email.value,
                data: $(this).serialize(),
                success: function(mensagem){
    //                alert(mensagem);
                    if(mensagem == "S") {
                        b_email = 1;
                    } else{
                        b_email = 0;
                    }
                }
            });

            if(b_email == 1){
                caixa_email = document.querySelector('.msg-email');
                caixa_email.innerHTML = "E-mail já cadastrado para outro usuário!";
                caixa_email.style.display = 'block';
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

<?php else: ?>

    <script>
        if (frmlogin.addEventListener) {                   
            frmlogin.addEventListener("submit", validaCadastro);
        } else if (frmlogin.attachEvent) {                  
            frmlogin.attachEvent("onsubmit", validaCadastro);
        }
        
        function validaCadastro(evt){
            var nome = document.getElementById('nome');
            var email = document.getElementById('usuario');
            var senha = document.getElementById('senha');
            var senha2 = document.getElementById('confirmar_senha');
            var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            var contErro = 0;
            var b_email = 0;
        
        
            /* Pesquisa no controller/login no método check_email se o e-mail já existe no BD
              Se Sim retorna S se não retorna N */
            //alert("<?= base_url('login/check_email')?>/"+email.value);
            $.ajax({
                async: false,
                type: "GET",
                url: "<?= base_url('login/check_email')?>/"+email.value,
                data: $(this).serialize(),
                success: function(mensagem){
    //                alert(mensagem);
                    if(mensagem == "S") {
                        b_email = 1;
                    } else{
                        b_email = 0;
                    }
                }
            });

//            if(b_email == 1){
//                caixa_email = document.querySelector('.msg-email');
//                caixa_email.innerHTML = "E-mail já cadastrado para outro usuário!";
//                caixa_email.style.display = 'block';
//                contErro += 1;
//            }

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


                                            
