<h1 class="display-2 text-center text-info">Seu Carrinho de Compras</h1>
<div class="container">
	<div class="card rounded my-5">
		<div class="card-body">

			<div class="row">
				<div class="col-md-8">
					<div class="d-flex justify-content-between">
						<div class="row w-100">
							<div class="col">
								<h4><b>Carrinho de Compras</b></h4>
							</div>
							<div class="col text-right text-muted"><?= $produtosNoCarrinho ?> items</div>
						</div>
					</div>
					<div class="row border-top border-bottom">
						<?php foreach ($perfumesDoCarrinho as $index => $perfume) : ?>
							<div class="row main align-items-center my-1">
								<div class="col-2"><img class="img-fluid" src="<?= !empty($perfume['imagem']) ? base_url('assets/admin/upload/' . $perfume['imagem']) : base_url('assets/img/perfume_default.png'); ?>"></div>
								<div class="col">
									<div class="row text-muted"><?= $perfume['nome']; ?></div>
								</div>
								<div class="col">
									<span class="text-decoration-none" href="#"><?= $perfume['qtde']; ?></span>
								</div>
								<!-- <div class="col">R$ 44.00 <span class="close">&#10005;</span></div> -->
								<div class="col text-right">R$ <?= $perfume['preco']; ?> <a href="<?= base_url('carrinho/remover/' . $index); ?>"><span class="close">&#10005;</span></a></div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="d-flex justify-content-between my-3">
						<div class="back-to-shop"><a class="text-decoration-none" href="<?= base_url('shop'); ?>"><i class="fas fa-arrow-left"></i><span class="text-muted">Voltar para as compras</span></a></div>
						<a href="<?= base_url('carrinho/limpar'); ?>" class="btn btn-warning btn-sm btn-block">Limpar Carrinho</a>
					</div>
				</div>
				<div class="col-md-4 summary bg-light">
					<div>
						<h4><b>Resumo</b></h4>
					</div>
					<hr>
					<div class="row">
						<div class="col">ITENS <?= $produtosNoCarrinho ?></div>
						<div class="col text-right">R$ <?= $totalCarrinho ?></div>
					</div>
					<form>
						<div class="mb-3">
							<label for="" class="form-label">Frete</label>
							<select class="form-control" id="freteSelect">
								<option class="text-muted" selected disabled>Selecione</option>
								<option class="text-muted" data-frete="15.00">Transportadora - R$ 15.00</option>
								<option class="text-muted" data-frete="9.99">Correios - R$ 9.99</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label" for="">Cupom de desconto</label>
							<input class="form-control" placeholder="Digite o cupom de desconto">
						</div>
					</form>
					<div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
						<div class="col">Preço Total</div>
						<div class="col text-right" id="totalCarrinho"><?= $totalCarrinho ?></div>
					</div>
					<button class="btn btn-dark btn-block">CHECKOUT</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('templates/shop/js'); ?>

<script>
	$(document).ready(function() {
		// Atualiza o total do carrinho quando a opção de frete é alterada
		$('#freteSelect').change(function() {
			updateTotal();
		});

		// Função para atualizar o total com base na opção de frete selecionada
		function updateTotal() {
			var freteSelecionado = $('#freteSelect option:selected').data('frete') || 0;
			var totalCarrinho = <?= $totalCarrinho ?>; // Pode ser substituído pela variável PHP

			var novoTotal = parseFloat(totalCarrinho) + parseFloat(freteSelecionado);
			$('#totalCarrinho').text('R$ ' + novoTotal.toFixed(2));
		}
	});
</script>
