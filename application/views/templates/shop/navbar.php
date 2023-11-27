<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url() ?>">Fragance Euphoria</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>Shop/promocoes">Promoções</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>Shop/blog">Blog</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li> -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Categorias
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="<?= base_url() ?>Shop/produtos/Masculino">Masculino</a></li>
						<li><a class="dropdown-item" href="<?= base_url() ?>Shop/produtos/Feminino">Feminino</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">Todos</a></li>
					</ul>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link disabled" aria-disabled="true">Disabled</a>
				</li> -->
			</ul>
			<form class="d-flex" role="search">
				<a href="<?= base_url() ?>Carrinho/" class="btn btn-outline-light">
					<i class="fas fa-shopping-cart"></i>
					Carrinho
					<span class="badge bg-info text-white ms-1 rounded-pill"><?= $produtosNoCarrinho ?></span>
				</a>
			</form>
		</div>
	</div>
</nav>
