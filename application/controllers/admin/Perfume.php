<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perfume extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Categoria_model');
		// $this->load->library('form_validation');
		// $this->load->library('session');
		// $this->session->userdata('loggedin') == TRUE || redirect('user/login');
	}

	public function index()
	{
		$dados['perfumes'] = $this->Perfume_model->buscaperfumes();

		$dados['subview'] = 'admin/perfume/listagem';

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}

	public function novo()
	{
		// $dados["titulo"] = "Sistemas/Aplicativos";
		$dados['marcas'] = $this->Marca_model->buscaMarcas();

		$dados['subview'] = 'admin/perfume/insertEdit';

		// echo "<pre>";
		// print_r($dados);
		// exit;

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}
}
