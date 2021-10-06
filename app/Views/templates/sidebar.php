
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('theme/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?php 
          $session = session();
          $nome_cli = $session->get('nome_cli'); 
          echo $nome_cli;
        ?> 
          DashBoard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >

 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/inicio" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Início
              </p>
            </a>
          </li>


          <?php

            $session = session();

            $tipo_login = $session->get('tipo_login');
//            dd($tipo_login);
            if($tipo_login == "Administrador"):

              $menu=[
                ['itenmenu' => 'Usuários', 'link' => "/login/lista", 'icon' => 'users' ],
                ['itenmenu' => 'Clientes', 'link' => "/clientes", 'icon' => 'user-tie' ],
                ['itenmenu' => 'Menus', 'link' => "/menus", 'icon' => 'bars'  ],
              ];

              foreach ($menu as $iten) { ?>
                <li class='nav-item'>
                <a href='<?= $iten["link"] ?>' class='nav-link'>
                <i class='nav-icon fas fa-<?= $iten["icon"] ?>'></i>
                <p>
                    <?= $iten['itenmenu'] ?>
                </p>
                </a>
                </li>
                
              <?php 
              } 
            else: 

              $menu_cli = $session->get('menu_cli');
//               dd($menu_cli);
                foreach ($menu_cli as $iten) { ?>
                  <li class='nav-item'>
                  <a href='/menus/menudashboard/<?= $iten['id_menu'] ?>' class='nav-link'>
                  <i class='nav-icon fas fa-chart-line'></i>
                  <p>
                      <?= $iten['nome_menu'] ?>
                  </p>
                  </a>
                  </li>
                  
                <?php 
                }

            endif;


          ?>


<!-- Sidebar

          <li class="nav-item">
            <a href="/login/lista" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/clientes" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/menus" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Menus
              </p>
            </a>
          </li>
 -->

<!--           <li class="nav-item">
            <a href="/login/trocarsenha" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Trocar senha
              </p>
            </a>
          </li>
 -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>