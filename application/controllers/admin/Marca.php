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

	public function novo()
	{
		// $dados["titulo"] = "Sistemas/Aplicativos";

		$dados['subview'] = 'admin/marca/insertEdit';

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}

	public function create()
	{
		$marca = array(
			"nome" => $this->input->post("nome"),
			"pais_origem" => $this->input->post("pais_origem")
		);

		$this->Marca_model->inserir($marca);

		redirect('admin/marca');
	}


	public function edit($id)
	{
		$dados['marca'] = $this->Marca_model->buscaMarcaPorId($id);

		$dados['subview'] = 'admin/marca/insertEdit';

		// echo "<pre>";
		// print_r($dados);
		// exit;


		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}

	// $this->Marca_model->inserir($marca);
	// $this->Marca_model->atualizar($id, $marca);
	// $this->session->set_flashdata('msg', 'Marca editada com sucesso');
	// $this->session->set_flashdata('msg', 'Marca cadastrada com sucesso');

}
