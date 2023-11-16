<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!-- Font Awesome - Icons -->
	<script src="https://kit.fontawesome.com/6739ae1e1b.js" crossorigin="anonymous"></script>

	<link href="<?= base_url() ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url() ?>assets/shop/css/style.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Fragance Euphoria</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Promoções</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Dropdown
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" aria-disabled="true">Disabled</a>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<button class="btn btn-outline-dark" type="submit">
						<i class="fas fa-shopping-cart"></i>
						Cart
						<span class="badge bg-dark text-white ms-1 rounded-pill">0</span></button>
				</form>
			</div>
		</div>
	</nav>

	<div class="mw-100 mb-4 d-flex align-items-center justify-content-end" style="background-image: url(<?= base_url() ?>assets/img/promocao_perfume.png); background-size: 90% auto; background-position: center center; height: 620px;" data-aos="fade">
		<div class="container">
			<div class="row">
				<div class="col-md-7 offset-md-7 text-center text-md-right text-light">
					<h1 class=" text-left mb-2">Encontre seu <br> Perfume preferido</h1>
					<div class="intro-text text-center text-md-left">
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
						<p>
							<a href="#" class="btn btn-sm btn-success">Comprar agora</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>






	<div class="section my-4">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">

					<div class="text">
						<h3 class="text-uppercase"><i class="fas fa-truck mr-2" style="color: #3858ff;"></i> Free Shipping</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam.
							Integer accumsan
							tincidunt fringilla.</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">

					<div class="text">
						<h3 class="text-uppercase"><i class="fas fa-redo-alt mr-2" style="color: #3858ff;"></i>Free Returns</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam.
							Integer accumsan
							tincidunt fringilla.</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">

					<div class="text">
						<h3 class="text-uppercase"><i class="fas fa-question-circle mr-2" style="color: #3858ff;"></i>Customer Support</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam.
							Integer accumsan
							tincidunt fringilla.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
					<a class="block-2-item" href="#">
						<figure class="image zoom-fade">
							<img src="<?= base_url() ?>assets/shop/img/modelo_mulher.jpg" alt="" class="img-fluid">
						</figure>
						<div class="text">
							<span class="text-uppercase">Coleção</span>
							<h3>Feminina</h3>
						</div>
					</a>
				</div>

					<div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0 fade show">
						<a class="block-2-item" href="#">
							<figure class="image zoom-fade">
								<img src="<?= base_url() ?>assets/shop/img/modelo_crianca.jpg" alt="" class="img-fluid">
							</figure>
							<div class="text">
								<span class="text-uppercase">Coleção</span>
								<h3>Infantil</h3>
							</div>
					</a>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
					<a class="block-2-item" href="#">
						<figure class="image zoom-fade">
							<img src="<?= base_url() ?>assets/shop/img/modelo_homem.jpg" alt="" class="img-fluid">
						</figure>
						<div class="text">
							<span class="text-uppercase">Coleção</span>
							<h3>Masculina</h3>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>

	<footer class="border-top ">
		<div class="container mt-4">
			<div class="row">
				<div class="col-lg-6 mb-5 mb-lg-0">
					<div class="row">
						<div class="col-md-12">
							<h3 class="footer-heading mb-4">Navigations</h3>
						</div>
						<div class="col-md-6 col-lg-4">
							<ul class="list-unstyled">
								<li><a href="#">Sell online</a></li>
								<li><a href="#">Features</a></li>
								<li><a href="#">Shopping cart</a></li>
								<li><a href="#">Store builder</a></li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-4">
							<ul class="list-unstyled">
								<li><a href="#">Mobile commerce</a></li>
								<li><a href="#">Dropshipping</a></li>
								<li><a href="#">Website development</a></li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-4">
							<ul class="list-unstyled">
								<li><a href="#">Point of sale</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Software</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
					<h3 class="footer-heading mb-4">Promoção</h3>
					<a href="#" class="block-6">
						<img src="<?= base_url() ?>assets/img/promocao_valor_perfume.png" alt="Image placeholder" class="img-fluid mb-2">
						<h6 class="font-weight-light mb-0">Encontre seu Perfume preferido</h6>
						<p>Promoção de 15 de Janeiro - 25 <?= date('Y') ?></p>
					</a>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="block-5 mb-5">
						<h4 class="footer-heading mb-4">Informações de Contato</h4>
						<ul class="list-unstyled">
							<li><i class="fas fa-map-marker-alt mr-1"></i>Rua do teste N°23, Bairro do Teste, Teste, BR</li>
							<li><i class="fas fa-phone mr-1"></i> <a href="tel://23923929210">11 99999-8888</a></li>
							<li><i class="fas fa-envelope mr-1"></i>emailaddress@domain.com</li>
						</ul>
					</div>
					<div class="block-7">
						<form action="#" method="post">
							<label for="email_subscribe" class="footer-heading">Subscribe</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2">
								<button class="btn btn-primary" type="button" id="button-addon2">Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row pt-5 mt-5 text-center">
				<div class="col-md-12">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
						<?= date('Y') ?> All rights reserved | This
						template is made
						with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>

			</div>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
