<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedido_model extends CI_Model
{
    protected $table = 'pedidos';
    protected $table_itens = 'itens_pedido';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Cria um novo pedido com seus itens e atualiza o estoque
     */
    public function criar_pedido($dados_pedido, $itens)
    {
        $this->db->trans_start();

        // 1. Insere o pedido
        $this->db->insert($this->table, $dados_pedido);
        $pedido_id = $this->db->insert_id();

        // 2. Insere os itens e da baixa no estoque
        foreach ($itens as $item) {
            $item_data = array(
                'pedido_id'      => $pedido_id,
                'perfume_id'     => $item['id'],
                'nome_produto'   => $item['nome'],
                'quantidade'     => (int) $item['qtde'],
                'preco_unitario' => (float) $item['preco'],
                'subtotal'       => (float) $item['preco'] * (int) $item['qtde']
            );
            $this->db->insert($this->table_itens, $item_data);

            // Atualiza o estoque do perfume
            $this->db->set('estoque', "GREATEST(0, estoque - " . (int)$item['qtde'] . ")", FALSE);
            $this->db->where('id', (int) $item['id']);
            $this->db->update('perfumes');
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return $pedido_id;
    }

    /**
     * Retorna lista de todos os pedidos
     */
    public function get_pedidos($limit = 50, $offset = 0)
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table, $limit, $offset);
        return $query->result();
    }

    /**
     * Retorna um pedido pelo ID
     */
    public function get_pedido_by_id($id)
    {
        $this->db->where('id', (int) $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    /**
     * Retorna os itens de um pedido
     */
    public function get_itens_by_pedido($pedido_id)
    {
        $this->db->where('pedido_id', (int) $pedido_id);
        $query = $this->db->get($this->table_itens);
        return $query->result();
    }

    /**
     * Atualiza o status de um pedido
     */
    public function atualizar_status($pedido_id, $status)
    {
        $this->db->where('id', (int) $pedido_id);
        return $this->db->update($this->table, array('status' => $status));
    }

    /**
     * Retorna o total de pedidos realizados
     */
    public function total_pedidos()
    {
        return (int) $this->db->count_all($this->table);
    }

    /**
     * Retorna a soma do faturamento total de pedidos pagos ou entregues
     */
    public function total_faturamento()
    {
        $this->db->select_sum('total');
        $this->db->where_in('status', array('Pago', 'Enviado', 'Entregue'));
        $query = $this->db->get($this->table);
        $row = $query->row();
        return (float) ($row->total ?? 0);
    }

    /**
     * Retorna os ultimos pedidos realizados
     */
    public function pedidos_recentes($limit = 5)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit((int) $limit);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
