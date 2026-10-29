<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedidos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pedido_model');
    }

    /**
     * Listagem de pedidos no painel administrativo
     */
    public function index()
    {
        $dados['subview'] = 'admin/pedidos/index';
        $dados['pedidos'] = $this->Pedido_model->get_pedidos();
        $dados['total_pedidos'] = $this->Pedido_model->total_pedidos();
        $dados['faturamento'] = $this->Pedido_model->total_faturamento();

        $this->load->vars($dados);
        $this->load->view('admin/layout_main_admin');
    }

    /**
     * Detalhes de um pedido especifico
     */
    public function detalhes($id = null)
    {
        if (!$id) {
            redirect(base_url('admin/pedidos'));
        }

        $pedido = $this->Pedido_model->get_pedido_by_id($id);
        if (!$pedido) {
            $this->session->set_flashdata('erro', 'Pedido não encontrado.');
            redirect(base_url('admin/pedidos'));
        }

        $dados['subview'] = 'admin/pedidos/detalhes';
        $dados['pedido']  = $pedido;
        $dados['itens']   = $this->Pedido_model->get_itens_by_pedido($id);

        $this->load->vars($dados);
        $this->load->view('admin/layout_main_admin');
    }

    /**
     * Atualiza o status do pedido
     */
    public function status($id = null)
    {
        if (!$id) {
            redirect(base_url('admin/pedidos'));
        }

        if (!$this->isGerente()) {
            $this->session->set_flashdata('erro', 'Apenas Administradores e Gerentes podem alterar o status de pedidos.');
            redirect(base_url('admin/pedidos/detalhes/' . $id));
        }

        $novo_status = $this->input->post('status', TRUE);
        $status_permitidos = array('Pendente', 'Pago', 'Enviado', 'Entregue', 'Cancelado');

        if (in_array($novo_status, $status_permitidos)) {
            $this->Pedido_model->atualizar_status($id, $novo_status);
            $this->session->set_flashdata('sucesso', "Status do pedido #{$id} alterado para '{$novo_status}' com sucesso!");
        } else {
            $this->session->set_flashdata('erro', 'Status inválido informado.');
        }

        redirect(base_url('admin/pedidos/detalhes/' . $id));
    }
}
