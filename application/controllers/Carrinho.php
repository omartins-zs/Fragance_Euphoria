<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrinho extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Inicia a sessão, se já não estiver iniciada
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}

	public function index()
	{
		$dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho();
		$dados['totalCarrinho'] = $this->Carrinho_model->calcularTotalCarrinho();
		$dados['perfumesDoCarrinho'] =  $_SESSION['carrinho'];

		// 	echo "<pre>";
		// print_r( $_SESSION['carrinho']);
		// print_r($perfume);
		// var_dump($perfume);
		// 	exit;

		$this->load->vars($dados);

		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop/carrinho');
		$this->load->view('templates/shop/footer');
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
