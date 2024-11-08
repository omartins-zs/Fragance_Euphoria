<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Bem vindo ao Painel Administrativo, <?= $this->session->userdata('nome'); ?>!!</h6>
	</div>
	<div class="card-body">
		<p>Aqui voce pode Gerenciar, editar, excluir, e analisar as informaçoes de pedidos e produtos</p>
		<!-- <a target="_blank" rel="nofollow" href="<?= base_url('admin/categoria') ?>">Ver categorias &rarr;</a> -->
		<br>
		<!-- <a target="_blank" rel="nofollow" href="<?= base_url('admin/post') ?>">Ver artigos &rarr;</a> -->
		<!-- Content Row -->
		<div class="row">

			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-2 col-md-6 mb-4">
				<!-- Reduzi o tamanho do col-xl-3 para col-xl-2 -->
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
									Perfumes</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_perfumes ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-air-freshener fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Pedidos</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Marcas</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_marcas ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Estoque
								</div>
								<div class="row no-gutters align-items-center">
									<div class="col-auto">
										<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
									</div>
									<div class="col">
										<div class="progress progress-sm mr-2">
											<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-comments fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- Pending Requests Card Example -->
			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-dark shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
									Clientes</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_clientes ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
