<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= isset($titulo) ? $titulo : 'Login Administrativo | Fragance Euphoria' ?></title>

	<!-- Mesmo tema do painel (SB Admin 2) -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url() ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/6739ae1e1b.js" crossorigin="anonymous"></script>

	<style>
		.bg-login-image {
			background: #fff url("<?= base_url('assets/img/good_girl.jpg') ?>") no-repeat center;
			background-size: contain;
		}

		.demo-btn {
			display: flex;
			align-items: center;
			justify-content: space-between;
			font-size: .8rem;
		}
	</style>
</head>

<body class="bg-gradient-primary">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-1">Fragance Euphoria</h1>
										<p class="small text-gray-600 mb-4">Painel de Gestão e E-commerce</p>
									</div>

									<?php if ($this->session->flashdata('erro')) : ?>
										<div class="alert alert-danger small text-center"><?= $this->session->flashdata('erro') ?></div>
									<?php endif; ?>

									<?php if ($this->session->flashdata('sucesso')) : ?>
										<div class="alert alert-success small text-center"><?= $this->session->flashdata('sucesso') ?></div>
									<?php endif; ?>

									<form class="user" action="<?= base_url('admin/auth/entrar') ?>" method="POST">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" name="email" placeholder="E-mail" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="senha" placeholder="Senha" required>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Entrar
										</button>
									</form>

									<hr>

									<p class="small text-gray-600 text-center mb-2">Entrar com perfil de demonstração</p>

									<a href="<?= base_url('admin/auth/demo/admin') ?>" class="btn btn-outline-danger btn-user btn-block demo-btn">
										<span><i class="fas fa-crown fa-fw mr-1"></i> Administrador</span>
										<span class="badge badge-danger">Acesso total</span>
									</a>
									<a href="<?= base_url('admin/auth/demo/gerente') ?>" class="btn btn-outline-primary btn-user btn-block demo-btn">
										<span><i class="fas fa-boxes fa-fw mr-1"></i> Gerente de Vendas</span>
										<span class="badge badge-primary">Gestão</span>
									</a>
									<a href="<?= base_url('admin/auth/demo/atendente') ?>" class="btn btn-outline-success btn-user btn-block demo-btn">
										<span><i class="fas fa-headset fa-fw mr-1"></i> Atendente de Loja</span>
										<span class="badge badge-success">Consulta</span>
									</a>

									<hr>

									<div class="text-center">
										<a class="small" href="<?= base_url('shop') ?>"><i class="fas fa-arrow-left fa-sm mr-1"></i> Voltar para a loja</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

</body>

</html>
