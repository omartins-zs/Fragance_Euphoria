<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marca extends MY_Controller
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
		$dados['marcas'] = $this->Marca_model->buscaMarcas();
		$dados['subview'] = 'admin/marca/listagem';

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}
	
	// $this->Marca_model->inserir($marca);
	// $this->Marca_model->atualizar($id, $marca);
	// $this->session->set_flashdata('msg', 'Marca editada com sucesso');
	// $this->session->set_flashdata('msg', 'Marca cadastrada com sucesso');

}
