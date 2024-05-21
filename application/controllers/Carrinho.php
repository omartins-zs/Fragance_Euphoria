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
		$id = $this->input->post('id');
		$quantidade = $this->input->post('quantidade');
		$preco = $this->input->post('preco');
		$nome = $this->input->post('nome');
		$imagem = $this->input->post('imagem');

		// Verifica se o carrinho existe na sessão
		if (!isset($_SESSION['carrinho'])) {
			// Se não existir, cria um array vazio
			$_SESSION['carrinho'] = array();
		}

		// Verifica se o produto já está no carrinho
		$produto_no_carrinho = false;
		foreach ($_SESSION['carrinho'] as &$item) {
			if ($item['id'] == $id) {
				// Se o produto já estiver no carrinho, aumenta a quantidade
				$item['qtde'] += $quantidade;
				$produto_no_carrinho = true;
				break;
			}
		}

		// Se o produto não estiver no carrinho, adiciona como um novo item
		if (!$produto_no_carrinho) {
			$perfume = array(
				'id'      => $id,
				'qtde'    => $quantidade,
				'preco'   => $preco,
				'nome'    => $nome,
				'imagem'  => $imagem,
			);

			$_SESSION['carrinho'][] = $perfume;
		}

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
		// Limpa o carrinho na sessão
		unset($_SESSION['carrinho']);

		// Redireciona para a página do carrinho
		redirect('carrinho');
	}
}
