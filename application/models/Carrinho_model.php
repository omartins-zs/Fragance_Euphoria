<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrinho_model extends CI_Model
{
	public function contarProdutosNoCarrinho()
	{
		// Verifica se o carrinho existe na sessão
		if (isset($_SESSION['carrinho'])) {
			// Calcula e retorna a quantidade total de produtos no carrinho
			$quantidadeTotal = 0;
			foreach ($_SESSION['carrinho'] as $item) {
				$quantidadeTotal += $item['qtde'];
			}

			// echo "<pre>";
			// print_r($quantidadeTotal);
			// exit;

			return $quantidadeTotal;
		} else {
			return 0;
		}
	}

	public function calcularTotalCarrinho()
	{
		if (isset($_SESSION['carrinho'])) {
			$total = 0;

			foreach ($_SESSION['carrinho'] as $item) {
				$total += $item['preco'] * $item['qtde'];
			}

			return $total;
		} else {
			return 0;
		}
	}
}
