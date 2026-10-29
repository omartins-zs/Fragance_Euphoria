<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800 font-weight-bold">
            <i class="fas fa-receipt text-warning mr-2"></i>Gestão de Pedidos
        </h1>
        <p class="text-muted small mb-0">Controle completo de compras realizadas pelos clientes na vitrine.</p>
    </div>
    <div>
        <span class="badge badge-primary px-3 py-2 font-weight-bold" style="font-size: 0.9rem;">
            Total de Pedidos: <?= count($pedidos ?? array()) ?>
        </span>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-white border-bottom">
        <h6 class="m-0 font-weight-bold text-primary">Histórico de Pedidos</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center" style="width: 80px;"># ID</th>
                        <th>Cliente / Contato</th>
                        <th>Endereço de Entrega</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Pagamento</th>
                        <th class="text-center">Valor Total</th>
                        <th class="text-center">Situação</th>
                        <th class="text-center" style="width: 140px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pedidos)): ?>
                        <?php foreach ($pedidos as $ped): ?>
                            <tr>
                                <td class="text-center font-weight-bold text-muted">#<?= $ped->id ?></td>
                                <td>
                                    <strong><?= html_escape($ped->cliente_nome) ?></strong>
                                    <div class="small text-muted"><?= html_escape($ped->cliente_email) ?> | <?= html_escape($ped->cliente_celular) ?></div>
                                </td>
                                <td class="small text-muted" style="max-width: 250px;">
                                    <?= html_escape($ped->endereco_entrega) ?>
                                </td>
                                <td class="text-center small"><?= date('d/m/Y H:i', strtotime($ped->criado_em)) ?></td>
                                <td class="text-center">
                                    <span class="badge badge-light border font-weight-bold"><?= html_escape($ped->forma_pagamento) ?></span>
                                </td>
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
                                    <span class="badge <?= $status_color ?> px-2 py-1 font-weight-bold"><?= $ped->status ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/pedidos/detalhes/' . $ped->id) ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-search-plus mr-1"></i> Abrir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fas fa-shopping-bag fa-3x mb-3 text-gray-300"></i>
                                <p class="mb-0">Nenhum pedido registrado até o momento.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
