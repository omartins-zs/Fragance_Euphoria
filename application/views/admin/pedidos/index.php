<!-- Cabecalho da Pagina -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800 font-weight-bold">
            <i class="fas fa-receipt text-warning mr-2"></i>Gestão de Pedidos
        </h1>
        <p class="text-muted small mb-0">Acompanhamento e controle completo das compras realizadas pelos clientes na loja virtual.</p>
    </div>
    <div class="mt-3 mt-sm-0">
        <a href="<?= base_url('shop') ?>" target="_blank" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-external-link-alt mr-1"></i> Ir para a Loja Virtual
        </a>
    </div>
</div>

<!-- Cards Resumo no Topo -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Pedidos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int) ($total_pedidos ?? count($pedidos ?? [])); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Faturamento Total</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            R$ <?= number_format((float) ($faturamento ?? 0), 2, ',', '.') ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Status Em Andamento</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $andamento = 0;
                                foreach ($pedidos as $p) {
                                    if (in_array($p->status, ['Pago', 'Enviado'])) $andamento++;
                                }
                                echo $andamento;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendentes de Pagto</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $pendentes = 0;
                                foreach ($pedidos as $p) {
                                    if ($p->status === 'Pendente') $pendentes++;
                                }
                                echo $pendentes;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabela de Pedidos -->
<div class="card shadow mb-4 border-0">
    <div class="card-header py-3 bg-white border-bottom d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-list mr-1"></i> Histórico de Pedidos
        </h6>
        <span class="badge badge-light border text-muted">Atualizado em tempo real</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center pl-3" style="width: 90px;"># ID</th>
                        <th>Comprador & Contato</th>
                        <th>Destino / Endereço</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Pagamento</th>
                        <th class="text-right">Total</th>
                        <th class="text-center">Situação</th>
                        <th class="text-center pr-3" style="width: 130px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pedidos)): ?>
                        <?php foreach ($pedidos as $ped): ?>
                            <tr>
                                <td class="text-center pl-3 font-weight-bold text-dark">
                                    <span class="badge badge-light border px-2 py-1">#<?= $ped->id ?></span>
                                </td>
                                <td>
                                    <div class="font-weight-bold text-dark"><?= html_escape($ped->cliente_nome) ?></div>
                                    <small class="text-muted d-block">
                                        <i class="fas fa-envelope mr-1"></i><?= html_escape($ped->cliente_email) ?>
                                    </small>
                                </td>
                                <td class="small text-muted" style="max-width: 260px;">
                                    <i class="fas fa-map-marker-alt text-danger mr-1"></i>
                                    <?= html_escape($ped->endereco_entrega) ?>
                                </td>
                                <td class="text-center small text-muted">
                                    <?= date('d/m/Y', strtotime($ped->criado_em)) ?><br>
                                    <span class="font-weight-bold text-dark"><?= date('H:i', strtotime($ped->criado_em)) ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-light border px-2 py-1 font-weight-bold">
                                        <?php if (stripos($ped->forma_pagamento, 'PIX') !== false): ?>
                                            <i class="fas fa-bolt text-warning mr-1"></i>
                                        <?php elseif (stripos($ped->forma_pagamento, 'Boleto') !== false): ?>
                                            <i class="fas fa-barcode text-dark mr-1"></i>
                                        <?php else: ?>
                                            <i class="fas fa-credit-card text-primary mr-1"></i>
                                        <?php endif; ?>
                                        <?= html_escape($ped->forma_pagamento) ?>
                                    </span>
                                </td>
                                <td class="text-right font-weight-bold text-success" style="font-size: 1.05rem;">
                                    R$ <?= number_format((float) $ped->total, 2, ',', '.') ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                        $status_color = 'badge-secondary';
                                        $status_icon  = 'fa-clock';
                                        if ($ped->status === 'Pago') {
                                            $status_color = 'badge-success';
                                            $status_icon  = 'fa-check-circle';
                                        } elseif ($ped->status === 'Enviado') {
                                            $status_color = 'badge-info';
                                            $status_icon  = 'fa-truck';
                                        } elseif ($ped->status === 'Entregue') {
                                            $status_color = 'badge-primary';
                                            $status_icon  = 'fa-gift';
                                        } elseif ($ped->status === 'Cancelado') {
                                            $status_color = 'badge-danger';
                                            $status_icon  = 'fa-times-circle';
                                        }
                                    ?>
                                    <span class="badge <?= $status_color ?> px-3 py-2 font-weight-bold shadow-sm" style="font-size: 0.85rem;">
                                        <i class="fas <?= $status_icon ?> mr-1"></i><?= $ped->status ?>
                                    </span>
                                </td>
                                <td class="text-center pr-3">
                                    <a href="<?= base_url('admin/pedidos/detalhes/' . $ped->id) ?>" class="btn btn-sm btn-primary font-weight-bold px-3 shadow-sm">
                                        <i class="fas fa-eye mr-1"></i> Ver
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fas fa-shopping-bag fa-3x mb-3 text-gray-300"></i>
                                <p class="mb-0 font-weight-bold">Nenhum pedido registrado até o momento.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
