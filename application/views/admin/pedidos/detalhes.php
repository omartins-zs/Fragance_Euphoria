<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800 font-weight-bold">
            <i class="fas fa-file-invoice text-primary mr-2"></i>Pedido #<?= $pedido->id ?>
        </h1>
        <p class="text-muted small mb-0">Emitido em <?= date('d/m/Y \à\s H:i', strtotime($pedido->criado_em)) ?></p>
    </div>
    <div>
        <a href="<?= base_url('admin/pedidos') ?>" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Voltar à Lista
        </a>
    </div>
</div>

<div class="row">
    <!-- Dados do Cliente e Endereço -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3 bg-white border-bottom">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user mr-1"></i> Dados do Comprador & Entrega
                </h6>
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr>
                        <th style="width: 140px;" class="text-muted">Nome:</th>
                        <td class="font-weight-bold"><?= html_escape($pedido->cliente_nome) ?></td>
                    </tr>
                    <tr>
                        <th class="text-muted">E-mail:</th>
                        <td><?= html_escape($pedido->cliente_email) ?></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Contato / Celular:</th>
                        <td><?= html_escape($pedido->cliente_celular) ?></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Endereço de Entrega:</th>
                        <td class="font-weight-bold text-dark"><?= html_escape($pedido->endereco_entrega) ?></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Forma de Pagto:</th>
                        <td><span class="badge badge-light border font-weight-bold"><?= html_escape($pedido->forma_pagamento) ?></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Atualização de Status -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3 bg-white border-bottom">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit mr-1"></i> Situação do Pedido
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <span class="text-muted d-block small mb-1">Status Atual:</span>
                    <?php 
                        $status_color = 'badge-secondary';
                        if ($pedido->status === 'Pago') $status_color = 'badge-success';
                        elseif ($pedido->status === 'Enviado') $status_color = 'badge-info';
                        elseif ($pedido->status === 'Entregue') $status_color = 'badge-primary';
                        elseif ($pedido->status === 'Cancelado') $status_color = 'badge-danger';
                    ?>
                    <h3 class="font-weight-bold"><span class="badge <?= $status_color ?> px-3 py-2"><?= $pedido->status ?></span></h3>
                </div>

                <form action="<?= base_url('admin/pedidos/status/' . $pedido->id) ?>" method="POST">
                    <label class="font-weight-bold small text-muted text-uppercase">Alterar Status:</label>
                    <div class="input-group">
                        <select name="status" class="form-control">
                            <option value="Pendente" <?= ($pedido->status === 'Pendente') ? 'selected' : '' ?>>Pendente</option>
                            <option value="Pago" <?= ($pedido->status === 'Pago') ? 'selected' : '' ?>>Pago</option>
                            <option value="Enviado" <?= ($pedido->status === 'Enviado') ? 'selected' : '' ?>>Enviado</option>
                            <option value="Entregue" <?= ($pedido->status === 'Entregue') ? 'selected' : '' ?>>Entregue</option>
                            <option value="Cancelado" <?= ($pedido->status === 'Cancelado') ? 'selected' : '' ?>>Cancelado</option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary font-weight-bold">
                                <i class="fas fa-save mr-1"></i> Atualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Itens do Pedido -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-white border-bottom">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-box-open mr-1"></i> Itens Adquiridos
        </h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Produto</th>
                        <th class="text-center" style="width: 140px;">Qtd</th>
                        <th class="text-center" style="width: 180px;">Preço Unitário</th>
                        <th class="text-center" style="width: 180px;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($itens)): ?>
                        <?php foreach ($itens as $item): ?>
                            <tr>
                                <td class="font-weight-bold text-dark"><?= html_escape($item->nome_produto) ?></td>
                                <td class="text-center"><?= $item->quantidade ?></td>
                                <td class="text-center">R$ <?= number_format((float) $item->preco_unitario, 2, ',', '.') ?></td>
                                <td class="text-center font-weight-bold text-primary">
                                    R$ <?= number_format((float) $item->subtotal, 2, ',', '.') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        <th colspan="3" class="text-right text-uppercase font-weight-bold">Valor Total do Pedido:</th>
                        <th class="text-center text-success font-weight-bold h5 mb-0">
                            R$ <?= number_format((float) $pedido->total, 2, ',', '.') ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
