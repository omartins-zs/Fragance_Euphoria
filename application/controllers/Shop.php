<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
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
}
