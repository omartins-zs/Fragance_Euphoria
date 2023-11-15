<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends MY_Controller
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
		$dados['clientes'] = $this->Cliente_model->buscaclientes();

		$dados['subview'] = 'admin/cliente/listagem';

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}

	public function novo()
	{
		$dados['subview'] = 'admin/cliente/insertEdit';

		// echo "<pre>";
		// print_r($dados);
		// exit;

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}
}
