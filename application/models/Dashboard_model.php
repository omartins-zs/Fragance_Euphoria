<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function countPerfumes()
    {
        return (int) $this->db->count_all('perfumes');
    }

    public function countClientes()
    {
        return (int) $this->db->count_all('clientes');
    }

    public function countMarcas()
    {
        return (int) $this->db->count_all('marcas');
    }

    public function countPedidos()
    {
        return (int) $this->db->count_all('pedidos');
    }

    public function totalFaturamento()
    {
        $this->db->select_sum('total');
        $this->db->where_in('status', array('Pago', 'Enviado', 'Entregue'));
        $query = $this->db->get('pedidos');
        $row = $query->row();
        return (float) ($row->total ?? 0);
    }

    public function countEstoqueBaixo($limite = 10)
    {
        $this->db->where('estoque <=', (int) $limite);
        return (int) $this->db->count_all_results('perfumes');
    }

    public function pedidosRecentes($limit = 5)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit((int) $limit);
        return $this->db->get('pedidos')->result();
    }
}
