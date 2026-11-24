<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-credit-card text-info mr-2"></i>Meus Cartões de Crédito
            </h2>
            <p class="text-muted small mb-0">Gerencie seus cartões salvos para compras rápidas e seguras em 1 clique.</p>
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

    <?php if ($this->session->flashdata('sucesso')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-1"></i> <?= $this->session->flashdata('sucesso'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Lista de Cartoes Salvos -->
        <div class="col-lg-7 mb-4">
            <div class="card shadow border-0 rounded-lg mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="font-weight-bold mb-0 text-dark">
                        <i class="fas fa-wallet mr-2 text-primary"></i>Cartões Salvos na Conta
                    </h5>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($cartoes)): ?>
                        <div class="row g-3">
                            <?php foreach ($cartoes as $cartao): ?>
                                <div class="col-md-12">
                                    <div class="card text-white rounded-3 shadow-sm p-4 position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <span class="fs-5 font-weight-bold text-uppercase">
                                                <i class="fas fa-credit-card mr-2"></i><?= html_escape($cartao->bandeira) ?>
                                            </span>
                                            <i class="fas fa-wifi text-light opacity-50"></i>
                                        </div>
                                        <div class="h4 font-monospace letter-spacing mb-4 text-light">
                                            •••• •••• •••• <?= html_escape($cartao->ultimos_digitos) ?>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div>
                                                <small class="text-uppercase text-light opacity-75 d-block" style="font-size: 0.7rem;">Titular</small>
                                                <span class="font-weight-bold small"><?= html_escape($cartao->nome_titular) ?></span>
                                            </div>
                                            <div class="text-end">
                                                <small class="text-uppercase text-light opacity-75 d-block" style="font-size: 0.7rem;">Validade</small>
                                                <span class="font-weight-bold small"><?= html_escape($cartao->validade) ?></span>
                                            </div>
                                        </div>

                                        <a href="<?= base_url('cliente/cartoes/remover/' . $cartao->id) ?>" 
                                           class="btn btn-sm btn-danger position-absolute top-0 end-0 m-3 px-2 py-1"
                                           onclick="return confirm('Deseja realmente remover este cartão salvo?');"
                                           title="Remover cartão">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="far fa-credit-card fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted font-weight-bold">Nenhum cartão salvo</h5>
                            <p class="text-muted small">Adicione um cartão de crédito abaixo para agilizar suas compras futuras.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Aviso de Seguranca PCI -->
            <div class="alert alert-light border shadow-sm small text-muted">
                <i class="fas fa-shield-alt text-success fa-2x float-start me-3"></i>
                <strong>Armazenamento 100% Seguro (Padrão PCI-DSS):</strong><br>
                Por segurança estrita, nós nunca armazenamos o código de segurança (CVV) nem o número completo do seu cartão. Gravamos apenas os 4 últimos dígitos para identificação no momento da compra.
            </div>
        </div>

        <!-- Formulario para Adicionar Novo Cartao -->
        <div class="col-lg-5">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="font-weight-bold mb-0 text-success">
                        <i class="fas fa-plus-circle mr-2"></i>Adicionar Novo Cartão
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('cliente/cartoes/salvar') ?>" method="POST">
                        <div class="mb-3">
                            <label for="nome_titular" class="small font-weight-bold text-muted text-uppercase">Nome Impresso no Cartão <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nome_titular" name="nome_titular" placeholder="Ex: LUCAS G CAMPOS" required>
                        </div>

                        <div class="mb-3">
                            <label for="numero_cartao" class="small font-weight-bold text-muted text-uppercase">Número do Cartão <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-credit-card text-muted"></i></span>
                                <input type="text" class="form-control" id="numero_cartao" name="numero_cartao" placeholder="0000 0000 0000 0000" maxlength="19" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="validade" class="small font-weight-bold text-muted text-uppercase">Validade <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="validade" name="validade" placeholder="MM/AA" maxlength="5" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="cvv" class="small font-weight-bold text-muted text-uppercase">CVV <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="cvv" name="cvv" placeholder="123" maxlength="4" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="bandeira" class="small font-weight-bold text-muted text-uppercase">Bandeira</label>
                            <select class="form-select" id="bandeira" name="bandeira">
                                <option value="Mastercard">Mastercard</option>
                                <option value="Visa">Visa</option>
                                <option value="Elo">Elo</option>
                                <option value="American Express">American Express</option>
                                <option value="Hipercard">Hipercard</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 font-weight-bold">
                            <i class="fas fa-lock mr-1"></i> Salvar Cartão com Segurança
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
