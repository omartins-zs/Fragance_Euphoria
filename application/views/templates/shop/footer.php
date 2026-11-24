<footer class="bg-dark text-light border-top border-secondary-subtle pt-5 pb-4 mt-5">
	<div class="container">
		<!-- Linha de Destaques / Benefícios -->
		<div class="row g-4 pb-4 mb-4 border-bottom border-secondary text-center text-md-start">
			<div class="col-6 col-md-3 d-flex align-items-center gap-3">
				<div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px; font-size: 1.25rem;">
					<i class="fas fa-certificate"></i>
				</div>
				<div>
					<h6 class="mb-0 text-white font-weight-bold">100% Originais</h6>
					<small class="text-secondary">Procedência garantida</small>
				</div>
			</div>
			<div class="col-6 col-md-3 d-flex align-items-center gap-3">
				<div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px; font-size: 1.25rem;">
					<i class="fas fa-truck-fast"></i>
				</div>
				<div>
					<h6 class="mb-0 text-white font-weight-bold">Envio Rápido</h6>
					<small class="text-secondary">Entrega para todo o Brasil</small>
				</div>
			</div>
			<div class="col-6 col-md-3 d-flex align-items-center gap-3">
				<div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px; font-size: 1.25rem;">
					<i class="fas fa-shield-halved"></i>
				</div>
				<div>
					<h6 class="mb-0 text-white font-weight-bold">Compra Segura</h6>
					<small class="text-secondary">Criptografia de ponta a ponta</small>
				</div>
			</div>
			<div class="col-6 col-md-3 d-flex align-items-center gap-3">
				<div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px; font-size: 1.25rem;">
					<i class="fas fa-credit-card"></i>
				</div>
				<div>
					<h6 class="mb-0 text-white font-weight-bold">Até 10x sem juros</h6>
					<small class="text-secondary">PIX com 5% de desconto</small>
				</div>
			</div>
		</div>

		<!-- Linha Principal de Conteúdo -->
		<div class="row g-4 mb-4">
			<!-- Coluna 1: Marca & Propósito -->
			<div class="col-lg-4 col-md-6">
				<a class="d-inline-flex align-items-center text-decoration-none mb-3" href="<?= base_url('shop') ?>">
					<i class="fas fa-gem text-warning fs-4 mr-2"></i>
					<span class="fs-5 text-white font-weight-bold">Fragance <span class="text-warning font-weight-light">Euphoria</span></span>
				</a>
				<p class="text-secondary small pr-lg-4 mb-3" style="line-height: 1.6;">
					Boutique especializada em alta perfumaria internacional de nicho e designer. Seleção rigorosa de fragrâncias icônicas para marcar presença com elegância e sofisticação.
				</p>
				<div class="d-flex gap-2">
					<a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 36px; height: 36px;" title="Instagram">
						<i class="fab fa-instagram"></i>
					</a>
					<a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 36px; height: 36px;" title="WhatsApp">
						<i class="fab fa-whatsapp"></i>
					</a>
					<a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 36px; height: 36px;" title="Facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
				</div>
			</div>

			<!-- Coluna 2: Navegação Rápida -->
			<div class="col-lg-2 col-md-6 col-6">
				<h6 class="text-white text-uppercase font-weight-bold small mb-3 letter-spacing-1">Catálogo</h6>
				<ul class="list-unstyled small mb-0">
					<li class="mb-2"><a href="<?= base_url('shop/produtos/Feminino') ?>" class="text-secondary text-decoration-none hover-warning">Feminino</a></li>
					<li class="mb-2"><a href="<?= base_url('shop/produtos/Masculino') ?>" class="text-secondary text-decoration-none hover-warning">Masculino</a></li>
					<li class="mb-2"><a href="<?= base_url('shop/produtos/Unissex') ?>" class="text-secondary text-decoration-none hover-warning">Unissex</a></li>
					<li class="mb-2"><a href="<?= base_url('shop/promocoes') ?>" class="text-secondary text-decoration-none hover-warning">Promoções</a></li>
					<li class="mb-2"><a href="<?= base_url('shop/blog') ?>" class="text-secondary text-decoration-none hover-warning">Blog Olfativo</a></li>
				</ul>
			</div>

			<!-- Coluna 3: Atendimento & Cliente -->
			<div class="col-lg-2 col-md-6 col-6">
				<h6 class="text-white text-uppercase font-weight-bold small mb-3 letter-spacing-1">Minha Conta</h6>
				<ul class="list-unstyled small mb-0">
					<li class="mb-2"><a href="<?= base_url('cliente/conta') ?>" class="text-secondary text-decoration-none hover-warning">Meus Dados</a></li>
					<li class="mb-2"><a href="<?= base_url('cliente/pedidos') ?>" class="text-secondary text-decoration-none hover-warning">Rastrear Pedidos</a></li>
					<li class="mb-2"><a href="<?= base_url('cliente/cartoes') ?>" class="text-secondary text-decoration-none hover-warning">Cartões Salvos</a></li>
					<li class="mb-2"><a href="<?= base_url('carrinho') ?>" class="text-secondary text-decoration-none hover-warning">Meu Carrinho</a></li>
					<li class="mb-2"><a href="<?= base_url('admin/login') ?>" class="text-secondary text-decoration-none hover-warning">Acesso Lojista</a></li>
				</ul>
			</div>

			<!-- Coluna 4: Newsletter & Atendimento -->
			<div class="col-lg-4 col-md-6">
				<h6 class="text-white text-uppercase font-weight-bold small mb-3 letter-spacing-1">Clube de Vantagens</h6>
				<p class="text-secondary small mb-3">Receba com antecedência novidades sobre lançamentos importados e cupons exclusivos.</p>
				<form action="#" method="post" onsubmit="event.preventDefault(); alert('Obrigado por se inscrever no Clube Fragance Euphoria!');">
					<div class="input-group mb-3">
						<input type="email" class="form-control form-control-sm bg-black border-secondary text-white" placeholder="Seu melhor e-mail" required>
						<button class="btn btn-warning btn-sm font-weight-bold text-dark px-3" type="submit">Inscrever</button>
					</div>
				</form>
				<div class="small text-secondary mt-3">
					<div class="d-flex align-items-center mb-1">
						<i class="fas fa-envelope text-warning mr-2" style="width: 16px;"></i>
						<span>contato@fraganceeuphoria.com.br</span>
					</div>
					<div class="d-flex align-items-center">
						<i class="fas fa-headset text-warning mr-2" style="width: 16px;"></i>
						<span>Atendimento: Seg à Sex, 09h às 18h</span>
					</div>
				</div>
			</div>
		</div>

		<!-- Linha de Direitos e Métodos de Pagamento -->
		<div class="row align-items-center pt-4 border-top border-secondary text-center text-md-start">
			<div class="col-md-6 mb-3 mb-md-0">
				<p class="text-secondary small mb-0">
					&copy; <?= date('Y') ?> Fragance Euphoria. Todos os direitos reservados.
				</p>
			</div>
			<div class="col-md-6 text-md-end text-secondary small">
				<span class="mr-2">Pagamento 100% Seguro:</span>
				<i class="fab fa-cc-visa fa-lg mr-2 text-light" title="Visa"></i>
				<i class="fab fa-cc-mastercard fa-lg mr-2 text-light" title="Mastercard"></i>
				<i class="fab fa-pix fa-lg mr-2 text-success" title="Pix"></i>
				<i class="fas fa-barcode fa-lg text-light" title="Boleto"></i>
			</div>
		</div>
	</div>
</footer>

<style>
.hover-warning:hover {
	color: #ffc107 !important;
	transition: color 0.2s ease-in-out;
}
.letter-spacing-1 {
	letter-spacing: 0.08em;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
