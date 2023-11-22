<section class="py-5">
	<div class="container px-4 px-lg-5 mt-5">
		<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
			<?php foreach ($perfumes as $perfume) : ?>
				<div class="col mb-5">
					<div class="card h-100">
						<!-- Product image-->
						<img class="card-img-top mt-2" style="width: 243px; height:162px;object-fit: contain;" src="<?= !empty($perfume->imagem) ? base_url('assets/admin/upload/' . $perfume->imagem) : base_url('assets/img/perfume_default.png'); ?>" alt="<?= $perfume->descricao; ?>" />
						<!-- Product details-->
						<div class="card-body p-2">
							<div class="text-center">
								<!-- Product name-->
								<h4 class="fw-bolder my-0"><?= $perfume->nome; ?></h4>
								<h6 class="fw-light mb-4"><?= nome_marca($perfume->marca); ?></h6>
								<h5 class="fw-bolder mb-1 text-info">R$ <?= $perfume->preco ?></h5>
								<p class="lead my-0"><?= $perfume->volume; ?> ML</p>
							</div>
						</div>
						<!-- Product actions-->
						<div class="card-footer p-4 pt-0 border-top-0 bg-transparent mx-auto">
							<div class="btn-group">
								<a type="button" class="btn btn-outline-secondary" href="<?= base_url() ?>Shop/detalhes/<?= $perfume->id; ?>">View</a>
								<button type="button" class="btn btn-outline-secondary">Edit</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
