<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-receipt text-success mr-2"></i>Pedido #<?= $pedido->id ?>
            </h2>
            <p class="text-muted small mb-0">Realizado em <?= date('d/m/Y \à\s H:i', strtotime($pedido->criado_em)) ?></p>
        </div>
        <div>
            <a href="<?= base_url('cliente/pedidos') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left mr-1"></i> Voltar aos Pedidos
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Itens do Pedido -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="font-weight-bold mb-0 text-primary">
                        <i class="fas fa-spray-can mr-2"></i>Itens do Pedido
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Perfume</th>
                                    <th class="text-center">Quantidade</th>
                                    <th class="text-end">Preço Unitário</th>
                                    <th class="text-end pe-4">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($itens as $item): ?>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-light p-2 rounded text-center me-3" style="width: 45px; height: 45px;">
                                                    <i class="fas fa-spray-can text-warning"></i>
                                                </div>
                                                <div>
                                                    <h6 class="font-weight-bold mb-0 text-dark"><?= html_escape($item->nome_produto) ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center font-weight-bold"><?= (int) $item->quantidade ?></td>
                                        <td class="text-end text-muted">
                                            R$ <?= number_format((float) $item->preco_unitario, 2, ',', '.') ?>
                                        </td>
                                        <td class="text-end pe-4 font-weight-bold text-dark">
                                            R$ <?= number_format((float) $item->subtotal, 2, ',', '.') ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <th colspan="3" class="text-end font-weight-bold fs-6">Total Pago:</th>
                                    <th class="text-end pe-4 font-weight-bold text-success fs-5">
                                        R$ <?= number_format((float) $pedido->total, 2, ',', '.') ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resumo e Endereco de Entrega -->
        <div class="col-lg-4">
            <!-- Status do Pedido -->
            <div class="card shadow border-0 rounded-lg mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="font-weight-bold mb-0 text-dark">Status Atual</h6>
                </div>
                <div class="card-body p-4 text-center">
                    <?php
                    $badgeClass = 'bg-warning text-dark';
                    if ($pedido->status === 'Pago') $badgeClass = 'bg-primary text-white';
                    if ($pedido->status === 'Enviado') $badgeClass = 'bg-info text-white';
                    if ($pedido->status === 'Entregue') $badgeClass = 'bg-success text-white';
                    if ($pedido->status === 'Cancelado') $badgeClass = 'bg-danger text-white';
                    ?>
                    <span class="badge <?= $badgeClass ?> px-4 py-2 fs-6 mb-3 d-inline-block">
                        <?= $pedido->status ?>
                    </span>
                    <p class="small text-muted mb-0">
                        <?php if ($pedido->status === 'Pago'): ?>
                            Seu pagamento foi confirmado! Os perfumes estão em separação para envio.
                        <?php elseif ($pedido->status === 'Enviado'): ?>
                            Seu pedido está a caminho do seu endereço de entrega.
                        <?php elseif ($pedido->status === 'Entregue'): ?>
                            Pedido entregue no seu endereço com sucesso. Aproveite sua fragrância!
                        <?php else: ?>
                            Aguardando confirmação do pagamento.
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <!-- Dados de Entrega -->
            <div class="card shadow border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="font-weight-bold mb-0 text-dark">Dados da Entrega</h6>
                </div>
                <div class="card-body p-4">
                    <p class="small mb-1 text-muted text-uppercase font-weight-bold">Destinatário</p>
                    <p class="font-weight-bold mb-3"><?= html_escape($pedido->cliente_nome) ?></p>

                    <p class="small mb-1 text-muted text-uppercase font-weight-bold">Endereço de Entrega</p>
                    <p class="text-dark mb-3 small"><?= nl2br(html_escape($pedido->endereco_entrega)) ?></p>

                    <p class="small mb-1 text-muted text-uppercase font-weight-bold">Contato</p>
                    <p class="text-dark mb-3 small">
                        <i class="fas fa-phone mr-1 text-muted"></i> <?= html_escape($pedido->cliente_celular) ?><br>
                        <i class="fas fa-envelope mr-1 text-muted"></i> <?= html_escape($pedido->cliente_email) ?>
                    </p>

                    <p class="small mb-1 text-muted text-uppercase font-weight-bold">Forma de Pagamento</p>
                    <span class="badge bg-light text-dark border px-3 py-2">
                        <i class="fas fa-credit-card mr-1 text-muted"></i> <?= html_escape($pedido->forma_pagamento) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
