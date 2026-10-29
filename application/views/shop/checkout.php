<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="font-weight-bold text-dark">
            <i class="fas fa-lock text-success mr-2"></i>Finalização do Pedido
        </h1>
        <p class="text-muted">Ambiente 100% seguro. Informe os dados para entrega dos seus perfumes.</p>
    </div>

    <?php if ($this->session->flashdata('erro')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle mr-1"></i> <?= $this->session->flashdata('erro') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('carrinho/finalizar') ?>" method="POST">
        <div class="row">
            <!-- Dados de Entrega e Pagamento -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow border-0 rounded-lg mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="font-weight-bold mb-0 text-primary">
                            <i class="fas fa-truck mr-2"></i>1. Dados do Comprador & Endereço
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="form-group">
                            <label for="nome" class="font-weight-bold small text-muted text-uppercase">Nome Completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Lucas Guimarães" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email" class="font-weight-bold small text-muted text-uppercase">E-mail <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="seu.email@exemplo.com" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="celular" class="font-weight-bold small text-muted text-uppercase">WhatsApp / Celular <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="(11) 98765-4321" required>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label for="endereco" class="font-weight-bold small text-muted text-uppercase">Endereço de Entrega Completo <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="endereco" name="endereco" rows="3" placeholder="Rua/Avenida, Número, Complemento, Bairro, Cidade - UF, CEP" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Forma de Pagamento -->
                <div class="card shadow border-0 rounded-lg">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="font-weight-bold mb-0 text-primary">
                            <i class="fas fa-credit-card mr-2"></i>2. Forma de Pagamento
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="pagamentoPix" name="forma_pagamento" value="PIX" class="custom-control-input" checked>
                            <label class="custom-control-label font-weight-bold" for="pagamentoPix">
                                <i class="fas fa-bolt text-warning mr-1"></i> PIX (Aprovação Instantânea)
                            </label>
                            <small class="d-block text-muted ml-4">Liberação imediata para envio do seu pedido.</small>
                        </div>

                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="pagamentoCartao" name="forma_pagamento" value="Cartão de Crédito" class="custom-control-input">
                            <label class="custom-control-label font-weight-bold" for="pagamentoCartao">
                                <i class="fas fa-credit-card text-primary mr-1"></i> Cartão de Crédito em até 12x
                            </label>
                            <small class="d-block text-muted ml-4">Parcelamento em até 3x sem juros.</small>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="pagamentoBoleto" name="forma_pagamento" value="Boleto Bancário" class="custom-control-input">
                            <label class="custom-control-label font-weight-bold" for="pagamentoBoleto">
                                <i class="fas fa-barcode text-dark mr-1"></i> Boleto Bancário
                            </label>
                            <small class="d-block text-muted ml-4">Compensação em até 2 dias úteis.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumo dos Itens Selecionados -->
            <div class="col-lg-5">
                <div class="card shadow border-0 rounded-lg sticky-top" style="top: 20px;">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="font-weight-bold mb-0 text-dark">
                            <i class="fas fa-receipt mr-2"></i>Resumo do Pedido
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <?php foreach ($perfumesDoCarrinho as $item): ?>
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                <div>
                                    <h6 class="font-weight-bold mb-0 text-dark"><?= html_escape($item['nome']) ?></h6>
                                    <small class="text-muted">Qtd: <?= $item['qtde'] ?> &times; R$ <?= number_format((float) $item['preco'], 2, ',', '.') ?></small>
                                </div>
                                <span class="font-weight-bold text-dark">
                                    R$ <?= number_format((float) $item['preco'] * (int) $item['qtde'], 2, ',', '.') ?>
                                </span>
                            </div>
                        <?php endforeach; ?>

                        <div class="d-flex justify-content-between text-muted mb-2">
                            <span>Subtotal:</span>
                            <span>R$ <?= number_format((float) $totalCarrinho, 2, ',', '.') ?></span>
                        </div>

                        <div class="d-flex justify-content-between text-muted mb-3">
                            <span>Frete Promocional:</span>
                            <span class="text-success font-weight-bold">Grátis</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-3 mb-4">
                            <span class="h5 font-weight-bold mb-0">Total a Pagar:</span>
                            <span class="h3 font-weight-bold text-success mb-0">
                                R$ <?= number_format((float) $totalCarrinho, 2, ',', '.') ?>
                            </span>
                        </div>

                        <button type="submit" class="btn btn-success btn-block btn-lg font-weight-bold shadow-sm">
                            <i class="fas fa-check-circle mr-2"></i> Confirmar e Pagar Agora
                        </button>

                        <div class="text-center mt-3">
                            <a href="<?= base_url('carrinho') ?>" class="text-muted small">
                                <i class="fas fa-arrow-left mr-1"></i> Voltar para o Carrinho
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $this->load->view('templates/shop/js'); ?>
