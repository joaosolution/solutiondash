
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= (isset($cliente)) ? "Atualizar" : "Novo" ?> Cliente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="/clientes" class="btn btn-success" style="margin-right:15px"><i class="fas fa-undo-alt"></i> Voltar</a>
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item"><a href="/clientes">Clientes</a></li>
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
                    <h3 class="card-title">Dados dos Clientes</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/clientes/store" method="POST"  enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">

                            <!-- Linha 1 -->
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="nome" value="<?= (isset($cliente)) ? $cliente['nome'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">CNPJ</label>
                                    <input type="text" class="form-control" name="cnpj" value="<?= (isset($cliente)) ? $cliente['cnpj'] : "" ?>">
                                </div>
                            </div>

                            <!-- Linha 2 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="<?= (isset($cliente)) ? $cliente['telefone'] : "" ?>">
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="">Rua</label>
                                    <input type="text" class="form-control" name="rua" value="<?= (isset($cliente)) ? $cliente['rua'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Número</label>
                                    <input type="text" class="form-control" name="numero" value="<?= (isset($cliente)) ? $cliente['numero'] : "" ?>">
                                </div>
                            </div>

                            <!-- Linha 3 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="<?= (isset($cliente)) ? $cliente['complemento'] : "" ?>">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">CEP</label>
                                    <input type="text" class="form-control" name="cep" value="<?= (isset($cliente)) ? $cliente['cep'] : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="<?= (isset($cliente)) ? $cliente['bairro'] : "" ?>">
                                </div>
                            </div>

                            <!-- Linha 4 -->
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" value="<?= (isset($cliente)) ? $cliente['cidade'] : "" ?>">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">UF</label>
                                    <select class="custom-select" name="uf" value="<?= (isset($cliente)) ? $cliente['uf'] : "" ?>">
                                        <option value="AC" <?php if(isset($cliente) && $cliente['uf'] == 'AC') echo ' selected="selected"' ?>>AC</option>
                                        <option value="AL" <?php if(isset($cliente) && $cliente['uf'] == 'AL') echo ' selected="selected"' ?>>AL</option>
                                        <option value="AP" <?php if(isset($cliente) && $cliente['uf'] == 'AP') echo ' selected="selected"' ?>>AP</option>
                                        <option value="AM" <?php if(isset($cliente) && $cliente['uf'] == 'AM') echo ' selected="selected"' ?>>AM</option>
                                        <option value="BA" <?php if(isset($cliente) && $cliente['uf'] == 'BA') echo ' selected="selected"' ?>>BA</option>
                                        <option value="CE" <?php if(isset($cliente) && $cliente['uf'] == 'CE') echo ' selected="selected"' ?>>CE</option>
                                        <option value="DF" <?php if(isset($cliente) && $cliente['uf'] == 'DF') echo ' selected="selected"' ?>>DF</option>
                                        <option value="ES" <?php if(isset($cliente) && $cliente['uf'] == 'ES') echo ' selected="selected"' ?>>ES</option>
                                        <option value="GO" <?php if(isset($cliente) && $cliente['uf'] == 'GO') echo ' selected="selected"' ?>>GO</option>
                                        <option value="MA" <?php if(isset($cliente) && $cliente['uf'] == 'MA') echo ' selected="selected"' ?>>MA</option>
                                        <option value="MT" <?php if(isset($cliente) && $cliente['uf'] == 'MT') echo ' selected="selected"' ?>>MT</option>
                                        <option value="MS" <?php if(isset($cliente) && $cliente['uf'] == 'MS') echo ' selected="selected"' ?>>MS</option>
                                        <option value="MG" <?php if(isset($cliente) && $cliente['uf'] == 'MG') echo ' selected="selected"' ?>>MG</option>
                                        <option value="PA" <?php if(isset($cliente) && $cliente['uf'] == 'PA') echo ' selected="selected"' ?>>PA</option>
                                        <option value="PB" <?php if(isset($cliente) && $cliente['uf'] == 'PB') echo ' selected="selected"' ?>>PB</option>
                                        <option value="PR" <?php if(isset($cliente) && $cliente['uf'] == 'PR') echo ' selected="selected"' ?>>PR</option>
                                        <option value="PE" <?php if(isset($cliente) && $cliente['uf'] == 'PE') echo ' selected="selected"' ?>>PE</option>
                                        <option value="PI" <?php if(isset($cliente) && $cliente['uf'] == 'PI') echo ' selected="selected"' ?>>PI</option>
                                        <option value="RJ" <?php if(isset($cliente) && $cliente['uf'] == 'RJ') echo ' selected="selected"' ?>>RJ</option>
                                        <option value="RN" <?php if(isset($cliente) && $cliente['uf'] == 'RN') echo ' selected="selected"' ?>>RN</option>
                                        <option value="RS" <?php if(isset($cliente) && $cliente['uf'] == 'RS') echo ' selected="selected"' ?>>RS</option>
                                        <option value="RO" <?php if(isset($cliente) && $cliente['uf'] == 'RO') echo ' selected="selected"' ?>>RO</option>
                                        <option value="RR" <?php if(isset($cliente) && $cliente['uf'] == 'RR') echo ' selected="selected"' ?>>RR</option>
                                        <option value="SC" <?php if(isset($cliente) && $cliente['uf'] == 'SC') echo ' selected="selected"' ?>>SC</option>
                                        <option value="SP" <?php if(isset($cliente) && $cliente['uf'] == 'SP') echo ' selected="selected"' ?>>SP</option>
                                        <option value="SE" <?php if(isset($cliente) && $cliente['uf'] == 'SE') echo ' selected="selected"' ?>>SE</option>
                                        <option value="TO" <?php if(isset($cliente) && $cliente['uf'] == 'TO') echo ' selected="selected"' ?>>TO</option>
                                    </select> 
                                </div>
                            </div>

                            <!-- Linha 5 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" class="form-control" name="email" value="<?= (isset($cliente)) ? $cliente['email'] : "" ?>">
                                </div>
                            </div>

                            <!-- Linha 5 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Logomarca</label>
                                    <input type="file"  class="form-control" name="logo" value="<?= (isset($cliente)) ? $cliente['logo'] : "" ?>">
                                </div>
                            </div>
                            -->

                            <?php if(isset($cliente)): ?>
                                <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">
                            <?php endif; ?>


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= (isset($cliente)) ? "Atualizar" : "Cadastrar" ?></button>
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
