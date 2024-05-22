<!-- Product section-->
<section class="py-5">
	<div class="container px-4 px-lg-5 my-5">
		<div class="row gx-4 gx-lg-5 align-items-center">
			<div class="col-md-6 mb-3 mb-md-0">
				<img class="img-fluid" style="width: 588px; height:686px; object-fit: contain;" src="<?= !empty($perfume->imagem) ? base_url('assets/admin/upload/' . $perfume->imagem) : base_url('assets/img/perfume_default.png'); ?>" alt="<?= $perfume->descricao_info; ?>" />
			</div>
			<div class="col-md-6">
				<div class="small mb-1">SKU: <?= $perfume->id; ?></div>
				<h1 class="display-5 fw-bolder"><?= $perfume->nome; ?></h1>
				<div class="fs-5 mb-3">
					<span><?= $perfume->preco; ?></span>
				</div>
				<p class="lead text-justify"><?= $perfume->descricao_info; ?></p>
				<div class="d-flex">
					<!-- Formulário para adicionar ao carrinho -->
					<form action="<?= base_url(); ?>carrinho/adicionar" method="post" class="d-flex flex-column align-items-start">
						<input type="hidden" name="id" value="<?= $perfume->id; ?>">
						<input type="hidden" name="nome" value="<?= $perfume->nome; ?>">
						<input type="hidden" name="preco" value="<?= $perfume->preco; ?>">
						<input type="hidden" name="imagem" value="<?= $perfume->imagem; ?>">
						<div class="mb-3 d-flex align-items-center">
							<label for="quantidade" class="me-2">Quantidade</label>
							<input class="form-control text-center me-2" id="quantidade" name="quantidade" type="text" value="1" style="max-width: 3rem" />
							<button type="submit" class="btn btn-outline-dark">
								<i class="fas fa-shopping-cart me-2"></i>Adicionar no carrinho
							</button>
						</div>
					</form>
					<!-- Fim do formulário -->
				</div>
			</div>
		</div>
	</div>
</section>
