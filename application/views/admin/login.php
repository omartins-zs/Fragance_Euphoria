<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= isset($titulo) ? $titulo : 'Login Administrativo | Fragance Euphoria' ?></title>

	<!-- Tema do painel (SB Admin 2) -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url() ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://kit.fontawesome.com/6739ae1e1b.js" crossorigin="anonymous"></script>

	<style>
		.demo-btn {
			display: flex;
			align-items: center;
			justify-content: space-between;
			font-size: .85rem;
			font-weight: 600;
			padding: .6rem 1rem;
		}
		.card-login {
			border-radius: 1rem;
		}
	</style>
</head>

<body class="bg-gradient-primary d-flex align-items-center min-vh-100 py-5">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-md-7 col-lg-5 col-xl-5">

				<div class="card card-login o-hidden border-0 shadow-lg my-2">
					<div class="card-body p-4 p-sm-5">
						<div class="text-center mb-4">
							<div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center p-3 mb-2 shadow-sm" style="width: 65px; height: 65px;">
								<i class="fas fa-gem text-warning fa-2x"></i>
							</div>
							<h1 class="h4 text-gray-900 font-weight-bold mb-1">Fragance Euphoria</h1>
							<p class="small text-gray-600 mb-0">Painel de Gestão e E-commerce</p>
						</div>

						<?php if ($this->session->flashdata('erro')) : ?>
							<div class="alert alert-danger small py-2 px-3 text-center mb-3">
								<i class="fas fa-exclamation-circle mr-1"></i><?= $this->session->flashdata('erro') ?>
							</div>
						<?php endif; ?>

						<?php if ($this->session->flashdata('sucesso')) : ?>
							<div class="alert alert-success small py-2 px-3 text-center mb-3">
								<i class="fas fa-check-circle mr-1"></i><?= $this->session->flashdata('sucesso') ?>
							</div>
						<?php endif; ?>

						<form class="user" action="<?= base_url('admin/auth/entrar') ?>" method="POST">
							<div class="form-group mb-3">
								<input type="email" class="form-control form-control-user" name="email" placeholder="E-mail de acesso" required autofocus>
							</div>
							<div class="form-group mb-3">
								<input type="password" class="form-control form-control-user" name="senha" placeholder="Sua senha" required>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold shadow-sm">
								<i class="fas fa-sign-in-alt mr-1"></i> Entrar no Painel
							</button>
						</form>

						<hr class="my-4">

						<div class="text-center mb-2">
							<span class="small text-uppercase text-muted font-weight-bold" style="font-size: 0.7rem;">
								<i class="fas fa-bolt text-warning mr-1"></i> Entrar com perfil de demonstração
							</span>
						</div>

						<div class="d-flex flex-column gap-2">
							<a href="<?= base_url('admin/auth/demo/admin') ?>" class="btn btn-outline-danger btn-block demo-btn mb-2">
								<span><i class="fas fa-crown fa-fw mr-1"></i> Administrador</span>
								<span class="badge badge-danger">Acesso total</span>
							</a>
							<a href="<?= base_url('admin/auth/demo/gerente') ?>" class="btn btn-outline-primary btn-block demo-btn mb-2">
								<span><i class="fas fa-boxes fa-fw mr-1"></i> Gerente de Vendas</span>
								<span class="badge badge-primary">Gestão</span>
							</a>
							<a href="<?= base_url('admin/auth/demo/atendente') ?>" class="btn btn-outline-success btn-block demo-btn mb-2">
								<span><i class="fas fa-headset fa-fw mr-1"></i> Atendente de Loja</span>
								<span class="badge badge-success">Consulta</span>
							</a>
						</div>

						<hr class="my-3">

						<div class="text-center">
							<a class="small text-muted font-weight-bold" href="<?= base_url('shop') ?>">
								<i class="fas fa-arrow-left fa-sm mr-1"></i> Voltar para a loja virtual
							</a>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

</body>

</html>
