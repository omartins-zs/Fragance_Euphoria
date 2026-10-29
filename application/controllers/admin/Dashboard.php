<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Pedido_model');
    }

    public function index()
    {
        $dados['subview'] = 'admin/admin';

        $dados['total_perfumes']     = $this->Dashboard_model->countPerfumes();
        $dados['total_marcas']       = $this->Dashboard_model->countMarcas();
        $dados['total_clientes']     = $this->Dashboard_model->countClientes();
        $dados['total_pedidos']      = $this->Dashboard_model->countPedidos();
        $dados['total_faturamento']  = $this->Dashboard_model->totalFaturamento();
        $dados['estoque_baixo']      = $this->Dashboard_model->countEstoqueBaixo(10);
        $dados['pedidos_recentes']   = $this->Dashboard_model->pedidosRecentes(5);

        $this->load->vars($dados);
        $this->load->view('admin/layout_main_admin');
    }
}
