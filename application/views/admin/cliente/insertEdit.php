<div class="card shadow mb-4">
	<div class="card-header py-3">
		<?= empty($cliente->nome) ? 'Novo cliente' : 'Editar cliente'; ?>
	</div>
	<div class="card-body">

		<?php if (isset($cliente->id)) : ?>
			<form class="form" action="<?= base_url() ?>admin/cliente/update/<?= $cliente->id ?>" method="post">
		<?php else : ?>
				<form class="form" method="POST" action="<?= base_url() ?>admin/cliente/create">
		<?php endif; ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1" for="nome">Nome</label>
							<input class="form-control" type="text" id="nome" value="<?= html_escape($cliente->nome ?? ''); ?>" name="nome" maxlength="150" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1" for="email">E-mail</label>
							<input class="form-control" type="email" id="email" value="<?= html_escape($cliente->email ?? ''); ?>" name="email" maxlength="100" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1" for="endereco">Endereço</label>
							<input class="form-control" type="text" id="endereco" value="<?= html_escape($cliente->endereco ?? ''); ?>" name="endereco" maxlength="150" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="small mb-1" for="celular">Celular</label>
							<input class="form-control" type="text" id="celular" value="<?= html_escape($cliente->celular ?? ''); ?>" name="celular" placeholder="(11) 98765-4321" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="small mb-1" for="senha">Senha<?= isset($cliente->id) ? ' (em branco mantém a atual)' : ''; ?></label>
							<input class="form-control" type="password" id="senha" name="senha" minlength="6" autocomplete="new-password" <?= isset($cliente->id) ? '' : 'required'; ?>>
						</div>
					</div>
				</div>
				<?php if (isset($cliente->id)) { ?>
					<button class="btn btn-primary" type="submit">Atualizar cliente</button>
				<?php } else { ?>
					<button class="btn btn-primary" type="submit">Adicionar cliente</button>
				<?php } ?>
			</form>
	</div>
</div>
