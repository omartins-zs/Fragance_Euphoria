<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends MY_Controller
{

	public function index()
	{
		$dados['clientes'] = $this->Cliente_model->buscaClientes();

		$dados['subview'] = 'admin/cliente/listagem';

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}

	public function novo()
	{
		$dados['subview'] = 'admin/cliente/insertEdit';

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}

	public function create()
	{
		if (!$this->validarCliente(null)) {
			redirect('admin/cliente/novo');
		}

		$cliente = $this->dadosDoFormulario();
		$cliente['senha'] = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);

		$this->Cliente_model->inserir($cliente);
		$this->session->set_flashdata('success', 'Cliente cadastrado com sucesso');

		redirect('admin/cliente');
	}

	public function edit($id)
	{
		$dados['cliente'] = $this->Cliente_model->buscaClientePorId($id);
		if (!$dados['cliente']) {
			$this->session->set_flashdata('error_msg', 'Cliente não encontrado.');
			redirect(base_url('admin/cliente'));
		}

		$dados['subview'] = 'admin/cliente/insertEdit';

		$this->load->vars($dados);

		$this->load->view('admin/layout_main_admin');
	}

	public function update($id)
	{
		if (!$this->Cliente_model->buscaClientePorId($id)) {
			$this->session->set_flashdata('error_msg', 'Cliente não encontrado.');
			redirect(base_url('admin/cliente'));
		}

		if (!$this->validarCliente($id)) {
			redirect('admin/cliente/edit/' . (int) $id);
		}

		$cliente = $this->dadosDoFormulario();
		// Senha so e alterada quando informada
		if ((string) $this->input->post('senha') !== '') {
			$cliente['senha'] = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
		}

		$this->Cliente_model->atualizar($id, $cliente);
		$this->session->set_flashdata('success', 'Cliente editado com sucesso');

		redirect('admin/cliente');
	}

	private function dadosDoFormulario()
	{
		return array(
			"nome" => trim($this->input->post("nome")),
			"email" => strtolower(trim($this->input->post("email"))),
			"endereco" => trim($this->input->post("endereco")),
			// Coluna celular e BIGINT: guarda apenas os digitos
			"celular" => preg_replace('/\D/', '', $this->input->post("celular"))
		);
	}

	private function validarCliente($id)
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[150]');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|max_length[100]');
		$this->form_validation->set_rules('endereco', 'Endereço', 'required|max_length[150]');
		$this->form_validation->set_rules('celular', 'Celular', 'required|min_length[10]|max_length[20]');
		$this->form_validation->set_rules('senha', 'Senha', ($id === null ? 'required|' : '') . 'min_length[6]');

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('error_msg', validation_errors());
			return false;
		}

		if ($this->Cliente_model->emailEmUso($this->input->post('email'), $id)) {
			$this->session->set_flashdata('error_msg', 'Já existe um cliente cadastrado com este e-mail.');
			return false;
		}

		return true;
	}
}
