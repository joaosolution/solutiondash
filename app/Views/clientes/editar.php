
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Atualizar Cliente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="/clientes" class="btn btn-success" style="margin-right:15px"><i class="fas fa-undo-alt"></i> Voltar</a>
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item"><a href="/clientes">Clientes</a></li>
              <li class="breadcrumb-item active">Atualizar</li>
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
                      Cliente atualizado com sucesso.
                    </div>
              </div>
            </div>  
          <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dados Pessoais</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/clientes/store" method="POST" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="nome" value="<?= $cliente['nome'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="data_de_nascimento" value="<?= $cliente['data_de_nascimento'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="<?= $cliente['cpf'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="<?= $cliente['telefone'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="<?= $cliente['endereco'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Limite de Crédito</label>
                                    <input type="text" class="form-control" name="limite_de_credito" value="<?= $cliente['limite_de_credito'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Dia de Pagamento</label>
                                    <input type="text" class="form-control" name="dia_de_pagamento" value="<?= $cliente['dia_de_pagamento'] ?>">
                                </div>
                            </div>
                            
                            <input type="hidden " class="form-control" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
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
