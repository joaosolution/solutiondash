 <div class="modal fade" id="modal-conf-deleta">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/produtos/excluir" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">Confima sua ação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Deseja excluir este produto?</p>
                <input type="text" id="id_produto" name="id_produto" value="">
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
          <div class="col-sm-6">
            <h1 class="m-0">Produtos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Produtos</li>
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
                      Produto cadastrado com sucesso.
                    </div>
              </div>
            </div>  
          <?php elseif($alert == 'success_delete'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Produto excluído com sucesso.
                    </div>
              </div>
            </div>  
          <?php endif; ?>
        <?php endif; ?>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registros</h3>
                    <a href="/produtos/novo" class="btn btn-info" style="margin-left: 15px"><i class="fa fa-user-plus"></i> Novo Produto</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">Cód.:</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Qtd</th>
                            <th>Qtd. Mínima</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(empty($produtos)): ?>
                            <tr>
                              <td colspan="12">Nenhum produto cadastrado!</td>
                            </tr>
                        <?php else: ?>  
                          <?php foreach($produtos as $produto):?>

                            <tr>
                                <td><?= $produto['id_produto'] ?></td>
                                <td><?= $produto['nome'] ?></td>
                                <td><?= $produto['descricao'] ?></td>
                                <td><?= $produto['quantidade'] ?></td>
                                <td><?= $produto['quantidade_minima'] ?></td>
                                <td>
                                  <a href="/produtos/ver/<?= $produto['id_produto']?>" class="btn btn-warning"><i class="fa fa-search-plus"></i></a>
                                  <a href="/produtos/editar/<?= $produto['id_produto']?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="button" class="btn btn-danger" onclick="document.getElementById('id_produto').value =<?= $produto['id_produto']?> " data-toggle="modal" data-target="#modal-conf-deleta"><i class="fas fa-trash-alt"></i></button>
                                  
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php endif; ?>


                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
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
