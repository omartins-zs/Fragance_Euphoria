<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrinho_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Conta o total de itens no carrinho
     */
    public function contarProdutosNoCarrinho($carrinho = null)
    {
        $itens = $carrinho ?? ($_SESSION['carrinho'] ?? array());
        if (!is_array($itens)) {
            return 0;
        }

        $total = 0;
        foreach ($itens as $item) {
            $total += (int) ($item['qtde'] ?? 1);
        }
        return $total;
    }

    /**
     * Calcula o valor total do carrinho
     */
    public function calcularTotalCarrinho($carrinho = null)
    {
        $itens = $carrinho ?? ($_SESSION['carrinho'] ?? array());
        if (!is_array($itens)) {
            return 0.0;
        }

        $total = 0.0;
        foreach ($itens as $item) {
            $preco = (float) ($item['preco'] ?? 0);
            $qtde  = (int) ($item['qtde'] ?? 1);
            $total += $preco * $qtde;
        }
        return $total;
    }
}
