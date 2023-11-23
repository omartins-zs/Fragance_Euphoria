<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrinho extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}

	public function index()
	{
		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');

		if ($this->cart->total_items() > 0) {
			// O carrinho não está vazio, exibe a página do carrinho
			$this->load->view('shop/carrinho');
		} else {
			// O carrinho está vazio
			echo "O carrrrinho esta vaziooooo";
			// $this->load->view('shop/carrinho_vazio');
		}
	}



	public function adicionar()
	{
		// Adiciona um item ao carrinho
		$perfume = array(
			'id'      => $this->input->post('id'),
			'qtde'    => $this->input->post('quantidade'),
			'preco'   => $this->input->post('preco'),
			'nome'    => $this->input->post('nome'),
		);

		// echo "<pre>";
		// var_dump($perfume);
		// print_r($perfume);
		// exit;

		if ($this->cart->insert($perfume)) {
			// Se a inserção for bem-sucedida, redirecione para a página do carrinho
			redirect('carrinho');
		} else {
			// // Se houver um problema ao inserir, exiba mensagens de erro
			// echo "Erro ao adicionar ao carrinho.";
			// // Adicione mensagens de erro específicas, se disponíveis
			// print_r($this->cart->display_errors());
			// exit;
		}
	}


	public function remover($rowid)
	{
		// Remove um item do carrinho
		$data = array(
			'rowid' => $rowid,
			'qtde'   => 0
		);

		$this->cart->update($data);
		redirect('carrinho');
	}

	public function limpar()
	{
		// Limpa o carrinho
		$this->cart->destroy();
		redirect('carrinho');
	}
}
