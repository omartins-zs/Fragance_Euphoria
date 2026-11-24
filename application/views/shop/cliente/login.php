<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-circle text-warning fa-3x mb-2"></i>
                        <h3 class="font-weight-bold text-dark">Área do Cliente</h3>
                        <p class="text-muted small">Acesse sua conta para acompanhar pedidos, gerenciar endereços e cartões salvos.</p>
                    </div>

                    <?php if ($this->session->flashdata('erro')): ?>
                        <div class="alert alert-danger py-2 px-3 small">
                            <i class="fas fa-exclamation-circle mr-1"></i> <?= $this->session->flashdata('erro'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('sucesso')): ?>
                        <div class="alert alert-success py-2 px-3 small">
                            <i class="fas fa-check-circle mr-1"></i> <?= $this->session->flashdata('sucesso'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('cliente/autenticar') ?>" method="POST">
                        <div class="form-group mb-3">
                            <label for="email" class="small font-weight-bold text-muted text-uppercase">Seu E-mail</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" class="form-control border-start-0" id="email" name="email" placeholder="exemplo@email.com" required autofocus>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="senha" class="small font-weight-bold text-muted text-uppercase">Sua Senha</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" class="form-control border-start-0" id="senha" name="senha" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 font-weight-bold">
                            <i class="fas fa-sign-in-alt mr-1"></i> Entrar na Minha Conta
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="small text-muted mb-2">Ainda não tem cadastro na Fragance Euphoria?</p>
                        <a href="<?= base_url('cliente/cadastro') ?>" class="btn btn-outline-dark btn-sm w-100 font-weight-bold">
                            <i class="fas fa-user-plus mr-1"></i> Criar Nova Conta Grátis
                        </a>
                    </div>

                    <!-- Atalhos de demonstracao em 1 clique -->
                    <div class="bg-light p-3 rounded mt-4 border">
                        <h6 class="small font-weight-bold text-muted mb-2 text-uppercase">
                            <i class="fas fa-bolt text-warning mr-1"></i> Teste Rápido em 1 Clique:
                        </h6>
                        <div class="d-grid gap-2">
                            <a href="<?= base_url('cliente/demo/lucas') ?>" class="btn btn-sm btn-outline-primary text-start">
                                <i class="fas fa-user mr-1"></i> <strong>Lucas Guimarães</strong> (Com pedidos e cartão salvo)
                            </a>
                            <a href="<?= base_url('cliente/demo/mariana') ?>" class="btn btn-sm btn-outline-secondary text-start">
                                <i class="fas fa-user mr-1"></i> <strong>Mariana Silva</strong>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
