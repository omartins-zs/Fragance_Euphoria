<!-- Topo / Cabecalho da Pagina -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <div class="d-flex align-items-center">
            <span class="badge badge-primary px-3 py-2 mr-2 font-weight-bold" style="font-size: 1rem;">
                <i class="fas fa-receipt mr-1"></i> Pedido #<?= $pedido->id ?>
            </span>
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Detalhes da Compra</h1>
        </div>
        <p class="text-muted small mt-1 mb-0">
            <i class="far fa-calendar-alt mr-1"></i> Registrado em <?= date('d/m/Y \à\s H:i', strtotime($pedido->criado_em)) ?>
        </p>
    </div>
    <div class="mt-3 mt-sm-0">
        <button type="button" class="btn btn-sm btn-outline-secondary mr-2" onclick="window.print();">
            <i class="fas fa-print mr-1"></i> Imprimir Recibo
        </button>
        <a href="<?= base_url('admin/pedidos') ?>" class="btn btn-sm btn-primary">
            <i class="fas fa-arrow-left mr-1"></i> Voltar à Lista
        </a>
    </div>
</div>

<!-- Barra Visual de Progresso do Pedido (Stepper) -->
<div class="card shadow mb-4 border-0">
    <div class="card-body py-4">
        <?php if ($pedido->status === 'Cancelado'): ?>
            <div class="alert alert-danger mb-0 d-flex align-items-center">
                <i class="fas fa-ban fa-2x mr-3"></i>
                <div>
                    <h5 class="font-weight-bold mb-0">Este pedido foi cancelado</h5>
                    <small>Nenhuma ação de envio ou entrega é necessária para esta compra.</small>
                </div>
            </div>
        <?php else: ?>
            <?php
                $step = 1;
                if ($pedido->status === 'Pago') $step = 2;
                elseif ($pedido->status === 'Enviado') $step = 3;
                elseif ($pedido->status === 'Entregue') $step = 4;
            ?>
            <div class="row text-center position-relative">
                <div class="col-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2 <?= ($step >= 1) ? 'bg-primary text-white shadow-sm' : 'bg-light text-muted border' ?>" style="width: 48px; height: 48px; font-size: 1.2rem;">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h6 class="font-weight-bold mb-0 text-dark small">1. Realizado</h6>
                    <small class="text-muted d-none d-md-block">Pedido criado</small>
                </div>
                <div class="col-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2 <?= ($step >= 2) ? 'bg-success text-white shadow-sm' : 'bg-light text-muted border' ?>" style="width: 48px; height: 48px; font-size: 1.2rem;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h6 class="font-weight-bold mb-0 text-dark small">2. Pago</h6>
                    <small class="text-muted d-none d-md-block">Pagamento aprovado</small>
                </div>
                <div class="col-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2 <?= ($step >= 3) ? 'bg-info text-white shadow-sm' : 'bg-light text-muted border' ?>" style="width: 48px; height: 48px; font-size: 1.2rem;">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h6 class="font-weight-bold mb-0 text-dark small">3. Enviado</h6>
                    <small class="text-muted d-none d-md-block">Em transporte</small>
                </div>
                <div class="col-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2 <?= ($step >= 4) ? 'bg-success text-white shadow-sm' : 'bg-light text-muted border' ?>" style="width: 48px; height: 48px; font-size: 1.2rem;">
                        <i class="fas fa-home"></i>
                    </div>
                    <h6 class="font-weight-bold mb-0 text-dark small">4. Entregue</h6>
                    <small class="text-muted d-none d-md-block">Destino final</small>
                </div>
            </div>
            <div class="progress mt-3" style="height: 6px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($step === 1) ? '25%' : (($step === 2) ? '50%' : (($step === 3) ? '75%' : '100%')) ?>;"></div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <!-- Coluna Esquerda: Dados do Cliente, Entrega e Pagamento -->
    <div class="col-lg-7 mb-4">
        <!-- Dados do Comprador -->
        <div class="card shadow mb-4 border-0">
            <div class="card-header py-3 bg-white border-bottom d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-circle mr-2"></i> Dados do Comprador
                </h6>
                <span class="badge badge-light border text-muted">Cliente</span>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start mb-3">
                    <div class="bg-primary text-white rounded-circle p-3 mr-3 font-weight-bold text-center d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-size: 1.2rem;">
                        <?= strtoupper(substr($pedido->cliente_nome, 0, 1)) ?>
                    </div>
                    <div>
                        <h5 class="font-weight-bold text-dark mb-1"><?= html_escape($pedido->cliente_nome) ?></h5>
                        <p class="text-muted small mb-0">Comprador registrado no sistema</p>
                    </div>
                </div>

                <div class="row g-2 mt-2">
                    <div class="col-sm-6 mb-2">
                        <small class="text-uppercase text-muted font-weight-bold d-block" style="font-size: 0.75rem;">E-mail de Contato</small>
                        <a href="mailto:<?= html_escape($pedido->cliente_email) ?>" class="text-primary font-weight-bold">
                            <i class="fas fa-envelope mr-1 text-muted"></i><?= html_escape($pedido->cliente_email) ?>
                        </a>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <small class="text-uppercase text-muted font-weight-bold d-block" style="font-size: 0.75rem;">WhatsApp / Telefone</small>
                        <a href="tel:<?= preg_replace('/\D/', '', $pedido->cliente_celular) ?>" class="text-success font-weight-bold">
                            <i class="fas fa-phone mr-1 text-muted"></i><?= html_escape($pedido->cliente_celular) ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Endereço de Entrega & Forma de Pagamento -->
        <div class="card shadow mb-4 border-0">
            <div class="card-header py-3 bg-white border-bottom">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-truck mr-2"></i> Informações de Entrega & Pagamento
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7 mb-3 mb-md-0 border-right">
                        <small class="text-uppercase text-muted font-weight-bold d-block mb-1" style="font-size: 0.75rem;">
                            <i class="fas fa-map-marker-alt text-danger mr-1"></i> Endereço para Envio
                        </small>
                        <p class="font-weight-bold text-dark mb-2" style="line-height: 1.5;">
                            <?= nl2br(html_escape($pedido->endereco_entrega)) ?>
                        </p>
                        <span class="badge badge-success px-2 py-1 small">
                            <i class="fas fa-check mr-1"></i> Frete Grátis
                        </span>
                    </div>

                    <div class="col-md-5">
                        <small class="text-uppercase text-muted font-weight-bold d-block mb-1" style="font-size: 0.75rem;">
                            <i class="fas fa-credit-card text-info mr-1"></i> Método Escolhido
                        </small>
                        <div class="p-2 bg-light rounded border mt-2">
                            <h6 class="font-weight-bold text-dark mb-0">
                                <?php if (stripos($pedido->forma_pagamento, 'PIX') !== false): ?>
                                    <i class="fas fa-bolt text-warning mr-1"></i>
                                <?php elseif (stripos($pedido->forma_pagamento, 'Boleto') !== false): ?>
                                    <i class="fas fa-barcode text-dark mr-1"></i>
                                <?php else: ?>
                                    <i class="fas fa-credit-card text-primary mr-1"></i>
                                <?php endif; ?>
                                <?= html_escape($pedido->forma_pagamento) ?>
                            </h6>
                            <small class="text-muted d-block mt-1">Transação Segura</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Coluna Direita: Controle de Status e Ações Rápidas -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow border-0">
            <div class="card-header py-3 bg-white border-bottom">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-cog mr-2"></i> Gestão da Situação do Pedido
                </h6>
            </div>
            <div class="card-body">
                <!-- Status Atual Destacado -->
                <div class="text-center p-3 rounded mb-4" style="background-color: #f8f9fc; border: 1px dashed #d1d3e2;">
                    <span class="small text-muted font-weight-bold text-uppercase d-block mb-1">Status Vigente:</span>
                    <?php 
                        $status_badge = 'badge-secondary';
                        $status_icon = 'fa-clock';
                        if ($pedido->status === 'Pago') {
                            $status_badge = 'badge-success';
                            $status_icon = 'fa-check-circle';
                        } elseif ($pedido->status === 'Enviado') {
                            $status_badge = 'badge-info';
                            $status_icon = 'fa-truck';
                        } elseif ($pedido->status === 'Entregue') {
                            $status_badge = 'badge-primary';
                            $status_icon = 'fa-gift';
                        } elseif ($pedido->status === 'Cancelado') {
                            $status_badge = 'badge-danger';
                            $status_icon = 'fa-times-circle';
                        }
                    ?>
                    <h3 class="mb-0">
                        <span class="badge <?= $status_badge ?> px-4 py-2 font-weight-bold shadow-sm">
                            <i class="fas <?= $status_icon ?> mr-2"></i><?= $pedido->status ?>
                        </span>
                    </h3>
                </div>

                <!-- Formulario de Atualizacao -->
                <form action="<?= base_url('admin/pedidos/status/' . $pedido->id) ?>" method="POST">
                    <div class="form-group mb-3">
                        <label class="font-weight-bold small text-muted text-uppercase" for="status_select">
                            Alterar Situação do Pedido:
                        </label>
                        <select name="status" id="status_select" class="form-control custom-select">
                            <option value="Pendente" <?= ($pedido->status === 'Pendente') ? 'selected' : '' ?>>⏳ Pendente (Aguardando Pagamento)</option>
                            <option value="Pago" <?= ($pedido->status === 'Pago') ? 'selected' : '' ?>>✅ Pago (Pronto para Envio)</option>
                            <option value="Enviado" <?= ($pedido->status === 'Enviado') ? 'selected' : '' ?>>🚚 Enviado (Em Transporte)</option>
                            <option value="Entregue" <?= ($pedido->status === 'Entregue') ? 'selected' : '' ?>>🎁 Entregue ao Destinatário</option>
                            <option value="Cancelado" <?= ($pedido->status === 'Cancelado') ? 'selected' : '' ?>>❌ Cancelado</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 shadow-sm">
                        <i class="fas fa-save mr-1"></i> Salvar Novo Status
                    </button>
                </form>

                <!-- Atalhos Rapidos em 1 Clique -->
                <hr class="my-3">
                <small class="text-uppercase text-muted font-weight-bold d-block mb-2" style="font-size: 0.7rem;">Ações Diretas em 1 Clique:</small>
                <div class="d-flex justify-content-between">
                    <form action="<?= base_url('admin/pedidos/status/' . $pedido->id) ?>" method="POST" class="mr-1 flex-fill">
                        <input type="hidden" name="status" value="Enviado">
                        <button type="submit" class="btn btn-outline-info btn-sm btn-block font-weight-bold" <?= ($pedido->status === 'Enviado' || $pedido->status === 'Entregue') ? 'disabled' : '' ?>>
                            <i class="fas fa-truck mr-1"></i> Marcar Enviado
                        </button>
                    </form>
                    <form action="<?= base_url('admin/pedidos/status/' . $pedido->id) ?>" method="POST" class="ml-1 flex-fill">
                        <input type="hidden" name="status" value="Entregue">
                        <button type="submit" class="btn btn-outline-success btn-sm btn-block font-weight-bold" <?= ($pedido->status === 'Entregue') ? 'disabled' : '' ?>>
                            <i class="fas fa-check mr-1"></i> Marcar Entregue
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabela de Itens Adquiridos -->
<div class="card shadow mb-4 border-0">
    <div class="card-header py-3 bg-white border-bottom d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-box-open mr-2"></i> Itens Adquiridos (<?= count($itens ?? array()) ?>)
        </h6>
        <span class="badge badge-light border text-muted">Catálogo Fragance</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="pl-4" style="width: 80px;">Frasco</th>
                        <th>Nome do Perfume</th>
                        <th class="text-center" style="width: 140px;">Quantidade</th>
                        <th class="text-right" style="width: 180px;">Preço Unitário</th>
                        <th class="text-right pr-4" style="width: 200px;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($itens)): ?>
                        <?php foreach ($itens as $item): ?>
                            <tr>
                                <td class="pl-4">
                                    <?php if (!empty($item->imagem)): ?>
                                        <img src="<?= base_url('assets/admin/upload/' . $item->imagem) ?>" 
                                             alt="<?= html_escape($item->nome_produto) ?>" 
                                             class="img-thumbnail rounded"
                                             style="width: 48px; height: 48px; object-fit: contain;">
                                    <?php else: ?>
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 48px; height: 48px;">
                                            <i class="fas fa-spray-can fa-lg text-warning"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <h6 class="font-weight-bold text-dark mb-0"><?= html_escape($item->nome_produto) ?></h6>
                                    <small class="text-muted">
                                        <?= !empty($item->volume) ? $item->volume . ' ml' : '' ?>
                                        <?= !empty($item->tipo) ? ' &bull; ' . $item->tipo : '' ?>
                                    </small>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-light border px-3 py-2 font-weight-bold text-dark" style="font-size: 0.9rem;">
                                        <?= (int) $item->quantidade ?> un.
                                    </span>
                                </td>
                                <td class="text-right font-weight-bold text-muted">
                                    R$ <?= number_format((float) $item->preco_unitario, 2, ',', '.') ?>
                                </td>
                                <td class="text-right pr-4 font-weight-bold text-primary" style="font-size: 1.05rem;">
                                    R$ <?= number_format((float) $item->subtotal, 2, ',', '.') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        <th colspan="4" class="text-right text-uppercase font-weight-bold py-3">
                            <span class="text-muted mr-3">Subtotal dos Produtos:</span>
                            R$ <?= number_format((float) $pedido->total, 2, ',', '.') ?>
                            <span class="mx-3">&bull;</span>
                            <span class="text-muted mr-3">Frete:</span>
                            <span class="text-success font-weight-bold">Grátis</span>
                            <span class="mx-3">&bull;</span>
                            <span class="text-dark font-weight-bold">Total Geral:</span>
                        </th>
                        <th class="text-right pr-4 py-3">
                            <span class="h4 font-weight-bold text-success mb-0 d-block">
                                R$ <?= number_format((float) $pedido->total, 2, ',', '.') ?>
                            </span>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
