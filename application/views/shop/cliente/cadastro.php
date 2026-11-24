<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus text-primary fa-3x mb-2"></i>
                        <h3 class="font-weight-bold text-dark">Cadastro de Cliente</h3>
                        <p class="text-muted small">Crie sua conta para acompanhar pedidos, salvar seus endereços e aproveitar ofertas exclusivas.</p>
                    </div>

                    <?php if ($this->session->flashdata('erro')): ?>
                        <div class="alert alert-danger py-2 px-3 small">
                            <i class="fas fa-exclamation-circle mr-1"></i> <?= $this->session->flashdata('erro'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('cliente/salvar_cadastro') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nome" class="small font-weight-bold text-muted text-uppercase">Nome Completo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= set_value('nome'); ?>" placeholder="Ex: Lucas Guimarães Campos" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="small font-weight-bold text-muted text-uppercase">E-mail <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="seu.email@exemplo.com" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="celular" class="small font-weight-bold text-muted text-uppercase">WhatsApp / Celular <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="celular" name="celular" value="<?= set_value('celular'); ?>" placeholder="(11) 98765-4321" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="endereco" class="small font-weight-bold text-muted text-uppercase">Endereço de Entrega Principal <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="endereco" name="endereco" rows="2" placeholder="Rua/Avenida, Número, Bairro, Cidade - UF, CEP" required><?= set_value('endereco'); ?></textarea>
                            <small class="text-muted">Este endereço será utilizado automaticamente para entregas das suas compras.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="senha" class="small font-weight-bold text-muted text-uppercase">Senha (mínimo 6 dígitos) <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="••••••••" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="confirma_senha" class="small font-weight-bold text-muted text-uppercase">Confirmar Senha <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 font-weight-bold">
                            <i class="fas fa-check mr-1"></i> Concluir Cadastro e Entrar
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <span class="small text-muted">Já tem uma conta cadastrada?</span>
                        <a href="<?= base_url('cliente/login') ?>" class="small font-weight-bold text-primary ms-1">
                            Fazer login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
