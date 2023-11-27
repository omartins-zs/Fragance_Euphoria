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
			'imagem'    => $this->input->post('imagem'),
		);

		// Verifica se o carrinho existe na sessão
		if (!isset($_SESSION['carrinho'])) {
			// Se não existir, cria um array vazio
			$_SESSION['carrinho'] = array();
		}

		// Adiciona o item ao carrinho na sessão
		$_SESSION['carrinho'][] = $perfume;

		// Redireciona para a página do carrinho
		redirect('Carrinho');
	}

	public function remover($index)
	{
		// Remove um item do carrinho na sessão
		if (isset($_SESSION['carrinho'][$index])) {
			unset($_SESSION['carrinho'][$index]);
		}

		// Redireciona para a página do carrinho
		redirect('carrinho');
	}

	public function limpar()
	{
		// Limpa o carrinho
		$this->cart->destroy();
		redirect('carrinho');
	}
}
