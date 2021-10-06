
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Visualizar Cliente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="/clientes" class="btn btn-success" style="margin-right:15px">Voltar</a>
              <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
              <li class="breadcrumb-item"><a href="/clientes">Clientes</a></li>
              <li class="breadcrumb-item active">Visualizar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dados dos Clientes</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/clientes" method="POST" >
                    <div class="card-body">
                        <div class="row">
                            <!-- Linha 1 -->
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="nome" value="<?= (isset($cliente)) ? $cliente['nome'] : "" ?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">CNPJ</label>
                                    <input type="text" class="form-control" name="cnpj" value="<?= (isset($cliente)) ? $cliente['cnpj'] : "" ?>" disabled>
                                </div>
                            </div>

                            <!-- Linha 2 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="<?= (isset($cliente)) ? $cliente['telefone'] : "" ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="">Rua</label>
                                    <input type="text" class="form-control" name="rua" value="<?= (isset($cliente)) ? $cliente['rua'] : "" ?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Número</label>
                                    <input type="text" class="form-control" name="numero" value="<?= (isset($cliente)) ? $cliente['numero'] : "" ?>" disabled>
                                </div>
                            </div>

                            <!-- Linha 3 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="<?= (isset($cliente)) ? $cliente['complemento'] : "" ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">CEP</label>
                                    <input type="text" class="form-control" name="cep" value="<?= (isset($cliente)) ? $cliente['cep'] : "" ?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="<?= (isset($cliente)) ? $cliente['bairro'] : "" ?>" disabled>
                                </div>
                            </div>

                            <!-- Linha 4 -->
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" value="<?= (isset($cliente)) ? $cliente['cidade'] : "" ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">UF</label>
                                    <select class="custom-select" name="uf" value="<?= (isset($cliente)) ? $cliente['uf'] : "" ?>" disabled>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select> 
                                </div>
                            </div>

                            <!-- Linha 5 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" class="form-control" name="email" value="<?= (isset($cliente)) ? $cliente['email'] : "" ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Logomarca</label>
                                    <input type="file"  class="form-control" name="logo" value="<?= (isset($cliente)) ? $cliente['logo'] : "" ?>" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Voltar</button>
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
