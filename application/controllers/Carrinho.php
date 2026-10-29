<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrinho extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }
    }

    public function index()
    {
        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho']);
        $dados['totalCarrinho']      = $this->Carrinho_model->calcularTotalCarrinho($_SESSION['carrinho']);
        $dados['perfumesDoCarrinho']  = $_SESSION['carrinho'];

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/carrinho');
        $this->load->view('templates/shop/footer');
    }

    public function adicionar()
    {
        $id         = (int) $this->input->post('id', TRUE);
        $quantidade = max(1, (int) $this->input->post('quantidade', TRUE));
        $preco      = (float) $this->input->post('preco', TRUE);
        $nome       = trim($this->input->post('nome', TRUE));
        $imagem     = trim($this->input->post('imagem', TRUE));

        $produto_no_carrinho = false;
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $id) {
                $item['qtde'] += $quantidade;
                $produto_no_carrinho = true;
                break;
            }
        }

        if (!$produto_no_carrinho) {
            $_SESSION['carrinho'][] = array(
                'id'     => $id,
                'qtde'   => $quantidade,
                'preco'  => $preco,
                'nome'   => $nome,
                'imagem' => $imagem,
            );
        }

        redirect(base_url('carrinho'));
    }

    public function remover($index)
    {
        if (isset($_SESSION['carrinho'][$index])) {
            unset($_SESSION['carrinho'][$index]);
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }

        redirect(base_url('carrinho'));
    }

    public function limpar()
    {
        $_SESSION['carrinho'] = array();
        redirect(base_url('carrinho'));
    }

    /**
     * Tela de Finalizacao de Compra (Checkout)
     */
    public function checkout()
    {
        if (empty($_SESSION['carrinho'])) {
            $this->session->set_flashdata('aviso', 'Seu carrinho está vazio. Adicione itens antes de finalizar a compra.');
            redirect(base_url('shop'));
        }

        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho']);
        $dados['totalCarrinho']      = $this->Carrinho_model->calcularTotalCarrinho($_SESSION['carrinho']);
        $dados['perfumesDoCarrinho']  = $_SESSION['carrinho'];

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/checkout');
        $this->load->view('templates/shop/footer');
    }

    /**
     * Processa a finalizacao do pedido
     */
    public function finalizar()
    {
        if (empty($_SESSION['carrinho'])) {
            redirect(base_url('shop'));
        }

        $nome      = trim($this->input->post('nome', TRUE));
        $email     = trim($this->input->post('email', TRUE));
        $celular   = trim($this->input->post('celular', TRUE));
        $endereco  = trim($this->input->post('endereco', TRUE));
        $pagamento = trim($this->input->post('forma_pagamento', TRUE) ?: 'PIX');

        if (empty($nome) || empty($email) || empty($endereco)) {
            $this->session->set_flashdata('erro', 'Por favor, preencha todos os campos obrigatórios do endereço.');
            redirect(base_url('carrinho/checkout'));
        }

        $total = $this->Carrinho_model->calcularTotalCarrinho($_SESSION['carrinho']);

        $dados_pedido = array(
            'cliente_nome'     => $nome,
            'cliente_email'    => $email,
            'cliente_celular'  => $celular,
            'endereco_entrega' => $endereco,
            'total'            => $total,
            'forma_pagamento'  => $pagamento,
            'status'           => 'Pago'
        );

        $pedido_id = $this->Pedido_model->criar_pedido($dados_pedido, $_SESSION['carrinho']);

        if ($pedido_id) {
            // Limpa o carrinho
            $_SESSION['carrinho'] = array();
            redirect(base_url('carrinho/sucesso/' . $pedido_id));
        } else {
            $this->session->set_flashdata('erro', 'Ocorreu um erro ao processar o seu pedido. Tente novamente.');
            redirect(base_url('carrinho/checkout'));
        }
    }

    /**
     * Tela de Sucesso / Recibo do Pedido
     */
    public function sucesso($id = null)
    {
        if (!$id) {
            redirect(base_url('shop'));
        }

        $pedido = $this->Pedido_model->get_pedido_by_id($id);
        if (!$pedido) {
            redirect(base_url('shop'));
        }

        $dados['pedido']             = $pedido;
        $dados['itens']              = $this->Pedido_model->get_itens_by_pedido($id);
        $dados['produtosNoCarrinho'] = 0;

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/sucesso');
        $this->load->view('templates/shop/footer');
    }
}
