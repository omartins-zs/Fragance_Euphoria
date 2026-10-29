<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <div class="d-none d-sm-inline-block font-weight-bold text-dark ml-2">
        <i class="fas fa-gem text-warning mr-1"></i> Painel de Controle Fragance Euphoria
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto align-items-center">

        <li class="nav-item my-auto mr-3">
            <a class="btn btn-outline-primary btn-sm font-weight-bold" href="<?= base_url('shop') ?>" target="_blank">
                <i class="fas fa-store mr-1"></i> Ver Vitrine
            </a>
        </li>

        <!-- Alternar perfil de teste rapido -->
        <li class="nav-item dropdown no-arrow mr-3">
            <a class="btn btn-light btn-sm dropdown-toggle font-weight-bold" href="#" id="dropdownPerfis" role="button" data-toggle="dropdown">
                <i class="fas fa-bolt text-warning mr-1"></i> Perfis Demo
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <h6 class="dropdown-header">Alternar Usuário de Teste:</h6>
                <a class="dropdown-item" href="<?= base_url('admin/auth/demo/admin') ?>">
                    <i class="fas fa-crown text-danger mr-2"></i> Administrador
                </a>
                <a class="dropdown-item" href="<?= base_url('admin/auth/demo/gerente') ?>">
                    <i class="fas fa-boxes text-primary mr-2"></i> Gerente
                </a>
                <a class="dropdown-item" href="<?= base_url('admin/auth/demo/atendente') ?>">
                    <i class="fas fa-headset text-success mr-2"></i> Atendente
                </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Informacoes do Usuario Logado -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <div class="text-right mr-2 d-none d-lg-inline">
                    <span class="d-block text-gray-800 font-weight-bold small"><?= html_escape($usuario_logado['nome'] ?? 'Administrador') ?></span>
                    <?php 
                        $perfil = strtoupper($usuario_logado['perfil'] ?? 'ADMIN');
                        $badge_color = ($perfil === 'ADMIN') ? 'badge-danger' : (($perfil === 'GERENTE') ? 'badge-primary' : 'badge-success');
                    ?>
                    <span class="badge <?= $badge_color ?>"><?= $perfil ?></span>
                </div>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/admin/images/undraw_profile.svg') ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <div class="dropdown-item-text small text-muted">
                    Conectado como: <strong><?= html_escape($usuario_logado['email'] ?? 'admin@fragance.com') ?></strong>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger font-weight-bold" href="<?= base_url('admin/logout') ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Sair do Painel
                </a>
            </div>
        </li>
    </ul>
</nav>
