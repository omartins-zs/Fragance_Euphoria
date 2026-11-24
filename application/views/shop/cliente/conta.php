<div class="container my-5">
    <!-- Cabecalho do Cliente -->
    <div class="card shadow border-0 rounded-lg mb-4 bg-light">
        <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h4 class="font-weight-bold text-dark mb-0"><?= html_escape($cliente->nome); ?></h4>
                    <span class="text-muted small"><i class="fas fa-envelope mr-1"></i> <?= html_escape($cliente->email); ?></span>
                </div>
            </div>
            <div>
                <a href="<?= base_url('shop') ?>" class="btn btn-outline-secondary btn-sm me-2">
                    <i class="fas fa-store mr-1"></i> Ir às Compras
                </a>
                <a href="<?= base_url('cliente/logout') ?>" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-sign-out-alt mr-1"></i> Sair da Conta
                </a>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('erro')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle mr-1"></i> <?= $this->session->flashdata('erro'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('sucesso')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-1"></i> <?= $this->session->flashdata('sucesso'); ?>
        </div>
    <?php endif; ?>

    <!-- Cards de Acesso Rapido -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <a href="<?= base_url('cliente/pedidos') ?>" class="card shadow-sm border-0 text-decoration-none text-dark h-100 hover-shadow transition">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="p-3 bg-success text-white rounded-3 me-3">
                        <i class="fas fa-box-open fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted small text-uppercase mb-1 font-weight-bold">Meus Pedidos</h6>
                        <h3 class="font-weight-bold mb-0 text-dark"><?= (int) $total_pedidos; ?></h3>
                        <small class="text-primary font-weight-bold">Ver histórico &rarr;</small>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
            <a href="<?= base_url('cliente/cartoes') ?>" class="card shadow-sm border-0 text-decoration-none text-dark h-100 hover-shadow transition">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="p-3 bg-info text-white rounded-3 me-3">
                        <i class="fas fa-credit-card fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted small text-uppercase mb-1 font-weight-bold">Cartões Salvos</h6>
                        <h3 class="font-weight-bold mb-0 text-dark"><?= (int) $total_cartoes; ?></h3>
                        <small class="text-primary font-weight-bold">Gerenciar cartões &rarr;</small>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 bg-white">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="p-3 bg-warning text-dark rounded-3 me-3">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted small text-uppercase mb-1 font-weight-bold">Endereço Ativo</h6>
                        <small class="text-muted d-block text-truncate" style="max-width: 200px;">
                            <?= html_escape($cliente->endereco); ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Formulario de Edicao de Dados e Endereco -->
        <div class="col-lg-7 mb-4">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="font-weight-bold mb-0 text-primary">
                        <i class="fas fa-id-card mr-2"></i>Meus Dados Cadastrados & Endereço
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('cliente/atualizar_dados') ?>" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="small font-weight-bold text-muted text-uppercase">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= html_escape($cliente->nome); ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="small font-weight-bold text-muted text-uppercase">E-mail (Login)</label>
                                <input type="email" class="form-control bg-light" id="email" value="<?= html_escape($cliente->email); ?>" readonly title="O e-mail de login não pode ser alterado diretamente">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="celular" class="small font-weight-bold text-muted text-uppercase">WhatsApp / Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" value="<?= html_escape($cliente->celular); ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="endereco" class="small font-weight-bold text-muted text-uppercase">Endereço de Entrega Completo</label>
                            <textarea class="form-control" id="endereco" name="endereco" rows="3" required><?= html_escape($cliente->endereco); ?></textarea>
                            <small class="text-muted">Utilizado no preenchimento automático das suas compras.</small>
                        </div>

                        <hr class="my-4">

                        <div class="mb-4">
                            <label for="nova_senha" class="small font-weight-bold text-muted text-uppercase">Alterar Senha (Opcional)</label>
                            <input type="password" class="form-control" id="nova_senha" name="nova_senha" placeholder="Deixe em branco para manter sua senha atual">
                            <small class="text-muted">Mínimo de 6 caracteres caso queira redefinir sua senha.</small>
                        </div>

                        <button type="submit" class="btn btn-primary font-weight-bold">
                            <i class="fas fa-save mr-1"></i> Salvar Alterações
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ultimos Pedidos -->
        <div class="col-lg-5">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="font-weight-bold mb-0 text-success">
                        <i class="fas fa-receipt mr-2"></i>Últimos Pedidos
                    </h5>
                    <a href="<?= base_url('cliente/pedidos') ?>" class="small font-weight-bold text-primary">Ver todos</a>
                </div>
                <div class="card-body p-3">
                    <?php if (!empty($ultimos_pedidos)): ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($ultimos_pedidos as $ped): ?>
                                <a href="<?= base_url('cliente/pedidos/' . $ped->id) ?>" class="list-group-item list-group-item-action py-3 px-2 border-bottom">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1 font-weight-bold text-dark">Pedido #<?= $ped->id ?></h6>
                                            <small class="text-muted"><?= date('d/m/Y H:i', strtotime($ped->criado_em)) ?></small>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-<?= ($ped->status === 'Entregue' || $ped->status === 'Pago') ? 'success' : (($ped->status === 'Cancelado') ? 'danger' : 'warning text-dark') ?>">
                                                <?= $ped->status ?>
                                            </span>
                                            <div class="font-weight-bold text-primary mt-1">
                                                R$ <?= number_format((float) $ped->total, 2, ',', '.') ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-shopping-bag fa-2x mb-2 text-muted"></i>
                            <p class="mb-0 small">Você ainda não realizou nenhum pedido.</p>
                            <a href="<?= base_url('shop') ?>" class="btn btn-sm btn-outline-primary mt-2">Conhecer perfumes</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
