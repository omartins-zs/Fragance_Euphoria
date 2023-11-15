  <!-- DataTales Example -->
  <div class="card shadow mb-4">
  	<div class="card-header d-flex align-items-center justify-content-between py-3">
  		<h6 class="m-0 font-weight-bold text-primary">Lista de clientes</h6>
  	</div>
  	<div class="card-body">
  		<?php if ($this->session->flashdata('msg')) : ?>
  			<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  				<?= $this->session->flashdata('msg') ?>
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  		<?php endif ?>
  		<div class="table-responsive">
  			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  				<thead>
  					<tr>

  						<th>Nome</th>
  						<th>Email</th>
  						<th>Endereço</th>
  						<th>Celular</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php if (count($clientes)) : foreach ($clientes as $cliente) : ?>
  							<tr>

  								<td><?= $cliente->nome ?></td>
  								<td><?= $cliente->email ?></td>
  								<td><?= $cliente->endereco ?></td>
  								<td class="celular"><?= $cliente->celular ?></td>
  							</tr>
  						<?php endforeach; ?>
  					<?php else : ?>
  						<tr>
  							<td colspan="4" class="text-center">Não existem clientes.</td>
  						</tr>
  					<?php endif; ?>
  				</tbody>
  			</table>
  		</div>
  	</div>
  </div>
