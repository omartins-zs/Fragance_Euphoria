<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->session->userdata('loggedin') == TRUE || redirect('user/login');
	}

	public function index()
	{
		$dados['subview'] = 'admin/admin';

		$dados['total_perfumes'] = $this->Dashboard_model->countPerfumes();
		$dados['total_marcas'] = $this->Dashboard_model->countMarcas();
		$dados['total_clientes'] = $this->Dashboard_model->countClientes();

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
