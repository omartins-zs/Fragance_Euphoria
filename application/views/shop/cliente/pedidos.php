<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-box-open text-primary mr-2"></i>Meus Pedidos
            </h2>
            <p class="text-muted small mb-0">Acompanhe todos os seus pedidos de perfumes, status de pagamento e envio.</p>
        </div>
        <div>
            <a href="<?= base_url('cliente/conta') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left mr-1"></i> Voltar à Minha Conta
            </a>
        </div>
    </div>

    <?php if ($this->session->flashdata('erro')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle mr-1"></i> <?= $this->session->flashdata('erro'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow border-0 rounded-lg">
        <div class="card-body p-0">
            <?php if (!empty($pedidos)): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">N° Pedido</th>
                                <th>Data da Compra</th>
                                <th>Pagamento</th>
                                <th>Status</th>
                                <th>Valor Total</th>
                                <th class="text-end pe-4">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidos as $pedido): ?>
                                <tr>
                                    <td class="ps-4 font-weight-bold">#<?= $pedido->id ?></td>
                                    <td>
                                        <i class="far fa-calendar-alt text-muted me-1"></i>
                                        <?= date('d/m/Y \à\s H:i', strtotime($pedido->criado_em)) ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            <i class="fas fa-wallet me-1 text-muted"></i><?= html_escape($pedido->forma_pagamento) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php
                                        $badgeClass = 'bg-warning text-dark';
                                        if ($pedido->status === 'Pago') $badgeClass = 'bg-primary text-white';
                                        if ($pedido->status === 'Enviado') $badgeClass = 'bg-info text-white';
                                        if ($pedido->status === 'Entregue') $badgeClass = 'bg-success text-white';
                                        if ($pedido->status === 'Cancelado') $badgeClass = 'bg-danger text-white';
                                        ?>
                                        <span class="badge <?= $badgeClass ?> px-3 py-2">
                                            <?= $pedido->status ?>
                                        </span>
                                    </td>
                                    <td class="font-weight-bold text-dark">
                                        R$ <?= number_format((float) $pedido->total, 2, ',', '.') ?>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="<?= base_url('cliente/pedidos/' . $pedido->id) ?>" class="btn btn-primary btn-sm font-weight-bold">
                                            <i class="fas fa-eye mr-1"></i> Ver Detalhes
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted font-weight-bold">Você ainda não possui pedidos</h5>
                    <p class="text-muted small">Descubra perfumes marcantes das melhores marcas em nosso catálogo.</p>
                    <a href="<?= base_url('shop') ?>" class="btn btn-primary mt-2">
                        <i class="fas fa-store mr-1"></i> Explorar Perfumes
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
