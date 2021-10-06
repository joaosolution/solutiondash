 <div class="modal fade" id="modal-conf-deleta">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/funcionarios/excluir" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">Confima sua ação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Deseja excluir este funcionario?</p>
                <input type="text" id="id_funcionario" name="id_funcionario" value="">
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
            <h1 class="m-0">Funcionários</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Funcionários</li>
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
                      Funcionario cadastrado com sucesso.
                    </div>
              </div>
            </div>  
          <?php elseif($alert == 'success_delete'): ?>
            <div class="row">
              <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Funcionario excluído com sucesso.
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
                    <a href="/funcionarios/novo" class="btn btn-info" style="margin-left: 15px"><i class="fa fa-user-plus"></i>Novo Funcionário</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1"  class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">Cód.:</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Data de Contratação</th>
                            <th>Cargo</th>
                            <th>Salário</th>
                            <th>Dia de Pagamento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(empty($funcionarios)): ?>
                            <tr>
                              <td colspan="12">Nenhum funcionário cadastrado!</td>
                            </tr>
                        <?php else: ?>  
                          <?php foreach($funcionarios as $funcionario):?>

                            <tr>
                                <td><?= $funcionario['id_funcionario'] ?></td>
                                <td><?= $funcionario['nome'] ?></td>
                                <td><?= $funcionario['data_de_nascimento'] ?></td>
                                <td><?= $funcionario['rg'] ?></td>
                                <td><?= $funcionario['cpf'] ?></td>
                                <td><?= $funcionario['telefone'] ?></td>
                                <td><?= $funcionario['endereco'] ?></td>
                                <td><?= $funcionario['data_de_contratacao'] ?></td>
                                <td><?= $funcionario['cargo'] ?></td>
                                <td><?= $funcionario['salario'] ?></td>
                                <td><?= $funcionario['dia_de_pagamento'] ?></td>
                                <td>
                                  <a href="/funcionarios/ver/<?= $funcionario['id_funcionario']?>" class="btn btn-warning"><i class="fa fa-search-plus"></i></a>
                                  <a href="/funcionarios/editar/<?= $funcionario['id_funcionario']?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="button" class="btn btn-danger" onclick="document.getElementById('id_funcionario').value =<?= $funcionario['id_funcionario']?> " data-toggle="modal" data-target="#modal-conf-deleta"><i class="fas fa-trash-alt"></i></button>
                                  
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
