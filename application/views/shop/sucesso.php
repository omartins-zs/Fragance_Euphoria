<div class="container my-5">
    <div class="card shadow border-0 rounded-lg mx-auto" style="max-width: 760px;">
        <div class="card-body p-4 p-md-5 text-center">
            <div class="mb-4">
                <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
            </div>

            <h2 class="font-weight-bold text-dark mb-2">Pedido Realizado com Sucesso!</h2>
            <p class="text-muted mb-4">Agradecemos pela sua preferência. O seu pedido foi registrado e está sendo preparado com muito carinho.</p>

            <div class="bg-light p-4 rounded-lg text-left mb-4 border">
                <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                    <span class="text-muted font-weight-bold">Código do Pedido:</span>
                    <span class="h5 font-weight-bold text-primary mb-0">#<?= $pedido->id ?></span>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <small class="text-muted d-block font-weight-bold text-uppercase">Comprador:</small>
                        <strong class="text-dark"><?= html_escape($pedido->cliente_nome) ?></strong>
                        <div class="small text-muted"><?= html_escape($pedido->cliente_email) ?></div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block font-weight-bold text-uppercase">Entrega em:</small>
                        <div class="small text-dark font-weight-bold"><?= html_escape($pedido->endereco_entrega) ?></div>
                    </div>
                </div>

                <div class="border-top pt-3">
                    <h6 class="font-weight-bold mb-2">Itens Adquiridos:</h6>
                    <?php if (!empty($itens)): ?>
                        <?php foreach ($itens as $item): ?>
                            <div class="d-flex justify-content-between small text-muted mb-1">
                                <span><?= $item->quantidade ?> &times; <?= html_escape($item->nome_produto) ?></span>
                                <span class="font-weight-bold text-dark">R$ <?= number_format((float) $item->subtotal, 2, ',', '.') ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-3">
                    <span class="h6 font-weight-bold mb-0">Total Pago (<?= html_escape($pedido->forma_pagamento) ?>):</span>
                    <span class="h4 font-weight-bold text-success mb-0">
                        R$ <?= number_format((float) $pedido->total, 2, ',', '.') ?>
                    </span>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="<?= base_url('shop') ?>" class="btn btn-primary btn-lg font-weight-bold px-4">
                    <i class="fas fa-store mr-2"></i> Continuar Explorando a Loja
                </a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/shop/js'); ?>
