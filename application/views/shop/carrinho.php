<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="font-weight-bold text-dark">
            <i class="fas fa-shopping-bag text-warning mr-2"></i>Seu Carrinho de Compras
        </h1>
        <p class="text-muted">Revise os perfumes selecionados antes de prosseguir para o pagamento.</p>
    </div>

    <div class="card shadow border-0 rounded-lg">
        <div class="card-body p-4 p-md-5">
            <div class="row">
                <!-- Lista de Produtos no Carrinho -->
                <div class="col-lg-8 pr-lg-4 mb-4 mb-lg-0">
                    <div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
                        <h4 class="font-weight-bold mb-0">Itens Selecionados</h4>
                        <span class="badge badge-light border text-muted px-3 py-2 font-weight-bold">
                            <?= (int) $produtosNoCarrinho ?> <?= ((int) $produtosNoCarrinho === 1) ? 'item' : 'itens' ?>
                        </span>
                    </div>

                    <?php if (!empty($perfumesDoCarrinho)): ?>
                        <div class="mt-3">
                            <?php foreach ($perfumesDoCarrinho as $index => $perfume) : ?>
                                <div class="row align-items-center py-3 border-bottom">
                                    <div class="col-3 col-sm-2">
                                        <div class="bg-light p-2 rounded text-center">
                                            <i class="fas fa-spray-can text-warning fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-5">
                                        <h6 class="font-weight-bold mb-1 text-dark"><?= html_escape($perfume['nome']) ?></h6>
                                        <small class="text-muted">Quantidade: <?= (int) $perfume['qtde'] ?></small>
                                    </div>
                                    <div class="col-4 col-sm-5 text-right">
                                        <span class="font-weight-bold text-dark d-block">
                                            R$ <?= number_format((float) $perfume['preco'] * (int) $perfume['qtde'], 2, ',', '.') ?>
                                        </span>
                                        <small class="text-muted d-block">R$ <?= number_format((float) $perfume['preco'], 2, ',', '.') ?> un.</small>
                                        <a href="<?= base_url('carrinho/remover/' . $index) ?>" class="text-danger small font-weight-bold" title="Remover item">
                                            <i class="fas fa-trash-alt mr-1"></i>Remover
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4 pt-2">
                            <a href="<?= base_url('shop') ?>" class="btn btn-outline-secondary btn-sm mb-2 mb-sm-0">
                                <i class="fas fa-arrow-left mr-1"></i> Continuar Comprando
                            </a>
                            <a href="<?= base_url('carrinho/limpar') ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja realmente esvaziar seu carrinho?');">
                                <i class="fas fa-trash mr-1"></i> Limpar Carrinho
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted font-weight-bold">Seu carrinho está vazio</h5>
                            <p class="text-muted small">Descubra fragrâncias exclusivas em nosso catálogo!</p>
                            <a href="<?= base_url('shop') ?>" class="btn btn-primary mt-2">
                                <i class="fas fa-store mr-1"></i> Ir para as Compras
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Resumo do Pedido -->
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded-lg border">
                        <h5 class="font-weight-bold mb-3 border-bottom pb-2">Resumo da Compra</h5>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal:</span>
                            <span class="font-weight-bold">R$ <?= number_format((float) $totalCarrinho, 2, ',', '.') ?></span>
                        </div>

                        <div class="mb-3">
                            <label class="small text-muted font-weight-bold text-uppercase mb-1">Simulação de Frete</label>
                            <select class="form-control form-control-sm" id="freteSelect">
                                <option value="0" selected>Frete Grátis Promocional - R$ 0,00</option>
                                <option value="15" data-frete="15.00">Sedex Expresso - R$ 15,00</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-3 mb-4">
                            <span class="h6 font-weight-bold mb-0">Total:</span>
                            <span class="h4 font-weight-bold text-primary mb-0" id="totalCarrinho">
                                R$ <?= number_format((float) $totalCarrinho, 2, ',', '.') ?>
                            </span>
                        </div>

                        <?php if (!empty($perfumesDoCarrinho)): ?>
                            <a href="<?= base_url('carrinho/checkout') ?>" class="btn btn-dark btn-block btn-lg font-weight-bold shadow-sm">
                                Fechar Pedido <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        <?php else: ?>
                            <button class="btn btn-secondary btn-block btn-lg" disabled>
                                Carrinho Vazio
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/shop/js'); ?>

<script>
    $(document).ready(function() {
        $('#freteSelect').change(function() {
            var frete = parseFloat($('#freteSelect option:selected').data('frete') || 0);
            var subtotal = parseFloat(<?= (float) $totalCarrinho ?>);
            var total = subtotal + frete;
            $('#totalCarrinho').text('R$ ' + total.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        });
    });
</script>
