<!-- Product section-->
<section class="py-5">
	<div class="container px-4 px-lg-5 my-5">
		<div class="row gx-4 gx-lg-5 align-items-center">
			<div class="col-md-6 mb-3 mb-md-0">
				<img class="img-fluid" style="width: 588px; height:686px; object-fit: contain;" src="<?= !empty($perfume->imagem) ? base_url('assets/admin/upload/' . $perfume->imagem) : base_url('assets/img/perfume_default.png'); ?>" alt="<?= $perfume->descricao; ?>" />
			</div>
			<div class="col-md-6">
				<div class="small mb-1">SKU: <?= $perfume->id; ?></div>
				<h1 class="display-5 fw-bolder"><?= $perfume->nome; ?></h1>
				<div class="fs-5 mb-3">
					<span><?= $perfume->preco; ?></span>
				</div>
				<p class="lead text-justify"><?= $perfume->descricao_info; ?></p>
				<div class="d-flex">
					<input class="form-control text-center me-3" id="inputQuantity" type="" value="1" style="max-width: 3rem" />
					<button class="btn btn-outline-dark flex-shrink-0" type="button">
						<i class="fas fa-shopping-cart"></i>
						Adicionar no carrinho
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
