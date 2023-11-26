<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho']);
		$this->load->vars($dados);
	}
	
	public function index()
	{
		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop_ecommerce');
		$this->load->view('templates/shop/footer');
	}

	public function promocoes()
	{
		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop/promocoes');
		$this->load->view('templates/shop/footer');
	}

	public function blog()
	{
		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop/blog');
		$this->load->view('templates/shop/footer');
	}

	public function produtos($tipo = null)
	{
		// echo "<pre>";
		// print_r($tipo);
		// exit;
		$dados['perfumes'] = $this->Perfume_model->buscaPerfumesPorTipo($tipo);

		// if ($tipo !== null) {
		// 	echo "<pre>";
		// 	print_r($dados);
		// 	echo "</pre>";
		// }
		// echo "<pre>";
		// print_r($dados);
		// exit;
		$this->load->vars($dados);

		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop/produtos');
		$this->load->view('templates/shop/footer');
	}

	public function detalhes($id)
	{
		$dados['perfume'] = $this->Perfume_model->buscaperfumePorId($id);
		$dados['marcas'] = $this->Marca_model->buscaMarcas();

		$this->load->vars($dados);

		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop/detalhes');
		$this->load->view('templates/shop/footer');
	}

}
