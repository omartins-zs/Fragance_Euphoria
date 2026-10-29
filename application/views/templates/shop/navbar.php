<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3">
	<div class="container">
		<a class="navbar-brand font-weight-bold d-flex align-items-center" href="<?= base_url('shop') ?>">
			<i class="fas fa-gem text-warning mr-2"></i>
			<span>Fragance <span class="text-warning font-weight-light">Euphoria</span></span>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link <?= empty($this->uri->segment(2)) ? 'active font-weight-bold' : '' ?>" href="<?= base_url('shop') ?>">Catálogo</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) === 'promocoes') ? 'active font-weight-bold' : '' ?>" href="<?= base_url('shop/promocoes') ?>">Promoções</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) === 'blog') ? 'active font-weight-bold' : '' ?>" href="<?= base_url('shop/blog') ?>">Blog Olfativo</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Categorias
					</a>
					<ul class="dropdown-menu shadow">
						<li><a class="dropdown-item" href="<?= base_url('shop/produtos/Masculino') ?>">Masculino</a></li>
						<li><a class="dropdown-item" href="<?= base_url('shop/produtos/Feminino') ?>">Feminino</a></li>
						<li><a class="dropdown-item" href="<?= base_url('shop/produtos/Unissex') ?>">Unissex</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="<?= base_url('shop') ?>">Todos os Perfumes</a></li>
					</ul>
				</li>
			</ul>
			<div class="d-flex align-items-center">
				<a href="<?= base_url('admin') ?>" class="btn btn-outline-light btn-sm mx-2 font-weight-bold">
					<i class="fas fa-lock mr-1"></i> Painel Admin
				</a>
				<a href="<?= base_url('carrinho') ?>" class="btn btn-warning btn-sm font-weight-bold text-dark">
					<i class="fas fa-shopping-bag mr-1"></i> Carrinho
					<span class="badge bg-dark text-white rounded-pill ms-1"><?= (int) ($produtosNoCarrinho ?? 0) ?></span>
				</a>
			</div>
		</div>
	</div>
</nav>
