<div class="card shadow mb-4">
	<div class="card-header py-3"><?= empty($perfume->nome) ? 'Novo perfume' : 'Editar perfume'; ?></div>
	<div class="card-body">
		<?php if (isset($perfume->id)) : ?>
			<form class="form" action="<?= base_url() ?>admin/perfume/update/<?= $perfume->id ?>" method="post" enctype="multipart/form-data">
			<?php else : ?>
				<form class="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>admin/perfume/create">
				<?php endif; ?>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="inputUsername">Nome do Perfume</label>
							<input class="form-control" type="text" value="<?= $perfume->nome; ?>" name="nome">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="inputUsername">Informações</label>
							<input class="form-control" type="text" value="<?= $perfume->descricao_info; ?>" name="descricao_info">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlSelect2">Marcas</label>
							<select class="form-control" id="exampleFormControlSelect2" name="marca">
								<option selected disabled>Selecione</option>
								<?php foreach ($marcas as $marca) : ?>
									<option value="<?= $marca->id ?>" <?php if ($marca->id == $perfume->marca) echo "selected"; ?>>
										<?= $marca->nome ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Tipo</label>
							<select class="form-control" id="exampleFormControlSelect1" name="tipo">
								<option value="Masculino" <?php if ($perfume->tipo == 'Masculino') echo "selected"; ?>>Masculino</option>
								<option value="Feminino" <?php if ($perfume->tipo == 'Feminino') echo "selected"; ?>>Feminino</option>
								<option value="Unissex" <?php if ($perfume->tipo == 'Unissex') echo "selected"; ?>>Unissex</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col">
						<div class="form-group">
							<label class="small mb-1" for="inputUsername">Volume(ML)</label>
							<input class="form-control" type="text" value="<?= $perfume->volume; ?>" name="volume">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="small mb-1" for="inputUsername">Estoque(UNIDADE)</label>
							<input class="form-control" type="number" value="<?= $perfume->estoque; ?>" name="estoque">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="small mb-1" for="inputUsername">Preço</label>
							<input class="form-control" type="text" value="<?= $perfume->preco; ?>" name="preco">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="small mb-1" for="inputUsername">Upload da imagem</label>

					<?php if ($perfume->imagem == '') : ?>
						<!-- Verifica se o campo de imagem está vazio -->
						<!-- Se estiver vazio, exibe uma imagem padrão (default.jpg) -->
						<img src="<?= base_url('assets/admin/images/default_upload.jpg'); ?>" id="img_url" alt="Sua imagem" class="img-thumbnail">
					<?php else : ?>
						<!-- Se não estiver vazio (imagem já carregada), exibe a imagem correspondente -->
						<img src="<?= base_url('assets/admin/upload/' . $perfume->imagem); ?>" id="img_url" alt="Sua imagem" class="img-thumbnail">
					<?php endif; ?>

					<input type="hidden" name="imagem_nome" value="<?= $perfume->imagem ?>">
					<!-- Campo oculto para armazenar o nome da imagem original -->

					<input class="form-control-file mt-2" id="inputUsername" type="file" name="imagem" onChange="img_pathUrl(this);">
					<!-- Campo de upload de arquivo -->
					<!-- onChange chama a função JavaScript "img_pathUrl" quando um arquivo é selecionado -->
				</div>



				<?php if (isset($perfume->id)) { ?>
					<button class="btn btn-primary" type="submit">Atualizar Perfume</button>
				<?php } else { ?>
					<button class="btn btn-primary" type="submit">Adicionar Perfume</button>
				<?php } ?>
				</form>
	</div>
</div>
