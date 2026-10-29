<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Visão Geral do E-commerce</h1>
        <p class="text-muted small mb-0">Gestão de catálogo, pedidos de clientes e controle de inventário.</p>
    </div>
    <div>
        <a href="<?= base_url('admin/pedidos') ?>" class="btn btn-sm btn-primary shadow-sm font-weight-bold">
            <i class="fas fa-receipt mr-1"></i> Ver Todos os Pedidos
        </a>
    </div>
</div>

<!-- Linha de Cards de Métricas -->
<div class="row">
    <!-- Faturamento Total -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Faturamento Realizado
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            R$ <?= number_format((float) ($total_faturamento ?? 0), 2, ',', '.') ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total de Pedidos -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pedidos Efetuados
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int) ($total_pedidos ?? 0) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Perfumes Cadastrados -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Perfumes no Catálogo
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int) ($total_perfumes ?? 0) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-spray-can fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alerta de Estoque Crítico -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Estoque Baixo (&le; 10 unid.)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int) ($estoque_baixo ?? 0) ?> itens</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabela de Pedidos Recentes -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-receipt mr-1"></i> Pedidos Mais Recentes da Loja
        </h6>
        <span class="badge badge-light border">Atualização em tempo real</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center" style="width: 80px;"># ID</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th class="text-center">Forma de Pagto</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" style="width: 120px;">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pedidos_recentes)): ?>
                        <?php foreach ($pedidos_recentes as $ped): ?>
                            <tr>
                                <td class="text-center font-weight-bold text-muted">#<?= $ped->id ?></td>
                                <td>
                                    <strong><?= html_escape($ped->cliente_nome) ?></strong>
                                    <div class="small text-muted"><?= html_escape($ped->cliente_email) ?></div>
                                </td>
                                <td class="small"><?= date('d/m/Y H:i', strtotime($ped->criado_em)) ?></td>
                                <td class="text-center"><span class="badge badge-light border"><?= html_escape($ped->forma_pagamento) ?></span></td>
                                <td class="text-center font-weight-bold text-primary">
                                    R$ <?= number_format((float) $ped->total, 2, ',', '.') ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                        $status_color = 'badge-secondary';
                                        if ($ped->status === 'Pago') $status_color = 'badge-success';
                                        elseif ($ped->status === 'Enviado') $status_color = 'badge-info';
                                        elseif ($ped->status === 'Entregue') $status_color = 'badge-primary';
                                        elseif ($ped->status === 'Cancelado') $status_color = 'badge-danger';
                                    ?>
                                    <span class="badge <?= $status_color ?> px-2 py-1"><?= $ped->status ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/pedidos/detalhes/' . $ped->id) ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye mr-1"></i> Detalhes
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                Nenhum pedido recente registrado.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
