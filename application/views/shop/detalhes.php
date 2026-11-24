<!-- Product section-->
<section class="py-5">
	<div class="container px-4 px-lg-5 my-5">
		<div class="row gx-4 gx-lg-5 align-items-center">
			<div class="col-md-6 mb-3 mb-md-0">
				<img class="img-fluid" style="width: 588px; height:686px; object-fit: contain;" src="<?= !empty($perfume->imagem) ? base_url('assets/admin/upload/' . $perfume->imagem) : base_url('assets/img/perfume_default.png'); ?>" alt="<?= html_escape($perfume->nome); ?>" />
			</div>
			<div class="col-md-6">
				<div class="small mb-1">SKU: <?= $perfume->id; ?></div>
				<h1 class="display-5 fw-bolder"><?= html_escape($perfume->nome); ?></h1>
				<div class="fs-5 mb-3">
					<span>R$ <?= number_format((float) $perfume->preco, 2, ',', '.'); ?></span>
				</div>
				<p class="lead text-justify"><?= html_escape($perfume->descricao_info); ?></p>
				<div class="d-flex">
					<!-- Formulário para adicionar ao carrinho -->
					<form action="<?= base_url(); ?>carrinho/adicionar" method="post" class="d-flex flex-column align-items-start">
						<input type="hidden" name="id" value="<?= $perfume->id; ?>">
						<div class="mb-3 d-flex align-items-center">
							<label for="quantidade" class="me-2">Quantidade</label>
							<input class="form-control text-center me-2" id="quantidade" name="quantidade" type="number" min="1" value="1" style="max-width: 3rem" />
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
