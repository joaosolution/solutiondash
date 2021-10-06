 <div class="modal fade" id="modal-conf-deleta">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/login/excluir" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">Confima sua ação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Deseja excluir este usuário ?</p>
                <input type="text" id="id_login" name="id_login" value="">
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Sim</button>
              </div>
            </div>

          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h4 class="m-0">Usuários</h4>
          </div><!-- /.col -->
          <div class="col-sm-7">
            <a href="/login/novo" class="btn btn-info" style="margin-left: 15px"><i class="fa fa-user-plus"></i> Novo Usuário</a>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item active">Usuários</li>
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
                      Usuário cadastrado com sucesso.
                    </div>
              </div>
            </div>  
          <?php elseif($alert == 'success_delete'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Usuário excluído com sucesso.
                    </div>
              </div>
            </div>  
          <?php elseif($alert == 'erro_cliente'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Para cadastrar Menu´s é necessário informar o cliente do usuário.
                    </div>
              </div>
            </div>  
          <?php endif; ?>
        <?php endif; ?>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <!-- /.card-header

                <div class="card-header">
                    <h3 class="card-title">Registros</h3>
                    <a href="/login/novo" class="btn btn-info" style="margin-left: 15px"><i class="fa fa-user-plus"></i> Novo Usuário</a>
                </div>
                 -->
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-xs-1">Cód.:</th>
                            <th class="col-xs-4">Nome</th>
                            <th class="col-xs-2">E-mail</th>
                            <th class="col-xs-2">Tipo</th>
                            <th class="col-xs-2">Cliente</th>
                            <th class="col-xs-3" ><span class="pull-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(empty($logins)): ?>
                            <tr>
                              <td colspan="9">Nenhum usuário cadastrado!</td>
                            </tr>
                        <?php else: ?>  
                          <?php foreach($logins as $login):?>

                            <tr>
                                <td><?= $login['id_login'] ?></td>
                                <td><?= $login['usuario_nome'] ?></td>
                                <td><?= $login['usuario'] ?></td>
                                <td><?= $login['tipo_login'] ?></td>
                                <td><?= $login['nome'] ?></td>
                                <td>
                             <!-- /.card-header 
                                <a href="/login/ver/<?= $login['id_login']?>" class="btn btn-warning"><i class="fa fa-search-plus"></i></a>
                              -->
                                  <a href="/login/editar/<?= $login['id_login']?>" class="btn btn-warning"><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="center" title="Editar"></i></a>
                                  <button type="button" class="btn btn-danger" onclick="document.getElementById('id_login').value =<?= $login['id_login']?> " data-toggle="modal" data-target="#modal-conf-deleta" data-toggle="tooltip" data-placement="center" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                                  <a href="/login/menu/<?= $login['id_login']?>" class="btn btn-warning"><i class="fas fa-bars" data-toggle="tooltip" data-placement="center" title="Cadastrar Menu" ></i></a>
                                  
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php endif; ?>


                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
               <div class="card-footer clearfix">
                    <?php echo $pager->links('default','bootstrap_pagination'); ?>
                </div>
                </div>
                <!-- /.card -->

            </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
