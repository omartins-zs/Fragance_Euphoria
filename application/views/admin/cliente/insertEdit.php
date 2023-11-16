<!-- <div class="card shadow mb-4">
	<div class="card-header py-3">
		<?= empty($marca->nome) ? 'Nova marca' : 'Editar marca'; ?>
	</div>
	<div class="card-body">

		<?php if (isset($marca->id)) : ?>
			<form class="form" action="<?= base_url() ?>admin/marca/update/<?= $marca->id ?>" method="post">
		<?php else : ?>
				<form class="form" method="POST" action="<?= base_url() ?>admin/marca/create">
		<?php endif; ?>
				<div class="form-group">
					<label class="small mb-1" for="inputUsername">Marcas</label>
					<input class="form-control" type="text" value="<?= $marca->nome ?>" name="nome"></input>
				</div>
				<div class="form-group">
					<label class="small mb-1" for="inputUsername">País de Origem</label>
					<input class="form-control" type="text" value="<?= $marca->pais_origem ?>" name="pais_origem"></input>
				</div>
				<?php if (isset($marca->id)) { ?>
					<button class="btn btn-primary" type="submit">Atualizar marca</button>
				<?php } else { ?>
					<button class="btn btn-primary" type="submit">Adicionar marca</button>
				<?php } ?>
			</form>
	</div>
</div> -->
