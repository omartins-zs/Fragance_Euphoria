<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard') ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-gem text-warning"></i>
		</div>
		<div class="sidebar-brand-text mx-2">Fragance <sup>Admin</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?= ($this->uri->segment(2) === 'dashboard' || empty($this->uri->segment(2))) ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Visão Geral</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Gestão do E-commerce
	</div>

	<!-- Nav Item - Pedidos (Nova Funcionalidade) -->
	<li class="nav-item <?= ($this->uri->segment(2) === 'pedidos') ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('admin/pedidos') ?>">
			<i class="fas fa-fw fa-receipt text-warning"></i>
			<span>Pedidos de Venda</span>
		</a>
	</li>

	<!-- Nav Item - Perfumes -->
	<li class="nav-item <?= (strtolower($this->uri->segment(2)) === 'perfume') ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('admin/perfume') ?>">
			<i class="fas fa-fw fa-spray-can text-info"></i>
			<span>Catálogo de Perfumes</span>
		</a>
	</li>

	<!-- Nav Item - Marcas -->
	<li class="nav-item <?= (strtolower($this->uri->segment(2)) === 'marca') ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('admin/marca') ?>">
			<i class="fas fa-fw fa-tags text-success"></i>
			<span>Marcas</span>
		</a>
	</li>

	<!-- Nav Item - Clientes -->
	<li class="nav-item <?= (strtolower($this->uri->segment(2)) === 'cliente') ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('admin/cliente') ?>">
			<i class="fas fa-fw fa-users text-light"></i>
			<span>Clientes</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Loja Pública
	</div>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('shop') ?>" target="_blank">
			<i class="fas fa-fw fa-external-link-alt"></i>
			<span>Ver Loja Virtual</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
