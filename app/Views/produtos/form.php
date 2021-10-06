
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= (isset($produto)) ? "Atualizar" : "Novo" ?> Produto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="/produtos" class="btn btn-success" style="margin-right:15px"><i class="fas fa-undo-alt"></i> Voltar</a>
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item"><a href="/produtos">Produtos</a></li>
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
                      Produtos atualizado com sucesso.
                    </div>
              </div>
            </div>  
          <?php endif; ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dados dos Produtos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/produtos/store" method="POST" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="nome" value="<?= (isset($produto)) ? $produto['nome'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Descrição</label>
                                    <input type="text" class="form-control" name="descricao" value="<?= (isset($produto)) ? $produto['descricao'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Quantidade</label>
                                    <input type="text" class="form-control" name="quantidade" value="<?= (isset($produto)) ? $produto['quantidade'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Quantidade Mínima</label>
                                    <input type="text" class="form-control" name="quantidade_minima" value="<?= (isset($produto)) ? $produto['quantidade_minima'] : "" ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Valor de Compra</label>
                                    <input type="text" class="form-control" name="valor_de_compra" value="<?= (isset($produto)) ? $produto['valor_de_compra'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Valor de venda</label>
                                    <input type="text" class="form-control" name="valor_de_venda" value="<?= (isset($produto)) ? $produto['valor_de_venda'] : "" ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Margem de Lucro</label>
                                    <input type="text" class="form-control" name="margem_de_lucro" value="<?= (isset($produto)) ? $produto['margem_de_lucro'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Validade</label>
                                    <input type="date" class="form-control" name="validade" value="<?= (isset($produto)) ? $produto['validade'] : "" ?>">
                                </div>
                            </div>

                            <?php if(isset($produto)): ?>
                                <input type="hidden" name="id_produto" value="<?= $produto['id_produto'] ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= (isset($produto)) ? "Atualizar" : "Cadastrar" ?></button>
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
