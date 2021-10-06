
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cadastrar Menus</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="/login/lista" class="btn btn-success" style="margin-right:15px"><i class="fas fa-undo-alt"></i> Voltar</a>
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item"><a href="/login/lista">Usuários</a></li>
              <li class="breadcrumb-item active">Menus</li>
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
          <?php if($alert == 'success_create'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Menus atualizados com sucesso.
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
                <!-- /.card-header 
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Menus</h3>
                </div>
                -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="frmlogin" action="/login/storemenu" method="POST"  >
                    <div class="card-body">
                        <div class="row">

                            <!-- Linha 1 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Cliente</label>
                                    <select class="custom-select" name="cliente_id" value="<?= (isset($login)) ? $login['cliente_id'] : "" ?>" disabled>
                                        <option value="0" <?php if(isset($login) && $login['cliente_id'] == 0) echo ' selected="selected"' ?>> </option>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?= $cliente['id_cliente'] ?>" <?php if(isset($login) && $login['cliente_id'] == $cliente['id_cliente']) echo ' selected="selected"' ?>> <?= $cliente['nome'] ?> </option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Usuário</label>
                                    <input type="text" id="nome"  class="form-control" name="usuario_nome" value="<?= (isset($login)) ? $login['usuario_nome'] : "" ?>" disabled>
                                    <span class='msg-erro msg-nome'></span>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-xs-1"></th>
                                        <th class="col-xs-1">Cód.:</th>
                                        <th class="col-xs-4">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(empty($menus)): ?>
                                        <tr>
                                        <td colspan="9">Nenhum Menu cadastrado!</td>
                                        </tr>
                                    <?php else: ?>  
                                    <?php $i=0; foreach($menus as $menu):?>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="menus_id[]" value="<?= $menu['id_menu'] ?>" <?= ($u_m_sel[$i] == 1) ? "checked" : "" ?>>
                                            </td>
                                            <td><?= $menu['id_menu'] ?></td>
                                            <td><?= $menu['nome_menu'] ?></td>
                                        </tr>
                                    <?php $i++; endforeach; ?>
                                    <?php endif; ?>


                                </tbody>
                                </table>
                            </div>




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
                    <button id="envia" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Menu </button>
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

  
   

                                            
